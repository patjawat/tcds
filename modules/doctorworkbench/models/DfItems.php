<?php

namespace app\modules\doctorworkbench\models;

use Yii;

/**
 * This is the model class for table "df_items".
 *
 * @property string $id รหัส
 * @property string $name ชื่อรายการ
 * @property string $charge_id ประเภทรายได้
 * @property string $receipt_id ลำดับใบเสร็จ
 * @property string $df_charge_id ประเภทรายได้แพทย์
 * @property string $df_receipt_id  ลำดับใบเสร็จแพทย์
 */
class DfItems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'df_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name', 'charge_id', 'receipt_id', 'df_charge_id', 'df_receipt_id'], 'required'],
            [['id'], 'string', 'max' => 100],
            [['name', 'charge_id', 'receipt_id', 'df_charge_id', 'df_receipt_id'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัส',
            'name' => 'ชื่อรายการ',
            'charge_id' => 'ประเภทรายได้',
            'receipt_id' => 'ลำดับใบเสร็จ',
            'df_charge_id' => 'ประเภทรายได้แพทย์',
            'df_receipt_id' => ' ลำดับใบเสร็จแพทย์',
        ];
    }
}
