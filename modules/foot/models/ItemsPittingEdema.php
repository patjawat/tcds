<?php

namespace app\modules\foot\models;

use Yii;

/**
 * This is the model class for table "items_pitting_edema".
 *
 * @property int $id
 * @property string $name
 */
class ItemsPittingEdema extends \yii\db\ActiveRecord
{
    public static function getDb()
    {
        return Yii::$app->get('tcds');
    }
    
    public static function tableName()
    {
        return 'items_pitting_edema';
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