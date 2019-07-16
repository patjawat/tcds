<?php

namespace app\components;

use app\components\LogController;
use app\components\PatientHelper;

class VisitController extends LogController {

    public function beforeAction($action) {
        $hn = PatientHelper::getCurrentHn();
        $vn = PatientHelper::getCurrentVn();
        
        if (empty($hn)) {
            return $this->redirect(['/site/index']);
        }
        // if(empty($vn)){
        //     return $this->redirect(['/nursescreen']);
        // }
        return parent::beforeAction($action);
    }

}
