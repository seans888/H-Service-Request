<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\modal;
use yii\bootstrap\Tabs;
use kartik\tabs\TabsX;
use yii\widgets\Pjax;
use kartik\daterange\DateRangePicker;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TicketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tickets';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
$script = <<< JS
$(document).ready(function() {
    setInterval(function(){ $("#refreshButton").click(); }, 3000);
});
JS;
$this->registerJs($script);
?>

<div class="ticket-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Ticket', ['value'=>URL::to('index.php?r=ticket/create'),'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>

    <?php
        Modal::begin([
                'header'=>'<h3>Create Ticket</h3>',
                'id'=>'modal',
                'size'=>'modal-lg',
                ]);

        echo "<div id ='modalContent'></div>";


            Modal::end();



    ?>

<?php

echo '<center>';
echo '<label class="control-label">Date Range</label>';
echo '<div class="drp-container">';
echo DateRangePicker::widget([
    'name'=>'date_range_2',
    'presetDropdown'=>true,
    'hideInput'=>true
]);
echo '</div>';
echo '</center>';
?>
    
<?= Html::a("Refresh", ['ticket/index'], ['class' => 'btn btn-lg btn-primary hidden', 'id' => 'refreshButton']) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'id',
            'tick_closed_date',
            'tick_status',
            'tick_priority',
            'tick_startDate',
            // 'tick_description',
            // 'tick_timelimit',
            // 'ticket_type_id',
            // 'department_id',
            // 'room_room_no',
            // 'user_idCreated',
            // 'user_id1Assigned',
            // 'user_id2closed',
        ],
    ]); ?>
</div>
