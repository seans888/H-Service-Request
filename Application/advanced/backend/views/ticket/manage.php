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
<strong><p>
	This is the manage Page of the site. This allows you to manage the data in the database, via a <br>
	Graphical user Interface. Data for Department, Request, Room, and Postion can be added, and edited. 
</p>
	</strong>

<?= Html::a('Manage Department', ['department/index'], ['class' => 'btn btn-success']) ?>

<?= Html::a('Manage Request', ['request/index'], ['class' => 'btn btn-success']) ?>

<?= Html::a('Manage Room', ['room/index'], ['class' => 'btn btn-success']) ?>
<?= Html::a('Manage Position', ['position/index'], ['class' => 'btn btn-success']) ?>


 
</center>
</body>