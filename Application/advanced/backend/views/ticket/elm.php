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

           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Location', 'Count'],  
                          <?php  
                          while($row = mysqli_fetch_array($result6))  
                          {  
                               echo "['".$row["room_location"]."', ".$row["count"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart3'));  
                chart.draw(data, options);  
           }  
           </script>  



  </head>  
      <body>  
      	<button class="btn btn-lg btn-success" onClick="toggleVisibility('LM');return false;">Last Month</button>
       <a href="javascript:forprint()">Click here to Print the Page</a>
        </div>

        <div align="center">

        	             <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320 overflow_hidden" style="height: 400px; width: 450px;">
                <div class="x_title">
                  <h2>Top 3 request</h2>
                  <div class="clearfix"></div>
                </div>
          <table width="100%">
                <tr>
                    <center><p style ="color:black">You might want to consider these items because they lack most of the times. <p></p></center>
                      <th style="width:70%;">
                        <p>Range</p>
                      </th>
                      <th>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                          <p class="">Request</p>
                        </div>
                      </th>
                    </tr>
                 </table>
                <div class="x_content">
              <div id="piechart" style="width: 500px; height: 330px;margin-left: -40px;margin-top: -5px;"></div>
                </div>
              </div>

            </div>

            <div class="col-md-4 col-sm-4 col-xs-12" style="margin-left: 180px;">
              <div class="x_panel tile fixed_height_320 overflow_hidden" style="height: 100%; width: 450px;">      
 <div class="x_content">
    <h2></h2>
     <center><p style ="color:black"> <p></p></center>
<div id="chart"></div>
</div>
</div>
</div>

<div class="col-md-4 col-sm-4 col-xs-12";">
              <div class="x_panel tile fixed_height_320 overflow_hidden" style="height: 100%; width: 450px;">      
 <div class="x_content">
    <h2></h2>
    <center><p style ="color:black"><p></p></center>
<div id="chart5"></div>
</div>
</div>
</div>


      </body>

       

</html>