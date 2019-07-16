<?php

namespace app\modules\doctorworkbench\models;

use Yii;

/**
 * This is the model class for table "pcc_procedure".
 *
 * @property string $id
 * @property string $hn
 * @property string $vn
 * @property string $provider_code
 * @property string $provider_name
 * @property string $date_service
 * @property string $time_service
 * @property string $procedure_code
 * @property string $procedure_name
 * @property string $start_date
 * @property string $start_time
 * @property string $end_date
 * @property string $end_time
 * @property string $procedure_price
 * @property array $data_json
 * @property string $last_update
 * @property string $doctor
 */
class PccProcedure extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pcc_service_procedure';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id','procedure_code'], 'required'],
            [['id'], 'string'],
            [['date_service', 'time_service', 'start_date', 'start_time', 'end_date', 'end_time', 'data_json', 'last_update'], 'safe'],
            [['hn'], 'string', 'max' => 9],
            [['vn'], 'string', 'max' => 12],
            [['provider_code'], 'string', 'max' => 5],
            [['provider_name', 'procedure_name', 'doctor'], 'string', 'max' => 255],
            [['procedure_code'], 'string', 'max' => 100],
            [['procedure_price'], 'string', 'max' => 10],
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
            'provider_code' => 'Provider Code',
            'provider_name' => 'Provider Name',
            'date_service' => 'Date Service',
            'time_service' => 'Time Service',
            'procedure_code' => 'Procedure Code',
            'procedure_name' => 'หัตถการ',
            'start_date' => 'Start Date',
            'start_time' => 'Start Time',
            'end_date' => 'End Date',
            'end_time' => 'End Time',
            'procedure_price' => 'Procedure Price',
            'data_json' => 'Data Json',
            'last_update' => 'Last Update',
            'doctor' => 'Doctor',
        ];
    }

    public  function getProced(){
        return $this->hasOne(CProced::className(), ['id' => 'procedure_code']);
    }
}
