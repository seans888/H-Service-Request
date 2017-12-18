<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "request".
 *
 * @property integer $req_id
 * @property string $req_name
 * @property string $req_time
 *
 * @property Ticket[] $tickets
 */
class Request extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'request';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['req_name', 'req_time'], 'required'],
            [['req_time'], 'safe'],
            [['req_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'req_id' => 'Req ID',
            'req_name' => 'Req Name',
            'req_time' => 'Req Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Ticket::className(), ['request_req_id' => 'req_id']);
    }
}
