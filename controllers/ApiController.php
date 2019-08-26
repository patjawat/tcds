<?php

namespace app\controllers;
use Yii;
use yii\filters\ContentNegotiator;
use yii\rest\ActiveController;
use yii\web\Response;
use app\modules\document\models\Documentqr;
use app\modules\document\models\Document;
use JsonRpc as Rpc;
use app\components\HISHelper;


class ApiController extends ActiveController
{

    
    // public $modelClass = 'Chiefcomplaint';
    // public $modelClass = 'Document';
    // public $serializer = [
    //     'class' => 'yii\rest\Serializer',
    //     'collectionEnvelope' => 'items',
    // ];
    public $enableCsrfValidation = false;

    public function behaviors()
    {
        return [
            [
                'class' => ContentNegotiator::className(),
                // 'only' => ['index', 'view'],
                'only' => ['*'],
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
        ];
    }
    public $modelClass = 'app\modules\document\models\Documentqr';
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

    public function actionAddQr(){
        // $model = new Documentqr();
        $request = Yii::$app->request;
        if ($request->isPost) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            $file_name = $request->post('file_name');
            $hn = $request->post('hn');
            $vn = $request->post('hn');
            $type_id = $request->post('type_id');
            $scan_from = $request->post('dep');

            $model = Documentqr::find()->where(['real_filename' => $file_name,'print' => '1'])->one();
            if($model){
                $model->print = '0';
                $model->scan_from = $scan_from;
                if($model->save()){
                    return ['msg' => true,'data' => $model];
                }else{
                    return ['msg' => false,'data' => null];
                }
            }
        }    
    }

    public function actionAddBarcode(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = new Document();
        $request = Yii::$app->request;
        if ($request->isPost) {
            $checkUpdate = Document::findOne([
                'hn' => $request->post('hn'),
                'sub_dir' => $request->post('sub_dir'),
                'filename' => $request->post('filename'),
                'barcode' => $request->post('barcode')
                ]);

            if(!$checkUpdate){
                $model->hn = $request->post('hn');
                $model->sub_dir = $request->post('sub_dir');
                $model->filename = $request->post('filename');
                $model->barcode = $request->post('barcode');
                $model->type = $request->post('type');
                $model->save();
                return $model;
            }else{
                return 'Update latest';
            }
           
           
        }    
        // return $request->post('hn');
    }

    public function actionPatient(){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $hn = \Yii::$app->request->post('hn');
        $reg_ = HISHelper::getPatientByHn($hn); //ข้อมูลทะเบียนประวัติ
        if (!$reg_) {
            $content = '! ไม่มีข้อมูล HN. ' . $hn . ' กรุณาติดต่อเวชระเบียน';
            return ['error' => true, 'content' => $content];
        }
        $patient = $reg_[0];
        // $div = \Yii::$app->request->post('dep');
        // $visit_ = HISHelper::getVisitByHnDiv($hn, $div); //ข้อมูลรับบริการของผู้ป่วยตามหน่วยงาน
        // if (!$visit_) {
        //     $content = '! ไม่มีส่งตรวจ ' . $patient->prefix . $patient->fname . ' ' . $patient->lname . ' ที่หน่วยงานนี้ กรุณาติดต่อต้อนรับ';
        //     return ['error' => true, 'content' => $content];
        // }
        // //PatientHelper::DrugAllergy(); //ตรวจสอบข้อมูลการแพ้ยาของผู้ป่วย รอสอบถามผู้ใช้ระบบ
        // if (count($visit_) > 1) { //ถ้ามีส่งตรวจที่หน่วยงานเดียวกันมากว่า 1 VN ให้ถามว่าใช้ VN ไหน?
        //     $content = $this->renderAjax('2vn', ['hn' => $hn, 'department' => $div, 'data' => $visit_]);
        //     $title = '<i class="fas fa-user"></i> ' . $patient->prefix . $patient->fname . ' ' . $patient->lname;
        //     return ['error' => true, 'title' => $title, 'content' => $content];
        // }
     
    }
}