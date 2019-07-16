<?php

namespace app\modules\lab\models;

use Yii;
use app\components\PatientHelper;
class LabResult extends \yii\db\ActiveRecord
{

// public $patient_id;
// public $checkin_date;
// public $lis_code;

    public static function tableName()
    {
        return 'lab_result';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('theptarin');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lis_number', 'reference_number', 'checkin_time', 'eat_time', 'accept_time', 'request_div', 'lis_code', 'test', 'lab_code', 'result_code', 'result', 'unit', 'normal_range', 'result_date', 'user_id'], 'required'],
            [['checkin_date', 'checkin_time', 'eat_date', 'eat_time', 'accept_time', 'result_date','patient_id'], 'safe'],
            [['remark'], 'string'],
            [['lis_number', 'reference_number', 'result_code'], 'string', 'max' => 20],
            [['request_div', 'lis_code', 'lab_code'], 'string', 'max' => 10],
            [['test'], 'string', 'max' => 200],
            [['result', 'unit', 'user_id'], 'string', 'max' => 50],
            [['normal_range'], 'string', 'max' => 100],
        ];
    }

    public function attributeLabels()
    {
        return [
            'lis_number' => 'Lis Number',
            'reference_number' => 'Reference Number',
            'patient_id' => 'Patient ID',
            'checkin_date' => 'Checkin Date',
            'checkin_time' => 'Checkin Time',
            'eat_date' => 'Eat Date',
            'eat_time' => 'Eat Time',
            'accept_time' => 'Accept Time',
            'request_div' => 'รหัสหน่วยงานที่ส่งตรวจ',
            'lis_code' => 'รหัสการตรวจของ LIS',
            'test' => 'ชื่อผลตรวจ',
            'lab_code' => 'รหัสการตรวจของ รพ.',
            'result_code' => 'รหัสผลการตรวจของ LIS',
            'result' => 'Result',
            'unit' => 'Unit',
            'normal_range' => 'Normal Range',
            'remark' => 'Remark',
            'result_date' => 'Result Date',
            'user_id' => 'User ID validation (Technical^Medical)',
        ];
    }

    // public function checkin($patient_id,$lis_code){
    //   return LabResult::find()
    //   ->where(['patient_id' => '817452'])
    //   ->where(['lis_code' => $lis_code])
    //   ->orderBy(['checkin_date' => SORT_DESC])->limit(4)->all();
    //   // return LabResult::find()->where(['patient_id' => $patient_id,'lis_code' => $lis_code])->limit(4)->all();
    //   // return $lis_code;
    // }

    public function checkin($patient_id,$lis_code,$checkin_date,$checkin_time){
      $hn = PatientHelper::getCurrentHn();
    //   $data =  LabResult::find()
    //   ->where(['patient_id' => $hn])
    //   ->where(['lis_code' => $lis_code,'checkin_time' => $checkin_date])
    //   ->orderBy(['checkin_time' => SORT_DESC])->one();

      $data =  LabResult::find()
        ->where(['patient_id' => $hn])
        ->where(['lis_code' => $lis_code,'checkin_date' => $checkin_date,'checkin_time' => $checkin_time])
        ->orderBy(['checkin_time' => SORT_DESC])->one();
            return $data ? $data->result : '-';

    // return $patient_id.'-'.$lis_code.'-'.$checkin_date;
    }
}
