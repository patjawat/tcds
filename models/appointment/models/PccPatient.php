<?php

namespace app\modules\appointment\models;

use Yii;

/**
 * This is the model class for table "pcc_patient".
 *
 * @property string $id
 * @property string $hn
 * @property string $cid
 * @property string $prename
 * @property string $fname
 * @property string $mname
 * @property string $lname
 * @property string $sex
 * @property string $birthday
 * @property string $birthtime
 * @property string $agey
 * @property string $agem
 * @property string $aged
 * @property string $occupation
 * @property string $country
 * @property string $address
 * @property string $road
 * @property string $tmbpart
 * @property string $amppart
 * @property string $chwpart
 * @property string $marystatus
 * @property string $bloodgroup
 * @property string $provider_code
 * @property string $provider_name
 * @property array $data_json
 * @property string $last_update
 */
class PccPatient extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pcc_patient';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'hn', 'cid', 'prename', 'fname', 'lname', 'sex', 'birthday', 'provider_code', 'provider_name'], 'required'],
            [['id'], 'string'],
            [['birthday', 'birthtime', 'data_json', 'last_update'], 'safe'],
            [['hn'], 'string', 'max' => 9],
            [['cid'], 'string', 'max' => 13],
            [['prename', 'fname', 'mname', 'lname', 'road', 'provider_name'], 'string', 'max' => 100],
            [['sex', 'agem', 'aged', 'marystatus', 'bloodgroup'], 'string', 'max' => 2],
            [['agey'], 'string', 'max' => 3],
            [['occupation'], 'string', 'max' => 10],
            [['country'], 'string', 'max' => 20],
            [['address'], 'string', 'max' => 255],
            [['tmbpart', 'amppart', 'chwpart'], 'string', 'max' => 4],
            [['provider_code'], 'string', 'max' => 5],
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
            'hn' => 'Hn',
            'cid' => 'Cid',
            'prename' => 'Prename',
            'fname' => 'Fname',
            'mname' => 'Mname',
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
            'provider_code' => 'Provider Code',
            'provider_name' => 'Provider Name',
            'data_json' => 'Data Json',
            'last_update' => 'Last Update',
        ];
    }
}
