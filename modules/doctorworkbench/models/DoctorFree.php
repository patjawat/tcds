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

class DoctorFree extends \yii\db\ActiveRecord
{

    public static function getDb()
    {
        return Yii::$app->get('tcds');
    }

    
    public static function tableName()
    {
        return 'df';
    }


    public function rules()
    {
        return [
            [['price'], 'number'],
            [['charge_id','receipt_id','df_charge_id','df_receipt_id'], 'safe'],
            [['df_code', 'hn', 'vn', 'pcc_vn','created_at','updated_by','delete_status'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'df_code' => 'ค่าบริการ',
            'hn' => 'Hn',
            'vn' => 'Vn',
            'pcc_vn' => 'Pcc Vn',
            'price' => 'ราคา',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [ActiveRecord::EVENT_BEFORE_INSERT => ['created_at']],
                'value' => DateTimeHelper::getDbTimestramp()
                
            ],
    
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute'=>'created_by',
                'updatedByAttribute' => 'updated_by',
            ]
    
        ];
    }

    public  function DfItems($id){
        // return @$this->hasOne(DoctorFreeItems::className(), ['id' => 'df_code']);
        $model = DoctorFreeItems::findOne($id);
        if($model){
            return $model->name;
        }else {
            return '-';
        }
    }
    
}
