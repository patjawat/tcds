<?php

namespace app\models\lookup;

use Yii;

/**
 * This is the model class for table "c_prename".
 *
 * @property string $id
 * @property string $title_th
 * @property string $detail
 * @property string $title_en
 * @property string $map_code
 * @property bool $is_active
 */
class CPrename extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'c_prename';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'title_th'], 'required'],
            [['map_code'], 'string'],
            [['is_active'], 'boolean'],
            [['id'], 'string', 'max' => 3],
            [['title_th', 'detail', 'title_en'], 'string', 'max' => 50],
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
            'title_th' => 'คำนำหน้า',
            'detail' => 'Detail',
            'title_en' => 'Title En',
            'map_code' => 'Map Code',
            'is_active' => 'Is Active',
        ];
    }
}
