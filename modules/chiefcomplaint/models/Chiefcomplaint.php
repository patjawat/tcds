<?php

namespace app\modules\chiefcomplaint\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\AttributeBehavior;
use yii\db\Expression;
use yii\db\ActiveRecord;
use app\components\DateTimeHelper;
use app\components\PatientHelper;
use yii\helpers\Json;

class Chiefcomplaint extends \yii\db\ActiveRecord
{

    public static function getDb()
    {
        return Yii::$app->get('tcds');
    }
    
    public static function tableName()
    {
        return 'chiefcomplaint';
    }


    public function rules()
    {
        return [
            // [['bp1','bp2','pr','o2sat','wc','ic','ec','hc','rr','bt'], 'required'],
            [['data_json','nursing_assessment', 'cc_text', 'date_service', 'time_service', 'updated_at','doctor_id','hn','requester','med_point','med_express','opd_note'], 'safe'],
            [['pi_text'], 'string'],
            [['sbp', 'dbp', 'temp', 'pp', 'pr', 'o2sat', 'height', 'weight', 'bt', 'rr', 'bw', 'ht', 'ibw', 'bmi'], 'number'],
            [['id', 'data1', 'data2', 'created_by', 'updated_by', 'position', 'arm', 'pr_rhythm'], 'string', 'max' => 255],
            [['pcc_vn'], 'string', 'max' => 12],
            [['hospcode'], 'string', 'max' => 5],
            [['cid'], 'string', 'max' => 13],
            [['vn'], 'string', 'max' => 15],
            // [['hn'], 'string', 'max' => 9],
            [['created_at'], 'string', 'max' => 100],
            ['bp1','number','min'=>0,'max'=>999],
            ['bp2', 'number','min'=>0,'max'=>999],
            ['pr','number','min'=>0,'max'=>999],
            ['o2sat','number','min'=>0,'max'=>999],
            ['wc','number','min'=>0,'max'=>999],
            ['ic','number','min'=>0,'max'=>999],
            ['ec','number','min'=>0,'max'=>999],
            ['hc', 'number','min'=>0,'max'=>999],
            ['rr','number','min'=>0,'max'=>99],
            [['bt'],'number','min'=>30,'max'=>45],
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
            'pcc_vn' => 'อ้างอิงตาราง pcc_visit',
            'data_json' => 'Data Json',
            'date_service' => 'Date Service',
            'time_service' => 'Time Service',
            'data1' => 'Data1',
            'data2' => 'Data2',
            'hospcode' => 'Hospcode',
            'pi_text' => 'Pi Text',
            'sbp' => 'Sbp',
            'dbp' => 'Dbp',
            'temp' => 'Temp',
            'pp' => 'Pp',
            'pr' => 'PR',
            'o2sat' => 'O2sat',
            'height' => 'Height',
            'weight' => 'Weight',
            'cid' => 'Cid',
            'vn' => 'Vn',
            'hn' => 'Hn',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'requester' => 'Requester',
            'bt' => 'BT',
            'position' => 'Position',
            'arm' => 'Arm',
            'pr_rhythm' => 'PR Rhythm',
            'rr' => 'RR',
            'bw' => 'BW',
            'ht' => 'Ht',
            'ibw' => 'Ibw',
            'bmi' => 'Bmi',
            'wc' => 'WC',
            'ic' => 'IC',
            'ec' => 'EC',
            'hc' => 'HC',
            'bp' => 'Bp',
            'cc_text' => 'CC',
            'med_point' => 'จุดรับยา',
            'med_express' => 'ส่งยาด่วน',
            'opd_note' => 'Opd Note'
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
            'attributes' => [ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at'],
            'value' => DateTimeHelper::getDbNow()           
            
        ],
        // [
        //     'class' => AttributeBehavior::className(),
        //     'attributes' => [ActiveRecord::EVENT_BEFORE_UPDATE => 'data_json'],
        //     'value' => DateTimeHelper::getDbTimestramp()
            
        // ],

        [
            'class' => BlameableBehavior::className(),
            'createdByAttribute'=>'created_by',
            'updatedByAttribute' => 'updated_by',
        ]

    ];
}

// public function beforeSave() 
// {
//     // hash password on before saving the record:
//     $this->bmi = 11;
  
// }

public function beforeSave($insert)
{
    if (parent::beforeSave($insert)) {
        // Place your custom code here
        if(($this->ht) && ($this->bw)){
            $this->bmi =$this->Bmicurent();
           
        }
        return true;
       
    } else {
        return false;
    }
}

function Bmicurent(){
    $hm = $this->ht/100;
    $bmi = $this->bw / ($hm*$hm);
    return  (int)$bmi;
}
}
