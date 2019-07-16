<?php
namespace app\components;
use yii\base\Component;
use yii\base\UserException;

class FormatYear extends Component {
  public static function toThai($date){
    if (preg_match('/(\d{4}-\d{2}-\d{2})/', $date)) { //ถ้ามีค่าในรูปแบบ 2016-05-20 13:30:45
        if ($date == '0000-00-00') { //ถ้าไม่มีข้อมูล
            //$this->setAttribute($column_name, null); //กำหนดให้เป็นค่าว่าง
            return '-';
        } else {
            $date_and_time = explode('.', $date);
            $date_time = explode(' ', $date_and_time[0]); //แยกวันและเวลา

            $ymd = explode('-', $date_time[0]); //แยก ปี-เดือน-วัน
            $year = (int) $ymd[0]; //กำหนดให้เป็น int เพื่อการคำนวณ
            $year = $year + 543; // นำปี +543
            return $result = $ymd[2] . '/' . $ymd[1] . '/' . $year; //ได้รูปแบบ วัน/เดือน/ปี ชั่วโมง:นาที:วินาทีี
        }
    }
  }

  public static function toEn($date){
    if ($date == '') { //ถ้าไม่มีข้อมูล
        //$this->setAttribute($column_name, null); //กำหนดให้เป็นค่าว่าง
        return '0000-00-00';
    } else {
        // $date_and_time = explode('.', $date);
        $ymd = explode('/', $date); //แยก ปี-เดือน-วัน
        $year = (int) $ymd[2]; //กำหนดให้เป็น int เพื่อการคำนวณ
        $year = $year - 543; // นำปี +543
        return $result = $year . '-' . $ymd[1] . '-' . $ymd[0]; //ได้รูปแบบ วัน/เดือน/ปี ชั่วโมง:นาที:วินาทีี
    }
  }

  public static function ymd($date)
    {
        $sql = "select '$date',curdate(),
        timestampdiff(year,'$date',curdate()) as date_year,
        timestampdiff(month,'$date',curdate())-(timestampdiff(year,'$date',curdate())*12) as date_month,
        timestampdiff(day,date_add('$date',interval (timestampdiff(month,'$date',curdate())) month),curdate()) as date_day";
        $data = DbHelper::queryOne('db', $sql);
        $y = $data['date_year'] == 0 ? '' : $data['date_year'].' ปี ';
        $m = $data['date_month'] == 0 ? '' : $data['date_month'].' เดือน ';
        $d = $data['date_day'] == 0 ? '' : $data['date_day'].' วัน';
        return $y.$m.$d;

    }


}
 ?>
