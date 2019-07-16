<?php

namespace app\modules\appointment\models;

use Yii;

/**
 * This is the model class for table "gateway_emr_appointment".
 *
 * @property string $id
 * @property string $provider_code
 * @property string $provider_name
 * @property string $hn
 * @property string $vn
 * @property string $an
 * @property string $date_visit
 * @property string $time_visit
 * @property string $clinic
 * @property string $appoint_date
 * @property string $appoint_time
 * @property string $appoint_detail
 * @property array $data_json
 * @property string $last_update
 * @property string $appoint_doctor
 */
class GatewayEmrAppointment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gateway_emr_appointment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'provider_code', 'provider_name', 'hn', 'vn'], 'required'],
            [['id'], 'string'],
            [['date_visit', 'time_visit', 'appoint_date', 'appoint_time', 'data_json', 'last_update'], 'safe'],
            [['provider_code'], 'string', 'max' => 5],
            [['provider_name', 'clinic'], 'string', 'max' => 100],
            [['hn'], 'string', 'max' => 10],
            [['vn', 'an'], 'string', 'max' => 12],
            [['appoint_detail','appoint_doctor'], 'string', 'max' => 255],
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
            'provider_code' => 'Provider Code',
            'provider_name' => 'หน่วยบริการ',
            'hn' => 'Hn',
            'vn' => 'Vn',
            'an' => 'An',
            'date_visit' => 'วันที่มา',
            'time_visit' => 'เวลา',
            'clinic' => 'คลินิก',
            'appoint_date' => 'วันนัด',
            'appoint_time' => 'เวลานัด',
            'appoint_detail' => 'หมายเหตุ',
            'data_json' => 'Data Json',
            'last_update' => 'Last Update',
            'appoint_doctor'=>'แพทย์ผู้นัด'
        ];
    }
}
