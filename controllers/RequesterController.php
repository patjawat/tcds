<?php

namespace app\controllers;

use Yii;
use app\components\PatientHelper;
use JsonRpc;
use yii\web\Response;
use app\modules\chiefcomplaint\models\Chiefcomplaint;

class RequesterController extends \yii\web\Controller
{

    public function actionIndex()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return $this->render('index');
    }

    public function actionConfirm()
    {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            if (Yii::$app->request->isPost) {
                return [
                    'title' => 'ระบุ Requester',
                    'content' => $this->renderAjax('confirm_requester', ['formId' => Yii::$app->request->post('formId')]),
                ];
            }

        } else {
            return $this->render('confirm_requester');
        }
    }

    public function actionCheck()
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
                'footer' => 'Enter เพื่อยืนยัน',
            ];
        } else {
            return [
                'status' => false,
                'title' => '<i class="fas fa-exclamation"></i> ไม่พบข้อมูล',
              
            ];
        }
    }

}
