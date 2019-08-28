<?php

namespace app\components;

use yii\base\Component;


class ReportHelper extends Component {
    public static function getBarcodeApi(){
        return 'http://localhost:8100/';
    }


}
