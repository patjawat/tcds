<?php

namespace app\modules\doctorworkbench\models;

use Yii;

/**
 * This is the model class for table "df_charge_doctor_type".
 *
 * @property string $id รหัสรายการ
 * @property string $name ประเภทรายได้แพทย์
 */
class DfChargeDoctorType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'df_charge_doctor_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'string', 'max' => 100],
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
            'id' => 'รหัสรายการ',
            'name' => 'ประเภทรายได้แพทย์',
        ];
    }
}
