<?php

namespace app\modules\doctorworkbench\models;

use Yii;


class PccDiagnosis extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'pcc_service_diagnosis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['diag_text'], 'required'],
            [['id'], 'string'],
            [['date_service', 'time_service', 'data_json', 'last_update','diag_text','cid','pcc_vn','vn','hn'], 'safe'],
            // [['hn'], 'string', 'max' => 9],
            [['provider_code', 'hospcode'], 'string', 'max' => 5],
            [['provider_name'], 'string', 'max' => 100],
            [['icd_code'], 'string', 'max' => 50],
            [['icd_name'], 'string', 'max' => 255],
            [['diag_type'], 'string', 'max' => 10],
            [['cid'], 'string', 'max' => 13],
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
            'icd_code' => 'Icd Code',
            'icd_name' => 'Icd Name',
            'diag_type' => 'Diag Type',
            'data_json' => 'Data Json',
            'last_update' => 'Last Update',
            'diag_text' => 'diag_text',           
            'pcc_vn' => 'PCC_VN',
            'hospcode' => 'Hospcode',
            'cid' => 'เลขบัตรประชาชน',            
        ];
    }

    public function Thaidate($date){
        if(preg_match('/(\d{4}-\d{2}-\d{2})/', $date)){ //ถ้ามีค่าในรูปแบบ 2016-05-20 13:30:45

            if($date == '0000-00-00'){ //ถ้าไม่มีข้อมูล
                //$this->setAttribute($column_name, null); //กำหนดให้เป็นค่าว่าง
                return '-';
            }else{
                $date_and_time = explode('.', $date);
                $date_time = explode(' ', $date_and_time[0]); //แยกวันและเวลา

                $ymd = explode('-', $date_time[0]);//แยก ปี-เดือน-วัน
                $year = (int) $ymd[0];//กำหนดให้เป็น int เพื่อการคำนวณ
                $year = $year + 543;// นำปี +543
               return $result = $ymd[2] . '/' . $ymd[1] . '/' . $year ;//ได้รูปแบบ วัน/เดือน/ปี ชั่วโมง:นาที:วินาทีี
                
            }
        }
    }
    
    public  function getDiagtype1(){
        return $this->hasOne(CDiagtype::className(), ['diagtype' => 'diag_type']);
    }
}
