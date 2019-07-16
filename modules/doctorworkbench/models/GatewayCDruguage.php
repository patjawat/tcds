<?php

namespace app\modules\doctorworkbench\models;

use Yii;

/**
 * This is the model class for table "gateway_c_druguage".
 *
 * @property string $id
 * @property string $drugusage
 * @property string $code
 * @property string $name1
 * @property string $name2
 * @property string $name3
 * @property string $shortlist
 * @property string $status
 * @property string $ename1
 * @property string $ename2
 * @property string $ename3
 */
class GatewayCDruguage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gateway_c_druguage';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'string'],
            [['drugusage'], 'string', 'max' => 50],
            [['code', 'name1', 'name2', 'name3', 'shortlist', 'status', 'ename1', 'ename2', 'ename3'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'drugusage' => 'Drugusage',
            'code' => 'Code',
            'name1' => 'Name1',
            'name2' => 'Name2',
            'name3' => 'Name3',
            'shortlist' => 'Shortlist',
            'status' => 'Status',
            'ename1' => 'Ename1',
            'ename2' => 'Ename2',
            'ename3' => 'Ename3',
        ];
    }
}
