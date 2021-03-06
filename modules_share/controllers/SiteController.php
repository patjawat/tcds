<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\helpers\Html;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\components\PatientHelper;
use app\components\UserHelper;
use app\components\DbHelper;
use JsonRpc;
use app\modules_share\newpatient\models\mPatient;
use app\modules\opdvisit\models\OpdVisit;
use app\modules\opdvisit\models\OpdVisitSearch;
use yii\helpers\Json;



class SiteController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post', 'get'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        // PatientHelper::removeCurrentHnVn();
        PatientHelper::clearCurrent();
        if (!UserHelper::isUserReadyLogin()) {
            return $this->redirect(['/site/landing']);
        }
        $date1 = \Yii::$app->request->post('date1');
        $date2 = \Yii::$app->request->post('date2');
        $today = date('Y-m-d');

        return $this->render('index', [
                    'date1' => empty($date1) ? $today : $date1,
                    'date2' => empty($date2) ? $today : $date2,
        ]);
    }

    public function actionRevisit($pcc_vn,$hn){
        $url = PatientHelper::getUrl().'PatientRpcS';
        $Client = new JsonRpc\Client($url);
        $success = false;
        $success = $Client->call('getByHn',[$hn]);
        $data = $Client->result[0];

        $sql = "SELECT * from opd_visit v
        LEFT JOIN m_patient p ON p.hn = v.hn
        WHERE v.pcc_vn = '$pcc_vn' AND v.hn = '$hn'";
        $query = DbHelper::queryOne('db',$sql);

        // PatientHelper::setCurrentPatient($query['hn'],$query['pcc_vn'],$query['vn'],$query['fname'],$query['lname'],$query['cid'],$query['prename'],$query['sex'],$query['birthday']);

        PatientHelper::setCurrentHn($hn);
        PatientHelper::setCurrentPccVn($pcc_vn);
        PatientHelper::setCurrentVn($query['vn']);
        PatientHelper::setCurrentFname($data->fname);
        PatientHelper::setCurrentLname($data->lname);

        // PatientHelper::setCurrentHn($data->hn);
        // PatientHelper::setCurrentPatient($data->hn, $pcc_vn,$data->fname,$data->lname,$data->cid,null);
        if (Yii::$app->user->can('doctor')) {
            return $this->redirect(['/doctorworkbench']);
        }else{
            return $this->redirect(['/chiefcomplaint']);

        }

    }

    public function actionLanding() {

        PatientHelper::removeCurrentHnVn();
        return $this->render('landing');
    }


    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->redirect(['/user/security/login']); //inam
    }

    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
                    'model' => $model,
        ]);
    }

    public function actionAbout() {
        return $this->render('about');
    }


    public function actionRequester(){
        if(Yii::$app->request->isAjax){
        Yii::$app->response->format = Response::FORMAT_JSON;

        return [
            'title' => 'ระบุ Requester',
            'content' =>  $this->renderAjax('form_requester'),
        ];
    }else{
        return $this->render('form_requester');
    }
}

    public function actionRequesterCheck(){
        Yii::$app->response->format = Response::FORMAT_JSON;

     $key = Yii::$app->request->post('keys');
     $url = PatientHelper::getUrl().'RequesterRpcS';
     $Client = new JsonRpc\Client($url);
     $success = false;
     $success = $Client->call('getById', [$key]);
     $data =  $Client->result;
     if($data){

         return [
            'title' => $data[0]->name,
            'content' =>  $data[0]->name,
            'loadding' => '<img src="img/loading.gif" style="margin-left: 600px;margin-top: 50px;padding-bottom: 18px;" />',
            'status' => true,
            'footer' => Html::a('ตกลง','#',['class' => 'btn btn-success save','id' => 'chiptest','onclick' => 'return saveChiefcomplaint()'])
         ];
     }else{
        return [
            'status' => false,
            'title' => '<i class="fas fa-exclamation"></i> ไม่พบข้อมูล',
            // 'content' =>  $this->renderAjax('form_requester'),
            // 'footer' => Html::a('ตกลง','#',['class' => 'btn btn-success save pill-right'])
        ];
     }

    }

    public function actionGetRequester(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $requester =  \Yii::$app->request->post('key');
        return PatientHelper::RequesterName($requester);

    }

    public function actionQueue(){
        if(Yii::$app->request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => '<i class="fas fa-notes-medical"></i> ผู้ป่วยรอเข้ารับบริการ',
                'content' => $this->renderAjax('queue'),
                'footer' => ''
            ];
        }else{
            return $this->render('queue');
            }
    }

    public function actionShowQueue(){
        $date_start =  Date('Y-m-d');
        $date_end =   Date('Y-m-d');
        $department =  \Yii::$app->request->get('department');
        $keys =  \Yii::$app->request->get('keys');
        $searchModel = new OpdVisitSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $dataProvider->query->where(['department' => $department,'doctor_id' => UserHelper::getUser('doctor_id')]);
        // $dataProvider->query->where(['department' => $department]);
        $dataProvider->query->andFilterWhere(['>=', 'service_start_date', $date_start]);
        $dataProvider->query->andFilterWhere(['<=', 'service_start_date', $date_end]);
        $dataProvider->query->andFilterWhere(['like', 'hn', $keys]);

        if(Yii::$app->request->isAjax){
        Yii::$app->response->format = Response::FORMAT_JSON;
        return [
            'title' => '<i class="fas fa-notes-medical"></i> ผู้ป่วยรอเข้ารับบริการ',
            'content' => $this->renderAjax('show_queue',[
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider
            ]),
            'footer' => ''
        ];
    }else{
        return $this->render('show_queue',[
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
        }
    }

    public function actionGetpatient(){
        $hn = Yii::$app->request->get('hn');
        if(Yii::$app->request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => '<i class="fas fa-notes-medical"></i> ผู้ป่วยรอเข้ารับบริการ',
                'content' => PatientHelper::getPatient($hn),
                'footer' => ''
            ];

        }else{
           return PatientHelper::getPatient($hn);
        }

    }

    public function actionSetDepartment(){
        Yii::$app->response->format = Response::FORMAT_JSON;
       $department = \Yii::$app->request->get('department');
     return PatientHelper::setDepartment($department);
    }

    public function actionCheckDrugAllergy(){
      $data = PatientHelper::DrugAllergy();
      //  return $this->render('check_drug_allergy');
        if(Yii::$app->request->isAjax){
        Yii::$app->response->format = Response::FORMAT_JSON;
        if($data){
        return [
          'title' => 'รายการแพ้ยา',
          'content' => $this->renderAjax('check_drug_allergy',['data' => $data]),
          'footer' => '',
          'status' => true
        ];
        }else {
          return [
            'title' => '<i class="fas fa-pills"></i> รายการแพ้ยา',
            'content' => $this->renderAjax('check_drug_allergy',['data' => $data]),
            'footer' => '',
            'status' => false
          ];
          // return $this->renderAjax('check_drug_allergy',['data' => $data]);
        }
      }
    }

}
