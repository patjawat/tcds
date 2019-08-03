<?php

namespace app\modules\document\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\AttributeBehavior;
use yii\db\Expression;
use yii\db\ActiveRecord;
use app\components\DateTimeHelper;
use app\components\PatientHelper;
use yii\helpers\Json;
use yii\helpers\Url;

class Document extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'document';
    }

    public function rules()
    {
        return [
            // [['id'], 'required'],
            [['id', 'hn', 'filename', 'barcode', 'type','sub_dir'], 'string', 'max' => 255],
            [['updated_at','created_at'], 'safe'],
            [['id'], 'unique'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hn' => 'Hn',
            'filename' => 'Filename',
            'barcode' => 'barcode',
            'type' => 'Type',
            'updated_at' => 'แก้ไขล่าสุด',
            'created_at' => 'วันที่สร้าง'
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

    public function behaviors()
    {
        return [
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [ActiveRecord::EVENT_BEFORE_INSERT => ['created_at','updated_at']],
                'value' => DateTimeHelper::getDbNow()  
            ],
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at'],
                'value' => DateTimeHelper::getDbNow()           
            ],
        ];
    }
}
