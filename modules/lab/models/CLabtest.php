<?php

namespace app\modules\lab\models;

use Yii;

/**
 * This is the model class for table "c_labtest".
 *
 * @property string $code
 * @property string $labname_en
 * @property string $labname_th
 * @property string $old_code
 */
class CLabtest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'c_labtest';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code'], 'required'],
            [['code'], 'string', 'max' => 10],
            [['labname_en', 'labname_th'], 'string', 'max' => 255],
            [['old_code'], 'string', 'max' => 2],
            [['code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'code' => 'Code',
            'labname_en' => 'Labname En',
            'labname_th' => 'Labname Th',
            'old_code' => 'Old Code',
        ];
    }
}
