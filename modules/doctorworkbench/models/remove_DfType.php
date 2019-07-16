<?php

namespace app\modules\doctorworkbench\models;

use Yii;

/**
 * This is the model class for table "df_type".
 *
 * @property string $id
 * @property string $name
 */
class DfType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'df_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['charge_id','receipt_id','df_charge_id','df_receipt_id'], 'safe'],
            [['id'], 'string', 'max' => 2],
            [['name'], 'string', 'max' => 255],
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
            'name' => 'Name',
        ];
    }
}
