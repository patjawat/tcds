<?php

namespace app\modules\doctorworkbench\models;

use Yii;

/**
 * This is the model class for table "c_diagtext".
 *
 * @property string $id
 * @property string $text
 * @property int $use
 */
class CDiagtext extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'c_diagtext';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['id'], 'required'],
            [['id'], 'string'],
            [['use'], 'default', 'value' => null],
            [['use'], 'integer'],
            [['text'], 'string', 'max' => 255],
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
            'text' => 'Text',
            'use' => 'Use',
        ];
    }
}
