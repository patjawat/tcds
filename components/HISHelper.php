<?php

namespace app\components;

use JsonRpc;
use Yii;
use yii\helpers\Json;
use yii\base\Component;
use app\modules\systems\models\SystemData;

/**
 * API ที่ใช้ร่วมกับ HIS เทพธารินทร์
 * @author suchart bunhachirat <suchartbu@gmail.com>
 */
class HISHelper extends Component {

    /**
     * URL HIS API
     * @return string
     */
    public static function getUrl() {
        $data = Json::decode(SystemData::findOne(['id' => 'system'])->data);
        return $data['his_api'];
    }

    /**
     * Get API Result
     * @param string $remote
     * @param string $method
     * @param array $parm
     * @return void
     */
    public static function getApiResult($remote, $method, $parm) {
        $url = self::getUrl() . $remote;
        $api = new JsonRpc\Client($url);
        $api->call($method, $parm);
        return $api->result;
    }

    /**
     * ข้อมูลส่วนตัวตามรหัสผู้รับบริการ&update his_patient
     * @param string $hn
     * @return void
     */
    public static function getPatientByHn($hn) {
        return $hn > 0 ? self::getApiResult('PatientRpcS', 'getByHn', [$hn]) : [];
    }

    /**
     * ข้อมูลส่วนตัวผู้รับบริการ hn+prefix+fname+lname+sex+age
     * @param string $hn
     * @return string
     */
    public static function getPatientProfile(string $hn) {
        $patient_ = self::getPatientByHn($hn);
        $birthday = self::getDateByYYYYMMDD($patient_[0]->birthday_date);
        $profile = empty($patient_) ? "! ไม่พบข้อมูล HN. " . $hn . " กรุณาติดต่อเวชระเบียน" :
                "HN. " . $patient_[0]->hn . " " . $patient_[0]->prefix . $patient_[0]->fname . " " . $patient_[0]->lname . " "
                . self::getSex($patient_[0]->sex) . " อายุ " . self::getAgeByYYYYMMDD($birthday);
        return $profile;
    }

    /**
     * คำอธิบายเพศ
     * @param string $sex
     * @return string
     */
    public static function getSex(string $sex) {
        return "เพศ" . ($sex === "M" ? "ชาย" : ($sex === "F" ? "หญิง" : "---"));
    }

    /**
     * แปลงตัวเลข ปีเดือนวัน เป็นข้อมูลวันที่
     * @param int $yyyymmdd
     * @return \DateTime
     */
    public static function getDateByYYYYMMDD(int $yyyymmdd) {
        return \DateTime::createFromFormat('Ymd', $yyyymmdd);
    }

    /**
     * คำนวนอายุ
     * @param \DateTime $birthday
     * @return type
     */
    public static function getAgeByYYYYMMDD(\DateTime $birthday) {
        $interval = date_diff($birthday, new \DateTime("now"));
        return $interval->format('%yปี %mเดือน %dวัน');
    }

    /**
     * ข้อมูลการรับบริการ OpdVisitRpcS->getByHnDiv()
     * @param string $hn รหัสผู้รับบริการ
     * @param string $div รหัสคลินิก/หน่วยงาน
     * @return void
     */
    public static function getVisitByHnDiv($hn, $div) {
        return $hn > 0 ? self::getApiResult('OpdVisitRpcS', 'getByHnDiv', [$hn, $div]) : [];
    }

    /**
     * ข้อมูลส่งตรวจแลปตามรหัสผู้รับบริการ
     * @param string $hn
     * @return void
     */
    public static function getLabRequestByHn(string $hn) {
        return $hn > 0 ? self::getApiResult('LabRequestRpcS', 'getByHn', [$hn]) : [];
    }

    /**
     * ข้อมูลผลแลปตามรหัสผู้รับบริการ
     * @param string $hn
     * @return void
     */
    public static function getLabResultByHn(string $hn) {
        $sql = "SELECT *  FROM `lab_result` WHERE `patient_id` = :patient_id";
        return Yii::$app->theptarin->createCommand($sql)->bindValue(':patient_id', $hn)->queryAll();
    }

    /**
     * กำหนดให้ผล LAB ต่อไปนี้จะต้องมีเวลาที่รับประทานอาหารล่าสุด [ข้อมูล (<1 h), (1-2 h), (2-3 h), (3-4 h), (4-5 h), (5-6 h), (6-7 h), (7-8 h), (>8 h), (…….)]
     * ตัวอย่างการแสดงผล ==> 120(<1 h) ข้อมูลเวลาที่รับประทานอาหารล่าสุด ถ้าคำนวนแล้วมากกว่า 48 ชม. ให้แสดงเวลาจริงที่คำนวน ตัวอย่าง (52:23 h)
     * @param \DateTime $checkin_datetime
     * @param \DateTime $eat_datetime
     * @return string
     */
    public static function getLabEatRemark(\DateTime $checkin_datetime, \DateTime $eat_datetime) {
        $eat_ = $checkin_datetime->diff($eat_datetime);
        $eat_hours = $eat_->format("%h");
        $eat_remark = ($eat_hours < 1 ? "<1 h" :
                ($eat_hours < 2 ? "1-2 h" :
                ($eat_hours < 3 ? "2-3 h" :
                ($eat_hours < 4 ? "3-4 h" :
                ($eat_hours < 5 ? "4-5 h" :
                ($eat_hours < 6 ? "5-6 h" :
                ($eat_hours < 7 ? "6-7 h" :
                ($eat_hours < 8 ? "7-8 h" :
                ($eat_hours < 48 ? ">8 h" :
                $eat_hours)))))))));
        return $eat_remark;
    }

    /**
     * ผลแลปตามเลขอ้างอิงการส่งตรวจ HIS
     * @param string $hn
     * @return array
     */
    public static function getLabResultRows(string $hn) {
        $row_ = [];
        $lab_result_ = HISHelper::getLabResultByHn($hn);
        $lab_code_hide_ = ["HIVAB", "HIVABS", "HIVAG", "HIL", "HIQ", "DRH", "CD4", "CD48"];
        foreach ($lab_result_ as $val_) {
            $remark = NUll;
            if ($val_['lis_code'] == "10020" || $val_['lis_code'] == "10080") {
                $remark = "(" .
                        HISHelper::getLabEatRemark(new \DateTime($val_['checkin_date'] . " " . $val_['checkin_time']), new \DateTime($val_['eat_date'] . " " . $val_['eat_time'])) .
                        ")";
            } else if (in_array($val_['lab_code'], $lab_code_hide_)) {
                $val_['result'] = "***";
            }
            $row_[$val_['lis_code'] . $val_['reference_number']] = $val_['result'] . " " . $remark;
        }
        return $row_;
    }

    /**
     * วันที่ เวลาที่ ส่งตรวจแลป HIS
     * @param string $hn
     * @return array
     */
    public static function getLabCheckinCols(string $hn) {
        $col_ = [];
        $lab_request_ = HISHelper::getLabRequestByHn($hn); //ปรับปรุงข้อมูลการส่งตรวจแลปของ HIS
        foreach ($lab_request_ as $val_) {
            if (trim($val_->request_lab_id) !== "GLUS") {
                $checkin_date = date("Y-m-d", strtotime($val_->checkin_date));
                $checkin_time = date("H:i", strtotime(sprintf("%06s", $val_->checkin_time)));
                $col_[$val_->checkin_date . $val_->file_no] = ['file_no' => $val_->file_no,
                    'checkin_date' => $checkin_date, 'checkin_time' => $checkin_time,
                    'checkin_datetime' => $checkin_date . " " . $checkin_time];
            }
        }
        return $col_;
    }

}
