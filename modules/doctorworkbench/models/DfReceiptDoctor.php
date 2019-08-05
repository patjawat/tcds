<?php

namespace app\modules\doctorworkbench\models;

use Yii;

/**
 * This is the model class for table "df_receipt_doctor".
 *
 * @property string $id รหัสรายการ
 * @property string $name ลำดับใบเสร็จแพทย์
 */
class DfReceiptDoctor extends \yii\db\ActiveRecord
{
    public static function getDb()
    {
        return Yii::$app->get('tcds');
    }
    
    public static function tableName()
    {
        return 'df_receipt_doctor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'string', 'max' => 100],
            [['name'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัสรายการ',
            'name' => 'ลำดับใบเสร็จแพทย์',
        ];
    }
}
