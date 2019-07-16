<?php

namespace app\modules_share\foot\controllers;
use app\modules_share\foot\models\SFootUlcerFirstOpd;
use yii;
use app\components\PatientHelper;
use app\components\VisitController;
use yii\web\Response;
use app\components\MessageHelper;


class FootUlcerFirstOpdController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $request = Yii::$app->request;
        $hn = PatientHelper::getCurrentHn();
        $vn = PatientHelper::getCurrentVn();
        $Sdate = PatientHelper::getDateVisitByVn($vn);
        $Stime = PatientHelper::getTimeVisitByVn($vn);
        $visit = SFootUlcerFirstOpd::findOne(['hn' => $hn,'vn' => $vn]);
        if($visit){
            $model = SFootUlcerFirstOpd::findOne(['hn' => $hn,'vn' => $vn]);
            $model->requester = '';
        }else{
            $model = new SFootUlcerFirstOpd();
        }
        if ($model->load($request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $model->hn = $hn;
            $model->vn = $vn;
            $model->date_start_service = $Sdate;
            $model->time_start_service = $Stime;
            $model->save();
            if($model->requester){
                MessageHelper::setFlashSuccess('บันทึกข้อมูลสำเร็จ');
                return $this->redirect(['/foot/foot-ulcer-first-opd']);
             }else{
                return ['data' => 'success'];
            }
        } else {
            return $this->render('index',[
                'model' => $model,
                'hn' => $hn,
                'vn' => $vn
                ]);
        }
    }
    

}
