<?php

namespace app\modules\emr\models;

use Yii;

/**
 * This is the model class for table "gateway_emr_visit".
 *
 * @property string $id
 * @property string $hospcode
 * @property string $hospname
 * @property string $hn
 * @property string $vn
 * @property string $date_visit
 * @property string $time_visit
 * @property string $cc
 * @property string $pe
 * @property string $pi
 * @property string $bpd
 * @property string $bps
 * @property string $temperature
 * @property string $pulse
 * @property string $rr
 * @property string $weight
 * @property string $height
 * @property string $o2sat
 * @property string $department
 * @property string $cost
 * @property string $sele_price
 * @property string $sum_price
 * @property string $save_by
 * @property array $data_json
 * @property string $last_update
 * @property string $an
 */
class GatewayEmrVisit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gateway_emr_visit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'hospcode', 'hospname'], 'required'],
            [['id'], 'string'],
            [['date_visit', 'time_visit', 'data_json', 'last_update'], 'safe'],
            [['cost', 'sele_price', 'sum_price'], 'number'],
            [['hospcode'], 'string', 'max' => 5],
            [['hospname'], 'string', 'max' => 100],
            [['hn', 'bpd', 'bps', 'temperature', 'pulse', 'rr', 'weight', 'height', 'o2sat'], 'string', 'max' => 10],
            [['vn', 'an'], 'string', 'max' => 12],
            [['cc', 'pe', 'pi', 'department'], 'string', 'max' => 255],
            [['save_by'], 'string', 'max' => 1],
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
            'hospcode' => 'Hospcode',
            'hospname' => 'Hospname',
            'hn' => 'Hn',
            'vn' => 'Vn',
            'date_visit' => 'วันที่รับบริการ ----- สถานที่รับบริการ',
            'time_visit' => 'Time Visit',
            'cc' => 'CC',
            'pe' => 'PE',
            'pi' => 'PI',
            'bpd' => 'BP',
            'bps' => 'Bps',
            'temperature' => 'Temperature',
            'pulse' => 'Vital Sign',
            'rr' => 'Rr',
            'weight' => 'Weight',
            'height' => 'Height',
            'o2sat' => 'O2sat',
            'department' => 'Department',
            'cost' => 'Cost',
            'sele_price' => 'Sele Price',
            'sum_price' => 'Sum Price',
            'save_by' => 'Save By',
            'data_json' => 'Data Json',
            'last_update' => 'Last Update',
            'an' => 'An',
        ];
    }
}
