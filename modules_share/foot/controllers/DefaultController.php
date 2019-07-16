<?php

namespace app\modules_share\foot\controllers;

use yii;
use yii\web\Controller;
use app\modules_share\foot\models\SFootAssessmentComplate;
use app\modules_share\foot\models\SFootAssessmentSummaryOpd;
use app\modules_share\foot\models\SFootAssessmentSummaryIpd;
use app\modules_share\foot\models\SFootUlcerFirstOpd;
use app\components\PatientHelper;
use yii\web\Response;
use app\components\VisitController;

class DefaultController extends VisitController
{

    public function actionIndex()
    {
        $request = Yii::$app->request;
        $hn = PatientHelper::getCurrentHn();
        $vn = PatientHelper::getCurrentVn();

        return $this->render('index',[
        ]);
    }

    public function actionFootImage(){
        return $this->render('foot-image');
    }

    public function actionFootAssessmentSummary(){
        return $this->render('foot-assessment-summary/foot-assessment-summary');
    }

}
