<?php

namespace app\modules\patientexit\controllers;

use yii\web\Controller;
use app\components\PatientHelper;
use app\components\DbHelper;

/**
 * Default controller for the `patientexit` module
 */
class DefaultController extends Controller {

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        if (\Yii::$app->request->isAjax) {
            return $this->renderAjax('index');
        }
    }
    public function actionSetNextStation(){
        
    }

    public function actionRemoveCurrentPatient(){
        $pcc_vn = PatientHelper::getCurrentVn();
        $sql = " update pcc_visit SET current_station = 'A0' WHERE pcc_vn  =  '$pcc_vn' ";
        DbHelper::execute('db', $sql);
        PatientHelper::removeCurrentPatient();
        return $this->redirect(['/doctorworkbench/order']);
    }
    public function actionExitCurrentPatient(){
        $pcc_vn = PatientHelper::getCurrentVn();
        $sql = " update pcc_visit SET current_station = 'A2' WHERE pcc_vn  =  '$pcc_vn' ";
        DbHelper::execute('db', $sql);
        PatientHelper::removeCurrentPatient();
        return $this->redirect(['/doctorworkbench/order']);
    }

}
