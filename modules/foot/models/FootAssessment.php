<?php

namespace app\modules\foot\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\AttributeBehavior;
use yii\db\Expression;
use yii\db\ActiveRecord;
use app\components\DateTimeHelper;
use app\components\PatientHelper;
use yii\helpers\Json;

class FootAssessment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'foot_assessment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hn', 'vn', 'created_at'], 'required'],
            [[
              'created_at', 
              'vsttime',
              'updated_at',
              'created_by',
              'record_complete_left_evt',
              'record_complete_left_evt_note',
              'record_complete_left_evt_date',
              'record_complete_left_bypass',
              'record_complete_left_bypass_note',
              'record_complete_left_bypass_date',
              'record_complete_left_hybrid',
              'record_complete_left_hybrid_note',
              'record_complete_left_hybrid_date',
              'record_complete_right_evt',
              'record_complete_right_evt_note',
              'record_complete_right_evt_date',
              'record_complete_right_bypass',
              'record_complete_right_bypass_note',
              'record_complete_right_bypass_date',
              'record_complete_right_hybrid',
              'record_complete_right_hybrid_note',
              'record_complete_right_hybrid_date'
            ], 'safe'],
            [['record_complete', 'record_summary'], 'string'],
            [['hn', 'vn'], 'string', 'max' => 12],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hn' => 'HN',
            'vn' => 'VN',
            'created_at' => 'วันที่รับบริการ',
            'vsttime' => 'เวลารับบริการ',
            'record_complete' => 'Diabetic Foot Assessment Record Complete',
            'record_summary' => 'Diabetic Foot Assessment Record Summary ',
        ];
    }

    public static function itemsAlias($key){

        $items = [
          'Occupation'=>[
            1 => 'อยู่บ้านเฉยๆ',
            2 => 'แม่บ้าน',
            3 => 'เกษตรกร',
            4 => 'งานนั่งโต๊ะ/เอกสาร',
            5 => 'รับจ้าง',
            6 => 'ครูอาจารย์',
            7 => 'ขับรถ',
            8 => 'ธุรกิจส่วนตัว',
            9 => 'รับราชการสวมเครื่องแบบ',
            10 => 'พระภิกษุ',
            11 => 'อื่น ๆ',
          ],
          'Smoking'=>[
            1 => 'Current',
            2 => 'Never',
            3 => 'Former',
          ],
          'SmokingHowLongAgo'=>[
            1 => 'Unknown',
            2 => '< 6 months',
            3 => '6 months - 1.5 years',
            4 => '1.5 - 2.5 years',
            5 => '2.5 - 3.5 years',
            6 => '3.5 - 5 years',
            7 => '> 5 years',
          ],
          'FootAndToe'=>[
            1 => 'Deformities',
            2 => 'Ulcer',
            3 => 'Amputation',
          ],
          'Macrovascular'=>[
            1 => 'MI',
            2 => 'Stroke',
            3 => 'PAD',
        ]
      ];
        return ArrayHelper::getValue($items,$key,[]);
        //return array_key_exists($key, $items) ? $items[$key] : [];
      }


      public function getItemOccupation()
      {
        return self::itemsAlias('Occupation');
      }
  
      public function getItemSmoking()
      {
        return self::itemsAlias('Smoking');
      }

      public function getItemSmokingHowLongAgo()
      {
        return self::itemsAlias('SmokingHowLongAgo');
      }
  
  
    //   public function getOccupationName(){
    //       return ArrayHelper::getValue($this->getItemOccupation(),$this->Occupation);
    //   }
  
    //   public function getMaritalName(){
    //       return ArrayHelper::getValue($this->getItemMarital(),$this->marital_status);
    //   }
  
    //   public function getEducationName(){
    //       return ArrayHelper::getValue($this->getItemEducation(),$this->education_level);
    //   }
  
    //   public function getTitleName(){
    //       return ArrayHelper::getValue($this->getItemTitle(),$this->title);
    //   }


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
}