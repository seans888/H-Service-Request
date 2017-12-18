<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;
use yii\helpers\Url;



/* @var $this yii\web\View */

$this->title = 'Tickets';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>


</style>
</body>

<?= Html::a('Manage Department', ['department/index'], ['class' => 'btn btn-success']) ?>

<?= Html::a('Manage Request', ['request/index'], ['class' => 'btn btn-success']) ?>

<?= Html::a('Manage Room', ['room/index'], ['class' => 'btn btn-success']) ?>
<?= Html::a('Manage Position', ['position/index'], ['class' => 'btn btn-success']) ?>


 
</center>
</body>