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

class FootAssessmentController extends Controller
{
    public function actionIndex()
    {
        $pcc_vn = PatientHelper::getCurrentPccVn();
        $vn = PatientHelper::getCurrentVn();
        $hn = PatientHelper::getCurrentHn();
        $checkvn = FootAssessment::findOne(['vn' => $vn]);
        if ($checkvn) {
            $requester = $checkvn->requester;
            $model = $checkvn;
            $model->requester = '';
            $model->record_complete = Json::decode($model->record_complete);
        } else {
            $model = new FootAssessment();
            $requester = null;
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
                'splitting_left' => $model->record_complete['splitting_left'],

                'skin_sesion_right' => $model->record_complete['skin_sesion_right'],
                'skin_sesion_callus_right' => $model->record_complete['skin_sesion_callus_right'],
                'skin_sesion_callus_number_right' => $model->record_complete['skin_sesion_callus_number_right'],
                'skin_sesion_left' => $model->record_complete['skin_sesion_left'],
                'skin_sesion_callus_left' => $model->record_complete['skin_sesion_callus_left'],
                'skin_sesion_callus_number_left' => $model->record_complete['skin_sesion_callus_number_left'],

                'skin_sesion_corn_right' => $model->record_complete['skin_sesion_corn_right'],
                'skin_sesion_corn_number_right' => $model->record_complete['skin_sesion_corn_number_right'],
                'skin_sesion_corn_left' => $model->record_complete['skin_sesion_corn_left'],
                'skin_sesion_corn_left' => $model->record_complete['skin_sesion_corn_left'],
                'skin_sesion_corn_number_left' => $model->record_complete['skin_sesion_corn_number_left'],

                'skin_sesion_callus_right' => $model->record_complete['skin_sesion_callus_right'],
                'skin_sesion_callus_number_right' => $model->record_complete['skin_sesion_callus_number_right'],
                'skin_sesion_callus_left' => $model->record_complete['skin_sesion_callus_left'],
                'skin_sesion_callus_left' => $model->record_complete['skin_sesion_callus_left'],
                'skin_sesion_callus_number_left' => $model->record_complete['skin_sesion_callus_number_left'],


                'skin_sesion_wart_right' => $model->record_complete['skin_sesion_wart_right'],
                'skin_sesion_wart_number_right' => $model->record_complete['skin_sesion_wart_number_right'],
                'skin_sesion_wart_left' => $model->record_complete['skin_sesion_wart_left'],
                'skin_sesion_wart_left' => $model->record_complete['skin_sesion_wart_left'],
                'skin_sesion_wart_number_left' => $model->record_complete['skin_sesion_wart_number_left'],
                
                'silfverskiold_test_right' => $model->record_complete['silfverskiold_test_right'],
                'silfverskiold_test_left' => $model->record_complete['silfverskiold_test_left'],

                'deformities_right' => $model->record_complete['deformities_right'],
                'deformities_left' => $model->record_complete['deformities_left'],

                'claw_toe_right' => $model->record_complete['claw_toe_right'],
                'claw_toe_left' => $model->record_complete['claw_toe_left'],

                'hammer_toe_right' => $model->record_complete['hammer_toe_right'],
                'hammer_toe_left' => $model->record_complete['hammer_toe_left'],

                'mallet_toe_right' => $model->record_complete['mallet_toe_right'],
                'mallet_toe_left' => $model->record_complete['mallet_toe_left'],

                'hallux_valgus_right' => $model->record_complete['hallux_valgus_right'],
                'hallux_valgus_left' => $model->record_complete['hallux_valgus_left'],

                'hallux_varus_right' => $model->record_complete['hallux_varus_right'],
                'hallux_varus_left' => $model->record_complete['hallux_varus_left'],

                'hallux_igidus_right' => $model->record_complete['hallux_igidus_right'],
                'hallux_igidus_left' => $model->record_complete['hallux_igidus_left'],

                'bunion_right' => $model->record_complete['bunion_right'],
                'bunion_left' => $model->record_complete['bunion_left'],

                'bunionette_right' => $model->record_complete['bunionette_right'],
                'bunionette_left' => $model->record_complete['bunionette_left'],

                'charcot_foot_right' => $model->record_complete['charcot_foot_right'],
                'charcot_foot_left' => $model->record_complete['charcot_foot_left'],
                
                'post_surgical_deformity_right' => $model->record_complete['post_surgical_deformity_right'],
                'post_surgical_deformity_left' => $model->record_complete['post_surgical_deformity_left'],

                'neuropathic_symptom_right' => $model->record_complete['neuropathic_symptom_right'],
                'neuropathic_symptom_left' => $model->record_complete['neuropathic_symptom_left'],

                'neuropathic_symptom_specify_right' => $model->record_complete['neuropathic_symptom_specify_right'],
                'neuropathic_symptom_specify_left' => $model->record_complete['neuropathic_symptom_specify_left'],

                'tuning_fork_right' => $model->record_complete['tuning_fork_right'],
                'tuning_fork_left' => $model->record_complete['tuning_fork_left'],

                'vascular_symptom_right' => $model->record_complete['vascular_symptom_right'],
                'vascular_symptom_left' => $model->record_complete['vascular_symptom_left'],
                
                'intermittent_claudication_right' => $model->record_complete['intermittent_claudication_right'],
                'intermittent_claudication_left' => $model->record_complete['intermittent_claudication_left'],
                
                'rest_pain_right' => $model->record_complete['rest_pain_right'],
                'rest_pain_left' => $model->record_complete['rest_pain_left'],

                'gangrene_right' => $model->record_complete['gangrene_right'],
                'gangrene_left' => $model->record_complete['gangrene_left'],

                'pitting_edema_right' => $model->record_complete['pitting_edema_right'],
                'pitting_edema_left' => $model->record_complete['pitting_edema_left'],
                
                'non_pitting_edema_right' => $model->record_complete['non_pitting_edema_right'],
                'non_pitting_edema_left' => $model->record_complete['non_pitting_edema_left'],

                'doppler_right' => $model->record_complete['doppler_right'],
                'doppler_left' => $model->record_complete['doppler_left'],


                'abi1_right' => $model->record_complete['abi1_right'],
                'abi2_right' => $model->record_complete['abi2_right'],
                'abi1_left' => $model->record_complete['abi1_left'],
                'abi2_left' => $model->record_complete['abi2_left'],

                'abi_compressible_right' => $model->record_complete['abi_compressible_right'],
                'abi_compressible_left' => $model->record_complete['abi_compressible_left'],

                'tbi1_right' => $model->record_complete['tbi1_right'],
                'tbi2_right' => $model->record_complete['tbi2_right'],
                'tbi1_left' => $model->record_complete['tbi1_left'],
                'tbi2_left' => $model->record_complete['tbi2_left'],
                

                'toe_pressure_right' => $model->record_complete['toe_pressure_right'],
                'toe_pressure_left' => $model->record_complete['toe_pressure_left'],

              

                'dp_right' => $model->record_complete['dp_right'],
                'pt_left' => $model->record_complete['pt_left'],

                'foot_size' => $model->record_complete['foot_size'],
                'footwear_indoor' => $model->record_complete['footwear_indoor'],
                'footwear_indoor_other' => $model->record_complete['footwear_indoor_other'],
                'footwear_outdoor' => $model->record_complete['footwear_outdoor'],
                'footwear_outdoor_other' => $model->record_complete['footwear_outdoor_other'],
                'footwear_exercise' => $model->record_complete['footwear_exercise'],
                'footwear_exercise_other' => $model->record_complete['footwear_exercise_other'],

                'stock' => $model->record_complete['stock'],
                'stock_use' => $model->record_complete['stock_use'],
                'patient_care' => $model->record_complete['patient_care'],
                'general_footcare_check' => $model->record_complete['general_footcare_check'],
                'general_footcare_item' => $model->record_complete['general_footcare_item'],
                'foot_take_care' => $model->record_complete['foot_take_care'],
                'foot_patient_check' => $model->record_complete['foot_patient_check'],
                'foot_categorization' => $model->record_complete['foot_categorization'],
                'foot_suggestion' => $model->record_complete['foot_suggestion'],
                
                
            ];
            $model->record_complete = Json::encode($record_complete);
            if($model->save(false)){
                return $this->redirect(['/foot/foot-assessment']);
            }
        } else {

            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return $this->renderAjax('index', [
                    'model' => $model,
                    'requester' => $requester
                ]);
            } else {
                return $this->render('index', [
                    'model' => $model,
                    'requester' => $requester
                ]);
            }
        }
    }
}
