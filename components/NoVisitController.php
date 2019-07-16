<?php

namespace app\components;

use app\components\LogController;
use app\components\PatientHelper;

class NoVisitController extends LogController {

    public function beforeAction($action) {
        $hn = PatientHelper::getCurrentHn();        
        if (empty($hn)) {
            return $this->redirect(['/site/index']);
        }
        
        return parent::beforeAction($action);
    }

}
