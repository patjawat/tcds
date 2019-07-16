<?php

namespace app\modules\document\models;

use Yii;

/**
 * This is the model class for table "document".
 *
 * @property string $id
 * @property string $hn
 * @property string $filename
 * @property string $barcode
 * @property string $type
 */
class Document extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'document';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['id'], 'required'],
            [['id', 'hn', 'filename', 'barcode', 'type','sub_dir'], 'string', 'max' => 255],
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
            'hn' => 'Hn',
            'filename' => 'Filename',
            'barcode' => 'barcode',
            'type' => 'Type',
        ];
    }


    public function Type($id){
        $model = DocumentType::find()->where(['id' => $id])->one();
        if($model!==null){
            return $model->name;
        }else{
            return '-';
        }
    }
}
