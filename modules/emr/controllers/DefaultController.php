<?php

namespace app\modules\emr\controllers;

use app\components\PatientHelper;
use app\modules\doctorworkbench\models\DiagnosisSearch;
use app\modules\doctorworkbench\models\HisPatient;
use app\modules\doctorworkbench\models\MedicationSearch;
use app\modules\document\models\DocumentSearch;
use app\modules\document\models\Documentqr;
use Yii;
// use yii\web\Controller;
use app\components\VisitController as Controller;
use yii\web\Response;
use yii\helpers\Url;
use yii\helpers\Html;

class DefaultController extends Controller
{

    public function actionIndex()
    {
        $hn = PatientHelper::getCurrentHn();
        $doc_qr = Documentqr::findOne(['hn' => $hn]);
        list($initialPreview,$initialPreviewConfig) = $this->getInitialPreview($hn);
        return $this->render('index',[
            'initialPreview'=> $initialPreview,
             'initialPreviewConfig'=> $initialPreviewConfig,
        ]);
    }


    
private function getInitialPreview($hn) {
    // $hn = PatientHelper::getCurrentHn();
    // $doc_qr = Documentqr::findOne(['hn' => $hn]);
    $datas = Documentqr::find()->where(['hn'=>$hn])->all();
    $initialPreview = [];
    $initialPreviewConfig = [];
    foreach ($datas as $key => $value) {
        array_push($initialPreview, $this->getTemplatePreview($value));
        array_push($initialPreviewConfig, [
            'caption'=> $value->file_name,
            'width'  => '120px',
            'url'    => Url::to('index.php?r=document/documentqr/deletefile-ajax'),
            'key'    => $value->id
        ]);
    }
    return  [$initialPreview,$initialPreviewConfig];
}

public function isImage($filePath){
    return @is_array(getimagesize($filePath)) ? true : false;
}

private function getTemplatePreview(Documentqr $model){
    $filePath = Documentqr::getUploadUrl().$model->real_filename;
    $isImage  = $this->isImage($filePath);
    // if($isImage){
        $file = Html::img($filePath,['class'=>'file-preview-image','style' => 'width: 100%;max-width: 214px;','alt'=>$model->file_name, 'title'=>$model->file_name]);
    // }else{
    //     $file =  "<div class='file-preview-other'> " .
    //              "<h2><i class='glyphicon glyphicon-file'></i></h2>" .
    //              "</div>";
    // }
    return $file;
}


    public function actionDashbroad(){
        $request = Yii::$app->request;
            if ($request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return $this->renderPartial('dashbroad', [
                ]);
            }else{
                return $this->render('dashbroad', [
                ]);
            }
        
    }

    public function actionDocument()
    {
        {
            $hn = PatientHelper::getCurrentHn() ? PatientHelper::getCurrentHn() : PatientHelper::getCurrentHnEmr();
            $searchModel = new DocumentSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->query->where(['hn' => $hn]);

            $request = Yii::$app->request;
            if ($request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return $this->renderPartial('document', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'hn' => $hn
                ]);
            } else {
                return $this->render('document', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'hn' => $hn
                ]);
            }
        }
    }

    public function actionMedication()
    {
        $hn = PatientHelper::getCurrentHn() ? PatientHelper::getCurrentHn() : PatientHelper::getCurrentHnEmr();
        $searchModel = new MedicationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where(['hn' => $hn]);

        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $this->renderPartial('medication', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'hn' => $hn,
            ]);

        } else {
            return $this->render('medication', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'hn' => $hn,
            ]);
        }
    }

    public function actionDiagnosis()
    {
        $hn = PatientHelper::getCurrentHn() ? PatientHelper::getCurrentHn() : PatientHelper::getCurrentHnEmr();
        $searchModel = new DiagnosisSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where(['hn' => $hn]);

        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $this->renderPartial('diagnosis', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        } else {
            return $this->render('diagnosis', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    public function actionHnEmr()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $hn = Yii::$app->request->post('hn');
        $model = HisPatient::findOne(['hn' => $hn]);
        if ($model) {
            PatientHelper::setCurrentHnEmr($hn);
            return $this->redirect(['/emr']);
        } else {
            return [
                'status' => false,
                'hn' => $hn,
            ];
        }
    }

    public function actionHnEmrClear(){
        \Yii::$app->session->remove('hnemr');
        PatientHelper::clearCurrent();
        return $this->redirect(['/emr']);
    }

    public function actionFormSelectType(){
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $this->renderAjax('_formSelectType');
        }else{
            return $this->render('_formSelectType');

        }
    }

    public function actionTest(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        // $shell = shell_exec('python3 /Users/patjawat/dev/scriptsoft/medicong-dev/web/script/readDocumentBarcode.py 460028');
        // $shell = shell_exec('python3 test.py patjawat');
        // $shell = shell_exec('python3 test.py');
        // return $shell;
        // return shell_exec("python3 --version \n");
        return exec('sh script.sh');

    }
}
