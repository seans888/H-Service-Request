<?php
namespace backend\controllers;

use yii\rest\ActiveController;

// This controller is for converting ticket data to JSON script to be used by the Escalation Managament System 
class TicketrController extends ActiveController{
	
    public $modelClass = 'backend\models\Ticket';
}
