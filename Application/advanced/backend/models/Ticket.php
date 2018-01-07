<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ticket".
 *
 * @property integer $id
 * @property string $tick_request
 * @property string $tick_priority
 * @property string $tick_others
 * @property string $tick_timelimit
 * @property string $tick_startDate
 * @property string $tick_status
 * @property string $tick_closed_date
 * @property integer $room_room_no
 * @property integer $ticket_type_id
 * @property integer $created_by
 * @property integer $assigned_to
 * @property integer $closed_by
 * @property integer $request_req_id
 *
 * @property EscalatedTicket[] $escalatedTickets
 * @property Request $requestReq
 * @property Room $roomRoomNo
 * @property TicketType $ticketType
 * @property User $createdBy
 * @property User $assignedTo
 * @property User $closedBy
 */
class Ticket extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ticket';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tick_timelimit', 'tick_startDate', 'tick_status', 'room_room_no', 'ticket_type_id', 'created_by'], 'required'],
            [['tick_timelimit', 'tick_startDate', 'tick_closed_date'], 'safe'],
            [['room_room_no', 'ticket_type_id', 'created_by', 'assigned_to', 'closed_by', 'request_req_id'], 'integer'],
          
            [['tick_others'], 'string', 'max' => 255],
            [['tick_status'], 'string', 'max' => 255],
            [['request_req_id'], 'exist', 'skipOnError' => true, 'targetClass' => Request::className(), 'targetAttribute' => ['request_req_id' => 'req_id']],
            [['room_room_no'], 'exist', 'skipOnError' => true, 'targetClass' => Room::className(), 'targetAttribute' => ['room_room_no' => 'room_no']],
            [['ticket_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => TicketType::className(), 'targetAttribute' => ['ticket_type_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['assigned_to'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['assigned_to' => 'id']],
            [['closed_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['closed_by' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tick_priority' => 'Ticket Priority',
            'tick_others' => 'Ticket Others',
            'tick_timelimit' => 'Ticket Timelimit',
            'tick_startDate' => 'Starting Date',
            'tick_status' => 'Status',
            'tick_closed_date' => 'Closed Date',
            'room_room_no' => 'Room No',
            'ticket_type_id' => 'Ticket Type',
            'created_by' => 'Created By',
            'assigned_to' => 'Assigned To',
            'closed_by' => 'Closed By',
            'request_req_id' => 'Request Req ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEscalatedTickets()
    {
        return $this->hasMany(EscalatedTicket::className(), ['ticket_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequest()
    {
        return $this->hasOne(Request::className(), ['req_id' => 'request_req_id']);
    }

    public function getRequestName() {
          return $this->request->req_name;
}

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoomRoomNo()
    {
        return $this->hasOne(Room::className(), ['room_no' => 'room_room_no']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicketType()
    {
        return $this->hasOne(TicketType::className(), ['id' => 'ticket_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssignedTo()
    {
        return $this->hasOne(User::className(), ['id' => 'assigned_to']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClosedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'closed_by']);
    }

    
}
