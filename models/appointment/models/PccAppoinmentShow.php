<?php

namespace app\modules\appointment\models;

use Yii;

/**
 * This is the model class for table "pcc_appoinment_show".
 *
 * @property string $id
 * @property string $startdate
 * @property string $enddate
 * @property string $color
 * @property string $oapp_id
 */
class PccAppoinmentShow extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pcc_appoinment_show';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'string'],
            [['startdate', 'enddate'], 'safe'],
            [['color', 'oapp_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'startdate' => 'Startdate',
            'enddate' => 'Enddate',
            'color' => 'Color',
            'oapp_id' => 'Oapp ID',
        ];
    }
}
