<?php

namespace app\modules\queuemanage\controllers;
use Yii;
use yii\web\Controller;
use app\components\DbHelper;
use app\modules\queuemanage\models\PccVisit;
use app\modules\queuemanage\models\PccDoctorRoomQueue;
use app\modules\queuemanage\models\GatewayEmrLab;

/**
 * Default controller for the `queuemanage` module
 */
class AjaxController extends Controller {

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionLab($cid=null) {
        
        //$array[] = ['cid'=>$cid];
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $sql = " SELECT t.lab_name,t.lab_result,t.standard_result from pcc_lab t LIMIT 10 ";
        $raw = DbHelper::queryAll('db', $sql);
        
        return $raw;
    }

    public function actionLabView($cid=null){
    //$array[] = ['cid'=>$cid];
    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    // $sql = " SELECT t.lab_name,t.lab_result,t.standard_result from pcc_lab t LIMIT 10 ";
    // $raw = DbHelper::queryAll('db', $sql);

    $model = GatewayEmrLab::find()->where(['cid' => $cid])->all();

    return $this->renderAjax('../default/lab_view',['model' => $model]);
    }

public function actionGetTime(){
    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    $time = time();
    return  Yii::$app->formatter->asDateTime($time, 'php:H:i:s');
}

    public function actionQOrder(){
    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    $request = Yii::$app->request;
    // $data = $request->post();
    // $date1 = date('Y-m-d');
    // $date2 = date('Y-m-d');
    // $query = PccVisit::find()->where('visit_date_begin between :date1 and :date2 ')
    // ->addParams([':date1' => $date1])
    // ->addParams([':date2' => $date2])->count();
    //     return $query;
    if($request->post()){
    $data_key = $request->post('key');  //รับค่า key cid , pcc_vn
    $key =  $e = explode("-", $data_key); // แยกค่า cid กับ pcc_vn ออกจากัน
    $cid = $key[0];
    $pcc_vn = $key[1];
    $date = Date('Y-m-d');
    $sql_checknum = "SELECT max(ordernumber)FROM pcc_doctor_room_queue";
    $get_num = DbHelper::queryScalar('db', $sql_checknum);

    $check = PccDoctorRoomQueue::find()->where('nurse_send_date between :date1 AND :date2 AND pcc_vn = :pcc_vn')
    // ->where(['pcc_vn' => $pcc_vn])
    ->addParams([':date1' => $date])
    ->addParams([':date2' => $date])
    ->addParams([':pcc_vn' => $pcc_vn])
    ->one();
    if($check ){
        $model = PccDoctorRoomQueue::findOne(['pcc_vn' => $pcc_vn]);
       // $model->save();
    }else{
    $model = new PccDoctorRoomQueue();

    }
    $model->pcc_vn = $pcc_vn;
    $model->cid = $cid;
    $model->nurse_send_date = $date;
    // if($model->order_number > 0){
    //     $model->order_number =  null;
    // }else{
    //     $model->order_number =  $get_num + 1;
    // }
    $model->ordernumber =  $get_num + 1;
    $model->nurse_send_time = Date('H:i:s');

   if($model->save(false)){
    $sql_checknum = "SELECT max(ordernumber)FROM pcc_doctor_room_queue";
    $get_numset = DbHelper::queryScalar('db', $sql_checknum);
    return [
        'pcc_vn' => $pcc_vn,
        'order_number' => $model->ordernumber
   
    ];
   }

//  return $check;
}




    }
}
