<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Ticket */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tickets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('End' ,['end', 'id' => $model->id], [
                'class' => 'btn btn-success',
                'data' => [
                'confirm' => 'Are you sure you want to end this item?',
                'method' => 'post',
                ],]) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

     <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'room_room_no',
             [     
            'label' => 'Ticket type', 
            'value' => $model->ticketType->type_name,
             ],
           
            
             [     
            'label' => 'Request', 
            'value' => $model->request->req_name,
             ],
            'tick_others',

            'tick_timelimit',
            'tick_status',
            'assigned_to',
            //'tick_request',
            [                     
            'label' => 'Created By', 
            'value' => $model->createdBy->username,
             ],
            'tick_startDate',
            'closed_by',
            'tick_closed_date',
        ],
    ]) ?>

</div>