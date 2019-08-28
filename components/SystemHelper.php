<?php

namespace app\components;

use yii\base\Component;
use yii\helpers\Json;

use app\modules\systems\models\SystemData;


class SystemHelper extends Component {

    public static function getBarcodeApi(){    
        $data = Json::decode(SystemData::findOne(['id' => 'system'])->data);
        return $data['barcode_api'];
    }

    public static function getHisApi(){    
        $data = Json::decode(SystemData::findOne(['id' => 'system'])->data);
        return $data['his_api'];
    }

    public static function getSocketApi(){    
        $data = Json::decode(SystemData::findOne(['id' => 'system'])->data);
        return $data['socket_api'];
    }


}
