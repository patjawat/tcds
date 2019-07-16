<?php

namespace app\modules\emr\models;

use Yii;

/**
 * This is the model class for table "pcc_service".
 *
 * @property string $id
 * @property string $hn
 * @property string $vn
 * @property string $provider_code
 * @property string $provider_name
 * @property string $date_service
 * @property string $time_service
 * @property string $cc
 * @property string $pe
 * @property string $bpd
 * @property string $bps
 * @property string $temperature
 * @property string $pulse
 * @property string $rr
 * @property array $data_json
 * @property string $last_update
 * @property string $department
 * @property string $o2sat
 * @property string $pi
 */
class PccService extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pcc_service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'hn', 'vn', 'provider_code', 'provider_name', 'date_service'], 'required'],
            [['id'], 'string'],
            [['date_service', 'time_service', 'data_json', 'last_update'], 'safe'],
            [['hn'], 'string', 'max' => 9],
            [['vn'], 'string', 'max' => 12],
            [['provider_code'], 'string', 'max' => 5],
            [['provider_name'], 'string', 'max' => 50],
            [['cc', 'pe','pi', 'department', 'o2sat'], 'string', 'max' => 255],
            [['bpd', 'bps', 'temperature', 'pulse', 'rr'], 'string', 'max' => 3],
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
            'hn' => 'Hn',
            'vn' => 'Vn',
            'provider_code' => 'Provider Code',
            'provider_name' => 'Provider Name',
        'date_service' => ' วันที่มารับบริการ ----- สถานที่รับบริการ',
            'time_service' => 'Time Service',
            'cc' => 'CC',
            'pe' => 'PE',
            'bpd' => 'BP',
            'bps' => 'Bps',
            'temperature' => 'Temperature',
            'pulse' => 'Vital Sign',
            'rr' => 'Rr',
            'data_json' => 'Data Json',
            'last_update' => 'Last Update',
            'department' => 'Department',
            'o2sat' => 'O2sat',
            'pi'=>'PI'
        ];
    }
}
