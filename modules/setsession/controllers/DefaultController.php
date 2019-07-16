<?php

namespace app\modules\setsession\controllers;

use yii\web\Controller;
use app\components\PatientHelper;

/**
 * Default controller for the `setsession` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex($pcc_vn=NULL)
    {
        PatientHelper::setCurrentVn($pcc_vn);
        return $this->redirect(['/doctorworkbench/pcc-diagnosis']);
    }
    
    public function actionSkipQueue($cid){
        $pcc_vn = PatientHelper::openVisit($cid);
        PatientHelper::setCurrentVn($pcc_vn);
        return $this->redirect(['/doctorworkbench/pcc-diagnosis']);
    }
}
