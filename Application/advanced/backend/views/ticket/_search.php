<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TicketSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ticket-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tick_request') ?>

    <?= $form->field($model, 'tick_priority') ?>

    <?= $form->field($model, 'tick_others') ?>

    <?= $form->field($model, 'tick_timelimit') ?>

    <?php // echo $form->field($model, 'tick_startDate') ?>

    <?php // echo $form->field($model, 'tick_status') ?>

    <?php // echo $form->field($model, 'tick_closed_date') ?>

    <?php // echo $form->field($model, 'room_room_no') ?>

    <?php // echo $form->field($model, 'ticket_type_id') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'assigned_to') ?>

    <?php // echo $form->field($model, 'closed_by') ?>

    <?php // echo $form->field($model, 'request_req_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
