<?php

namespace app\modules\doctorworkbench\controllers;

use Yii;
use yii\filters\AccessControl;
use app\modules\doctorworkbench\models\PccMedication;
use app\modules\doctorworkbench\models\PccMedicationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use app\components\PatientHelper;
use app\modules\doctorworkbench\models\CDrugitems;
use app\modules\doctorworkbench\models\CDrugusage;
use app\modules\doctorworkbench\models\GatewayCDrugItems;
use app\modules\doctorworkbench\models\GatewayEmrDrug;
use app\components\VisitController;
use app\modules\doctorworkbench\models\GatewayCDruguage;

class PccMedicationController extends VisitController
{

    
    public function behaviors()
    {
        return [
//             'access' => [
//                'class' => AccessControl::className(),
//                'only' => ['index','view','create','delete','bulk-delete','sum-srice','print-med'
//                            ,'select-med','update-med','editable','remed'],
//                'rules' => [
//                    [
//                        'actions' => ['index','view','create','delete','bulk-delete','sum-srice','print-med'
//                                        ,'select-med','update-med','editable','remed'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
//                ],
//            ],
        ];
    }

    public function actionIndex()
    {    
        $hn = PatientHelper::getCurrentHn();
        $vn = PatientHelper::getCurrentVn();
        $cid = PatientHelper::getCurrentCid();

        $searchModel = new PccMedicationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where(['cid' => $cid]);
        $dataProvider->query->where(['hn' => $hn]);
        $dataProvider->query->where(['pcc_vn' => $vn]);
        $dataProvider->query->orderBy('date_service ASC');
        $dataProvider->pagination->pageSize=6;
        $model = new PccMedication(); 
       
        if(Yii::$app->request->isAjax){
        Yii::$app->response->format = Response::FORMAT_JSON;

        return $this->renderAjax('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'cid' => $cid,
            'pcc_vn' => $vn
        ]);
    }else{
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'cid' => $cid,
            'pcc_vn' => $vn

        ]);
    }
}

    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "PccMedication #".$id,
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($id),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','id'=>$id],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new PccMedication();  
        
        if ($model->load($request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            $drug = GatewayCDrugItems::find()->where(['icode' => $model->icode])->one();
            $check_druguse = GatewayCDruguage::find()->where(['drugusage' => $model->druguse])->one();
          if($check_druguse){
           $model->druguse = $check_druguse->drugusage;
              
          }else{
            $model->druguse = $this->DruguseCreate($model->druguse);
          }
          $model->id = substr(Yii::$app->getSecurity()->generateRandomString(),10);
          $model->unitprice = $drug->unitprice;
          $model->tmt24_code = $drug->tmt24_code;
          $model->drug_name = $drug->drug_name.' '.$drug->unit;	
          $model->totalprice =  $model->qty * $drug->unitprice;
          $model->cid = PatientHelper::getCurrentCid();
          $model->pcc_vn = PatientHelper::getCurrentVn();
          $model->save(false);

          return [
              'forceReload'=>'#medication-pjax',
              'url' => 'index.php?r=doctorworkbench/'.Yii::$app->controller->id,
              'data' => $model
            ];

        // return $request->post();
        
       
        } else {
            if(Yii::$app->request->isAjax){
                Yii::$app->response->format = Response::FORMAT_JSON;
                return [
                    'title' => 'Diagnosis',
                    'content' => $this->renderAjax('create', ['model' => $model]),
                    'footer' => ''
                ];
            }else{
                return $this->render('create', [
                    'model' => $model,
                ]);
            }        
            
        }
       
    }


    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id); 
        
        if ($model->load($request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            $drug = GatewayCDrugItems::find()->where(['icode' => $model->icode])->one();
            $check_druguse = GatewayCDruguage::find()->where(['drugusage' => $model->druguse])->one();
          if($check_druguse){
           $model->druguse = $check_druguse->drugusage;
              
          }else{
            $model->druguse = $this->DruguseCreate($model->druguse);
          }
          $model->unitprice = $drug->unitprice;
          $model->tmt24_code = $drug->tmt24_code;
          $model->drug_name = $drug->drug_name.' '.$drug->unit;	
          $model->totalprice =  $model->qty * $drug->unitprice;
          $model->cid = PatientHelper::getCurrentCid();
          $model->pcc_vn = PatientHelper::getCurrentVn();
          $model->save(false);

          return [
              'forceReload'=>'#medication-pjax',
              'url' => 'index.php?r=doctorworkbench/'.Yii::$app->controller->id,
              'data' => $model
            ];

        // return $request->post();
        
       
        } else {
            if(Yii::$app->request->isAjax){
                Yii::$app->response->format = Response::FORMAT_JSON;
                return $this->renderAjax('update', [
                    'model' => $model,
                ]);
            }else{
                return $this->render('update', [
                    'model' => $model,
                ]);
            }        
            
        }
       
    }


    private function DruguseCreate($druguse){
    //     $check  = GatewayCDruguage::find(['drugusage' => $druguse])->one();
    //    if($check){
      
    //    }else{
        $model = new GatewayCDruguage();
        $model->drugusage = $this->getDruguseNumber();
        $model->shortlist = $druguse;
        if($model->save(false)){
            return $model->drugusage;
        }
    //    }
        
       
    }

    private function getDruguseNumber(){
        $query =  GatewayCDruguage::find()->select('max(drugusage)')->scalar();
        $num = $query+1;
        return  sprintf("%04s",$num); // Zero-padding
        $this->DruguseCreate();


    }

    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            // return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
            return [
                'forceClose'=>true,
                'forceReload'=>'#medication-pjax',
                'url' => 'index.php?r=doctorworkbench/'.Yii::$app->controller->id
            ];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }


    }

    public function actionBulkDelete()
    {        
        $request = Yii::$app->request;
        $pks = explode(',', $request->post( 'pks' )); // Array or selected records primary keys
        foreach ( $pks as $pk ) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-medication-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
       
    }

    protected function findModel($id)
    {
        if (($model = PccMedication::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
// รวมราคายา
    public function actionSumPrice($cid=null){
     return  PccMedication::find()->where(['cid' => $cid])->sum('unitprice * qty');
    
    }

    // ปรินสติกเกอร์ยา

    public function actionPrintMed($hn=null,$vn=null){
        //Yii::$app->response->format = Response::FORMAT_JSON;
        return $this->renderAjax('print_med');
    }

    public function actionSelectMed(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $request = Yii::$app->request;
        $id = $request->post( 'id' ); // รับค่า id ของ pcc_medication ที่ถูกส่งมา
        return PccMedication::findOne(['id' => $id])->icode; // ส่งค่า icode ไปที่ select2 

    }

    public function actionUpdateMed(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $request = Yii::$app->request;
        $keys = $request->post( 'id' ); // คา่ ID ที่ส่งมา
        $value = $request->post( 'value' ); // ค่า input value
       // $drug_use = CDrugusage::findOne(['drugusage' => $value['druguse']]); // ค้นหา id drugusage
        foreach ( $keys as $id ) { // loop ข้อมูล ID
            $model = PccMedication::findOne(['id' => $id]); // ค้นหาแถวตาม PSK
            if($value['druguse']!==""){
                $model->druguse  = $value['druguse'];  // แก้ไข วิธีใช้
            }
            if($value['qty']!==""){
                $model->qty  = $value['qty']; // แก้ไข จำนวน
            }
            $model->save();  // บันทึก
        }
        return ['forceReload'=>'#medication-pjax']; // reload gridview  เพื่อ update  ข้อมูล
    }

public function actionEditable() {
        if (Yii::$app->request->post('hasEditable')) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $id = Yii::$app->request->post('editableKey');
            $data = PccMedication::findOne($id);
            $posted = current($_POST['PccMedication']);
            $post['PccMedication'] = $posted;
            if ($data->load($post)) {
                $data->save();
                //$value = $_POST['PccMedication'];
                return ['output' => '', 'message' => ''];
            }
        }
    }


public function actionReMed(){
    \Yii::$app->response->format = Response::FORMAT_JSON;
    $cid = PatientHelper::getCurrentCid();
    $pcc_vn = PatientHelper::getCurrentVn();
    $request = Yii::$app->request;
    $id = $request->post( 'id' );
    $pks = explode(',', $request->post( 'id' )); // Array or selected records primary keys
    // foreach ( $pks as $pk ) {
        $remed = GatewayEmrDrug::find()->where(['id' => $id])->one();
        // $remed = GatewayEmrDrug::find(['id' => $pk])->one();
        $model = new PccMedication();  
        $model->vn =  $remed->vn;
        $model->hn =  $remed->hn;
        $model->cid =  $remed->cid;
        $model->icode = $remed->icode;
        $model->tmt24_code = $remed->tmt24_code;
        $model->drug_name =  $remed->drug_name.' '.$remed->unit;
        $model->qty = $remed->qty;
        $model->druguse = $remed->usage_line1;
        $model->unitprice = $remed->unitprice;
        $model->costprice = $remed->costprice;
        $model->totalprice =  $remed->qty * $remed->unitprice;
        $model->hospcode = $remed->hospcode;
        $model->pcc_vn = $pcc_vn;
       $model->save();
    // }
    return [
        'msg' => 'ย้านข้อมูลสำเร็จ',
        'count' => count($pks)
    ];

    
}

public function actionCreateDrugusage(){
    Yii::$app->response->format = Response::FORMAT_JSON;
    $model = new CDrugusage();
//    return  $model->load($request->post());
$data =  Yii::$app->request->post('data');
return $data;

}

public function actionDruguseList($q = null, $id = null){
    Yii::$app->response->format = \yii\web\Response::FORMAT_JSON; //กำหนดการแสดงผลข้อมูลแบบ json
    $out = ['results'=>['drugusage'=>'','text'=>'']];
    if(!is_null($q)){
        $query = new \yii\db\Query();
        $query->select('drugusage as id, shortlist as text')  
        ->from('gateway_c_druguage')
                ->where("shortlist LIKE '%".$q."%'")
                ->orWhere("drugusage LIKE '%".$q."%'")
                ->limit(20);
        $command = $query->createCommand();
        $data = $command->queryAll();
        $out['results'] = array_values($data);
    }else if($id>0){
        $out['results'] = ['drugusage'=>$id, 'text'=>  GatewayCDruguage::find()->where(['drugusage' => $id])->shortlist];
    }
    return $out;
}


}
