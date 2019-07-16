<?php

namespace app\modules\queuemanage\models;

use Yii;

/**
 * This is the model class for table "gateway_emr_lab".
 *
 * @property string $id
 * @property string $hospcode
 * @property string $hospname
 * @property string $hn
 * @property string $vn
 * @property string $an
 * @property string $date_visit
 * @property string $time_visit
 * @property string $lab_code
 * @property string $lab_name
 * @property string $lab_result
 * @property string $standard_result
 * @property string $lab_request_date
 * @property string $lab_result_date
 * @property string $lab_price
 * @property array $data_json
 * @property string $last_update
 * @property string $cid
 * @property string $provider
 */
class GatewayEmrLab extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gateway_emr_lab';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'hospcode', 'hospname', 'hn'], 'required'],
            [['id'], 'string'],
            [['date_visit', 'time_visit', 'lab_request_date', 'lab_result_date', 'data_json', 'last_update'], 'safe'],
            [['lab_price'], 'number'],
            [['hospcode'], 'string', 'max' => 5],
            [['hospname', 'lab_code', 'lab_name', 'lab_result', 'standard_result'], 'string', 'max' => 100],
            [['hn'], 'string', 'max' => 10],
            [['vn', 'an'], 'string', 'max' => 12],
            [['cid', 'provider'], 'string', 'max' => 13],
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
            'an' => 'An',
            'date_visit' => 'Date Visit',
            'time_visit' => 'Time Visit',
            'lab_code' => 'Lab Code',
            'lab_name' => 'Lab Name',
            'lab_result' => 'Lab Result',
            'standard_result' => 'Standard Result',
            'lab_request_date' => 'Lab Request Date',
            'lab_result_date' => 'Lab Result Date',
            'lab_price' => 'Lab Price',
            'data_json' => 'Data Json',
            'last_update' => 'Last Update',
            'cid' => 'Cid',
            'provider' => 'Provider',
        ];
    }
}
