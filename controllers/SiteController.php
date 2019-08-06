<?php

namespace app\controllers;

use app\components\DbHelper;
use app\components\PatientHelper;
use app\components\UserHelper;
use app\models\ContactForm;
use app\models\LoginForm;
use app\modules\opdvisit\models\HisPatient;
use app\modules\opdvisit\models\OpdVisitSearch;
use JsonRpc;
use kartik\report\Report;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;

class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
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
    public function actions()
    {
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
    public function actionIndex()
    {
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


    public function actionLanding()
    {

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

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(['/user/security/login']); //inam
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionRequester()
    {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            return [
                'title' => 'ระบุ Requester',
                'content' => $this->renderAjax('form_requester'),
            ];
        } else {
            return $this->render('form_requester');
        }
    }

    public function actionRequesterCheck()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $key = Yii::$app->request->post('keys');
        $url = PatientHelper::getUrl() . 'RequesterRpcS';
        $Client = new JsonRpc\Client($url);
        $success = false;
        $success = $Client->call('getById', [$key]);
        $data = $Client->result;
        if ($data) {

            return [
                'title' => $data[0]->name,
                'content' => $data[0]->name,
                'loadding' => '<img src="img/loading.gif" style="margin-left: 600px;margin-top: 50px;padding-bottom: 18px;" />',
                'status' => true,
                // 'footer' => Html::a('ตกลง','#',['class' => 'btn btn-success xsave','id' => 'xchiptest','onclick' => 'return saveChiefcomplaint()']),
                'footer' => 'Enter เพื่อยืนยัน',
            ];
        } else {
            return [
                'status' => false,
                'title' => '<i class="fas fa-exclamation"></i> ไม่พบข้อมูล',
                // 'content' =>  $this->renderAjax('form_requester'),
                // 'footer' => Html::a('ตกลง','#',['class' => 'btn btn-success save pill-right'])
            ];
        }

    }


    public function actionQueue()
    {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => '<i class="fas fa-notes-medical"></i> ผู้ป่วยรอเข้ารับบริการ',
                'content' => $this->renderAjax('queue'),
                'footer' => '',
            ];
        } else {
            return $this->render('queue');
        }
    }

    public function actionShowQueue()
    {
        $date_start = Date('Y-m-d');
        $date_end = Date('Y-m-d');
        $department = \Yii::$app->request->get('department');
        $keys = \Yii::$app->request->get('keys');
        $searchModel = new OpdVisitSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $dataProvider->query->where(['department' => $department, 'doctor_id' => UserHelper::getUser('doctor_id'), 'checkout' => 'N']);
        // $dataProvider->query->where(['department' => $department]);
        // $dataProvider->query->andFilterWhere(['>=', 'service_start_date', $date_start]);
        // $dataProvider->query->andFilterWhere(['<=', 'service_start_date', $date_end]);
        // $dataProvider->query->andFilterWhere(['like', 'hn', $keys]);

        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => '<i class="fas fa-notes-medical"></i> ผู้ป่วยรอเข้ารับบริการ',
                'content' => $this->renderAjax('show_queue', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]),
                'footer' => '',
            ];
        } else {
            return $this->render('show_queue', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    public function actionGetpatient()
    {
        $hn = Yii::$app->request->get('hn');
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => '<i class="fas fa-notes-medical"></i> ผู้ป่วยรอเข้ารับบริการ',
                'content' => PatientHelper::getPatient($hn),
                'footer' => '',
            ];

        } else {
            return PatientHelper::getPatient($hn);
        }

    }

    public function actionSetDepartment()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $department = \Yii::$app->request->get('department');
        return PatientHelper::setDepartment($department);
    }

    public function actionReport()
    {

        // return $this->render('@app/views/site/report/index');
        $report = Yii::$app->report;
        $report->templateId = 1677;

// If you want to override the output file name, uncomment line below
        // $report->outputFileName = 'My_Generated_Report.pdf';

// If you want to override the output file type, uncomment line below
        // $report->outputFileType = Report::OUTPUT_DOCX;

// If you want to override the output file action, uncomment line below
        // $report->outputFileAction = Report::ACTION_GET_DOWNLOAD_URL;

// Configure your report data. Each of the keys must match the template
        // variables set in your MS Word template and each value will be the
        // evaluated to replace the Word template variable. If the value is an
        // array, it will treated as tabular data.
        $report->templateVariables = [
            'client_name' => 'Murat Cileli',
            'address' => 'Kadikoy, Istanbul / Turkey',
            'date' => '10-Apr-2018',
            'phone' => '+1-800-3399622',
            'email' => 'admin@gmail.com',
            'notes' => 'Thank you for your purchase.',
            'quantities' => ['6', '3', '4'],
            'products' => ['Apple iPhone 5S', 'Samsung Galaxy S5', 'Office 365 License'],
            'prices' => ['490 USD', '399 USD', '199 USD'],
        ];

// lastly in your controller action download the generated report
        return $report->generateReport();
    }

    public function actionPython()
    {
        // Yii::$app->response->format = Response::FORMAT_JSON;
        $requester = \Yii::$app->request->post('name');
        return [
            'status' => 'succcesxx',
        ];

    }

}
