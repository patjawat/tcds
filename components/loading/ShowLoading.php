<?php

namespace app\components\loading;

use yii\base\Widget;

class ShowLoading extends Widget {

    public function init() {
        parent::init();
    }

    public function run() {
        parent::run();
        return $this->render('load');
    }

}

?>
