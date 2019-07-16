<?php

namespace app\modules\appointment\models;

use Yii;

/**
 * This is the model class for table "pcc_appointment".
 *
 * @property string $id
 * @property string $hn
 * @property string $vn
 * @property string $hospcode
 * @property string $hospname
 * @property string $date_service
 * @property string $time_service
 * @property string $clinic
 * @property string $appoint_date
 * @property string $appoint_time
 * @property string $detail
 * @property array $data_json
 * @property string $last_update
 */
class PccAppointment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pcc_appointment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //[['id', 'hn', 'vn'], 'required'],
            [['id'], 'string'],
            [['date_service', 'time_service', 'appoint_date', 'appoint_time', 'data_json', 'last_update'], 'safe'],
            [['hn'], 'string', 'max' => 9],
            [['vn'], 'string', 'max' => 12],
            [['hospcode'], 'string', 'max' => 5],
            [['hospname', 'clinic', 'detail'], 'string', 'max' => 255],
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
            'vn' => 'Vn',
            'hospcode' => 'Hospcode',
            'hospname' => 'Hospname',
            'date_service' => 'Date Service',
            'time_service' => 'Time Service',
            'clinic' => 'คลินิก',
            'appoint_date' => 'วันที่นัด',
            'appoint_time' => 'เวลานัด',
            'detail' => 'รายละเอียด',
            'data_json' => 'Data Json',
            'last_update' => 'Last Update',
        ];
    }
}
