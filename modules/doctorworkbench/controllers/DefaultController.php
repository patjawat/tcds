<?php

namespace app\modules\doctorworkbench\controllers;
use Yii;
// use app\components\VisitController as Controller;
use yii\web\Controller;
use app\modules\doctorworkbench\models\Diagnosis;
use app\modules\doctorworkbench\models\DiagnosisSearch;
use app\modules\doctorworkbench\models\Medication;
use app\modules\doctorworkbench\models\MedicationSearch;
use app\modules\doctorworkbench\models\HisPatient;
use app\modules\opdvisit\models\OpdVisit;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\helpers\Json;
use app\components\PatientHelper;
use app\components\UserHelper;
use app\modules\doctorworkbench\controllers\DfController;

class DefaultController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSummaryItems()
    {
        $diagSearchModel = new DiagnosisSearch();
        $diagDataProvider = $diagSearchModel->search(Yii::$app->request->queryParams);

        $medicationSearchModel = new MedicationSearch();
        $medicationDataProvider = $medicationSearchModel->search(Yii::$app->request->queryParams);

        if(Yii::$app->request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $this->renderAjax('summery_items', [
                'diagSearchModel' => $diagSearchModel,
                'diagDataProvider' => $diagDataProvider,
                'medicationSearchModel' => $medicationSearchModel,
                'medicationDataProvider' => $medicationDataProvider,
                
            ]);
            }else{
                return $this->render('summery_items', [
                    'diagSearchModel' => $diagSearchModel,
                    'diagDataProvider' => $diagDataProvider,
                    'medicationSearchModel' => $medicationSearchModel,
                    'medicationDataProvider' => $medicationDataProvider,
                ]);
            }
    }

    public function actionSetting(){
        if(Yii::$app->request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => '<i class="fas fa-pencil-ruler"></i> ตั้งค่าห้องตรวจ',
                'content' => $this->renderAjax('setting'),
                'footer' => ''//Html::button('บันทึก',['class' => 'btn btn-success'])
            ];
        }else{
            return $this->render('setting');
        }
    }

    public function actionClearHelper(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        PatientHelper::clearCurrent();
        return $this->redirect(['/doctorworkbench']);
    }

    public function actionCheckOutConfirm(){
        Yii::$app->response->format = Response::FORMAT_JSON;

        $vn =  PatientHelper::getCurrentVn();
        $pcc_vn = PatientHelper::getCurrentPccVn();
        $hn =  PatientHelper::getCurrentHn();

        //ตรวจการคิดค่าแพทย์
        $df  = DfController::DfCount();
        $med = Medication::find()->where(['vn' => $vn,'pcc_vn' => $pcc_vn,'hn' => $hn,])->count();

        $model = OpdVisit::findOne([
            'vn' => $vn,
            'pcc_vn' => $pcc_vn,
            'hn' => $hn,
            'checkout' => 'N',
            ]);
            //  return $model;
            if($med == 0){  // ตรวจสอบการจ่ายยา
                return [
                    'status' => false,
                    'msg' => 'ยังไม่มีการสั่งจ่ายยา'
                ];
               
        }else if($df == 0){
            return [
                'status' => false,
                'msg' => 'ยังไม่คิดค่าบริการทางการแทพย์'
            ];
        }else {
            return [
                'status' => true,
                'msg' => 'ยืนยันการ checkout !!'
            ];
            //  $model->checkout = 'Y';
            //     if($model->save()){
            //           PatientHelper::clearCurrent();
            //     return $this->redirect(['/doctorworkbench']);

            //     }else{
            //         return $this->redirect(['/doctorworkbench']);
            //     } 
                // return $model;
        }
    }

    public function actionCheckOut(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $vn =  PatientHelper::getCurrentVn();
        $pcc_vn = PatientHelper::getCurrentPccVn();
        $hn =  PatientHelper::getCurrentHn();

        //ตรวจการคิดค่าแพทย์
        $df  = DfController::DfCount();
        $med = Medication::find()->where(['vn' => $vn,'pcc_vn' => $pcc_vn,'hn' => $hn,])->count();

        $model = OpdVisit::findOne([
            'vn' => $vn,
            'pcc_vn' => $pcc_vn,
            'hn' => $hn,
            'checkout' => 'N',
            ]);
            //  return $model;
            if($med == 0){  // ตรวจสอบการจ่ายยา
                return [
                    'status' => false,
                    'msg' => 'ยังไม่มีการสั่งจ่ายยา'
                ];
               
        }else if($df == 0){
            return [
                'status' => false,
                'msg' => 'ยังไม่คิดค่าบริการทางการแทพย์'
            ];
        }else {
             $model->checkout = 'Y';
                if($model->save()){
                      PatientHelper::clearCurrent();
                return $this->redirect(['/doctorworkbench']);

                }else{
                    return $this->redirect(['/doctorworkbench']);
                } 
                // return $model;
        }
            
    }

    public function actionDoctorOf(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $hn =  PatientHelper::getCurrentHn();
        $patient = HisPatient::findOne(['hn' => $hn]);
        $patient ? $fullname  = $patient->prefix ? $patient->prefix : ''.$patient->fname.' '.$patient->lname : $fallname = '';
       $doctor = $patient ? $patient->doctor_id : '';
       $doctor_now = UserHelper::getUser('doctor_id');
        if($doctor == $doctor_now){
            return [
                'status' => true,
               'doctor_id' => $patient->doctor_id ? UserHelper::getDoctorIs($patient->doctor_id) :'',
               'patient' => $fullname
            ];

        }else{
            return [
                'status' => false,
               'doctor_id' => $patient->doctor_id ? UserHelper::getDoctorIs($patient->doctor_id) :'',
               'patient' => $fullname
            ];
        }
    }

    public function actionDoctorOfConfirm(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $hn =  PatientHelper::getCurrentHn();
        $model = HisPatient::findOne(['hn' => $hn]);
       $model->doctor_id = UserHelper::getUser('doctor_id');
    //    $doctor_history = [
    //     date('Y-m-d His') => $model->doctor_history['66'],
    //    ];
    //    $model->doctor_history = Json::encode($doctor_history);
        if($model->save(false)){
            return [
                'status' => true,
            ];
        }else{
            return [
                'status' => false,
            ];
        }
    }


    
public function actionPacs(){
   return  $this->render('pacs');
}

}