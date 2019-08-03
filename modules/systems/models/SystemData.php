<?php

namespace app\modules\systems\models;

use Yii;

/**
 * This is the model class for table "system_data".
 *
 * @property string $id
 * @property string $data
 */
class SystemData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'system_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'data'], 'required'],
            [['data'], 'string'],
            [['id'], 'string', 'max' => 255],
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
            'data' => 'System Setting',
        ];
    }
}
