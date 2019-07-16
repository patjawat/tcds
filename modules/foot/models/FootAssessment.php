<?php

namespace app\modules\foot\models;

use Yii;
use yii\helpers\ArrayHelper;

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
            [['hn', 'vn', 'vstdate'], 'required'],
            [['vstdate', 'vsttime'], 'safe'],
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
            'vstdate' => 'วันที่รับบริการ',
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


}
