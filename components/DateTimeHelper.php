<?php

namespace app\components;
use Yii;
use yii\base\Component;
use yii\db\Expression;

class DateTimeHelper extends Component {

    public static function getDbNow(){
        $expression = new Expression('NOW()');
        return (new \yii\db\Query)->select($expression)->scalar();

    }

    public static function getDbDateTimeNow() {
                return Yii::$app->formatter->asDate(self::getDbNow(), 'php:ymdHis'); // 2014-10-06
    }

    public static function getDbTimestramp() {
        return Yii::$app->formatter->asDate(self::getDbNow(), 'php:Y-m-d H:i:s'); // 2014-10-06

    }
    public static function getDbDate() {
        return Yii::$app->formatter->asDate(self::getDbNow(), 'php:Y-m-d'); // 2014-10-06
    }
    public static function getDbTime() {
        // return Yii::$app->formatter->asDate(self::getDbNow(), 'php:H:i:s'); // 2014-10-06
        $expression = new Expression('CURRENT_TIME()');
        return (new \yii\db\Query)->select($expression)->scalar();
    }

    public static function getDateToThai($date){
      // if($date == '0000-00-00'){
      // $date = '20170102';

          $y = substr($date, 0, 4)+543;
          $m = substr($date, 4, 2);
          $d = substr($date, 6, 2);
          return  $d.'/'.$m.'/'.$y;



    }


}
