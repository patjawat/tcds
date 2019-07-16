<?php

namespace app\modules\emr\controllers;
use yii;
use yii\web\Controller;
use app\modules\lab\models\Hoslab;
use app\modules\lab\models\HoslabSearch;
use app\modules\drug\models\Hosdrug;
use app\modules\drug\models\HosdrugSearch;

class DefaultController extends Controller
{

    public function actionIndex()
    {
        $searchModel_lab = new HoslabSearch();
        $dataProvider_lab = $searchModel_lab->search(Yii::$app->request->queryParams);

        $searchModel_drug = new HosdrugSearch();
        $dataProvider_drug = $searchModel_drug->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel_lab' => $searchModel_lab,
            'dataProvider_lab' => $dataProvider_lab,
            'searchModel_drug' => $searchModel_drug,
            'dataProvider_drug' => $dataProvider_drug,
            
        ]);
    }
}
