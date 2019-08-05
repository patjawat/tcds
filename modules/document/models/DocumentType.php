<?php

namespace app\modules\document\models;

use Yii;

/**
 * This is the model class for table "document_type".
 *
 * @property string $id รหัส
 * @property string $name ชื่อรายการ
 */
class DocumentType extends \yii\db\ActiveRecord
{
    public static function getDb()
    {
        return Yii::$app->get('tcds');
    }
    
    public static function tableName()
    {
        return 'document_type';
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
            'id' => 'รหัส',
            'name' => 'ชื่อรายการ',
        ];
    }
}
