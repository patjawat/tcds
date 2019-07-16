<?php

namespace app\modules\doctorworkbench\models;

use Yii;

/**
 * This is the model class for table "c_diagtype".
 *
 * @property string $diagtype
 * @property string $name
 * @property string $nhso_code
 * @property string $id
 * @property string $name1 ประเภทการวินิจฉัย
 */
class CDiagtype extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'c_diagtype';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['diagtype', 'id'], 'required'],
            [['id'], 'string'],
            [['diagtype'], 'string', 'max' => 2],
            [['name', 'name1'], 'string', 'max' => 100],
            [['nhso_code'], 'string', 'max' => 1],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'diagtype' => 'Diagtype',
            'name' => 'Name',
            'nhso_code' => 'Nhso Code',
            'id' => 'ID',
            'name1' => 'ประเภทการวินิจฉัย',
        ];
    }
}
