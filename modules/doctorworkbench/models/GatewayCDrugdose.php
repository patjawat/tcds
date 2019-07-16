<?php

namespace app\modules\doctorworkbench\models;

use Yii;

/**
 * This is the model class for table "gateway_c_drugdose".
 *
 * @property string $id
 * @property string $hospcode
 * @property string $drugcode
 * @property string $doseno
 * @property string $dosedescription
 * @property string $doseprefix
 */
class GatewayCDrugdose extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gateway_c_drugdose';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'hospcode'], 'required'],
            [['id'], 'string'],
            [['hospcode'], 'string', 'max' => 5],
            [['drugcode'], 'string', 'max' => 24],
            [['doseno'], 'string', 'max' => 100],
            [['dosedescription', 'doseprefix'], 'string', 'max' => 255],
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
            'hospcode' => 'Hospcode',
            'drugcode' => 'Drugcode',
            'doseno' => 'Doseno',
            'dosedescription' => 'Dosedescription',
            'doseprefix' => 'Doseprefix',
        ];
    }
}
