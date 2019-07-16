<?php

namespace app\modules\doctorworkbench\models;

use Yii;

/**
 * This is the model class for table "c_icd10tm".
 *
 * @property string $diagcode
 * @property string $diagename
 * @property string $diagtname
 * @property string $id
 */
class CIcd10tm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'c_icd10tm';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['diagcode', 'diagename', 'id'], 'required'],
            [['id'], 'string'],
            [['diagcode'], 'string', 'max' => 7],
            [['diagename', 'diagtname'], 'string', 'max' => 500],
            [['diagcode', 'id'], 'unique', 'targetAttribute' => ['diagcode', 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'diagcode' => 'Diagcode',
            'diagename' => 'Diagename',
            'diagtname' => 'Diagtname',
            'id' => 'ID',
        ];
    }
}
