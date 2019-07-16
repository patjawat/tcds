<?php

namespace app\modules\doctorworkbench\models;

use Yii;

/**
 * This is the model class for table "gateway_c_drug_items".
 *
 * @property string $id
 * @property string $hospcode
 * @property string $hospname
 * @property string $icode
 * @property string $drug_name
 * @property string $qty
 * @property string $unit
 * @property string $usage_line1
 * @property string $usage_line2
 * @property string $usage_line3
 * @property string $tmt24_code
 * @property string $costprice
 * @property string $unitprice
 * @property string $drugtype
 */
class GatewayCDrugItems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gateway_c_drug_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'hospcode'], 'required'],
            [['id'], 'string'],
            [['costprice', 'unitprice'], 'number'],
            [['hospcode'], 'string', 'max' => 5],
            [['hospname', 'icode', 'usage_line1', 'usage_line2', 'usage_line3'], 'string', 'max' => 100],
            [['drug_name'], 'string', 'max' => 255],
            [['qty', 'drugtype'], 'string', 'max' => 10],
            [['unit'], 'string', 'max' => 50],
            [['tmt24_code'], 'string', 'max' => 24],
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
            'icode' => 'Icode',
            'drug_name' => 'Drug Name',
            'qty' => 'Qty',
            'unit' => 'Unit',
            'usage_line1' => 'Usage Line1',
            'usage_line2' => 'Usage Line2',
            'usage_line3' => 'Usage Line3',
            'tmt24_code' => 'Tmt24 Code',
            'costprice' => 'Costprice',
            'unitprice' => 'Unitprice',
            'drugtype' => 'Drugtype',
        ];
    }
}
