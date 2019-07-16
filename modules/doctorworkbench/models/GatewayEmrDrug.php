<?php

namespace app\modules\doctorworkbench\models;

use Yii;

/**
 * This is the model class for table "gateway_emr_drug".
 *
 * @property string $id
 * @property string $hospcode
 * @property string $hospname
 * @property string $hn
 * @property string $vn
 * @property string $an
 * @property string $date_visit
 * @property string $time_visit
 * @property string $drug_name
 * @property string $qty
 * @property string $unit
 * @property string $usage_line1
 * @property string $usage_line2
 * @property string $usage_line3
 * @property string $icode
 * @property string $tmt24_code
 * @property string $unitprice
 * @property array $data_json
 * @property string $last_update
 * @property string $costprice
 * @property string $cid
 * @property string $provider
 */
class GatewayEmrDrug extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gateway_emr_drug';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'hospcode', 'hn', 'vn'], 'required'],
            [['id'], 'string'],
            [['date_visit', 'time_visit', 'data_json', 'last_update'], 'safe'],
            [['unitprice', 'costprice'], 'number'],
            [['hospcode'], 'string', 'max' => 5],
            [['hospname', 'drug_name', 'unit', 'usage_line1', 'usage_line2', 'usage_line3'], 'string', 'max' => 100],
            [['hn'], 'string', 'max' => 10],
            [['vn', 'an'], 'string', 'max' => 12],
            [['qty'], 'string', 'max' => 3],
            [['icode', 'tmt24_code'], 'string', 'max' => 24],
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
            'drug_name' => 'Drug Name',
            'qty' => 'Qty',
            'unit' => 'Unit',
            'usage_line1' => 'Usage Line1',
            'usage_line2' => 'Usage Line2',
            'usage_line3' => 'Usage Line3',
            'icode' => 'Icode',
            'tmt24_code' => 'Tmt24 Code',
            'unitprice' => 'Unitprice',
            'data_json' => 'Data Json',
            'last_update' => 'Last Update',
            'costprice' => 'Costprice',
            'cid' => 'Cid',
            'provider' => 'Provider',
        ];
    }
}
