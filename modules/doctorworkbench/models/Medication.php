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
use app\modules\opdvisit\models\HisPatient;

class Medication extends \yii\db\ActiveRecord
{
    

    public static function getDb()
    {
        return Yii::$app->get('tcds');
    }

    
    public static function tableName()
    {
        return 'medication';
    }

public $no_med;
    public function rules()
    {
        return [
            // [['id', 'vn', 'hn', 'icode'], 'required'],
            [['id'], 'string'],
            [['unitprice', 'costprice', 'totalprice'], 'number'],
            [['date_service', 'time_service', 'data_json','created_by','updated_by','created_at','updated_at','no_med','qty','qty_adjust','med_note','druguse'], 'safe'],
            [['vn', 'pcc_vn'], 'string', 'max' => 15],
            [['hn'], 'string', 'max' => 9],
            [['an', 'unit'], 'string', 'max' => 50],
            [['icode', 'tmt24_code'], 'string', 'max' => 24],
            [['druguse'], 'string', 'max' => 200],
            [['provider_code', 'hospcode'], 'string', 'max' => 5],
            [['provider_name'], 'string', 'max' => 100],
            [['usage_line1', 'usage_line2', 'usage_line3', 'drug_name'], 'string', 'max' => 255],
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
            'vn' => 'Vn',
            'hn' => 'Hn',
            'an' => 'An',
            'icode' => 'รหัสรายการ',
            'qty' => 'จำนวนจ่าย',
            'unitprice' => 'ราคาขาย/หน่วย',
            'druguse' => 'วิธีใช้',
            'costprice' => 'ราคาทุน/หน่วย',
            'totalprice' => 'รวมราคาขาย',
            'provider_code' => 'Provider Code',
            'provider_name' => 'Provider Name',
            'date_service' => 'Date Service',
            'time_service' => 'Time Service',
            'data_json' => 'Data Json',
            'unit' => 'Unit',
            'tmt24_code' => 'Tmt24 Code',
            'usage_line1' => 'วิธีใช้ 1',
            'usage_line2' => 'วิธีใช้ 2',
            'usage_line3' => 'วิธีใช้ 3',
            'drug_name' => 'Drug Name',
            'hospcode' => 'Hospcode',
            'cid' => 'เลขบัตรประชาชน',
            'pcc_vn' => 'pcc vn',
            'no_med' => 'ไม่มียา',
            'qty_adjust' => 'ปรับจำนวนยา',
            'med_note' => 'หมายเหตุ'
        ];
    }

    public function behaviors()
    {
        return [
            // [
            //     'class' => AttributeBehavior::className(),
            //     'attributes' => [ActiveRecord::EVENT_BEFORE_INSERT => ['id']],
            //     'value' => function(){
            //         return DateTimeHelper::getDbDateTimeNow();
            //     }
            // ],
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
    public  function getDrugitems(){
        return @$this->hasOne(HisDrug::className(), ['id' => 'icode']);
    }
    public  function getDruguse(){
        return @$this->hasOne(Drugusage::className(), ['drugusage' => 'druguse']);
    }
    public  function getDrugusehos(){
        return @$this->hasOne(GatewayCDruguage::className(), ['drugusage' => 'druguse']);
    }
    
    public  function getHispatient(){
        return @$this->hasOne(HisPatient::className(), ['hn' => 'hn']);
    }

   

    public  function Drugitems($id){
        $model = HisDrug::findOne(['id' => $id]);
        if($model){
           return $model->trade_name.' '.$model->general_name;
        }else {
            return '-';
        }
    }
}
