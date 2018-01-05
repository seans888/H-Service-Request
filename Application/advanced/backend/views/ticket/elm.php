<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

$this->title = 'Tickets';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php  
 $connect = mysqli_connect("localhost", "root", "qwerty", "ems3"); 

 $query = "";   
 $result = mysqli_query($connect, $query); 
 ?>