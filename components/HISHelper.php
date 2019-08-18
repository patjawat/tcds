<?php
namespace app\components;

use JsonRpc;
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
     * @return object array
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
     * @return object array
     */
    public static function getPatientByHn($hn) {
        return self::getApiResult('PatientRpcS', 'getByHn', [$hn]);
    }

    /**
     * ข้อมูลการรับบริการ OpdVisitRpcS->getByHnDiv()
     * @param string $hn รหัสผู้รับบริการ
     * @param string $div รหัสคลินิก/หน่วยงาน
     * @return object
     */
    public static function getVisitByHnDiv($hn, $div) {
        return self::getApiResult('OpdVisitRpcS', 'getByHnDiv', [$hn, $div]);
    }

}
