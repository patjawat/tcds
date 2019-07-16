<?php

namespace app\modules_share\patient\models;

use Yii;

/**
 * This is the model class for table "m_patient".
 *
 * @property string $hn
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 * @property string $requester
 * @property array $data_json
 * @property string $pid
 * @property string $prename
 * @property string $fname
 * @property string $mname
 * @property string $lname
 * @property string $sex
 * @property string $birth
 * @property int $agey
 * @property int $agem
 * @property int $aged
 * @property bool $is_live
 */
class MPatient extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'm_patient';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hn', 'pid', 'fname', 'sex', 'birth'], 'required'],
            [['created_at', 'updated_at', 'data_json', 'birth'], 'safe'],
            [['agey', 'agem', 'aged'], 'default', 'value' => null],
            [['agey', 'agem', 'aged'], 'integer'],
            [['is_live'], 'boolean'],
            [['hn'], 'string', 'max' => 9],
            [['created_by', 'updated_by', 'requester', 'fname', 'mname', 'lname'], 'string', 'max' => 255],
            [['pid'], 'string', 'max' => 13],
            [['prename'], 'string', 'max' => 3],
            [['sex'], 'string', 'max' => 1],
            [['hn'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'hn' => 'Hn',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'requester' => 'Requester',
            'data_json' => 'Data Json',
            'pid' => 'Pid',
            'prename' => 'Prename',
            'fname' => 'Fname',
            'mname' => 'Mname',
            'lname' => 'Lname',
            'sex' => 'Sex',
            'birth' => 'Birth',
            'agey' => 'Agey',
            'agem' => 'Agem',
            'aged' => 'Aged',
            'is_live' => 'Is Live',
        ];
    }
}
