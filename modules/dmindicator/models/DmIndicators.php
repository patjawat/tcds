<?php

namespace app\modules\dmindicator\models;

use Yii;
use yii\helpers\ArrayHelper;

class DmIndicators extends \yii\db\ActiveRecord
{
  

    public static function tableName()
    {
        return 'dm_indicators';
    }


    public function rules()
    {
        return [
            [['created_at', 'updated_at','eye_out_hos'], 'safe'],
            [['eye_out_hos'], 'required'],
            // [['eye_out_hos'], 'string'],
            [['hn', 'vn', 'pcc_vn', 'created_by', 'updated_by'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hn' => 'Hn',
            'vn' => 'Vn',
            'pcc_vn' => 'Pcc Vn',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'eye_out_hos' => 'ตรวจมาจากนอกโรงพยาบาล',
        ];
    }
    public static function itemsAlias($key){

        $items = [
          'smoking'=>[
            1 => 'No',
            2 => 'Yes',
            3 => 'Roll / day',
            4 => 'Ex'
          ],
          'HowLongAgo'=>[
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


      public function getItemSex()
      {
        return self::itemsAlias('sex');
      }
  
      public function getItemSmoking()
      {
        return self::itemsAlias('smoking');
      }
  
      public function getItemHowLongAgo()
      {
        return self::itemsAlias('HowLongAgo');
      }
  
      public function getItemFootAndToe()
      {
        return self::itemsAlias('FootAndToe');
      }
  
      public function getItemSkill()
      {
        return self::itemsAlias('skill');
      }
  
      public function getSexName(){
          return ArrayHelper::getValue($this->getItemSex(),$this->sex);
      }
  
      public function getMaritalName(){
          return ArrayHelper::getValue($this->getItemMarital(),$this->marital_status);
      }
  
      public function getEducationName(){
          return ArrayHelper::getValue($this->getItemEducation(),$this->education_level);
      }
  
      public function getTitleName(){
          return ArrayHelper::getValue($this->getItemTitle(),$this->title);
      }

 
}