<?php

namespace app\modules\opdvisit\controllers;

use app\components\PatientHelper;
use app\modules\opdvisit\models\OpdVisit;
use app\modules\opdvisit\models\OpdVisitSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use app\components\MessageHelper;
use app\components\DateTimeHelper;
use app\components\UserHelper;
use JsonRpc as Rpc;
use yii\helpers\Json;

/**
 * OpdVisitController implements the CRUD actions for OpdVisit model.
 */
class OpdVisitController extends Controller
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
     * Lists all OpdVisit models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OpdVisitSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OpdVisit model.
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
     * Creates a new OpdVisit model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new OpdVisit();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
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

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = OpdVisit::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionSetPrintStatus()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $vn = PatientHelper::getCurrentVn();
        $hn = PatientHelper::getCurrentHn();
        $request = Yii::$app->request;
        if ($request->isPost) {
            if (($model = OpdVisit::findOne(['hn' => $hn, 'vn' => $vn])) !== null) {
                $model->print = 'print';
                $model->save();
                return $model;
            }
        }

    }

    public function actionCheckPrintStatus()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $vn = PatientHelper::getCurrentVn();
        $hn = PatientHelper::getCurrentHn();
        $request = Yii::$app->request;
        if ($request->isPost) {
            if (($model = OpdVisit::findOne(['hn' => $hn, 'vn' => $vn])) !== null) {
                return $model->print;
            }
        }
    }

    public function actionHn()
    {
        if (!UserHelper::isUserReadyLogin()) {
            return $this->redirect(['/site/landing']);
        }
        PatientHelper::removeCurrentHnVn();
        $hn = \Yii::$app->request->post('hn');
        $hn = '000000000' . $hn;
        $hn = substr($hn, -9);
        $model = mPatient::findOne($hn);
        if (!$model) {
            MessageHelper::setFlashDanger('ไม่พบ HN นี้ ในระบบ');
            return $this->redirect(['/site/index']);
        }
        PatientHelper::setCurrentHn($hn);
        return $this->redirect(['/chiefcomplaint']);
    }

    public function actionApi()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $hn = \Yii::$app->request->post('hn');
        $department = \Yii::$app->request->post('dep');
        $url = PatientHelper::getUrl().'OpdVisitRpcS';

        $Client = new Rpc\Client($url);
        $success = false;
        $success = $Client->call('getByHnDiv', [$hn,$department]);
        //  ถ้ามีข้อมูลไม่้ท่ากับค่าวาง
        if ($Client->result) {
            $Client_patient = new Rpc\Client(PatientHelper::getUrl().'PatientRpcS');
            $success_patient = false;
            $success_patient = $Client_patient->call('getByHn', [$hn]);
            $patient = $Client_patient->result[0];
            PatientHelper::DrugAllergy();

            $count = count($Client->result);
            if ($count > 1) { //ถ้ามีการ visit มากกว่า 1 รายการ
                return [
                    'error' => true,
                    'title' => '<i class="fas fa-user"></i> '.
                    $patient->prefix.$patient->fname.' '.$patient->lname,
                    'content' => $this->renderAjax('2vn', [
                        'hn' => $hn,
                        'department' => $department,
                        'data' => $Client->result
                    ])
                ];
            } else {
                $data = $Client->result[0];
                $hn = $data->hn;
                $vn = $data->vn;
                $div_id = $data->div_id;
                $doctor_fname = $data->doctor_fname;
                $doctor_lname = $data->doctor_lname;
                $doctor_prefix = $data->doctor_prefix;
                $doctor_id = $data->doctor_id;
                $visit_date = $data->visit_date;

                $this->OpdVisit($hn, $vn, $div_id, $doctor_id, $visit_date);
                $this->GetPatient($hn);
                PatientHelper::setCurrentHn($hn);
                PatientHelper::setCurrentDoctorName($doctor_fname, $doctor_lname);
                PatientHelper::setCurrentDoctorPrefix($doctor_prefix);

                if (Yii::$app->user->can('doctor')) {
                    return $this->redirect(['/doctorworkbench']);
                }else{
                    return $this->redirect(['/chiefcomplaint']);
        
                }
            }
        } else {
            Yii::$app->response->format = Response::FORMAT_JSON;
            // MessageHelper::setFlashDanger('ไม่พบ HN นี้ ในระบบ');
            return [
        'error' => true,
        'content' => 'ไม่พบการเข้ารับบริการ'
    ];
        }
    }

    public function actionChangeVisit()
    {
        // Yii::$app->response->format = Response::FORMAT_JSON;
        $hn = \Yii::$app->request->get('hn');
        $vn = \Yii::$app->request->get('vn');
        $div_id = \Yii::$app->request->get('div_id');
        $doctor_id = \Yii::$app->request->get('doctor_id');
        $doctor_fname = \Yii::$app->request->get('doctor_fname');
        $doctor_lname = \Yii::$app->request->get('doctor_lname');
        $doctor_prefix = \Yii::$app->request->get('doctor_prefix');
        $visit_date = \Yii::$app->request->get('visit_date');


        $this->OpdVisit($hn, $vn, $div_id,$doctor_id, $visit_date);
        $this->GetPatient($hn);
        PatientHelper::setCurrentHn($hn);
        PatientHelper::setCurrentDoctorName($doctor_fname, $doctor_lname);
        PatientHelper::setCurrentDoctorPrefix($doctor_prefix);

        return $this->redirect(['/chiefcomplaint/chiefcomplaint/show-form']);
    }

    private function OpdVisit($hn, $vn, $div_id,$doctor_id, $visit_date)
    {
        //  แปลงให้อยู่ในรุปแบบ สากล
        $y = substr($visit_date, 0, 4);
        $m = substr($visit_date, 4, 2);
        $d = substr($visit_date, 6, 2);
        $v_date = $y.'-'.$m.'-'.$d;

        $url = PatientHelper::getUrl().'PatientRpcS';
        $check_vn = OpdVisit::findOne(['hn' => $hn,'pcc_vn' => $vn,'visit_date' => $v_date]);
        //    //return $check_vn;
        if ($check_vn == null) { //ถ้ายังไม่มีข้อมูลให้สร้าง vn ใหม่
            $model = new OpdVisit();
            $model->hn = $hn;
            $model->pcc_vn = $vn;
            $model->visit_date = $v_date;
            $addon = [
                  'vdate' => DateTimeHelper::getDbDate(),
                  'vtime' => DateTimeHelper::getDbTime()
                ];
            $model->data_json = Json::encode($addon);
            $model->department = $div_id;
            $model->doctor_id = $doctor_id;
            $model->no_med = 'N';
            $model->checkout = 'N';
            $model->save(false);
            $vn = OpdVisit::findOne($model->id)->vn;
            //
            // PatientHelper::setCurrentPccVn($check_vn->pcc_vn);
            // PatientHelper::setCurrentVn($check_vn->vn);
        } else {
            // ดึง vn
              // $vn = $check_vn->pcc_vn;
              // return 'old';
              PatientHelper::setCurrentPccVn($check_vn->pcc_vn);
              PatientHelper::setCurrentVn($check_vn->vn);
        }
        //       //PatientHelper::setCurrentPccVn($check_vn->pcc_vn);
      //       // PatientHelper::setCurrentVn($check_vn->vn);
    }

    private function GetPatient($hn)
    {
        $url = PatientHelper::getUrl().'PatientRpcS';
        $Client = new Rpc\Client($url);
        $success = false;
        $success = $Client->call('getByHn', [$hn]);
        $data = $Client->result[0];
        // PatientHelper::setCurrentPatient($data->fname,$data->lname);
        PatientHelper::setCurrentFname($data->fname);
        PatientHelper::setCurrentLname($data->lname);
        PatientHelper::setCurrentPrefix($data->prefix);
        PatientHelper::setCurrentSex($data->sex);
        PatientHelper::setCurrentAge($data->birthday_date,$hn);
    }


}
