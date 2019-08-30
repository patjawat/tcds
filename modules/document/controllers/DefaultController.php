<?php

namespace app\modules\document\controllers;
use Yii;
use app\components\PatientHelper;
use app\modules\doctorworkbench\models\DiagnosisSearch;
use app\modules\doctorworkbench\models\HisPatient;
use app\modules\doctorworkbench\models\MedicationSearch;
use app\modules\document\models\DocumentSearch;
use yii\web\Controller;
use yii\web\Response;

class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        // $request = Yii::$app->request;
        // if ($request->isAjax) {
        //     Yii::$app->response->format = Response::FORMAT_JSON;
        //     return $this->renderAjax('index', [

        //     ]);
        // }else{
        //     return $this->render('index', [
        //     ]);
        // }


        {
            // $hn = PatientHelper::getCurrentHn() ? PatientHelper::getCurrentHn() : PatientHelper::getCurrentHnEmr();
            $hn = Yii::$app->request->get('hn');
            $searchModel = new DocumentSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->query->where(['hn' => $hn]);
            $dataProvider->pagination->pageSize = false;
            $request = Yii::$app->request;
            if ($request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return $this->renderAjax('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'hn' => $hn
                ]);
            } else {
                return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'hn' => $hn
                ]);
            }
        }


    }
}
