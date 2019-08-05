<?php

namespace app\modules\doctorworkbench\models;

use Yii;

/**
 * This is the model class for table "his_drug".
 *
 * @property string $id
 * @property string $trade_name
 * @property string $general_name
 * @property string $update_time
 */
class HisDrug extends \yii\db\ActiveRecord
{
    public static function getDb()
    {
        return Yii::$app->get('tcds');
    }
    
    public static function tableName()
    {
        return 'his_drug';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'trade_name', 'general_name'], 'required'],
            [['update_time'], 'safe'],
            [['id'], 'string', 'max' => 10],
            [['trade_name', 'general_name'], 'string', 'max' => 300],
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
            'trade_name' => 'Trade Name',
            'general_name' => 'General Name',
            'update_time' => 'Update Time',
        ];
    }
}
