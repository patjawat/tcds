<?php

namespace app\modules\doctorworkbench\models;

use Yii;

/**
 * This is the model class for table "df_receipt".
 *
 * @property string $id รหัสรายการ
 * @property string $name ลำดับใบเสร็จ
 */
class DfReceipt extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'df_receipt';
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
            'name' => 'ลำดับใบเสร็จ',
        ];
    }
}
