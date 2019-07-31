<?php

namespace app\modules\foot\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use app\components\VisitController as Controller;
use yii\web\NotFoundHttpException;
use \yii\web\Response;
use app\components\PatientHelper;
use app\modules\foot\models\FootAssessment;

class FootAssessmentController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionComplate()
    {
        $pcc_vn = PatientHelper::getCurrentPccVn();
        $vn = PatientHelper::getCurrentVn();
        $hn = PatientHelper::getCurrentHn();
        $checkvn = FootAssessment::findOne(['vn' => $vn]);
        if ($checkvn) {
            $model = $checkvn;
            $model->record_complete = Json::decode($model->record_complete);

        } else {
            $model = new FootAssessment();
            $model->hn = $hn;
            $model->vn = $vn;

        }
    
            if ($model->load(Yii::$app->request->post())) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                
                $record_complete = [
                    'occupation' => $model->record_complete['occupation'],
                    'smoking' => $model->record_complete['smoking'],
                    'smoking_how_long_ago' => $model->record_complete['smoking_how_long_ago'],
                    'activity' => $model->record_complete['activity'],
                    'using_ambulation_aid' => $model->record_complete['using_ambulation_aid'],
                    'specify' => $model->record_complete['specify'],
                    'ulcer_check_right' => $model->record_complete['ulcer_check_right'],
                    'ulcer_check_left' => $model->record_complete['ulcer_check_left'],
                    'ulcer_right' => $model->record_complete['ulcer_right'],
                    'ulcer_left' => $model->record_complete['ulcer_left'],
                    'ulcer_digit_right' => $model->record_complete['ulcer_digit_right'],
                    'ulcer_digit_left' => $model->record_complete['ulcer_digit_left'],
                    'amputation_check_right' => $model->record_complete['amputation_check_right'],
                    'amputation_check_left' => $model->record_complete['amputation_check_left'],
                    'amputation_right' => $model->record_complete['amputation_right'],
                    'amputation_left' => $model->record_complete['amputation_left'],
                    'amputation_digit_right' => $model->record_complete['amputation_digit_right'],
                    'amputation_digit_left' => $model->record_complete['amputation_digit_left'],
                    'prosthesis_right' => $model->record_complete['prosthesis_right'],
                    'prosthesis_left' => $model->record_complete['prosthesis_left'],
                    'prosthesis_for_right' => $model->record_complete['prosthesis_for_right'],
                    'prosthesis_for_left' => $model->record_complete['prosthesis_for_left'],
                    'revascularization_right' => $model->record_complete['revascularization_right'],
                    'revascularization_left' => $model->record_complete['revascularization_left']
                ];
                $model->record_complete = Json::encode($record_complete);
                $model->save(false);
                return $model;

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
