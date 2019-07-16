<?php

namespace app\modules\lab\models;

use Yii;

/**
 * This is the model class for table "lab_group".
 *
 * @property int $id
 * @property string $lab_name
 * @property string $lab_id
 */
class LabGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lab_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lab_id'], 'string'],
            [['lab_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lab_name' => 'Lab Name',
            'lab_id' => 'Lab ID',
        ];
    }
}
