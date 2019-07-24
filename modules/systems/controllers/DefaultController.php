<?php

namespace app\modules\systems\controllers;
use app\modules\systems\models\SystemData;

use Yii;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use \yii\web\Response;

class DefaultController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionForm(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = SystemData::findOne(['id' => 'system']);
        $model->data = Json::decode($model->data);
        if ($model->load(Yii::$app->request->post())) {
            $data = [
                'his_api' => $model->data['his_api'],
                'barcode_api' => $model->data['barcode_api']
            ];
            $model->data = Json::encode($data);
            if($model->save()){
                return [
                    'data' => [
                        'success' => true,
                        'model' => $model,
                        'message' => 'บันทึกสำเร็จ',
                    ]
                ];
            }else{
                return [
                    'data' => [
                        'success' => false,
                        'model' => $model,
                        'message' => 'เกิดข้อผิดพลาด ไม่สามารถบันทึกได้',
                    ]
                ];
            }
            
        }else{
            if (Yii::$app->request->isAjax) {
                return $this->renderAjax('_form',['model' => $model]);
    
            }
        }


    }
}
