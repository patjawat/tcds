<?php

namespace app\modules\opdvisit\controllers;

use Yii;
use app\modules\opdvisit\models\OpdVisit;
use app\modules\opdvisit\models\OpdVisitSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use app\components\UserHelper;
use app\components\PatientHelper;

/**
 * Default controller for the `opdvisit` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionList()
    {

        $department = Yii::$app->request->get('department');
        $searchModel = new OpdVisitSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $dataProvider->query->andWhere(['department' => $department]);
        // $dataProvider->query->andFilterWhere(['>=', 'service_start_date', $date_start]);
        // $dataProvider->query->andFilterWhere(['<=', 'service_start_date', $date_end]);
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $this->renderAjax('list', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else {
            return $this->render('list', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    public function actionPatientAlert(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        
        return $this->renderAjax('patient_alert');
        
      
    }
    public function actionCheckDrugAllergy(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        
        if(PatientHelper::getCurrentCountDrugAllergy() > 0){
            return [
                'status' => true
            ];

        }else{
            return [
                'status' => false
            ];
        }
    }
}
