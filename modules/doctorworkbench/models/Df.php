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


class Df extends \yii\db\ActiveRecord
{
    public static function getDb()
    {
        return Yii::$app->get('tcds');
    }
    public static function tableName()
    {
        return 'df';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'df_code', ], 'required'],
            [['price'], 'number'],
            [['created_at'], 'safe'],
            [['delete_status'], 'string'],
            [['id', 'df_code', 'hn', 'vn', 'pcc_vn', 'created_by', 'updated_by'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัสการบันทึก',
            'df_code' => 'รหัสรายการ',
            'hn' => 'HN',
            'vn' => 'VN',
            'pcc_vn' => 'PCC_VN',
            'price' => 'ราคา',
            'created_at' => 'วันที่ส้ราง',
            'created_by' => 'สร้างโดย',
            'updated_by' => 'แก้ไขโดย',
            'delete_status' => 'สถานะการลบ',
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
        $model = DfItems::findOne($id);
        if($model){
            return $model->name;
        }else {
            return '-';
        }
    }
}
