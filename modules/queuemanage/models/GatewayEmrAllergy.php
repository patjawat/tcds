<?php

namespace app\modules\queuemanage\models;

use Yii;

/**
 * This is the model class for table "gateway_emr_allergy".
 *
 * @property string $id
 * @property string $hospcode
 * @property string $hospname
 * @property string $hn
 * @property string $drug_name
 * @property string $level
 * @property string $symptom
 * @property array $data_json
 * @property string $last_update
 * @property string $cid
 * @property string $provider
 * @property string $drug_code
 */
class GatewayEmrAllergy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gateway_emr_allergy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'hospcode', 'hospname', 'hn'], 'required'],
            [['id'], 'string'],
            [['data_json', 'last_update'], 'safe'],
            [['hospcode'], 'string', 'max' => 5],
            [['hospname', 'level'], 'string', 'max' => 100],
            [['hn'], 'string', 'max' => 12],
            [['drug_name', 'symptom', 'drug_code'], 'string', 'max' => 255],
            [['cid', 'provider'], 'string', 'max' => 13],
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
            'hospname' => 'Hospname',
            'hn' => 'Hn',
            'drug_name' => 'Drug Name',
            'level' => 'Level',
            'symptom' => 'Symptom',
            'data_json' => 'Data Json',
            'last_update' => 'Last Update',
            'cid' => 'Cid',
            'provider' => 'Provider',
            'drug_code' => 'Drug Code',
        ];
    }
}
