<?php

namespace app\modules\queuemanage\models;

use Yii;

/**
 * This is the model class for table "gateway_emr_patient".
 *
 * @property string $id
 * @property string $cid
 * @property string $hn
 * @property string $prename
 * @property string $fname
 * @property string $lname
 * @property string $sex
 * @property string $birthday
 * @property string $birthtime
 * @property int $agey
 * @property int $agem
 * @property int $aged
 * @property string $occupation
 * @property string $country
 * @property string $address
 * @property string $road
 * @property string $tmbpart
 * @property string $amppart
 * @property string $chwpart
 * @property string $marystatus
 * @property string $bloodgroup
 * @property string $hospcode
 * @property string $hospname
 * @property array $data_json
 * @property string $last_update
 * @property string $provider
 */
class GatewayEmrPatient extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gateway_emr_patient';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cid', 'hn', 'hospcode', 'hospname'], 'required'],
            [['id'], 'string'],
            [['birthday', 'birthtime', 'data_json', 'last_update'], 'safe'],
            [['agey', 'agem', 'aged'], 'default', 'value' => null],
            [['agey', 'agem', 'aged'], 'integer'],
            [['cid', 'provider'], 'string', 'max' => 13],
            [['hn'], 'string', 'max' => 10],
            [['prename', 'fname', 'lname', 'occupation', 'country', 'road', 'tmbpart', 'amppart', 'chwpart', 'marystatus', 'hospname'], 'string', 'max' => 100],
            [['sex', 'bloodgroup'], 'string', 'max' => 2],
            [['address'], 'string', 'max' => 255],
            [['hospcode'], 'string', 'max' => 5],
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
            'cid' => 'Cid',
            'hn' => 'Hn',
            'prename' => 'Prename',
            'fname' => 'Fname',
            'lname' => 'Lname',
            'sex' => 'Sex',
            'birthday' => 'Birthday',
            'birthtime' => 'Birthtime',
            'agey' => 'Agey',
            'agem' => 'Agem',
            'aged' => 'Aged',
            'occupation' => 'Occupation',
            'country' => 'Country',
            'address' => 'Address',
            'road' => 'Road',
            'tmbpart' => 'Tmbpart',
            'amppart' => 'Amppart',
            'chwpart' => 'Chwpart',
            'marystatus' => 'Marystatus',
            'bloodgroup' => 'Bloodgroup',
            'hospcode' => 'Hospcode',
            'hospname' => 'Hospname',
            'data_json' => 'Data Json',
            'last_update' => 'Last Update',
            'provider' => 'Provider',
        ];
    }
}
