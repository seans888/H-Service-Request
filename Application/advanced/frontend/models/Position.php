<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "position".
 *
 * @property integer $id
 * @property string $pos_name
 * @property string $pos_des
 *
 * @property Employee[] $employees
 */
class Position extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'position';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pos_name', 'pos_des'], 'required'],
            [['pos_name'], 'string', 'max' => 25],
            [['pos_des'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pos_name' => 'Pos Name',
            'pos_des' => 'Pos Des',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employee::className(), ['position_id' => 'id']);
    }
}
