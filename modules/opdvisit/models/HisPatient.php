<?php

namespace app\modules\opdvisit\models;

use Yii;
use app\components\DbHelper;
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
            [['hn', 'fname', 'idcard'], 'required'],
            [['hn'], 'integer'],
            [['birthday_date', 'UPDATE_TIME'], 'safe'],
            [['prefix', 'fname', 'lname'], 'string', 'max' => 50],
            [['sex'], 'string', 'max' => 1],
            [['idcard'], 'string', 'max' => 20],
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
        ];
    }

    public function PatientAge($b_date){
        $sql = "select '$b_date',curdate(),
        timestampdiff(year,'$b_date',curdate()) as age_year,
        timestampdiff(month,'$b_date',curdate())-(timestampdiff(year,'$b_date',curdate())*12) as age_month,
        timestampdiff(day,date_add('$b_date',interval (timestampdiff(month,'$b_date',curdate())) month),curdate()) as age_day";
        $data = DbHelper::queryOne('db', $sql);
        return $data['age_year'];
    }
}
