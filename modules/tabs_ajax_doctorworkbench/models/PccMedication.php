<?php

namespace app\modules\doctorworkbench\models;

use Yii;

/**
 * This is the model class for table "pcc_medication".
 *
 * @property string $id
 * @property string $vn
 * @property string $hn
 * @property string $an
 * @property string $icode รหัสรายการ
 * @property string $qty จำนวนจ่าย
 * @property string $unitprice ราคาขาย/หน่วย
 * @property string $costprice ราคาทุน/หน่วย
 * @property string $totalprice รวมราคาขาย
 * @property string $provider_code
 * @property string $provider_name
 * @property string $date_service
 * @property string $time_service
 * @property array $data_json
 */
class PccMedication extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pcc_service_medication';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vn', 'hn', 'icode','qty'], 'required'],
            [['id'], 'string'],
            [['qty', 'unitprice', 'costprice', 'totalprice'], 'number'],
            [['date_service', 'time_service', 'data_json'], 'safe'],
            [['vn'], 'string', 'max' => 12],
            [['hn'], 'string', 'max' => 9],
            [['an', 'unit'], 'string', 'max' => 50],
            [['icode', 'tmt24_code'], 'string', 'max' => 24],
            [['druguse'], 'string', 'max' => 200],
            [['provider_code'], 'string', 'max' => 5],
            [['provider_name'], 'string', 'max' => 100],
            [['usage_line1', 'usage_line2', 'usage_line3', 'drug_name'], 'string', 'max' => 255],
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
            'vn' => 'Vn',
            'hn' => 'Hn',
            'an' => 'An',
            'icode' => 'รหัสรายการ',
            'qty' => 'จำนวนจ่าย',
            'unitprice' => 'ราคาขาย/หน่วย',
            'druguse' => 'วิธีใช้',
            'costprice' => 'ราคาทุน/หน่วย',
            'totalprice' => 'รวมราคาขาย',
            'provider_code' => 'Provider Code',
            'provider_name' => 'Provider Name',
            'date_service' => 'Date Service',
            'time_service' => 'Time Service',
            'data_json' => 'Data Json',
            'unit' => 'Unit',
            'tmt24_code' => 'Tmt24 Code',
            'usage_line1' => 'วิธีใช้ 1',
            'usage_line2' => 'วิธีใช้ 2',
            'usage_line3' => 'วิธีใช้ 3',
            'drug_name' => 'Drug Name',
        ];
    }

    public  function getDrugitems(){
        return @$this->hasOne(CDrugitems::className(), ['icode' => 'icode']);
    }
}
