<?php

namespace app\controllers;
use Yii;
use yii\web\Response;
use yii\rest\ActiveController;
use app\modules\document\models\Documentqr;
use app\modules\document\models\Document;
use app\components\DateTimeHelper;

class ApiController extends ActiveController
{
    // public function actionIndex()
    // {
    //     return $this->render('index');
    // }
    public $modelClass = 'Documentqr';
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

            $model = Documentqr::find()->where(['real_filename' => $file_name,'print' => '1'])->one();
            if($model){
                $model->print = '0';
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
            if(!$checkUpdate == DateTimeHelper::getDbDate()){
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
    }

}