<?php

namespace app\modules\drug\controllers;

use Yii;
use app\modules\drug\models\Drugitems;
use app\modules\drug\models\DrugitemsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\helpers\Json;
use app\components\PatientHelper;

/**
 * DrugitemsController implements the CRUD actions for Drugitems model.
 */
class DrugitemsController extends Controller
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
     * Lists all Drugitems models.
     * @return mixed
     */
    public function actionIndex()
    {
        $keys = Yii::$app->request->get('keys');
        $searchModel = new DrugitemsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andFilterWhere(['like', 'icode', $keys]);
        if(Yii::$app->request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $this->renderAjax('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider]);
            }else{
                return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider
                    ]);
            }

           
    }

    public function actionItems()
    {
        $keys = Yii::$app->request->get('keys');
        $searchModel = new DrugitemsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andFilterWhere(['like', 'name', $keys]);
        $dataProvider->query->orFilterWhere(['like', 'icode', $keys]);
        $dataProvider->pagination  = false;
        // $dataProvider->pagination = ['pageSize' => 10];
            if(Yii::$app->request->isAjax){
                Yii::$app->response->format = Response::FORMAT_JSON;
                return [
                    'title' => '<i class="fas fa-pills"></i> รายการยา',
                        'content' => $this->renderAjax('items', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider]),
                    'footer' => Yii::$app->request->get('keys')
                ];
                
                
                }else{
                    return $this->renderAjax('items', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider
                    ]);
                }
    }
    public function actionShowDrugitems()
    {
        // return $this->render('show_drugitems');
        if(Yii::$app->request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => '<i class="fas fa-pills"></i> รายการยา',
                'content' => $this->renderAjax('show_drugitems'),
                'footer' => ''
            ];
            
            
            }else{
                return $this->render('show_drugitems');
            }
    }

    /**
     * Displays a single Drugitems model.
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
     * Creates a new Drugitems model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Drugitems();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Drugitems model.
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
     * Deletes an existing Drugitems model.
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
     * Finds the Drugitems model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Drugitems the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Drugitems::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
