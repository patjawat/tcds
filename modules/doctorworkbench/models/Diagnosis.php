<?php

namespace app\modules\doctorworkbench\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\AttributeBehavior;
use yii\db\Expression;
use yii\db\ActiveRecord;
use app\components\DateTimeHelper;
use app\components\PatientHelper;
use yii\helpers\Json;
use app\modules_nurse\nurse_screen\models\OpdVisit;


class Diagnosis extends \yii\db\ActiveRecord
{

    public static function getDb()
    {
        return Yii::$app->get('tcds');
    }
    
    public static function tableName()
    {
        return 'diagnosis';
    }

    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'diag_text'], 'string'],
            [['date_service', 'time_service', 'data_json', 'last_update','bp1_confirm','bp2_confirm','bp_confirm'], 'safe'],
            [['hn'], 'string', 'max' => 9],
            [['vn', 'pcc_vn'], 'string', 'max' => 15],
            [['provider_code', 'hospcode'], 'string', 'max' => 5],
            [['provider_name'], 'string', 'max' => 100],
            [['icd_code'], 'string', 'max' => 50],
            [['icd_name'], 'string', 'max' => 255],
            [['diag_type'], 'string', 'max' => 10],
            [['cid'], 'string', 'max' => 13],
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
            'vn' => 'Vn',
            'provider_code' => 'Provider Code',
            'provider_name' => 'Provider Name',
            'date_service' => 'Date Service',
            'time_service' => 'Time Service',
            'icd_code' => 'Icd Code',
            'icd_name' => 'Icd Name',
            'diag_type' => 'Diag Type',
            'data_json' => 'Data Json',
            'last_update' => 'Last Update',
            'hospcode' => 'Hospcode',
            'cid' => 'Cid',
            'pcc_vn' => 'Pcc Vn',
            'diag_text' => 'Diag Text',
            'bp1_confirm' => 'bp1_confirm',
            'bp2_confirm' => 'bp2_confirm'
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [ActiveRecord::EVENT_BEFORE_INSERT => ['id']],
                'value' => function(){
                    return DateTimeHelper::getDbDateTimeNow();
                }
            ],
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [ActiveRecord::EVENT_BEFORE_INSERT => ['created_at','updated_at']],
                'value' => DateTimeHelper::getDbNow()

            ],
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [ActiveRecord::EVENT_BEFORE_INSERT => ['pcc_vn']],
                'value' => PatientHelper::getCurrentPccVn()

            ],
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [ActiveRecord::EVENT_BEFORE_INSERT => ['vn']],
                'value' => PatientHelper::getCurrentVn()

            ],
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [ActiveRecord::EVENT_BEFORE_INSERT => ['hn']],
                'value' => PatientHelper::getCurrentHn()

            ],

            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute'=>'created_by',
                'updatedByAttribute' => 'updated_by',
            ]

        ];
    }

    public  function getOpdVisit(){
        return @$this->hasOne(OpdVisit::className(), ['hn' => 'hn']);
    }

    public  function getDiagtype1(){
        return $this->hasOne(CDiagtype::className(), ['diagtype' => 'diag_type']);
    }
    public  function getIcd10tm(){
        return $this->hasOne(CIcd10tm::className(), ['diagcode' => 'icd_code']);
    }
}
