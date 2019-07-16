<?php

namespace app\modules\models;

use Yii;

/**
 * This is the model class for table "opd_visit".
 *
 * @property string $id
 * @property string $vn gen from timestamp
 * @property string $hn
 * @property string $requester
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 * @property string $service_start_date
 * @property string $service_start_time
 * @property string $service_end_date
 * @property string $service_end_time
 * @property string $service_type
 * @property string $service_department
 * @property string $pcc_vn
 * @property string $department แผนก/คลินิก
 * @property string $doctor_id
 * @property string $data_json
 */
class OpdVisit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'opd_visit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'vn', 'hn', 'service_start_date', 'service_start_time'], 'required'],
            [['created_at', 'updated_at', 'service_start_date', 'service_start_time', 'service_end_date', 'service_end_time'], 'safe'],
            [['data_json'], 'string'],
            [['id', 'requester', 'created_by', 'updated_by', 'service_department', 'department'], 'string', 'max' => 255],
            [['vn', 'pcc_vn'], 'string', 'max' => 12],
            [['hn'], 'string', 'max' => 9],
            [['service_type'], 'string', 'max' => 1],
            [['doctor_id'], 'string', 'max' => 100],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vn' => 'gen from timestamp',
            'hn' => 'Hn',
            'requester' => 'Requester',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'service_start_date' => 'Service Start Date',
            'service_start_time' => 'Service Start Time',
            'service_end_date' => 'Service End Date',
            'service_end_time' => 'Service End Time',
            'service_type' => 'Service Type',
            'service_department' => 'Service Department',
            'pcc_vn' => 'Pcc Vn',
            'department' => 'แผนก/คลินิก',
            'doctor_id' => 'Doctor ID',
            'data_json' => 'Data Json',
        ];
    }
}
