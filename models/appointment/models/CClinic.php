<?php

namespace app\modules\appointment\models;

use Yii;

/**
 * This is the model class for table "c_clinic".
 *
 * @property string $id
 * @property string $code
 * @property string $name
 * @property bool $is_active
 * @property string $color
 */
class CClinic extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'c_clinic';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code','name','color'], 'required'],
            [['id'], 'string'],
            [['is_active'], 'boolean'],
            [['code'], 'string', 'max' => 4],
            [['name', 'color'], 'string', 'max' => 255],
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
            'code' => 'รหัสคลินิก',
            'name' => 'ชื่อคลินิก',
            'is_active' => 'สถานะ',
            'color' => 'Color',
        ];
    }
}
