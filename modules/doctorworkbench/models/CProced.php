<?php

namespace app\modules\doctorworkbench\models;

use Yii;

/**
 * This is the model class for table "c_proced".
 *
 * @property string $title
 * @property string $title_th
 * @property string $map_code
 * @property bool $is_active
 * @property string $id
 */
class CProced extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'c_proced';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_active'], 'boolean'],
            //[['id'], 'required'],
            [['id'], 'string', 'max' => 7],
            [['title', 'title_th'], 'string', 'max' => 200],
            [['map_code'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'title' => 'Title',
            'title_th' => 'Title Th',
            'map_code' => 'Map Code',
            'is_active' => 'Is Active',
            'id' => 'ID',
        ];
    }
}
