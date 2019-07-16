<?php

namespace app\modules\doctorworkbench\controllers;

use Yii;
use yii\filters\AccessControl;
use app\modules\doctorworkbench\models\PccDiagnosis;
use app\modules\doctorworkbench\models\PccDiagnosisSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\helpers\Json;
use app\components\PatientHelper;
use app\modules\doctorworkbench\models\CDiagtext;
use app\modules\doctorworkbench\models\CIcd10tm;


class PccDiagnosisController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','create','delete','bulk-delete','icd10-list'],
                'rules' => [
                    [
                        'actions' => ['index','create','delete','bulk-delete','icd10-list'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],

        ];
    }
    public function actionIndex()
    {    
        $cid = PatientHelper::getCurrentCid();
        $pcc_vn = PatientHelper::getCurrentVn();
        $searchModel = new PccDiagnosisSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where(['cid' => $cid]);
        $dataProvider->query->orderBy('date_service ASC');
        $model = new PccDiagnosis(); 
        $model->cid = $cid;
        $model->pcc_vn = $pcc_vn;
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
            
        ]);
    }

    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new PccDiagnosis();  
        Yii::$app->response->format = Response::FORMAT_JSON;
        if ($model->load($request->post())) {
            $model->icd_name = CIcd10tm::find()->where(['diagcode' => $model->icd_code])->one()->diagename;
            //$model->diag_type = 2;
            if ($model->cc == "") {
                $model->cc = NULL;
              }else {$model->cc = json_encode($model->cc);}
            //   $model->date_service = Date('Y-m-d');
         $model->save(false);
         return ['forceReload'=>'#crud-diagnosis-pjax'];
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    private function DiagText($cc){

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
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
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
        $pks = explode(',', $request->post('pks')); // Array or selected records primary keys
        foreach ( $pks as $pk ) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
       
    }

    protected function findModel($id)
    {
        if (($model = PccDiagnosis::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

public function actionIcd10List($q = null, $id = null){
    Yii::$app->response->format = \yii\web\Response::FORMAT_JSON; //กำหนดการแสดงผลข้อมูลแบบ json
    $out = ['results'=>['diagcode'=>'','text'=>'']];
    if(!is_null($q)){
        $query = new \yii\db\Query();
        $query->select('diagename,diagtname,diagcode as id, diagcode as text')
                ->from('c_icd10tm')
                ->where("diagcode LIKE '%".$q."%'")
                ->orWhere("diagename LIKE '%".$q."%'")
                ->orWhere("diagtname LIKE '%".$q."%'")
                ->limit(20);
        $command = $query->createCommand();
        $data = $command->queryAll();
        $out['results'] = array_values($data);
    }else if($id>0){
        $out['results'] = ['diagcode'=>$id, 'text'=>  CIcd10tm::find($id)->diagcode];
    }
    return $out;
}


public function actionEditable(){
    if (Yii::$app->request->post('hasEditable')){
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $id = Yii::$app->request->post('editableKey');
        $data = PccDiagnosis::findOne($id);
        $posted = current($_POST['PccDiagnosis']);
        $post['PccDiagnosis'] = $posted;
        if ($data->load($post)) {
            $data->save();
            //$value = $_POST['TbDataDetail']; // มีมากกว่า1ฟิว
            $value = $data->diag_type;
          return ['output'=>$value, 'message'=>''];
          //$output = $posted;
           // return ['forceReload' => '#crud-datatable'];
        }
      }
}
}
