<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Ticket */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ticket-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'room_room_no')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'tick_request')->textInput(['readonly' => true]) ?>   
    
    <?= $form->field($model, 'tick_status')->textInput(['readonly' => true, 'value' => 'Closed']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'End', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
