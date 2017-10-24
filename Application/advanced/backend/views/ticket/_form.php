<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper; 
use backend\models\Tickettype;
use backend\models\Department;
use backend\models\Room;
use backend\models\User;
use kartik\time\TimePicker;
use kartik\datetime\DateTimePicker;
/* @var $this yii\web\View */
/* @var $model frontend\models\Ticket */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ticket-form">

    <?php $form = ActiveForm::begin(); ?>

   


    <?= $form->field($model, 'tick_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tick_priority')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'tick_description')->textArea(['maxlength' => 300, 'rows' => 6, 'cols' => 50])  ?>

    <?= $form->field($model, 'tick_timelimit')->widget(TimePicker::classname(), [])?>





     <?= $form->field($model, 'ticket_type_id')->dropDownList(
        ArrayHelper::map(Tickettype::find()->all(),'id','type_name')    , 
    ['prompt'=>'Select Information'] 
    ) ?>



         <?= $form->field($model, 'department_id')->dropDownList(
        ArrayHelper::map(Department::find()->all(),'id','dept_name')    , 
    ['prompt'=>'Select Information'] 
    ) ?>




         <?= $form->field($model, 'room_room_no')->dropDownList(
        ArrayHelper::map(Room::find()->all(),'room_no','room_no')    , 
    ['prompt'=>'Select Information'] 
    ) ?>

    
         <?= $form->field($model, 'user_idCreated')->dropDownList(
        ArrayHelper::map(User::find()->all(),'id','username')    , 
    ['prompt'=>'Select Information'] 
    ) ?>



    <?= $form->field($model, 'user_id1Assigned')->dropDownList(
        ArrayHelper::map(User::find()->all(),'id','username')    , 
    ['prompt'=>'Select Information'] 
    ) ?>


    <?= $form->field($model, 'user_id2closed')->dropDownList(
        ArrayHelper::map(User::find()->all(),'id','username')    , 
    ['prompt'=>'Select Information'] 
    ) ?>


      



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
