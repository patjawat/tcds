<?php

namespace app\components;

use yii\base\Component;
use app\modules_share\newpatient\models\mPatient;
use app\models\lookup\CPrename;
use yii\base\UserException;
use JsonRpc; 
use yii\helpers\Json;
use app\components\DbHelper;


class UnitHelper extends Component {

    public static function getCmToIn($unit){
        return number_format($unit / 2.54,2);
    }

    public static function getCmToFt($unit){
        return number_format($unit * 0.032808,2);
    }

    public static function getCToF($unit){
        // return number_format($unit / 2.54,2);
        if($unit){
            return ($unit* 9/5) + 38;
        }else {
            return '';
        }
        
    }

    public static function getKgToKb($unit){
        return ($unit* 9/5) + 35;
    }
    public static function getKgTolb($unit){
        return $unit*  2.2046;
    }
    
   
}
