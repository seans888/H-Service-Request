<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper; 
use frontend\models\Tickettype;
use frontend\models\Department;
use frontend\models\Room;
use frontend\models\User;
use frontend\models\Request;
use kartik\time\TimePicker;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Ticket */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ticket-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'room_room_no')->dropDownList(
        ArrayHelper::map(Room::find()->all(),'room_no','room_no')    , 
    ['prompt'=>'Select Information'] 
    ) ?>

   <?= $form->field($model, 'ticket_type_id')->dropDownList(
        ArrayHelper::map(Tickettype::find()->all(),'id','type_name'), 
    [
    'prompt'=>'Select Tickettype',
        'onchange'=>'$.post("index.php?r=request/lists&id='.'"+$(this).val(),function( data ){
                     $( "select#ticket-request_req_id" ).html( data );
                   }); '
        ] ); ?>

    <?= $form->field($model, 'request_req_id')->dropDownList(
        ArrayHelper::map(Request::find()->all(),'req_id','req_name')    , 
    [
    'prompt'=>'Select Request',
       
    ] 
    ); ?>

    
    <?= $form->field($model, 'assigned_to')->dropDownList(
        ArrayHelper::map(User::find()->all(),'id','username')    , 
    ['prompt'=>'Select Information'] 
    ) ?>

    <?= $form->field($model, 'tick_others')->textArea(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
