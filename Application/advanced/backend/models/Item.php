<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "item".
 *
 * @property integer $id
 * @property string $item_name
 * @property string $item_description
 *
 * @property TicketHasItem[] $ticketHasItems
 * @property Ticket[] $tickets
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'item_name', 'item_description'], 'required'],
            [['id'], 'integer'],
            [['item_name'], 'string', 'max' => 40],
            [['item_description'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'item_name' => Yii::t('app', 'Item Name'),
            'item_description' => Yii::t('app', 'Item Description'),
        ];
    }


    public static function getItems()
    {
    return Item::find()->select(['id', 'item_name'])->all();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicketHasItems()
    {
        return $this->hasMany(TicketHasItem::className(), ['item_item_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(Ticket::className(), ['id' => 'ticket_id'])->viaTable('ticket_has_item', ['item_item_id' => 'id']);
    }
}
