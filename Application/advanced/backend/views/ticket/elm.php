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



 <html>
  <head>  
           <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
  


  </head>  
      <body>  
      	<button class="btn btn-lg btn-success" onClick="toggleVisibility('LM');return false;">Last Month</button>
       <a href="javascript:forprint()">Click here to Print the Page</a>
        </div>

      </body>