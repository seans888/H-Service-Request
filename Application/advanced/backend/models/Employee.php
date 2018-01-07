<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property integer $id
 * @property string $emp_lname
 * @property string $emp_fname
 * @property string $emp_mname
 * @property string $emp_contact_no
 * @property integer $position_id
 * @property integer $department_id
 *
 * @property Department $department
 * @property Position $position
 * @property User[] $users
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'emp_lname', 'emp_fname', 'emp_mname', 'emp_contact_no', 'position_id', 'department_id'], 'required'],
            [['id', 'position_id', 'department_id'], 'integer'],
            [['emp_lname', 'emp_fname', 'emp_mname'], 'string', 'max' => 20],
            [['emp_contact_no'], 'string', 'max' => 15],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'id']],
            [['position_id'], 'exist', 'skipOnError' => true, 'targetClass' => Position::className(), 'targetAttribute' => ['position_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'emp_lname' => 'Emp Lname',
            'emp_fname' => 'Emp Fname',
            'emp_mname' => 'Emp Mname',
            'emp_contact_no' => 'Emp Contact No',
            'position_id' => 'Position ID',
            'department_id' => 'Department ID',
        ];
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
    public function getPosition()
    {
        return $this->hasOne(Position::className(), ['id' => 'position_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['employee_id' => 'id']);
    }
}
