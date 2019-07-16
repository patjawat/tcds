<?php

namespace app\modules\document\controllers;

use app\components\PatientHelper;
use app\modules\document\models\Documentqr;
use app\modules\document\models\DocumentqrSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\BaseFileHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * DocumentqrController implements the CRUD actions for Documentqr model.
 */
class DocumentqrController extends Controller
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

    public function actionIndex()
    {
        $searchModel = new DocumentqrSearch();
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
        $model = new Documentqr();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionViewEmr()
    {
        $model = new Documentqr();

        // if ($model->load(Yii::$app->request->post()) ) {

        //     $this->Uploads(false);

        //     if($model->save()){
        //       //   return $this->redirect(['view', 'id' => $model->id]);
        //     }

        // } else {
        //      $model->id = substr(Yii::$app->getSecurity()->generateRandomString(),10);
        // }

        // if (Yii::$app->request->isAjax) {
        //     Yii::$app->response->format = Response::FORMAT_JSON;
        //     return $this->renderAjax('view_emr', [
        //         'model' => $model,
        //     ]);
        // } else {
        //     return $this->render('view_emr', [
        //         'model' => $model,
        //     ]);
        // }

        $hn = PatientHelper::getCurrentHn() ? PatientHelper::getCurrentHn() : PatientHelper::getCurrentHnEmr();
        $searchModel = new DocumentqrSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where(['hn' => $hn]);
        $request = Yii::$app->request;
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $this->renderAjax('view_emr', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'hn' => $hn,
                'model' => $model,
            ]);
        } else {
            return $this->render('view_emr', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'hn' => $hn,
                'model' => $model,
            ]);
        }

    }

    public function actionFormUpload()
    {
        $hn = PatientHelper::getCurrentHn();
        $model = new Documentqr();
        $doc_qr = Documentqr::findOne(['hn' => $hn]);
        list($initialPreview, $initialPreviewConfig) = $this->getInitialPreview($hn);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                if (Yii::$app->request->isAjax) {
                    // JSON response is expected in case of successful save
                    Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                    return ['success' => true];
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return $this->renderAjax('form_upload', [
                'model' => $model,
                'initialPreview' => $initialPreview,
                'initialPreviewConfig' => $initialPreviewConfig,
                'type_id' => Yii::$app->request->get('id'),
            ]);
        } else {
            return $this->render('form_upload', [
                'model' => $model,
                'initialPreview' => $initialPreview,
                'initialPreviewConfig' => $initialPreviewConfig,
                'type_id' => Yii::$app->request->get('id'),
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

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Documentqr::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /*|*********************************************************************************|
    |================================ Upload Ajax ====================================|
    |*********************************************************************************|*/

    public function actionUploadAjax()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

       return  $this->Uploads(true);

    }

    private function CreateDir($folderName)
    {
        if ($folderName != null) {
            $basePath = Documentqr::getUploadPath();
            if (BaseFileHelper::createDirectory($basePath . $folderName, 0777)) {
                // BaseFileHelper::createDirectory($basePath . $folderName . '/thumbnail', 0777);
            }
        }
        return;
    }

    private function removeUploadDir($dir)
    {
        BaseFileHelper::removeDirectory(Documentqr::getUploadPath() . $dir);
    }

    private function Uploads($isAjax = false)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $pcc_vn = PatientHelper::getCurrentPccVn();
        $vn = PatientHelper::getCurrentVn();
        $hn = PatientHelper::getCurrentHn();
        if (Yii::$app->request->isPost) {
            $images = UploadedFile::getInstancesByName('upload_ajax');
            if ($images) {

                if ($isAjax === true) {
                    $type_id = Yii::$app->request->post('type_id');
                } else {
                    $Documentqr = Yii::$app->request->post('Documentqr');
                    $type_id = $Documentqr['type_id'];
                }

                $this->CreateDir($hn);

                foreach ($images as $file) {
                    $fileName = $file->baseName . '.' . $file->extension;
                    $realFileName = md5($file->baseName . time()) . '.' . $file->extension;
                    $savePath = Documentqr::UPLOAD_FOLDER . '/' . $hn . '/' . $realFileName;
                    if ($file->saveAs($savePath)) {


                        $model = new Documentqr;
                        $model->id = substr(Yii::$app->getSecurity()->generateRandomString(), 10);
                        $model->hn = $hn;
                        $model->type_id = $type_id;
                        $model->file_name = $fileName;
                        $model->real_filename = $realFileName;
                        $model->save(false);

                        if ($isAjax === true) {
                            return ['success' => 'true'];
                        }

                    } else {
                        if ($isAjax === true) {
                            return ['success' => 'false', 'eror' => $file->error];
                        }
                    }

                }

            }

        }
    }

    private function getInitialPreview($hn)
    {

        $datas = Documentqr::find()->where(['hn' => $hn])->all();
        $initialPreview = [];
        $initialPreviewConfig = [];
        foreach ($datas as $key => $value) {
            array_push($initialPreview, $this->getTemplatePreview($value));
            array_push($initialPreviewConfig, [
                'caption' => $value->file_name,
                'width' => '120px',
                'url' => Url::to('index.php?r=document/documentqr/deletefile-ajax'),
                'key' => $value->id,
            ]);
        }
        return [$initialPreview, $initialPreviewConfig];
    }

    public function isImage($filePath)
    {
        return @is_array(getimagesize($filePath)) ? true : false;
    }

    private function getTemplatePreview(Documentqr $model)
    {
        $filePath = Documentqr::getUploadUrl() . $model->hn . '/' . $model->real_filename;
        $file = Html::img($filePath, ['class' => 'file-preview-image', 'style' => 'width: 100%;max-width: 214px;', 'alt' => $model->file_name, 'title' => $model->file_name]);
        return $file;

    }


    public function actionDeletefileAjax()
    {
        $hn = PatientHelper::getCurrentHn();
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = Documentqr::findOne(Yii::$app->request->post('key'));
        if ($model !== null) {
            $filename = Documentqr::getUploadPath() . '/'.$hn.'/' . $model->real_filename;
            if ($model->delete()) {
                @unlink($filename);
                //  @unlink($thumbnail);
                return ['success' => true];
            } else {
                return ['success' => false];
            }
        } else {
            return ['success' => false];
        }
    }

    public function actionPrintSave(){
        $model = Documentqr::find()->where(['real_filename' => '460028-190523122152-01-1.jpg'])->one();
       $model->print = 'Y';
        $model->save();

    }
}
