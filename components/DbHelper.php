<?php

namespace app\components;

use yii\base\Component;


class DbHelper extends Component {
    public static function queryAll($db,$sql){
        return \Yii::$app->$db->createCommand($sql)->queryAll();
    }

    public static function queryOne($db,$sql){
        return \Yii::$app->$db->createCommand($sql)->queryOne();
    }
    public static function execute($db,$sql){
        return \Yii::$app->$db->createCommand($sql)->execute();
    }

}
