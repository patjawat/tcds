<?php

namespace app\modules\appointment\controllers;

use Yii;
use app\modules\appointment\models\PccAppointment;
use app\modules\appointment\models\PccAppointmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AppointController implements the CRUD actions for PccAppointment model.
 */
class AppointController extends Controller
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
     * Lists all PccAppointment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PccAppointmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PccAppointment model.
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
     * Creates a new PccAppointment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($date=Null)
    {
        $connection = Yii::$app->db;
        $model = new PccAppointment();
        

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            $datals = $connection->createCommand("INSERT INTO pcc_appoinment_show (startdate,enddate,color,oapp_id)
                                                    VALUES ('$model->appoint_date','$model->appoint_date','#005662','$model->id')")->execute();
            
            return $this->redirect(['/doctorworkbench/order/appointment']);
        }

        return $this->renderAjax('create', [
            'model' => $model,
            'date'=>$date
        ]);
    }

    /**
     * Updates an existing PccAppointment model.
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
     * Deletes an existing PccAppointment model.
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
     * Finds the PccAppointment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return PccAppointment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PccAppointment::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
