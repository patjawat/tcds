<?php

namespace app\modules\doctorworkbench\controllers;

use Yii;
use app\modules\doctorworkbench\models\EyeExamToday;
use app\modules\doctorworkbench\models\EyeExamTodaySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use app\components\PatientHelper;
use yii\helpers\Json;


/**
 * EyeExamTodayController implements the CRUD actions for EyeExamToday model.
 */
class EyeExamTodayController extends Controller
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
     * Lists all EyeExamToday models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EyeExamTodaySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EyeExamToday model.
     * @param integer $id
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
     * Creates a new EyeExamToday model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $pcc_vn = PatientHelper::getCurrentPccVn();
        $vn = PatientHelper::getCurrentVn();
        $hn = PatientHelper::getCurrentHn();
        $checkvn = EyeExamToday::findOne(['pcc_vn' => $pcc_vn, 'vn' => $vn]);
        if ($checkvn) {
            $model = $checkvn;
            $model->form_service = Json::decode($model->form_service);

        } else {
            $model = new EyeExamToday();
            // $model->id = substr(Yii::$app->getSecurity()->generateRandomString(),10);
            $model->hn = $hn;
            $model->vn = $vn;
            $model->pcc_vn = $pcc_vn;
            // $model->doctor_id  =  PatientHelper::getCurrentDoctorID();

        }
        if ($model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            //    return $this->redirect(['view', 'id' => $model->id]);
            $model->pcc_vn = $pcc_vn;
            $form_service = [
                'no_dr' => $model->form_service['no_dr'],
                'dme' => $model->form_service['dme'],
                'npdr_mild' => $model->form_service['npdr_mild'],
                'moderate' => $model->form_service['moderate'],
                'servere' => $model->form_service['servere'],
                'pdr_laser_rx' => $model->form_service['pdr_laser_rx'],
                'no_laser_rx' => $model->form_service['no_laser_rx'],
                'pdr_with_hcr' => $model->form_service['pdr_with_hcr'],
                'cataract_no' => $model->form_service['cataract_no'],
                'cataract_yes' => $model->form_service['cataract_yes'],
                'operation' => $model->form_service['operation'],
                'glaueoma_no' => $model->form_service['glaueoma_no'],
                'glaueoma_yes' => $model->form_service['glaueoma_yes'],
                'no_slit_lamp_exam' => $model->form_service['no_slit_lamp_exam'],


            ];
            $model->form_service = Json::encode($form_service);

            if ($model->save(false)) {
                // return $this->redirect(['/']);

            }
        } else {
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return $this->renderAjax('create', [
                    'model' => $model,
                ]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }

    }

    /**
     * Updates an existing EyeExamToday model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
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
     * Deletes an existing EyeExamToday model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EyeExamToday model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EyeExamToday the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EyeExamToday::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
