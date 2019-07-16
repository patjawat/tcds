<?php

namespace app\modules\appointment\models;

use Yii;

/**
 * This is the model class for table "pcc_appointment".
 *
 * @property string $id
 * @property string $hn
 * @property string $vn
 * @property string $provider_code
 * @property string $provider_name
 * @property string $date_service
 * @property string $time_service
 * @property string $clinic
 * @property string $appoint_date
 * @property string $appoint_time
 * @property string $detail
 * @property array $data_json
 * @property string $last_update
 */
class PccAppointment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pcc_appointment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'string'],
            [['hn', 'vn'], 'required'],
            [['date_service', 'time_service', 'appoint_date', 'appoint_time', 'data_json', 'last_update'], 'safe'],
            [['hn'], 'string', 'max' => 9],
            [['vn'], 'string', 'max' => 12],
            [['provider_code'], 'string', 'max' => 5],
            [['provider_name', 'clinic', 'detail'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hn' => 'Hn',
            'vn' => 'Vn',
            'provider_code' => 'Provider Code',
            'provider_name' => 'Provider Name',
            'date_service' => 'Date Service',
            'time_service' => 'Time Service',
            'clinic' => 'Clinic',
            'appoint_date' => 'Appoint Date',
            'appoint_time' => 'Appoint Time',
            'detail' => 'Detail',
            'data_json' => 'Data Json',
            'last_update' => 'Last Update',
        ];
    }
}
