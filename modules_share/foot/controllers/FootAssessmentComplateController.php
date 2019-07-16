<?php

namespace app\modules_share\foot\controllers;
use yii;
use app\modules_share\foot\models\SFootAssessmentComplate;
use app\components\PatientHelper;
use app\components\MessageHelper;
use yii\web\Response;
use app\components\VisitController;

class FootAssessmentComplateController extends VisitController
{
    public function actionIndex()
    {
        $request = Yii::$app->request;
        $hn = PatientHelper::getCurrentHn();
        $vn = PatientHelper::getCurrentVn();
        $Sdate = PatientHelper::getDateVisitByVn($vn);
        $Stime = PatientHelper::getTimeVisitByVn($vn);
        $visit = SFootAssessmentComplate::findOne(['hn' => $hn,'vn' => $vn]);
        if($visit){
            $model = SFootAssessmentComplate::findOne(['hn' => $hn,'vn' => $vn]);
            $model->requester = '';
        }else{
            $model = new SFootAssessmentComplate();
        }
 
        if ($model->load($request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $model->hn = $hn;
            $model->vn = $vn;
            $model->date_start_service = $Sdate;
            $model->time_start_service = $Stime;
            $model->save(FALSE);
            // if($model->requester){
            //     MessageHelper::setFlashSuccess('บันทึกข้อมูลสำเร็จ');
            //     return $this->redirect(['/foot/foot-assessment-complate']);
            //  }else{ 
            //     //  return ['data' => $model->previous_foot_ulcer];
            //      return ['data' => $model];
            //     }
                return ['data' => $request->post()];

        } else {
            return $this->render('index',[
                'model' => $model,
                'hn' => $hn,
                'vn' => $vn
                ]);
        }
        
    }
    

}
