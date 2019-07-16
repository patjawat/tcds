<?php

namespace app\modules\doctorworkbench\models;

use Yii;

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
            [['procedure_code'], 'required'],
            //[['id'], 'string'],
            [['date_service', 'time_service', 'start_date', 'start_time', 'end_date', 'end_time', 'data_json', 'last_update', 'pcc_vn','cid'], 'safe'],
            [['hn'], 'string', 'max' => 9],
            [['vn'], 'string', 'max' => 12],
            [['provider_code', 'hospcode'], 'string', 'max' => 5],
            [['provider_name', 'procedure_name', 'doctor'], 'string', 'max' => 255],
            [['procedure_code'], 'string', 'max' => 100],
            [['procedure_price'], 'string', 'max' => 10],
            //[['cid'], 'string', 'max' => 13],
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
            'procedure_name' => 'Procedure Name',
            'start_date' => 'Start Date',
            'start_time' => 'Start Time',
            'end_date' => 'End Date',
            'end_time' => 'End Time',
            'procedure_price' => 'Procedure Price',
            'data_json' => 'Data Json',
            'last_update' => 'Last Update',
            'doctor' => 'Doctor',
            'hospcode' => 'Hospcode',
            'cid' => 'เลขบัตรประชาชน',
            'pcc_vn' => 'Pcc Vn',
        ];
    }

    public  function getProced(){
        return $this->hasOne(CProced::className(), ['id' => 'procedure_code']);
    }
}
