<?php

namespace app\modules\doctorworkbench\controllers;

use Yii;
use yii\filters\AccessControl;
use app\modules\doctorworkbench\models\PccProcedure;
use app\modules\doctorworkbench\models\PccProcedureSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use app\components\PatientHelper;
use yii\helpers\Html;
use app\components\VisitController;

/**
 * PccProcedureController implements the CRUD actions for PccProcedure model.
 */
class PccProcedureController extends VisitController
{

    
    public function behaviors()
    {
        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'only' => ['index','view','create','delete','bulk-delete','proced'],
//                'rules' => [
//                    [
//                        'actions' => ['index','view','create','delete','bulk-delete','proced'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
//                ],
//            ],
        ];
    }

    /**
     * Lists all PccProcedure models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $request = Yii::$app->request;
        $id = Yii::$app->request->get('id');
        $cid = PatientHelper::getCurrentCid();
        $hn = PatientHelper::getCurrentHn();
        $vn = PatientHelper::getCurrentVn();

        $searchModel = new PccProcedureSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where(['cid' => $cid]);
        $dataProvider->query->where(['hn' => $hn]);
        $dataProvider->query->where(['pcc_vn' => $vn]); 
        $dataProvider->query->orderBy('date_service ASC');
        $dataProvider->pagination->pageSize=6;
        if($id){
            $model = PccProcedure::find()->where(['id' => $id])->one(); 

        }else{
            $model = new PccProcedure(); 
        }
        
        $model->cid = $cid;
        $model->pcc_vn = $vn; 

        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
        return $this->renderAjax('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,

        ]);
        }else{
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'model' => $model,
    
            ]); 
        }
    }


    /**
     * Displays a single PccProcedure model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "PccProcedure #".$id,
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

    /**
     * Creates a new PccProcedure model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    // public function actionCreate()
    // {
    //     $request = Yii::$app->request;
    //     $model = new PccProcedure();  

    //     if($request->isAjax){
    //         /*
    //         *   Process for ajax request
    //         */
    //         Yii::$app->response->format = Response::FORMAT_JSON;
        
    //         if($model->load($request->post()) && $model->save()){
    //             return ['forceReload'=>'#procedure-pjax'];         
    //         }else {
    //             return $this->renderAjax('create', [
    //                 'model' => $model,
    //             ]);
    //         }
    //     }
       
    // }

    public function actionCreate() {
        $request = Yii::$app->request;
        $model = new PccProcedure();

        $vn = PatientHelper::getCurrentVn();
        $cid = PatientHelper::getCurrentCid();
        $hn = PatientHelper::getCurrentHn();

        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            if ($model->load(Yii::$app->request->post())) {
                $model->pcc_vn = $vn;
                $model->cid = $cid;
                $model->hn = $hn;
                $model->save();
                return [
                    'forceClose'=>true,
                    'forceReload'=>'#procedure-pjax',
                    'url' => 'index.php?r=doctorworkbench/'.Yii::$app->controller->id,
                ];

            }

            return $this->renderAjax('create', [
                        'model' => $model,
            ]);
        }else {
            return $this->render('create', [
                'model' => $model,
                ]);
        }
    }

    // public function actionUpdate($id)
    // {
    //     Yii::$app->response->format = Response::FORMAT_JSON;
    //     $request = Yii::$app->request;
    //     $model =  $this->findModel($id);  
    //         if($model->load($request->post()) && $model->save()){
    //         return $this->redirect(['index']);      
    //         }
    // }


    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);       
            if ($model->load($request->post()) ) {
        Yii::$app->response->format = Response::FORMAT_JSON;

           // $model->last_update = (new \yii\db\Query)->select($expression)->scalar();
            $model->save(false);
            return [
                'forceClose'=>true,
                'forceReload'=>'#procedure-pjax',
                'url' => 'index.php?r=doctorworkbench/'.Yii::$app->controller->id,
            ];
            
            } else {
                if($request->isAjax){
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


    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'forceClose'=>true,
                'forceReload'=>'#procedure-pjax',
                'url' => 'index.php?r=doctorworkbench/'.Yii::$app->controller->id,
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
            return ['forceClose'=>true,'forceReload'=>'#procedure-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
       
    }

    /**
     * Finds the PccProcedure model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return PccProcedure the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PccProcedure::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionProced($q = null, $id = null){
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON; //กำหนดการแสดงผลข้อมูลแบบ json
        $out = ['results'=>['id'=>'','text'=>'']];
        if(!is_null($q)){
            $query = new \yii\db\Query();
            $query->select(["id","concat(title,' - ',title_th) as text","title","title_th"])
                    ->from('c_proced')
                    ->where("id LIKE '%".$q."%'")
                    ->orWhere("title LIKE '%".$q."%'")
                    ->orWhere("title_th LIKE '%".$q."%'")
                    ->limit(20);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
        }else if($id>0){
            $out['results'] = ['id'=>$id, 'text'=>  CProced::find($id)->id];
        }
        return $out;
    }
}
