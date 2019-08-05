<?php

namespace app\modules\foot\models;

use Yii;


class ItemsFootType extends \yii\db\ActiveRecord
{
    public static function getDb()
    {
        return Yii::$app->get('tcds');
    }
    
    
    public static function tableName()
    {
        return 'items_foot_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name'], 'required'],
            [['id'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
            'name' => 'Name',
        ];
    }
}
