<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Ticket */

$this->title = 'End Ticket: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tickets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'End';
?>
<div class="ticket-end">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_endform', [
        'model' => $model,
    ]) ?>

</div>
