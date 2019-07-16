<?php

namespace app\modules\foot\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use app\components\VisitController as Controller;
use yii\web\NotFoundHttpException;
use \yii\web\Response;
use app\components\UnitHelper;
use app\modules\foot\models\FootAssessment;

class FootAssessmentController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionComplate()
    {
       
            $model = new FootAssessment();
            $model->record_complete = Json::decode($model->record_complete);
    
            if ($model->load(Yii::$app->request->post())) {

                $model->save(false);
            }else{
               
                if (Yii::$app->request->isAjax) {
                    Yii::$app->response->format = Response::FORMAT_JSON;
                return $this->renderAjax('complate', [
                    'model' => $model,
                ]);
                }else{
                    return $this->render('complate', [
                        'model' => $model,
                    ]);
                }
        }
    }

}
