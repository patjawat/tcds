<?php

namespace app\modules\doctorworkbench\models;

use Yii;

/**
 * This is the model class for table "doctor_free_items".
 *
 * @property string $id
 * @property string $name
 */
class DoctorFreeItems extends \yii\db\ActiveRecord
{
    public static function getDb()
    {
        return Yii::$app->get('tcds');
    }
    
    public static function tableName()
    {
        return 'doctor_free_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'string', 'max' => 2],
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
            'id' => 'รหัสตรวจ',
            'name' => 'รายการตรวจ',
        ];
    }
}
