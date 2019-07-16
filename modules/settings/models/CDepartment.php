<?php

namespace app\modules\settings\models;

use Yii;

/**
 * This is the model class for table "c_department".
 *
 * @property int $id
 * @property string $code
 * @property string $name
 */
class CDepartment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'c_department';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'รหัสแผนก',
            'name' => 'ชื่อ',
        ];
    }
}
