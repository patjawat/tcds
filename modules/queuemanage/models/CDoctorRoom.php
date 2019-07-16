<?php

namespace app\modules\queuemanage\models;

use Yii;

/**
 * This is the model class for table "c_doctor_room".
 *
 * @property int $id
 * @property string $room_title
 * @property string $doctor_id
 * @property bool $is_active
 */
class CDoctorRoom extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'c_doctor_room';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['doctor_id'], 'string'],
            [['is_active'], 'boolean'],
            [['room_title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'room_title' => 'Room Title',
            'doctor_id' => 'Doctor ID',
            'is_active' => 'Is Active',
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
}
