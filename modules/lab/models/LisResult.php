<?php

namespace app\modules\lab\models;

use Yii;

class LisResult extends \yii\db\ActiveRecord
{

    public static function getDb()
    {
        return Yii::$app->get('theptarin');
    }
    
    public static function tableName()
    {
        return 'lis_result';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lis_number', 'lis_code', 'test', 'lab_code', 'result_code', 'result', 'unit', 'normal_range', 'technical_time', 'medical_time', 'result_date', 'user_id'], 'required'],
            [['technical_time', 'medical_time', 'result_date', 'sec_time'], 'safe'],
            [['remark'], 'string'],
            [['lis_number', 'result_code', 'sec_user', 'sec_ip'], 'string', 'max' => 20],
            [['lis_code', 'lab_code'], 'string', 'max' => 10],
            [['test'], 'string', 'max' => 200],
            [['result', 'unit', 'user_id', 'sec_script'], 'string', 'max' => 50],
            [['normal_range'], 'string', 'max' => 100],
            [['lis_number', 'lis_code', 'result_code'], 'unique', 'targetAttribute' => ['lis_number', 'lis_code', 'result_code']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lis_number' => 'Lis Number',
            'lis_code' => 'รหัสการตรวจของ LIS',
            'test' => 'ชื่อผลตรวจ',
            'lab_code' => 'รหัสการตรวจของ รพ.',
            'result_code' => 'รหัสผลการตรวจของ LIS',
            'result' => 'Result',
            'unit' => 'Unit',
            'normal_range' => 'Normal Range',
            'technical_time' => 'Date/time validation (Technical)',
            'medical_time' => 'Date/time validation (Medical)',
            'result_date' => 'Result Date',
            'user_id' => 'User ID validation (Technical^Medical)',
            'remark' => 'Remark',
            'sec_user' => 'Sec User',
            'sec_time' => 'Sec Time',
            'sec_ip' => 'Sec Ip',
            'sec_script' => 'Sec Script',
        ];
    }
}
