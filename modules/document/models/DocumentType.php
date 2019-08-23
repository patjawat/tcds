<?php

namespace app\modules\document\models;

use Yii;

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

    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'string', 'max' => 100],
            [['name'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'รหัส',
            'name' => 'ชื่อรายการ',
        ];
    }

    public function countTypeOfHn($type,$hn){
        return Document::find()->where(['hn' => $hn,'sub_dir' => $type])->count();
    }
}
