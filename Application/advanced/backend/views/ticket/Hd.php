<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\modal;
use yii\bootstrap\Tabs;
use kartik\tabs\TabsX;
use yii\widgets\Pjax;
use kartik\daterange\DateRangePicker;



/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TicketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tickets';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php  
 $connect = mysqli_connect("localhost", "root", "qwerty", "ems3"); 

 $query = "Select req_name, count(ticket.request_req_id) as count from request left join ticket on(request.req_id=ticket.request_req_id) where ticket.ticket_type_id IN('3', '4') and ticket.tick_startDate >= CURDATE() group by request.req_id ORDER BY COUNT DESC";   
 $result = mysqli_query($connect, $query); 

 $query2 = "Select req_name, count(ticket.request_req_id) as count from request left join ticket on(request.req_id=ticket.request_req_id) where ticket.ticket_type_id IN('3', '4')  and ticket.tick_startDate >= CURDATE() group by request.req_id ORDER BY COUNT DESC limit 3";  
 $result2 = mysqli_query($connect, $query2);

 $query6 = "Select room_location , count(room.room_no) as count from room left join ticket on (room.room_no = ticket.room_room_no) where ticket_type_id in ('3','4') and ticket.tick_startDate >= CURDATE()group by room.room_location order by count desc";  
 $result6 = mysqli_query($connect, $query6);
 ?>




<?php
$script = <<< JS
$(document).ready(function() {
    setInterval(function(){ $("#refreshButton").click(); }, 3000);
});
JS;
$this->registerJs($script);
?>

<?php 
//index.php
$connect = mysqli_connect("localhost", "root", "qwerty", "ems3");

$query3 = "Select name, count(user.id) as count from user left join ticket on (user.id = ticket.assigned_to) where ticket_type_id in ('3', '4')and ticket.tick_startDate >= CURDATE() group by user.id order by count desc limit 5";
$result3 = mysqli_query($connect, $query3);
$chart_data = '';
while($row = mysqli_fetch_array($result3))
{
 $chart_data .= "{ name:'".$row["name"]."', count:".$row["count"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);



$query4 = "Select name, count(user.id) as count from user left join ticket on (user.id = ticket.assigned_to) where ticket_type_id in ('3', '4') and ticket.tick_startDate >= CURDATE() group by user.id order by count desc limit 5"; 
$result4 = mysqli_query($connect, $query4);
$chart_data4 = '';
while($row = mysqli_fetch_array($result4))
{
 $chart_data4 .= "{ name:'".$row["name"]."', count:".$row["count"]."}, ";
}
$chart_data4 = substr($chart_data4, 0, -2);



$query5 = "select room_room_no, count(*) as count from ticket where ticket_type_id in ('3', '4')and ticket.tick_startDate >= CURDATE() group by room_room_no order by count desc limit 5";


$result5 = mysqli_query($connect, $query5);
$chart_data5 = '';
while($row = mysqli_fetch_array($result5))
{
 $chart_data5 .= "{ room_room_no:'".$row["room_room_no"]."', count:".$row["count"]."}, ";
}
$chart_data5 = substr($chart_data5, 0, -2);

?>

<div class="ticket-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   

    <?php
        Modal::begin([
                'header'=>'<h3>Create Ticket</h3>',
                'id'=>'modal',
                'size'=>'modal-lg',
                ]);

        echo "<div id ='modalContent'></div>";


            Modal::end();



    ?>

<script>
var divs = ["D"];
var visibleDivId = null;
function toggleVisibility(divId) {
    if (visibleDivId === divId) {
        visibleDivId = null;
    } else {
        visibleDivId = divId;
    }
    hideNonVisibleDivs();
}
function hideNonVisibleDivs() {
    var i, divId, div;
    for (i = 0; i < divs.length; i++) {
        divId = divs[i];
        div = document.getElementById(divId);
        if (visibleDivId === divId) {
            div.style.display = "block";
        } else {
            div.style.display = "none";
        }
    }
}
</script>


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

        <button class="btn btn-lg btn-success" onClick="toggleVisibility('D');return false;">This Day</button>
              
<a href="javascript:forprint()">Click here to Print the Page</a>
        </div>
        <div id="LM">
                        <div class="box" style="height:100%">


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
    <h2>Top 5 outstanding employee</h2>
     <center><p style ="color:black">Results are the top employees who rendered most services  <p></p></center>
<div id="chart"></div>
</div>
</div>
</div>

<div class="col-md-4 col-sm-4 col-xs-12";">
              <div class="x_panel tile fixed_height_320 overflow_hidden" style="height: 100%; width: 450px;">      
 <div class="x_content">
    <h2>Top 5 Rooms with more than one request</h2>
    <center><p style ="color:black">These rooms are maybe not being well maintained<p></p></center>
<div id="chart5"></div>
</div>
</div>
</div>

<div class="col-md-4 col-sm-4 col-xs-12" style="margin-left: 180px;">
              <div class="x_panel tile fixed_height_320 overflow_hidden" style="height: 400px; width: 450px;">
                <div class="x_title">
                  <h2>No. of tickets by Location</h2>
                  <div class="clearfix"></div>
                </div>
          <table width="100%">
                <tr>
                    <center><p style ="color:black">Shows how many requests has been rendered in this particular location <p></p></center>
                      <th style="width:70%;">
                        <p>Range</p>
                      </th>
                      <th>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                          <p class="">Location</p>
                        </div>
                      </th>
                    </tr>
                 </table>
                <div class="x_content">
              <div id="piechart3" style="width: 500px; height: 100%;margin-left: -40px;margin-top: -5px;"></div>
                </div>
              </div>
<br>
<br>
<br>
<br>
<br>

              <div class="col-md-4 col-sm-4 col-xs-12" style="margin-left: -500px;">
              <div class="x_panel tile fixed_height_320 overflow_hidden" style="height: 100%; width: 1000px;">
<?php
echo "<table style='border: solid 1px black;'>";
 echo "<tr><th>Id</th><th>Time Limit</th><th>Date Created</th><th>Status</th><th>Date Closed</th><th>Room no.</th><th>Request</th></tr>";

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 

$servername = "localhost";
$username = "root";
$password = "qwerty";
$dbname = "ems3";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("Select ticket.id, ticket.tick_timelimit, ticket.tick_startDate, ticket.tick_status, ticket.tick_closed_date, ticket.room_room_no, req_name as 'Request' from request left join ticket on(request.req_id=ticket.request_req_id) where ticket.ticket_type_id IN('3', '4') and ticket.tick_startDate >= CURDATE()"); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>     
</div>
</div>



            </div>




  </body>

       

</html>

<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'name',
 ykeys:['count'],
 labels:['Count'],
 hideHover:'auto',
 stacked:true
});
</script>

<script>
Morris.Bar({
 element : 'chart2',
 data:[<?php echo $chart_data4; ?>],
 xkey:'name',
 ykeys:['count'],
 labels:['Count'],
 hideHover:'auto',
 stacked:true
});
</script>

<script>
Morris.Line({
 element : 'chart5',
 data:[<?php echo $chart_data5; ?>],
 xkey:'room_room_no',
 ykeys:['count'],
 labels:['Count'],
 hideHover:'auto',
 stacked:true
});
</script>




<script>
function showDiv() {
   document.getElementById('welcomeDiv').style.display = "block";
}
</script>



<script>
function forprint(){
if (!window.print){

return
}
window.print()
}
</script>





