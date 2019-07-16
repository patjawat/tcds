<?php

namespace app\modules\dmindicators\controllers;
use app\modules\dmindicators\models\DmIndicators;
use app\modules\dmindicators\models\DmIndicatorsSearch;
use yii;
// use yii\web\Controller;
use app\components\VisitController as Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use app\components\PatientHelper;
use \yii\web\Response;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $pcc_vn = PatientHelper::getCurrentPccVn();
        $vn = PatientHelper::getCurrentVn();
        $hn = PatientHelper::getCurrentHn();
        $checkvn = DmIndicators::findOne(['vn' => $vn]);


        if ($checkvn) {
            $model = $checkvn;
        } else {
            $model = new DmIndicators();
        }

        if ($model->load(Yii::$app->request->post())) {
            // Yii::$app->response->format = Response::FORMAT_JSON;

            // return $this->redirect(['view', 'id' => $model->id]);
            $eye_out_hos = [
                'no_dr' => $model->eye_out_hos['no_dr'],
                'dme' => $model->eye_out_hos['dme'],
                'npdr' => $model->eye_out_hos['npdr'],
                'mile' => $model->eye_out_hos['mile'],
                'servere' => $model->eye_out_hos['servere'],
                'PRD' => $model->eye_out_hos['PRD'],
                'laser_rx' => $model->eye_out_hos['laser_rx'],
                'no_laser_rx' => $model->eye_out_hos['no_laser_rx'],
                'pdr_with_hrc' => $model->eye_out_hos['pdr_with_hrc'],
                'cataract' => $model->eye_out_hos['cataract'],
                'cataract_no' => $model->eye_out_hos['cataract_no'],
                'cataract_yes' => $model->eye_out_hos['cataract_yes'],
                'operation' => $model->eye_out_hos['operation'],
                'glaucerna' => $model->eye_out_hos['glaucerna'],
                'glaucerna_no' => $model->eye_out_hos['glaucerna_no'],
                'glaucerna_yes' => $model->eye_out_hos['glaucerna_yes'],
                'no_slit_lamp_exam' => $model->eye_out_hos['no_slit_lamp_exam'],
                // 'neuropathy_vaseular' => $model->neuropathy_vaseular['neuropathy_vaseular']
            ];

            $neuropathy_vaseular = [
                'mnf_rt' => $model->neuropathy_vaseular['mnf_rt'],
                'vt_rt' => $model->neuropathy_vaseular['vt_rt'],
                'dp_rt' => $model->neuropathy_vaseular['dp_rt'],
                'pt_rt' => $model->neuropathy_vaseular['pt_rt'],
                'mnf_lt' => $model->neuropathy_vaseular['mnf_lt'],
                'vt_lt' => $model->neuropathy_vaseular['vt_lt'],
                'dp_lt' => $model->neuropathy_vaseular['dp_lt'],
                'pt_lt' => $model->neuropathy_vaseular['pt_lt'],
            ];
            $smoking = [
                'check' => $model->smoking['check'],
                'check_how_long_ago' => $model->smoking['check_how_long_ago'],
            ];

            $blindness = [
                'rt' => $model->blindness['rt'],
                'lt' => $model->blindness['lt']
            ];
            $tds = [
                'unsuitable' => $model->tds['unsuitable'],
                'other_hospital' => $model->tds['other_hospital'],
                'dead' => $model->tds['dead']
            ];
            $flu_vaccine = [
                'out_hospital' => $model->flu_vaccine['out_hospital']
            ];

            $foot_and_toe = [
                'rt' => $model->foot_and_toe['rt'],
                'lt' => $model->foot_and_toe['lt']
            ];

            $macrovascular = [
                'items' => $model->macrovascular['items'],
                'item1_date' => $model->macrovascular['item1_date'],
                'item2_date' => $model->macrovascular['item2_date'],
                'item3_date' => $model->macrovascular['item3_date']
            ];

            $target_of_control = [
                'a1c' => $model->target_of_control['a1c'],
                'bp1' => $model->target_of_control['bp1'],
                'bp2' => $model->target_of_control['bp2'],
                'ldlc' => $model->target_of_control['ldlc']
            ];

            $model->eye_out_hos = Json::encode($eye_out_hos);
            $model->neuropathy_vaseular = Json::encode($neuropathy_vaseular);
            $model->smoking = Json::encode($smoking);
            $model->blindness = Json::encode($blindness);
            $model->tds = Json::encode($model->tds);
            $model->flu_vaccine = Json::encode($model->flu_vaccine);
            $model->foot_and_toe = Json::encode($model->foot_and_toe);
            $model->macrovascular = Json::encode($model->macrovascular);
            $model->target_of_control = Json::encode($model->target_of_control);
          return  $model->save(FALSE);
    //    return $model;
        }else{

        $model->eye_out_hos = Json::decode($model->eye_out_hos);
        $model->neuropathy_vaseular = Json::decode($model->neuropathy_vaseular);
        $model->smoking = Json::decode($model->smoking);
        $model->blindness = Json::decode($model->blindness);
        $model->tds = Json::decode($model->tds);
        $model->flu_vaccine = Json::decode($model->flu_vaccine);
        $model->foot_and_toe = Json::decode($model->foot_and_toe);
        $model->macrovascular = Json::decode($model->macrovascular);
        $model->target_of_control = Json::decode($model->target_of_control);
        


        return $this->render('index', [
            'model' => $model
        ]);





        }
        
    }
}