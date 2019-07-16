<?php

namespace app\modules\lab\controllers;

use Yii;
use app\modules\lab\models\Pcclab;
use app\modules\lab\models\PcclabSearch;
use app\modules\lab\models\Preorderlab;
use app\modules\lab\models\PreorderlabSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * PcclabController implements the CRUD actions for Pcclab model.
 */
class PcclabController extends Controller
{
    /**
     * {@inheritdoc}
     */
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

    /**
     * Lists all Pcclab models.
     * @return mixed
     */
    public function actionIndex()
    {
        // Yii::$app->response->format = Response::FORMAT_JSON;

        $searchModel = new PcclabSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

       
        
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $this->renderAjax('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
             } else {
                return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);
            }
    }

    /**
     * Displays a single Pcclab model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Pcclab model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pcclab();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pcclab model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
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

    /**
     * Deletes an existing Pcclab model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pcclab model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Pcclab the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pcclab::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionPreorder(){
        $action=Yii::$app->request->post('action');
        $selection=(array)Yii::$app->request->post('selection');//typecasting

            foreach($selection as $id){
                $model = Pcclab::findOne((String)$id);//make a typecasting
                $preorder = new Preorderlab(); 
                    $preorder->pcc_vn = '1';//tester
                    $preorder->hospcode = $model->hospcode;
                    $preorder->lab_code = $model->lab_code;
                    $preorder->lab_name = $model->lab_name;
                    $preorder->lab_request_date = date('Y-m-d');
                    $preorder->standard_result = $model->standard_result;
                    $preorder->lab_price = $model->lab_price;

                $preorder->save(false);
                // or delete
            }
            
            $searchModel = new PreorderlabSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $model = new Preorderlab(); 
    
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                   return   $this->renderAjax('../../../doctorworkbench/order/pre-order-lab',[
                         'searchModel' => $searchModel,
                         'dataProvider' => $dataProvider,
                         'model' => $model
                         ]);
                 } else {
                    $searchModel = new PcclabSearch();
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                    $model = new Pcclab(); 

                    return $this->redirect('index.php?r=doctorworkbench/order/lab');
                }
            
     }
}
