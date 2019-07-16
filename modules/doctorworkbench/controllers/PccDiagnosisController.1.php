<?php

namespace app\modules\doctorworkbench\controllers;

use Yii;
use yii\filters\AccessControl;
use app\modules\doctorworkbench\models\PccDiagnosis;
use app\modules\doctorworkbench\models\PccDiagnosisSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;
use \yii\web\Response;
use yii\helpers\Html;
use yii\helpers\Json;
use app\components\PatientHelper;
use app\modules\doctorworkbench\models\CDiagtext;
use app\modules\doctorworkbench\models\CIcd10tm;
use app\components\VisitController;

/**
 * PccDiagnosisController implements the CRUD actions for PccDiagnosis model.
 */
class PccDiagnosisController extends VisitController
{

    
    public function behaviors()
    {
        return [
//            'access' => [
//                'class' => AccessControl::className(),
//               'only' => ['index','create','delete','bulk-delete','icd10-list'],
//                'rules' => [
//                    [
//                        'actions' => ['index','create','delete','bulk-delete','icd10-list'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
//                ],
//            ],

        ];
    }
    
    public function actionIndex()
    {    
        $request = Yii::$app->request;
        $id = Yii::$app->request->get('id');
        $cid = PatientHelper::getCurrentCid();
        $pcc_vn = PatientHelper::getCurrentVn();

        // $drugHis = PccDiagnosis::find()->where(['cid' => $cid])->all();
    $searchModel = new PccDiagnosisSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    $dataProvider->query->Where(['cid' => $cid]);
    $dataProvider->query->andWhere(['NOT IN', 'date_service', date('Y-m-d')]);
    $dataProvider->query->orderBy('date_service DESC');

        if($id){
            $model =  PccDiagnosis::find()->where(['id' => $id])->one(); 
            if(!$model){
        return $this->redirect(['index']);

            }

        }else{
            $model = new PccDiagnosis(); 
            $model->cid = $cid;
            $model->pcc_vn = $pcc_vn;

        }
        if($request->isAjax){
        Yii::$app->response->format = Response::FORMAT_JSON;
        return $this->renderAjax('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
            'id' => $id
            
        ]);
        }else{
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'model' => $model,
                'id' => $id
                
            ]);
        }
    }

    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new PccDiagnosis();  
        $expression = new Expression("NOW()");

        // Yii::$app->response->format = Response::FORMAT_JSON;
        if ($model->load($request->post())) {
            if($model->icd_code){
            $model->icd_name = CIcd10tm::find()->where(['diagcode' => $model->icd_code])->one()->diagename;
            }else{
                $model->icd_code = NULL;
            }
         $model->date_service = (new \yii\db\Query)->select($expression)->scalar();
         $model->save(false);
        return ['forceReload'=>'#crud-diagnosis-pjax'];
        // return $this->redirect(['index']);
        }else{
            if($request->isAjax){
        Yii::$app->response->format = Response::FORMAT_JSON;

                return $this->renderAjax('create', [
                    'model' => $model,
                ]);
            }else{
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
            
        }
    }

    public function actionUpdateAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        // $request = Yii::$app->request;
        $post = Yii::$app->request->post('PccDiagnosis');
        if ($post) {
            $model = $this->findModel($post['id']);
            $model->icd_name = CIcd10tm::find()->where(['diagcode' => $post['icd_code']])->one()->diagename;
            if ($post['diag_text'] == "") {
                $model->diag_text = NULL;
              }else {$model->diag_text = json_encode($post['diag_text']);}
        $model->diag_type = $post['diag_type'];
        $model->save(false);
        return ['forceReload'=>'#crud-diagnosis-pjax'];
       
        }
    }

    public function actionUpdate($id)
    {
        $expression = new Expression("NOW()");
        Yii::$app->response->format = Response::FORMAT_JSON;
        $request = Yii::$app->request;
        $model = $this->findModel($id);       
            if ($model->load($request->post()) ) {
                 if($model->icd_code){
                $model->icd_name = CIcd10tm::find()->where(['diagcode' => $model->icd_code])->one()->diagename;
                }else{
                    $model->icd_code = NULL;
                }
            $model->last_update = (new \yii\db\Query)->select($expression)->scalar();
            $model->save();
               return $this->redirect(['index']);                
            } else {
                return $this->redirect(['index']);
            }
        }

    public function actionReDiag(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $expression = new Expression("NOW()");
       $request = Yii::$app->request;
       $cid = PatientHelper::getCurrentCid();
       $pcc_vn = PatientHelper::getCurrentVn();
       $data = $request->post('value');
            $model = new PccDiagnosis();
            $model->pcc_vn = $pcc_vn;
            $model->cid  = $cid;
            if($data['icd_code']){
                $model->icd_name = CIcd10tm::find()->where(['diagcode' => $data['icd_code']])->one()->diagename;
                }else{
                    $model->icd_code = NULL;
                }
                $model->diag_text = $data['diag_text'];
                $model->diag_type = $data['diag_type'];
                $model->icd_code = $data['icd_code'];
                $data['vn'] == ""? $model->vn = NULL : $model->vn = $data['vn'];
                $data['hn'] == ""? $model->hn = NULL : $model->hn = $data['hn'];
            $model->date_service = (new \yii\db\Query)->select($expression)->scalar();
          $model->save(false);
        return ['success'];

            // return ['success'];

        
        
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
            // return $this->redirect(['index']);            
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
        $query->select(["diagename","diagtname","diagcode as id", "concat('(',diagcode,')',' - ',diagename,' - ',diagtname) as text"])
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

public function actionGetDiag(){
    $request = Yii::$app->request;
    Yii::$app->response->format = Response::FORMAT_JSON;
    $model = $this->findModel($request->post('id'));
    return $model;
}

public function actionComplaintHistory()
{

    $id = Yii::$app->request->get('id');
    $cid = PatientHelper::getCurrentCid();
    $pcc_vn = PatientHelper::getCurrentVn();


    $searchModel = new PccDiagnosisSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    $dataProvider->query->where(['cid' => $cid,'pcc_vn' => $pcc_vn]);
    $dataProvider->query->orderBy('date_service ASC');
    Yii::$app->response->format = Response::FORMAT_JSON;
    return $this->renderAjax('complaint_history', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,

        
    ]);

}

}
