<?php


namespace app\modules\dmindicators\controllers;

use Yii;
use app\modules\dmindicators\models\DmIndicators;
use app\modules\dmindicators\models\DmIndicatorsSearch;
use app\modules\doctorworkbench\models\EyeExamToday;
// use yii\web\Controller;
use app\components\VisitController as Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use app\components\PatientHelper;
use app\components\FormatYear;
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
        $hn = PatientHelper::getCurrentHn();
        $model = EyeExamToday::findOne(['hn' => $hn]);
        $model->form_service = Json::decode($model->form_service);
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'data' => $this->renderAjax('eye_exam_today_view', ['model' => $model]),
                'last_date' => FormatYear::ymd($model->created_at),
                'created_at' => FormatYear::toThai($model->created_at)
            ];
        }else{
            return $this->render('eye_exam_today_view', [
                'model' => $model,
                'last_date' => FormatYear::ymd($model->created_at)
            ]);
        }
    }

    public function actionEyeLastOutHospital(){
        $hn = PatientHelper::getCurrentHn();
        $model = DmIndicators::findOne(['hn' => $hn]);
        $model->eye_out_hos = Json::decode($model->eye_out_hos);
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
        return [
            'data' => $this->renderAjax('_form', ['model' => $model]),
            'created_last' => FormatYear::ymd($model->created_by),
            'created_date' => FormatYear::toThai($model->created_by)
        ];
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
