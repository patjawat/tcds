<?php

namespace app\modules\chiefcomplaint\models;

use Yii;

/**
 * This is the model class for table "med_point".
 *
 * @property string $id รหัสจุดรับยา
 * @property string $name ชื่อจุดรับยา
 */
class MedPoint extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'med_point';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('tcds');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name'], 'required'],
            [['id', 'name'], 'string', 'max' => 100],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัสจุดรับยา',
            'name' => 'ชื่อจุดรับยา',
        ];
    }
}
