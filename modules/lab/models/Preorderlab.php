<?php

namespace app\modules\lab\models;

use Yii;

/**
 * This is the model class for table "pcc_service_preorderlab".
 *
 * @property string $id
 * @property string $pcc_vn อ้างอิงตาราง pcc_visit
 * @property array $data_json
 * @property string $pcc_start_service_datetime
 * @property string $pcc_end_service_datetime
 * @property string $data1
 * @property string $data2
 * @property string $hospcode
 * @property string $lab_code
 * @property string $lab_name
 * @property string $lab_request_date
 * @property string $lab_result_date
 * @property string $lab_result
 * @property string $standard_result
 * @property string $lab_price
 * @property string $lab_code_moph
 * @property string $last_update
 */
class Preorderlab extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pcc_service_preorderlab';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lab_code','lab_request_date'], 'required'],
            [['id'], 'string'],
            [['data_json', 'pcc_start_service_datetime', 'pcc_end_service_datetime', 'lab_request_date', 'lab_result_date', 'last_update','cid'], 'safe'],
            [['lab_price'], 'number'],
            [['pcc_vn'], 'string', 'max' => 12],
            [['lab_code', 'lab_name', 'lab_result', 'standard_result', 'lab_code_moph'], 'string', 'max' => 255],
            [['hospcode'], 'string', 'max' => 5],
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
            'pcc_vn' => 'Pcc Vn',
            'data_json' => 'Data Json',
            'pcc_start_service_datetime' => 'Pcc Start Service Datetime',
            'pcc_end_service_datetime' => 'Pcc End Service Datetime',
            'hospcode' => 'Hospcode',
            'lab_code' => 'Lab Code',
            'lab_name' => 'Lab Name',
            'lab_request_date' => 'Lab Request Date',
            'lab_result_date' => 'Lab Result Date',
            'lab_result' => 'Lab Result',
            'standard_result' => 'Standard Result',
            'lab_price' => 'Lab Price',
            'lab_code_moph' => 'Lab Code Moph',
            'last_update' => 'Last Update',
            'cid' => 'cid'
        ];
    }
    // public function afterFind()
    // {
    //     foreach($this->attributes as $column_name => $value){
    //         if(preg_match('/(\d{4}-\d{2}-\d{2})/', $value)){ //ถ้ามีค่าในรูปแบบ 2016-05-20 13:30:45

    //             if($value == '0000-00-00'){ //ถ้าไม่มีข้อมูล
    //                 $this->setAttribute($column_name, null); //กำหนดให้เป็นค่าว่าง
    //             }else{
    //                 $date_and_time = explode('.', $value);
    //                 $date_time = explode(' ', $date_and_time[0]); //แยกวันและเวลา

    //                 $ymd = explode('-', $date_time[0]);//แยก ปี-เดือน-วัน
    //                 $year = (int) $ymd[0];//กำหนดให้เป็น int เพื่อการคำนวณ
    //                 $year = $year + 543;// นำปี +543
    //                 $result = $ymd[2] . '/' . $ymd[1] . '/' . $year ;//ได้รูปแบบ วัน/เดือน/ปี ชั่วโมง:นาที:วินาทีี
    //                 $this->setAttribute($column_name, $result);//กำหนดค่าใหม่
    //             }
    //         }

    //     }
    //     return parent::afterFind();
    // }

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

    public function Edate($date){
        // if(preg_match('/(\d{4}-\d{2}-\d{2})/', $date)){ //ถ้ามีค่าในรูปแบบ 2016-05-20 13:30:45

            if($date == ''){ //ถ้าไม่มีข้อมูล
                //$this->setAttribute($column_name, null); //กำหนดให้เป็นค่าว่าง
                return '0000-00-00';
            }else{
                // $date_and_time = explode('.', $date);
                $ymd = explode('/', $date);//แยก ปี-เดือน-วัน
                $year = (int) $ymd[2];//กำหนดให้เป็น int เพื่อการคำนวณ
                $year = $year - 543;// นำปี +543
               return $result = $year. '-' . $ymd[1] . '-' . $ymd[0] ;//ได้รูปแบบ วัน/เดือน/ปี ชั่วโมง:นาที:วินาทีี
                
            }

          //  return $date;
        // }
    }


    public function getLabname(){
        return $this->hasOne(CLabtest::className(), ['code' => 'lab_code']);

    }
}
