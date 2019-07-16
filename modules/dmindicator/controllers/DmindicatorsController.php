<?php

namespace app\modules\dmindicator\controllers;

use Yii;
use app\modules\dmindicator\models\DmIndicators;
use app\modules\dmindicator\models\DmIndicatorsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use app\components\PatientHelper;
use \yii\web\Response;

class DmindicatorsController extends Controller
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
     * Lists all DmIndicators models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DmIndicatorsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
       

        $pcc_vn = PatientHelper::getCurrentPccVn();
        $vn = PatientHelper::getCurrentVn();
        $hn = PatientHelper::getCurrentHn();
        $checkvn = DmIndicators::findOne(['pcc_vn' => $pcc_vn, 'vn' => $vn]);

        if ($checkvn) {
            $model = $checkvn;
            

        } else {
            $model = new DmIndicators();
            // $model->id = substr(Yii::$app->getSecurity()->generateRandomString(),10);
            $model->hn = $hn;
            $model->vn = $vn;
            $model->pcc_vn = $pcc_vn;

        }

        if ($model->load(Yii::$app->request->post())) {
            // return $this->redirect(['view', 'id' => $model->id]);
            $eye_out_hos = [
                'no_dr' => $model->eye_out_hos['no_dr']
            ];
            $model->eye_out_hos = Json::encode($eye_out_hos);
            $model->save();
        }
        $model->eye_out_hos = Json::decode($model->eye_out_hos);
        if (Yii::$app->request->isAjax) {
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

    public function actionEyeLastInHospital(){
        $model = new DmIndicators();
        $model->eye_out_hos = Json::decode($model->eye_out_hos);
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
        return $this->renderAjax('_form', [
            'model' => $model,
        ]);
        }else{
            return $this->render('_form', [
                'model' => $model,
            ]);
        }
    }

    public function actionEyeLastOutHospital(){
        $model = new DmIndicators();
        $model->eye_out_hos = Json::decode($model->eye_out_hos);
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
        return $this->renderAjax('_form', [
            'model' => $model,
        ]);
        }else{
            return $this->render('_form', [
                'model' => $model,
            ]);
        }
    }

    public function actionNeuropathyAseular(){
        $model = new DmIndicators();
        $model->eye_out_hos = Json::decode($model->eye_out_hos);
        
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
        return $this->renderAjax('neuropathy_aseular_form', [
            'model' => $model,
        ]);
        }else{
            return $this->render('neuropathy_aseular_form', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = DmIndicators::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
