<?php

namespace app\modules\doctorworkbench\controllers;

use yii;
use yii\helpers\Json;
use app\modules\doctorworkbench\models\CIcd10tm;
use app\modules\doctorworkbench\models\PccDiagnosis;
use app\modules\doctorworkbench\models\PccDiagnosisSearch;
use app\modules\lab\models\Hoslab;
use app\modules\lab\models\HoslabSearch;
use app\modules\drug\models\Hosdrug;
use app\modules\drug\models\HosdrugSearch;
use app\modules\lab\models\Preorderlab;
use app\modules\lab\models\PreorderlabSeach;
    
use app\modules\emr\models\PccService;
use app\modules\emr\models\PccServiceSearch;
use app\modules\chiefcomplaint\models\Pccservicecc;
use app\modules\chiefcomplaint\models\PccserviceccSearch;
use app\modules\treatment\models\Treatmentplan;
use app\modules\treatment\models\TreatmentplanSearch;
    
use yii\web\Controller;
use app\modules\appointment\models\PccAppoinmentShow;


class OrderController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $searchModel = new PccDiagnosisSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new PccDiagnosis(); 
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
               return   $this->renderAjax('index',[
                     'searchModel' => $searchModel,
                     'dataProvider' => $dataProvider,
                     'model' => $model
                     ]);
             } else {
                 return $this->render('index', [
                     'searchModel' => $searchModel,
                     'dataProvider' => $dataProvider,
                     'model' => $model
                 ]);
             }
    }

    public function actionProcedure(){
        return $this->render('procedure');
    }
    
    public function actionAppointment(){
        $events = PccAppoinmentShow::find()->all();
        
        
        
        $masker = [];
        foreach ($events as $eve) {
            
            $event = new \yii2fullcalendar\models\Event();
            $event->id = $eve->id;
            $event->title = $text;
            $event->start = $eve->vstdate;
            $event->end = $eve->vstdate;
            $event->backgroundColor = $eve->color;
            $masker[] = $event;
        }
        
        return $this->render('appointment',[
                             'events' => $masker,
                             ]);
        
    }
    public function actionEmr($cid=NULL){
        
        $searchModel = new PccServiceSearch($cid);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('emr',[
                             'searchModel' => $searchModel,
                             'dataProvider' => $dataProvider,
                             'cid'=>$cid
                             ]);
        
    }
    public function actionPreOrderLab(){
        $searchModel = new PreorderlabSeach();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('pre_order_lab', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        

    }

    public function actionLab($cid=NULL)
    {
        $searchModel = new HoslabSearch($cid);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('lab',[
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'cid'=>$cid
        ]);
    }

    public function actionDrug($cid =NULL){
        $searchModel = new HosdrugSearch($cid);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('drug', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'cid'=>$cid
        ]);

    }
        
    public function actionTreatmmentPlan(){
        $model = new Treatmentplan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('treatmment_plan', [
            'model' => $model,
        ]);
    }

    public function actionCc(){
        $model = new Pccservicecc();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('cc', [
            'model' => $model,
        ]);

    }

        public function actionIcd10List($q = null, $id = null){
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON; //กำหนดการแสดงผลข้อมูลแบบ json
            $out = ['results'=>['diagcode'=>'','text'=>'']];
            if(!is_null($q)){
                $query = new \yii\db\Query();
                $query->select('diagcode as id, diagcode as text')
                        ->from('c_icd10tm')
                        ->where("diagcode LIKE '%".$q."%'")
                        ->limit(20);
                $command = $query->createCommand();
                $data = $command->queryAll();
                $out['results'] = array_values($data);
            }else if($id>0){
                $out['results'] = ['diagcode'=>$id, 'text'=>  CIcd10tm::find($id)->diagcode];
            }
            return $out;
        }


}
