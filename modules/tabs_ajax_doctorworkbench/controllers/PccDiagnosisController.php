<?php

namespace app\modules\doctorworkbench\controllers;

use Yii;
use app\modules\doctorworkbench\models\PccDiagnosis;
use app\modules\doctorworkbench\models\PccDiagnosisSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\helpers\Json;

use app\modules\doctorworkbench\models\CIcd10tm;


/**
 * PccDiagnosisController implements the CRUD actions for PccDiagnosis model.
 */
class PccDiagnosisController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all PccDiagnosis models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new PccDiagnosisSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new PccDiagnosis(); 
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
               return   $this->renderAjax('index',[
                     'searchModel' => $searchModel,
                     'dataProvider' => $dataProvider,
                     'model' => $model
                     ]);
             } else {
                 return $this->render('index', [
                     'searchModel' => $searchModel,
                     'dataProvider' => $dataProvider,
                     'model' => $model
                 ]);
             }
    }

    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new PccDiagnosis();  
        Yii::$app->response->format = Response::FORMAT_JSON;
        if ($model->load($request->post())) {
            $model->icd_name = CIcd10tm::find()->where(['diagcode' => $model->icd_code])->one()->diagename;
            $model->diag_type = 2;
            $model->save(false);
            return ['forceReload'=>'#crud-datatable-pjax'];

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
            // $html = $this->renderAjax('create', [
            //         'model' => $model,
            //     ]);
            // return Json::encode($html);
          
        }
       
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
