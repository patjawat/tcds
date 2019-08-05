<?php

namespace app\modules\doctorworkbench\models;

use Yii;

class HisPatient extends \yii\db\ActiveRecord
{
    public static function getDb()
    {
        return Yii::$app->get('tcds');
    }

    public static function tableName()
    {
        return 'his_patient';
    }

    public function rules()
    {
        return [
            [['hn', 'fname', 'idcard', 'doctor_id'], 'required'],
            [['hn'], 'integer'],
            [['birthday_date', 'UPDATE_TIME','doctor_history'], 'safe'],
            [['prefix', 'fname', 'lname'], 'string', 'max' => 50],
            [['sex'], 'string', 'max' => 1],
            [['idcard'], 'string', 'max' => 20],
            [['doctor_id'], 'string', 'max' => 100],
            [['hn'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'hn' => 'ข้อมูลผู้ป่วย',
            'prefix' => 'Prefix',
            'fname' => 'Fname',
            'lname' => 'Lname',
            'sex' => 'Sex',
            'birthday_date' => 'Birthday Date',
            'idcard' => 'Idcard',
            'UPDATE_TIME' => 'Update Time',
            'doctor_id' => 'แพทย์เจ้าของไข้',
        ];
    }
}
