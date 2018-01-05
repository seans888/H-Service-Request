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
#box {
    background: url(<?= Url::to('@web/images/bg.png')?>);
    border-radius: 25px;
    box-shadow: 1px 1px 10px #888888;
    padding: 20px; 
    width: 920px;
    height: 150px; 

}
.id {
  margin-left: 10px;
}
.status {
  color: white;
  width: 144px;
  margin-left: -776px;
  font-size: 18pt;
}
.description {
  margin-left: 150px;
  margin-top: -50px;
  font-size: 18pt;
  text-align:left;
}
.assign {
    margin-top: 25px;
    margin-left: -500px;
}
.created {
    margin-top: -25px;
    margin-left: -80px;
}
.prio {
    margin-top: -25px;
    margin-left: 350px
}
.dept {
    margin-top: -25px;
    margin-left: 570px;
    text-align: left;
}
.hover3{
  width: 42px;
  height: 24px;
  margin-top: -35px;
  margin-left: -870px;
}
.hover2 {
  width:40px;
  height: 31px;
  margin-top: -30px;
  margin-left: -775px;
}
.hover {
  width: 29px;
  height: 34px;
  margin-top: -34px;
  margin-left: -680px;
}
.hover3:hover {
  opacity: 0.7;
}
.hover2:hover {
  opacity: 0.7;
}
.hover:hover {
  opacity: 0.7;
}

</style>
 <script>
 var CLASS_NAME = 'status';
    var strColorPairs = Array(
                                {'status' : 'Unassigned', 'color' : '#0356d2'},
                                {'status' : 'Closed', 'color' : '#fb521e'},
                                {'status' : 'Pending', 'color' : '#fe8e0b'},
                                {'status' : 'Escalate', 'color' : '#98ce00'}
                            );
 
    function myInit()
    {
        var divList = document.getElementsByClassName( CLASS_NAME );
        var i, n = divList.length;
 
        for (i=0; i<n; i++)
        {
            curContent = divList[i].children[0].innerHTML;
 
            for (j=0; j<strColorPairs.length; j++)
            {
                if (strColorPairs[j].status == curContent)
                    divList[i].style.background = strColorPairs[j].color;
            }
        }
    }
 </script>

 <body onload='myInit();'>
<p>
       
        <?= Html::a('Create Ticket', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


<center>
    <?php foreach ($tickets as $ticket): ?>
    <div id="box">
       <div class="id" style="font-size: 14pt;"><strong>Room&nbsp<?= Html::encode("{$ticket->room_room_no}") ?></strong><br></div>
       <div class="status"><p><?= Html::encode("{$ticket->tick_status}") ?><p></div>
       <div class="description"><?= Html::encode("{$ticket->request->req_name}") ?></div><Br>
       <div class="assign" style="font-size: 14pt;"><?= Html::encode("{$ticket->assignedTo->username}") ?></div>
       <div class="created" style="font-size: 14pt;"><?= Html::encode("{$ticket->createdBy->username}") ?></div>
       <div class="dept" style="font-size: 14pt;"><?= Html::encode("{$ticket->ticketType->department->dept_name}") ?></div>
       <div class="hover3"><?= Html::a('<img src="images/view.png">', ['view', 'id' => $ticket->id]) ?></div>
       <div class="hover2"><?= Html::a('<img src="images/edit.png">', ['update', 'id' => $ticket->id]) ?></div>
       <div class="hover"><?= Html::a('<img src="images/remove.png">', ['delete', 'id' => $ticket->id], [
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?></div>
        
        
    </div><br>
<?php endforeach; ?>
</center>
</body>