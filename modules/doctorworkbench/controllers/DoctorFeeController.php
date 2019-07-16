<?php

namespace app\modules\doctorworkbench\controllers;

use Yii;
use app\modules\doctorworkbench\models\DoctorFree;
use app\modules\doctorworkbench\models\DoctorFreeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use app\components\PatientHelper;
use app\components\DbHelper;
use app\components\UserHelper;
use JsonRpc;


class DoctorFreeController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {

        $searchModel = new DoctorFreeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->Where([
            'pcc_vn' => PatientHelper::getCurrentPccVn(),
            'vn' => PatientHelper::getCurrentVn(),
            'hn' => PatientHelper::getCurrentHn(),
            'delete_status' => 'N'
            ]);
        if(Yii::$app->request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
        return $this->renderAjax('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        }else {
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new DoctorFree();

        if ($model->load(Yii::$app->request->post())) {
            $model->hn = PatientHelper::getCurrentHn();
            $model->vn = PatientHelper::getCurrentVn();
            $model->pcc_vn = PatientHelper::getCurrentPccVn();

            Yii::$app->response->format = Response::FORMAT_JSON;

            $sql = "select right(concat('F',DATE_FORMAT(now(), '%y'),'000000',COALESCE(MAX(right(id,2)),0)+1),10) as next_number  from df";
            $query = DbHelper::queryOne('db',$sql);
            
            $id =  $query['next_number'];


            $model->id = $id;
            $model->delete_status = 'N';
            // $DfHis = $this->HisCheck($id,$mdoel->price);
            $DfHis = $this->HisCheck($model);
            // return $DfHis;
            if($DfHis['error']){
                return $DfHis;
            }else {
               $model->save();
               return $model;
                
            }
          
            
            // if(Yii::$app->request->isAjax){
            //     Yii::$app->response->format = Response::FORMAT_JSON;
            //    // return $id;
            //    return $DfHis['error'];
            // }else {
            // // return $this->redirect(['view', 'id' => $model->id]);
            // }
        }

        if(Yii::$app->request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
            }else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
       
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {

        $model = $this->findModel($id);
        $url = PatientHelper::getUrl().'DFRpcS';
        //$url = 'http://61cd1fe0.ngrok.io/HIS/index.php/DFRpcS';
        # create our client object, passing it the server url
        $Client = new JsonRpc\Client($url);
        # set up our rpc call with a method and params
        $success = false;
        /**
         * ค่าที่ต้องส่งเพื่อลบค่าแพทย์ผู้ป่วยนอกเป็นอะเรย์
         * - document_id(string 10) : หมายเลขเอกสาร DF + [RUNING NUMBER] เป็นคีย์หลักเพื่อตรวจสอบลบข้อมูล
         * - document_thdate(int 8) : พ.ศ.เดือนวัน ที่สร้างเอกสาร คีย์เพื่อตรวจสอบที่อีกชั้น
         */


        $date = explode("-",$model->created_at);
        $document_thdate =  ($date['0']+543).$date['1'].$date['2'];
        $idx_ = ['document_id' => $id, 'document_thdate' => $document_thdate];
       $success = $Client->call('rmvDfOpd', [$idx_]);


        Yii::$app->response->format = Response::FORMAT_JSON;
        if($Client->result == 1){
        //    $model->delete();
           $model->delete_status = 'Y';
           $model->save();

            return [
                'status' => 'success'
            ];
        }else {
            return [
                'status' => 'error'
            ];
        }

    
        
    }

    protected function findModel($id)
    {
        if (($model = DoctorFree::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionSum(){
            Yii::$app->response->format = Response::FORMAT_JSON;
            $hn = PatientHelper::getCurrentHn();
            $vn = PatientHelper::getCurrentVn();
            $pcc_vn = PatientHelper::getCurrentPccVn();
            $sum = DoctorFree::find()->where(['hn' => $hn,'vn' => $vn,'pcc_vn' => $pcc_vn,'delete_status' => 'N'])->sum('price');

        return number_format($sum,2);
    }

    public function actionApi(){
        return $this->render('api_example');
        // return 'API';
    }



    // private function actionHisCheck($id,$df_price,){
   private function HisCheck($model){
    Yii::$app->response->format = Response::FORMAT_JSON;

        $url = PatientHelper::getUrl().'/DFRpcS';
        # create our client object, passing it the server url
        $Client = new JsonRpc\Client($url);
        # set up our rpc call with a method and params
        $success = false;
        /**
         * ค่าที่ต้องส่งเพื่อบันทึกค่าแพทย์ผู้ป่วยนอกเป็นอะเรย์
         * - document_id(string 10) : หมายเลขเอกสาร DF + [RUNING NUMBER] เป็นคีย์หลักเพื่อตรวจสอบแก้ไขข้อมูล
         * - document_thdate(int 8) : พ.ศ.เดือนวัน ที่สร้างเอกสาร
         * - document_time(int 4) : ชม.นาที
         * - hn (bigint) : หมายเลขประจำตัวผู้ป่วย
         * - vn (int) : ลำดับที่รับบริการผู้ป่วยนอก
         * - vn_seq (int 2) : ลำดับการเข้ารับบริการตามจุดของผู้ป่วย
         * - requester_id (string 6) : รหัสผู้บันทึกข้อมูล
         * - ips_id (string 2) : รหัสประเภทค่าแพทย์
         * - doctor_id (string 5) : รหัสแพทย์
         * - df_price (currency 6) : ค่าธรรมเนียมแพทย์
         * - df_quantity (int) : ค่าเริ่มต้น 1 (ไม่ส่งก็ได้)
         * - div_id (string 3) : รหัสหน่วยงาน
         * - contract_type (string) : ประเภทคู่สัญญามาจาก VN. (ไม่ส่งก็ได้)
         * - contract_code (string) : รหัสคู่สัญญามาจาก VN. (ไม่ส่งก็ได้)
         * - program_id () : รหัสโปรแกรมค่าเริ่มต้นเป็น DFRpcS (ไม่ส่งก็ได้)
         */


         $date = explode("-",date("Y-m-d"));
         $document_thdate =  ($date['0']+543).$date['1'].$date['2'];
         $hn = PatientHelper::getCurrentHn();
         $vn = PatientHelper::getCurrentVn();
         $pcc_vn = PatientHelper::getCurrentPccVn();
         $div_id = PatientHelper::getDepartment();
         $doctor_id = UserHelper::getUser('doctor_id');
        $idx_ = [
            'document_id' =>  $model['id'], 
            'document_thdate' => $document_thdate, 
            'document_time' => date("Hi"), 
            'hn' => $hn,
            'vn' => $pcc_vn, 
            'vn_seq' => "02", 
            'requester_id' => Yii::$app->user->id, 
            'ips_id' => $model['df_code'], 
            'doctor_id' => $doctor_id, 
            'df_price' => $model['price'],
            'df_quantity' => "1", 
            'div_id' => $div_id, 
            'contract_type' => "1", 
            'contract_code' => "", 
            'program_id' => "DFRequest"
        ];
        $idx_['hims_thdate'] = substr($idx_['document_thdate'], 2);
        $success = $Client->call('setDfOpd', [$idx_]);

        return [
            'result' => $Client->result,
            'error' => $Client->error
        ];
        // return $model['id'];
    }


    public static function DfCount(){
        $hn = PatientHelper::getCurrentHn();
         $vn = PatientHelper::getCurrentVn();
         $pcc_vn = PatientHelper::getCurrentPccVn();
        return DoctorFree::find()->where(['vn' => $vn,'pcc_vn' => $pcc_vn,'hn' => $hn,'delete_status' => 'N'])->count();
    }
    public function actionTestAdd(){
        return $this->render('test_add');
    }
    public function actionTestDelete(){
       return  $this->render('test_delete');
    }
}