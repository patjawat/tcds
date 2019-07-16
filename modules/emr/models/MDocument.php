<?php

namespace app\modules\emr\models;

use Yii;

/**
 * This is the model class for table "m_document".
 *
 * @property int $id
 * @property string $hn
 * @property string $dir_path
 * @property string $filename
 */
class MDocument extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'm_document';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hn', 'dir_path', 'filename'], 'string', 'max' => 255],
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
            'dir_path' => 'Dir Path',
            'filename' => 'Filename',
        ];
    }
}
