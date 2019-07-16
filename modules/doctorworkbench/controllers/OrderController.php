<?php

namespace app\modules\doctorworkbench\controllers;

use yii;
use yii\filters\AccessControl;
use yii\helpers\Json;
use app\modules\doctorworkbench\models\CIcd10tm;
use app\modules\doctorworkbench\models\PccDiagnosis;
use app\modules\doctorworkbench\models\PccDiagnosisSearch;
use app\modules\lab\models\Hoslab;
use app\modules\lab\models\HoslabSearch;
use app\modules\lab\models\Pcclab;
use app\modules\lab\models\PcclabSearch;
use app\modules\lab\models\Preorderlab;
use app\modules\drug\models\Hosdrug;
use app\modules\drug\models\HosdrugSearch;
use app\modules\lab\models\PreorderlabSeach; 
    
use app\modules\emr\models\PccService;
use app\modules\emr\models\PccServiceSearch;
use app\modules\chiefcomplaint\models\Pccservicecc;
use app\modules\chiefcomplaint\models\PccserviceccSearch;
use app\modules\treatment\models\Treatmentplan;
use app\modules\treatment\models\TreatmentplanSearch;
use app\modules\emr\models\GatewayEmrVisit;
use app\modules\emr\models\GatewayEmrVisitSearch;
use app\modules\chiefcomplaint\models\Pccservicepi;
use app\modules\chiefcomplaint\models\PccservicepiSearch;
use app\modules\chiefcomplaint\models\Pccservicepe;
use app\modules\chiefcomplaint\models\PccservicepeSearch;
use app\modules\drug\models\Pccmed;
use app\modules\drug\models\PccmedSearch;
    
use yii\web\Controller;
use app\modules\appointment\models\PccAppoinmentShow;
use app\components\PatientHelper;
use app\components\VisitController;
    

use app\modules\education\models\PccServiceEducation;
use app\modules\education\models\PccServiceEducationSearch;



class OrderController extends VisitController
{




    public function behaviors()
    {
        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'only' => ['index','procedure'
//                            ,'appointment','emr','pre-order-lab','lab','drug','treatmment-plan'
//                            ,'cc','pi','pe','education','icd10-list'],
//                'rules' => [
//                    [
//                        'actions' => ['index','procedure'
//                                        ,'appointment','emr','pre-order-lab','lab','drug','treatmment-plan'
//                                        ,'cc','pi','pe','education','icd10-list'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
//                ],
//            ],

        ];
    }
    
    public function actionIndex()
    {
        $modelPccDiagnosis = new PccDiagnosis();
        $searchModelPccDiagnosis = new PccDiagnosisSearch();
        $dataProviderPccDiagnosis = $searchModelPccDiagnosis->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'modelPccDiagnosis' => $modelPccDiagnosis,
            'searchModelPccDiagnosis' => $searchModelPccDiagnosis,
            'dataProviderPccDiagnosis' => $dataProviderPccDiagnosis,
        ]);
    }

    public function actionProcedure(){
        return $this->render('procedure');
    }
    public function actionAppointment() {
         $cid = PatientHelper::getCurrentCid();
        $events = PccAppoinmentShow::find()->where(['cid' => $cid])->all();
        
        
        
        $masker = [];
        foreach ($events as $eve) {
            
            $event = new \yii2fullcalendar\models\Event();
            $event->id = $eve->id;
            $event->title = $eve->clinic_text;
            $event->start = $eve->startdate;
            $event->end = $eve->enddate;
            $event->backgroundColor = $eve->color;
            $masker[] = $event;
        }
        
        //--- table --
        /*$query = GatewayEmrAppointment::find()
         ->select(["gateway_emr_appointment.hospname","p.hn","date_visit","time_visit","appoint_date","appoint_detail","p.cid","clinic"])
         ->leftJoin("pcc_patient p","p.hn = gateway_emr_appointment.hn")
         ->where(["p.cid" => '3200700311770']);*/
        $sql="SELECT * FROM (
        SELECT a.hospcode,a.hospname,a.hn,a.vn,a.date_visit,a.clinic,a.appoint_date,a.appoint_detail,a.appoint_doctor
        FROM gateway_emr_appointment  a
        where a.cid='$cid'
        UNION ALL
        SELECT a.hospcode,a.hospname,a.hn,a.vn,a.date_service,a.clinic,a.appoint_date,a.detail,'' AS doctor
        FROM pcc_appointment a
        where a.cid='$cid') AS t1
        ORDER BY date_visit DESC";
        $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new \yii\data\ArrayDataProvider([
                                                        'allModels'=>$rawData,
                                                        'pagination'=>[
                                                        'pageSize'=>20
                                                        ]
                                                        ]);
        
        /*$dataProvider = new yii\data\ActiveDataProvider([
         'query' => $query,
         'pagination' => [
         'pageSize' => 10,
         ],
         ]);*/
        
        
        return $this->render('appointment', [
                             'events' => $masker,
                             'dataProvider' => $dataProvider
                             ]);
    }

    public function actionEmr($cid=NULL){
        $cid = PatientHelper::getCurrentCid();
        $pcc_vn = PatientHelper::getCurrentVn();
        $searchModel = new GatewayEmrVisitSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where(['cid' => $cid]);
        $dataProvider->query->orderBy('date_visit DESC');
        $dataProvider->pagination->pageSize = 10;


        return $this->render('emr',[
                             'searchModel' => $searchModel,
                             'dataProvider' => $dataProvider,
                             'cid'=>$cid
                             ]);
        
    }
    public function actionPreOrderLab(){
        $id = Yii::$app->request->get('id');
        $cid = PatientHelper::getCurrentCid();
        $pcc_vn = PatientHelper::getCurrentVn();
        
        $searchModel = new PreorderlabSeach();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where(['cid' => $cid,'pcc_vn' => $pcc_vn]);
        $dataProvider->query->orderBy('id DESC');
        if($id){
            $model = Preorderlab::find()->where(['id' => $id])->one(); 
            if(!$model){
                return $this->redirect(['/doctorworkbench/order/pre-order-lab']);
            }
           $model->lab_request_date = $model->thaidate($model->lab_request_date);
           $model->lab_result_date = $model->thaidate($model->lab_result_date);

        }else{
           $model = new Preorderlab();
           $model->lab_request_date = $model->thaidate(Date('Y-m-d'));
        }
        return $this->render('pre_order_lab', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,

        ]);
        

    }

    public function actionLab($cid=NULL)
    {
        $cid = PatientHelper::getCurrentCid();
        $pcc_vn = PatientHelper::getCurrentVn();
        $searchModel = new PcclabSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where(['cid' => $cid]);
        $dataProvider->query->orderBy('date_visit DESC');


        $model = new Pcclab(); 

        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
               return   $this->renderAjax('lab',[
                     'searchModel' => $searchModel,
                     'dataProvider' => $dataProvider,
                     'model' => $model
                     ]);
             } else {
                return $this->render('lab', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'model' => $model
                ]);
            }
    }

    public function actionDrug(){
        $cid = PatientHelper::getCurrentCid();
        $pcc_vn = PatientHelper::getCurrentVn();
        $searchModel = new PccmedSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where(['cid' => $cid]);
        $dataProvider->query->orderBy('date_visit DESC');

        return $this->render('drug', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }
        
    public function actionTreatmmentPlan(){
        $model = new Treatmentplan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('treatmment_plan', [
            'model' => $model,
        ]);
    }

    public function actionCc(){
        $model = new \app\modules\chiefcomplaint\models\Pccservicecc();
        $cid = PatientHelper::getCurrentCid();
        
        $searchModel = new \app\modules\chiefcomplaint\models\PccserviceccSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where(['cid' => $cid]);
        $dataProvider->query->orderBy('date_service DESC ');
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        
        return $this->render('cc', [
                             'model' => $model,
                             'dataProvider'=>$dataProvider
                             ]);
        
    }

    public function actionEducation(){
        
        $model = new PccServiceEducation();
        $vn= PatientHelper::getCurrentVn();
        $cid =PatientHelper::getCurrentCid();
        $searchModel = new PccServiceEducationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where(['cid' => $cid,'pcc_vn'=>$vn]);
        $dataProvider->query->orderBy('date_service ASC');
        return $this->render('education', [
                             'model'=>$model,
                             'dataProvider'=>$dataProvider
                             ]);
    }

    public function actionPi()
    {
        $model = new \app\modules\chiefcomplaint\models\Pccservicepi;
        $cid = PatientHelper::getCurrentCid();
        
        $searchModel = new \app\modules\chiefcomplaint\models\PccservicepiSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where(['cid' => $cid]);
        $dataProvider->query->orderBy('date_service DESC ');
        
        
        
        return $this->render('pi', [
                             'model' => $model,
                             'dataProvider'=>$dataProvider
                             ]);
        
        
    }
    
    public function actionPe()
    {
        $model = new \app\modules\chiefcomplaint\models\Pccservicepe();
        $cid = PatientHelper::getCurrentCid();
        
        $searchModel = new \app\modules\chiefcomplaint\models\PccservicepeSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where(['cid' => $cid]);
        $dataProvider->query->orderBy('date_service DESC ');
        
        
        
        return $this->render('pe', [
                             'model' => $model,
                             'dataProvider'=>$dataProvider
                             ]);
        
        
        
    }

        public function actionIcd10List($q = null, $id = null){
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON; //กำหนดการแสดงผลข้อมูลแบบ json
            $out = ['results'=>['diagcode'=>'','text'=>'']];
            if(!is_null($q)){
                $query = new \yii\db\Query();
                $query->select('diagcode as id, diagcode as text')
                        ->from('c_icd10tm')
                        ->where("diagcode LIKE '%".$q."%'")
                        ->limit(20);
                $command = $query->createCommand();
                $data = $command->queryAll();
                $out['results'] = array_values($data);
            }else if($id>0){
                $out['results'] = ['diagcode'=>$id, 'text'=>  CIcd10tm::find($id)->diagcode];
            }
            return $out;
        }


}
