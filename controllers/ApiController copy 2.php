<?php

namespace app\controllers;
use Yii;
use yii\filters\ContentNegotiator;
use yii\rest\ActiveController;
use yii\web\Response;
use app\modules\document\models\Documentqr;
use app\modules\document\models\Document;
use app\components\DateTimeHelper;
use app\modules\chiefcomplaint\models\Chiefcomplaint;

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
        // if ($request->isPost) {
        //     $checkUpdate = Document::findOne([
        //         'hn' => $request->post('hn'),
        //         'sub_dir' => $request->post('sub_dir'),
        //         'filename' => $request->post('filename'),
        //         'barcode' => $request->post('barcode')
        //         ]);
        //     if(!$checkUpdate->updated_at == DateTimeHelper::getDbDate()){
        //         $model->hn = $request->post('hn');
        //         $model->sub_dir = $request->post('sub_dir');
        //         $model->filename = $request->post('filename');
        //         $model->barcode = $request->post('barcode');
        //         $model->type = $request->post('type');
        //         $model->save();
        //         return $model;
        //     }else{
        //         return 'Update latest';
        //     }
           
           
        // }    
        return $request->get('data');
    }
}