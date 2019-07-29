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

class Documentqr extends \yii\db\ActiveRecord
{
    const UPLOAD_FOLDER='document-qr';

    public static function getUploadPath(){
        return Yii::getAlias('@webroot').'/'.self::UPLOAD_FOLDER.'/';
    }
    
    public static function getUploadUrl(){
        return Url::base(true).'/'.self::UPLOAD_FOLDER.'/';
    }
    
    public function getThumbnails($ref,$event_name){
         $uploadFiles   = Documentqr::find()->where(['ref'=>$ref])->all();
         $preview = [];
        foreach ($uploadFiles as $file) {
            $preview[] = [
                'url'=>self::getUploadUrl(true).$ref.'/'.$file->real_filename,
                'src'=>self::getUploadUrl(true).$ref.'/thumbnail/'.$file->real_filename,
                'options' => ['title' => $event_name]
            ];
        }
        return $preview;
    }
    
    public function getProvince()
    {
      return $this->hasOne(Province::className(),['PROVINCE_ID'=>'province_id']);
    }


    public static function tableName()
    {
        return 'document_qr';
    }

    public function rules()
    {
        return [
            [['id', 'hn','type_id'], 'required'],
            [['ref', 'file_name','real_filename','print','updated_at','created_at','scan_from','created_by','updated_by'], 'safe'],
            [['hn'], 'integer'],
            [['id', 'type_id'], 'string', 'max' => 100],
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
            'type_id' => 'Document Type ID',
        ];
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
        [
            'class' => BlameableBehavior::className(),
            'createdByAttribute'=>'created_by',
            'updatedByAttribute' => 'updated_by',
        ]

    ];
}

}
