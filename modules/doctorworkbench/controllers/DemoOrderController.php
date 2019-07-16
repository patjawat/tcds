<?php

namespace app\modules\doctorworkbench\controllers;
use yii;
use yii\helpers\Json;
use app\modules\doctorworkbench\models\PccDiagnosis;
use app\modules\doctorworkbench\models\PccDiagnosisSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;

use app\modules\doctorworkbench\models\CIcd10tm;
use app\modules\doctorworkbench\models\PccMedication;

class DemoOrderController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

   
    public function actionTabs1($tab=null) {
    //    Yii::$app->response->format = Response::FORMAT_JSON;
    $searchModel = new PccDiagnosisSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new PccDiagnosis();  

        $html = $this->renderAjax('tabs1',[
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model
            ]);
        return Json::encode($html);
    }
    public function actionTabs2($tab=null) {
        $html = $this->renderPartial('tabs2');
        return Json::encode($html);
    }
    public function actionTabs3($tab=null) {
        $html = $this->renderPartial('tabs3');
        return Json::encode($html);
    }



}
