<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Room */

$this->title = 'Update Room: ' . $model->room_no;
$this->params['breadcrumbs'][] = ['label' => 'Rooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->room_no, 'url' => ['view', 'id' => $model->room_no]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="room-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
