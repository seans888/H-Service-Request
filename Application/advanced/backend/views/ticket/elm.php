<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

$this->title = 'Tickets';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php  
 $connect = mysqli_connect("localhost", "root", "qwerty", "ems3"); 

 $query = "Select req_name, count(ticket.request_req_id) as count from request";   
 $result = mysqli_query($connect, $query); 

 $query2 = "";  
 $result2 = mysqli_query($connect, $query2);

 $query6 = "";  
 $result6 = mysqli_query($connect, $query6);
 ?>



 <html>
  <head>  
           <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
  <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Enineering', 'Count'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  	
                               echo "['".$row["req_name"]."', ".$row["count"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  

           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Housekeeping', 'Count'],  
                          <?php  
                          while($row = mysqli_fetch_array($result2))  
                          {  
                               echo "['".$row["req_name"]."', ".$row["count"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart2'));  
                chart.draw(data, options);  
           }  
           </script>  



  </head>  
      <body>  
      	<button class="btn btn-lg btn-success" onClick="toggleVisibility('LM');return false;">Last Month</button>
       <a href="javascript:forprint()">Click here to Print the Page</a>
        </div>

      </body>