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
     * ข้อมูลส่วนตัวตามรหัสผู้รับบริการ
     * @param string $hn
     * @return void
     */
    public static function getPatientByHn($hn) {
        return $hn > 0 ? self::getApiResult('PatientRpcS', 'getByHn', [$hn]) : [];
    }
    
    /**
     * 
     * @param string $hn
     * @return void
     */
    public static function getPatientProfile(string $hn){
        $profile_ = self::getPatientByHn($hn);
        return $profile_[0];
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
    public static function getLabByHn(string $hn) {
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

}
