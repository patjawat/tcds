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
                    'occupation_other' => $model->record_complete['occupation_other'],
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
                    'revascularization_left' => $model->record_complete['revascularization_left'],
                    'right_evt' => $model->record_complete['right_evt'],
                    'right_evt_date' => $model->record_complete['right_evt_date'],
                    'right_evt_note' => $model->record_complete['right_evt_note'],
                    'right_bypass' => $model->record_complete['right_bypass'],
                    'right_bypass_date' => $model->record_complete['right_bypass_date'],
                    'right_bypass_note' => $model->record_complete['right_bypass_note'],
                    'right_hybrid' => $model->record_complete['right_hybrid'],
                    'right_hybrid_date' => $model->record_complete['right_hybrid_date'],
                    'right_hybrid_note' => $model->record_complete['right_hybrid_note'],
                    'left_evt' => $model->record_complete['left_evt'],
                    'left_evt_date' => $model->record_complete['left_evt_date'],
                    'left_evt_note' => $model->record_complete['left_evt_note'],
                    'left_bypass' => $model->record_complete['left_bypass'],
                    'left_bypass_date' => $model->record_complete['left_bypass_date'],
                    'left_bypass_note' => $model->record_complete['left_bypass_note'],
                    'left_hybrid' => $model->record_complete['left_hybrid'],
                    'left_hybrid_date' => $model->record_complete['left_hybrid_date'],
                    'left_hybrid_note' => $model->record_complete['left_hybrid_note'],
                    'chief_complaint' => $model->record_complete['chief_complaint'],
                    'dermatologic_examination' => $model->record_complete['dermatologic_examination'],
                    'hair_loss_right' => $model->record_complete['hair_loss_right'],
                    'hair_loss_left' => $model->record_complete['hair_loss_left'],
                    'fungal_infection_right' => $model->record_complete['fungal_infection_right'],
                    'fungal_infection_left' => $model->record_complete['fungal_infection_left'],
                    'color_change_right' => $model->record_complete['color_change_right'],
                    'color_change_left' => $model->record_complete['color_change_left'],
                    'skin_condition_left' => $model->record_complete['skin_condition_left'],
                    'skin_condition_right' => $model->record_complete['skin_condition_right'],
                    'interspace_right' => $model->record_complete['interspace_right'],
                    'interspace_left' => $model->record_complete['interspace_left'],
                    'callus_left' => $model->record_complete['callus_left'],
                    'callus_right' => $model->record_complete['callus_right'],
                    'callus_select_right' => $model->record_complete['callus_select_right'],
                    'callus_select_left' => $model->record_complete['callus_select_left'],
                    'temperature_change_right' => $model->record_complete['temperature_change_right'],
                    'temperature_change_left' => $model->record_complete['temperature_change_left'],
                    'toenail_problem_right' => $model->record_complete['toenail_problem_right'],
                    'toenail_problem_left' => $model->record_complete['toenail_problem_left'],
                    'toenail_problem_left' => $model->record_complete['toenail_problem_left'],
                    'fungal_nail_left' => $model->record_complete['fungal_nail_left'],
                    'hypertrophic_left' => $model->record_complete['hypertrophic_left'],
                    'distrophic_left' => $model->record_complete['distrophic_left'],
                    'discolored_left' => $model->record_complete['discolored_left'],
                    'elongated_left' => $model->record_complete['elongated_left'],
                    'ingrown_left' => $model->record_complete['ingrown_left'],
                    'involuted_left' => $model->record_complete['involuted_left'],
                    'splitting_left' => $model->record_complete['splitting_left'],
                    'toenail_problem_right' => $model->record_complete['toenail_problem_right'],
                    'fungal_nail_right' => $model->record_complete['fungal_nail_right'],
                    'hypertrophic_right' => $model->record_complete['hypertrophic_right'],
                    'distrophic_right' => $model->record_complete['distrophic_right'],
                    'discolored_right' => $model->record_complete['discolored_right'],
                    'elongated_right' => $model->record_complete['elongated_right'],
                    'ingrown_right' => $model->record_complete['ingrown_right'],
                    'involuted_right' => $model->record_complete['involuted_right'],
                    'splitting_right' => $model->record_complete['splitting_right'],
                ];
                $model->record_complete = Json::encode($record_complete);
                $model->save(false);
                return $model->record_complete;

            }else{
               
                if (Yii::$app->request->isAjax) {
                    Yii::$app->response->format = Response::FORMAT_JSON;
                return $this->renderAjax('index', [
                    'model' => $model,
                ]);
                }else{
                    return $this->render('index', [
                        'model' => $model,
                    ]);
                }
        }
    }

}