<?php

namespace app\modules\emr\models;

use Yii;

/**
 * This is the model class for table "gateway_emr_diag".
 *
 * @property string $id
 * @property string $hospcode
 * @property string $hospname
 * @property string $hn
 * @property string $vn
 * @property string $an
 * @property string $date_visit
 * @property string $time_visit
 * @property string $icd_code
 * @property string $icd_name
 * @property string $diag_type
 * @property array $data_json
 * @property string $last_update
 * @property string $cid
 * @property string $provider
 */
class GatewayEmrDiag extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gateway_emr_diag';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'string'],
            [['date_visit', 'time_visit', 'data_json', 'last_update'], 'safe'],
            [['hospcode'], 'string', 'max' => 5],
            [['hospname', 'icd_code'], 'string', 'max' => 100],
            [['hn'], 'string', 'max' => 10],
            [['vn', 'an'], 'string', 'max' => 12],
            [['icd_name'], 'string', 'max' => 255],
            [['diag_type'], 'string', 'max' => 2],
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
            'vn' => 'Vn',
            'an' => 'An',
            'date_visit' => 'Date Visit',
            'time_visit' => 'Time Visit',
            'icd_code' => 'Icd Code',
            'icd_name' => 'Icd Name',
            'diag_type' => 'Diag Type',
            'data_json' => 'Data Json',
            'last_update' => 'Last Update',
            'cid' => 'Cid',
            'provider' => 'Provider',
        ];
    }
}
