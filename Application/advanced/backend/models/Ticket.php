<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ticket".
 *
 * @property integer $id
 * @property string $tick_closed_date
 * @property string $tick_status
 * @property string $tick_priority
 * @property string $tick_startDate
 * @property string $tick_description
 * @property string $tick_timelimit
 * @property integer $ticket_type_id
 * @property integer $department_id
 * @property integer $room_room_no
 * @property integer $user_idCreated
 * @property integer $user_id1Assigned
 * @property integer $user_id2closed
 *
 * @property EscalatedTicket[] $escalatedTickets
 * @property Department $department
 * @property Room $roomRoomNo
 * @property TicketType $ticketType
 * @property User $userIdCreated
 * @property User $userId1Assigned
 * @property User $userId2closed
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
            [['tick_closed_date', 'tick_startDate', 'tick_timelimit'], 'safe'],
            [['tick_description', 'tick_timelimit', 'ticket_type_id', 'department_id', 'room_room_no', 'user_idCreated'], 'required'],
            [['ticket_type_id', 'department_id', 'room_room_no', 'user_idCreated', 'user_id1Assigned', 'user_id2closed'], 'integer'],
            [['tick_status', 'tick_priority', 'tick_description'], 'string', 'max' => 45],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'id']],
            [['room_room_no'], 'exist', 'skipOnError' => true, 'targetClass' => Room::className(), 'targetAttribute' => ['room_room_no' => 'room_no']],
            [['ticket_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => TicketType::className(), 'targetAttribute' => ['ticket_type_id' => 'id']],
            [['user_idCreated'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_idCreated' => 'id']],
            [['user_id1Assigned'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id1Assigned' => 'id']],
            [['user_id2closed'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id2closed' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tick_closed_date' => 'Closing Date',
            'tick_status' => 'Status',
            'tick_priority' => 'Priority',
            'tick_startDate' => 'Start Date',
            'tick_description' => 'Description',
            'tick_timelimit' => 'Time alottment ',
            'ticket_type_id' => 'Service Type ',
            'department_id' => 'Department',
            'room_room_no' => 'Room No',
            'user_idCreated' => 'Created by',
            'user_id1Assigned' => 'Assigned by',
            'user_id2closed' => 'Closed by',
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
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'department_id']);
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
    public function getUserIdCreated()
    {
        return $this->hasOne(User::className(), ['id' => 'user_idCreated']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserId1Assigned()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id1Assigned']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserId2closed()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id2closed']);
    }
}
