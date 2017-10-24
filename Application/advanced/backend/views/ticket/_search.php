<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TicketSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ticket-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tick_closed_date') ?>

    <?= $form->field($model, 'tick_status') ?>

    <?= $form->field($model, 'tick_priority') ?>

    <?= $form->field($model, 'tick_startDate') ?>

    <?php // echo $form->field($model, 'tick_description') ?>

    <?php // echo $form->field($model, 'tick_timelimit') ?>

    <?php // echo $form->field($model, 'ticket_type_id') ?>

    <?php // echo $form->field($model, 'department_id') ?>

    <?php // echo $form->field($model, 'room_room_no') ?>

    <?php // echo $form->field($model, 'user_idCreated') ?>

    <?php // echo $form->field($model, 'user_id1Assigned') ?>

    <?php // echo $form->field($model, 'user_id2closed') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
