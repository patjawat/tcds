<?php

namespace app\modules\document\models;

use Yii;

/**
 * This is the model class for table "document_qr_type".
 *
 * @property string $id รหัสเอกสาร
 * @property string $name ประเภทเอกสาร
 * @property string $other_type ประเภทเอกสารอื่นๆ
 */
class DocumentQrType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'document_qr_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name', 'other_type'], 'required'],
            [['id', 'other_type'], 'string', 'max' => 100],
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
            'id' => 'รหัส',
            'name' => 'ประเภทเอกสาร',
            'other_type' => 'เอกสารอื่นๆ',
        ];
    }
}
