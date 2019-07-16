<?php

namespace app\modules\lab\models;

use Yii;

/**
 * This is the model class for table "lis_order".
 *
 * @property int $id
 * @property string $message_date Date/Time of Message
 * @property int $patient_id
 * @property string $patient_name ชื่อ-สกุล
 * @property string $gender เพศ
 * @property string $birth_date วันเกิด
 * @property string $lis_number
 * @property string $reference_number
 * @property string $accept_time
 * @property string $request_div รหัสหน่วยงานที่ส่งตรวจ
 * @property string $sec_user
 * @property string $sec_time
 * @property string $sec_ip
 * @property string $sec_script
 */
class LisOrder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lis_order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['message_date', 'patient_id', 'patient_name', 'gender', 'birth_date', 'lis_number', 'reference_number', 'accept_time', 'request_div'], 'required'],
            [['message_date', 'birth_date', 'accept_time', 'sec_time'], 'safe'],
            [['patient_id'], 'integer'],
            [['patient_name'], 'string', 'max' => 200],
            [['gender'], 'string', 'max' => 1],
            [['lis_number', 'reference_number', 'sec_user', 'sec_ip'], 'string', 'max' => 20],
            [['request_div'], 'string', 'max' => 10],
            [['sec_script'], 'string', 'max' => 50],
            [['lis_number', 'reference_number'], 'unique', 'targetAttribute' => ['lis_number', 'reference_number']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'message_date' => 'Date/Time of Message',
            'patient_id' => 'Patient ID',
            'patient_name' => 'ชื่อ-สกุล',
            'gender' => 'เพศ',
            'birth_date' => 'วันเกิด',
            'lis_number' => 'Lis Number',
            'reference_number' => 'Reference Number',
            'accept_time' => 'Accept Time',
            'request_div' => 'รหัสหน่วยงานที่ส่งตรวจ',
            'sec_user' => 'Sec User',
            'sec_time' => 'Sec Time',
            'sec_ip' => 'Sec Ip',
            'sec_script' => 'Sec Script',
        ];
    }
}
