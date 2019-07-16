<?php

namespace app\modules\doctorworkbench\models;

use Yii;

/**
 * This is the model class for table "his_patient".
 *
 * @property int $hn ข้อมูลผู้ป่วย
 * @property string $prefix
 * @property string $fname
 * @property string $lname
 * @property string $sex
 * @property string $birthday_date
 * @property string $idcard
 * @property string $UPDATE_TIME
 * @property string $doctor_id แพทย์เจ้าของไข้
 */
class HisPatient extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'his_patient';
    }

    /**
     * {@inheritdoc}
     */
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

    /**
     * {@inheritdoc}
     */
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
