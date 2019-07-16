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
   
    public static function tableName()
    {
        return 'chiefcomplaint';
    }

    public function rules()
    {
        return [
            [['id', 'created_by'], 'required'],
            [['data_json', 'date_service', 'time_service', 'updated_at'], 'safe'],
            [['pi_text'], 'string'],
            [['sbp', 'dbp', 'temp', 'pp', 'pr', 'o2sat', 'height', 'weight', 'bt', 'rr', 'bw', 'ht', 'ibw', 'bmi', 'wc', 'ic', 'ec', 'hc'], 'number'],
            [['id', 'data1', 'data2', 'created_by', 'updated_by', 'requester', 'position', 'arm', 'pr_rhythm', 'bp','cc_text'], 'string', 'max' => 255],
            [['pcc_vn'], 'string', 'max' => 12],
            [['hospcode'], 'string', 'max' => 5],
            [['cid'], 'string', 'max' => 13],
            [['vn'], 'string', 'max' => 15],
            [['hn'], 'string', 'max' => 9],
            [['created_at'], 'string', 'max' => 100],
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
            'pr' => 'Pr',
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
            'bw' => 'Bw',
            'ht' => 'Ht',
            'ibw' => 'Ibw',
            'bmi' => 'Bmi',
            'wc' => 'Wc',
            'ic' => 'Ic',
            'ec' => 'Ec',
            'hc' => 'Hc',
            'bp' => 'Bp',
            'cc' => 'CC'
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
            'value' => DateTimeHelper::getDbTimestramp()
            
        ],
        [
            'class' => AttributeBehavior::className(),
            'attributes' => [ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at'],
            'value' => DateTimeHelper::getDbTimestramp()             
            
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
}
