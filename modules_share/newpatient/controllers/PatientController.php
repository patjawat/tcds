<?php

namespace app\modules_share\newpatient\controllers;

use Yii;
use app\modules_share\newpatient\models\mPatient;
use app\modules_share\newpatient\models\mPatientSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\components\PatientHelper;
use app\components\MessageHelper;
use \yii\helpers\Json;
use app\components\DateTimeHelper;

/**
 * PatientController implements the CRUD actions for mPatient model.
 */
class PatientController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
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
     * Lists all mPatient models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new mPatientSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single mPatient model.
     * @param string $hn
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($hn) {

        $hn = '000000000' . $hn;
        $hn = substr($hn, -9);
        return $this->render('view', [
                    'model' => $this->findModel($hn),
        ]);
    }

    /**
     * Creates a new mPatient model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {

        PatientHelper::removeCurrentHn();
        
        $model = new mPatient();
        $hn = PatientHelper::genNextHn();
        $model->hn = $hn;
        
        $addon = ['addon' => ['face_img' => "face_$hn.png"]];
        $model->data_json = $addon;


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            MessageHelper::setFlashSuccess('บันทึกสำเร็จ!!!');
            return $this->redirect(['index']);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing mPatient model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($hn) {
        $model = $this->findModel($hn);        
        $data_array = $model->data_json;
        $data_array['update'] = ['d_update'=> DateTimeHelper::getDbDateTimeNow()];
        //print_r($data_array);
        //return;
        $model->data_json = $data_array;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            MessageHelper::setFlashSuccess('บันทึกสำเร็จ!!!');
            return $this->redirect(['index']);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing mPatient model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($hn) {
        $this->findModel($hn)->delete();
        MessageHelper::setFlashSuccess("ลบสำเร็จ!!!");

        return $this->redirect(['index']);
    }

    /**
     * Finds the mPatient model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return mPatient the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($hn) {
        if (($model = mPatient::findOne($hn)) !== null) {
            PatientHelper::removeCurrentHn();
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    public function actionOpenVisit($hn){
        PatientHelper::removeCurrentHnVn();
        PatientHelper::setCurrentHn($hn);
        return $this->redirect(['/patiententry/default/index']);
        
    }

}
