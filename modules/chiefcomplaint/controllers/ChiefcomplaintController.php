<?php

namespace app\modules\chiefcomplaint\controllers;

use app\components\PatientHelper;
use app\modules\chiefcomplaint\models\Chiefcomplaint;
use app\modules\chiefcomplaint\models\ChiefcomplaintSearch;
use app\components\VisitController as Controller;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\Json;
// use yii\web\Controller;
use yii\web\NotFoundHttpException;
use \yii\web\Response;
use yii\widgets\ActiveForm;
use app\components\UnitHelper;


class ChiefcomplaintController extends Controller
{

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
        $searchModel = new ChiefcomplaintSearch();
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
        $model = new Chiefcomplaint();

        if ($model->load(Yii::$app->request->post())) {
            // $model->created_by = 1;
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
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
        if (($model = Chiefcomplaint::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionShowForm()
    {
        $pcc_vn = PatientHelper::getCurrentPccVn();
        $vn = PatientHelper::getCurrentVn();
        $hn = PatientHelper::getCurrentHn();
        if (empty($hn)) {
            return $this->redirect(['/site/index']);
        }
        
        $checkvn = Chiefcomplaint::findOne(['pcc_vn' => $pcc_vn, 'vn' => $vn]);
        if ($checkvn) {
            $last = Chiefcomplaint::find()->orderby(['date_service' => SORT_DESC])->where(['hn' => $hn])->one();
            $requester = $checkvn->requester;
            $model = $checkvn;
            $model->ht = $last->ht;
            $model->requester = "";
            $model->nursing_assessment = Json::decode($model->nursing_assessment);

        } else {
            $model = new Chiefcomplaint();
            $requester = null;
            // $model->id = substr(Yii::$app->getSecurity()->generateRandomString(),10);
            $model->hn = $hn;
            $model->vn = $vn;
            $model->pcc_vn = $pcc_vn;
            $model->date_service = Date('Y-m-d');
            $model->time_service = Date('H:i:s');
            // $model->doctor_id  =  PatientHelper::getCurrentDoctorID();

        }
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format = Response::FORMAT_JSON;
            // return ActiveForm::validate($model);
            //    return $this->redirect(['view', 'id' => $model->id]);
      

            if(ActiveForm::validate($model)){
            Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }else{
                $model->pcc_vn = $pcc_vn;
            $nursing_assessment = [
                'type_of_patient' => $model->nursing_assessment['type_of_patient'],
                'triage' => $model->nursing_assessment['triage'],
                'access' => $model->nursing_assessment['access'],
                'loc' => $model->nursing_assessment['loc'],
                'pain_score_adult' => $model->nursing_assessment['pain_score_adult'] == '' ? '' : number_format($model->nursing_assessment['pain_score_adult'], 2, '.', ''),
                'pain_score_child' => $model->nursing_assessment['pain_score_child'] == '' ? '' : number_format($model->nursing_assessment['pain_score_child'], 2, '.', ''),
                'pain_score_child_items' => $model->nursing_assessment['pain_score_child_items'],
                'fall_risk' => $model->nursing_assessment['fall_risk'],
                'risk_precaution' => $model->nursing_assessment['risk_precaution'],
                'dm_type' => $model->nursing_assessment['dm_type'],
                'thyroid_type' => $model->nursing_assessment['thyroid_type'],
                'fall_risk_yes' => $model->nursing_assessment['fall_risk_yes'],

            ];
            $model->nursing_assessment = Json::encode($nursing_assessment);

            if ($model->requester) {
                $model->save(false);
                return $this->redirect(['/']);
            }
            }
        } else {
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return $this->renderAjax('create', [
                    'model' => $model,
                    'requester' => $requester
                ]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'requester' => $requester
                ]);
            }
        }

    }

    public function actionAjaxValidation(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $pcc_vn = PatientHelper::getCurrentPccVn();
        $vn = PatientHelper::getCurrentVn();
        $hn = PatientHelper::getCurrentHn();
        $checkvn = Chiefcomplaint::findOne(['pcc_vn' => $pcc_vn, 'vn' => $vn]);
        if ($checkvn) {
            $last = Chiefcomplaint::find()->orderby(['date_service' => SORT_DESC])->where(['hn' => $hn])->one();
            $model = $checkvn;
            $model->ht = $last->ht;
            $model->nursing_assessment = Json::decode($model->nursing_assessment);

        } else {
            $model = new Chiefcomplaint();
            // $model->id = substr(Yii::$app->getSecurity()->generateRandomString(),10);
            $model->hn = $hn;
            $model->vn = $vn;
            $model->pcc_vn = $pcc_vn;
            // $model->doctor_id  =  PatientHelper::getCurrentDoctorID();

        }
        if(ActiveForm::validate($model)){
            return ActiveForm::validate($model);
        }
    }



    public function actionDoctorView()
    {
        // Yii::$app->response->format = Response::FORMAT_JSON;
        $unit = Yii::$app->request->get('unit');
        $temperature = Yii::$app->request->get('temperature');
        $bw = Yii::$app->request->get('bw');

        $pcc_vn = PatientHelper::getCurrentPccVn();
        $vn = PatientHelper::getCurrentVn();
        if (($model = Chiefcomplaint::findOne(['pcc_vn' => $pcc_vn, 'vn' => $vn])) !== null) {
            $model;
            //     $model->ic = $unit == 'cm' ? $model->ic : UnitHelper::getCmToIn($model->ic);
            //     $model->ht = $unit == 'cm' ? '<code>'.$model->ht.'</code> cm' : '<code>'.UnitHelper::getCmToFt($model->ht).'</code> Ft';
            //     $model->bt = $temperature == 'c'? '<code>'.$model->bt.'</code> องศา C' : '<code>'.UnitHelper::getCToF($model->bt).'</code> องศา F';
            //     $model->wc = '<code>'.$model->wc.'</code> cm';
            //     $model->ic = $unit == 'cm' ? '<code>'.$model->ic.'</code> cm' : '<code>'.UnitHelper::getCmToIn($model->ic).'</code> In';
            //     $model->ec = $unit == 'cm' ? '<code>'.$model->ec.'</code> cm': '<code>'.UnitHelper::getCmToIn($model->ec).'</code> In';
            //     $model->hc = $unit == 'cm' ? '<code>'.$model->hc.'</code> cm': '<code>'.UnitHelper::getCmToIn($model->hc).'</code> In';
            //    if($bw == 'kb'){
            //         // $model->bw ='<code>'.UnitHelper::getKgToKb($model->bw).'</code> Kb';
            //         $model->bw ='<code>'.$model->bw.'</code> Kg';
            //     }else if($bw == 'lb'){
            //         // $model->bw ='<code>'.UnitHelper::getKgTolb($model->bw).'</code> Lb';
            //         $model->bw ='<code>'.$model->bw.'</code> Kg';
            //     }else{
            //         $model->bw ='<code>'.$model->bw.'</code> Kg';
            //     }

        } else {
            $model = new Chiefcomplaint();
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->save();
        Yii::$app->response->format = Response::FORMAT_JSON;

            // return Yii::$app->request->post();
            return ['output' => '', 'message' => ''];
        } else {
            Yii::$app->response->format = Response::FORMAT_JSON;

            return $this->renderAjax('doctor_view', [
                'model' => $model,
                'unit' => $unit,
            ]);

        }

    }

    public function actionGetcf(){
        Yii::$app->response->format = Response::FORMAT_JSON;

        $pcc_vn = PatientHelper::getCurrentPccVn();
        $vn = PatientHelper::getCurrentVn();
        $hn = PatientHelper::getCurrentHn();
        $model =  Chiefcomplaint::findOne(['hn' => $hn,'pcc_vn' => $pcc_vn, 'vn' => $vn]);
        return [
            'bt' => UnitHelper::getCToF($model->bt),
            'bw' => round(UnitHelper::getKgToLb($model->bw),2),
            'ht' => UnitHelper::getCmToFt($model->ht),
            'wc' => UnitHelper::getCmToIn($model->wc),
            'ic' => UnitHelper::getCmToIn($model->ic),
            'ec' => UnitHelper::getCmToIn($model->ec),
            'hc' => UnitHelper::getCmToIn($model->hc),
            'bmi' => $model->bmi
            
        ];
    }

    public function actionRequester(){
        if(Yii::$app->request->isAjax){
        Yii::$app->response->format = Response::FORMAT_JSON;

        return [
            'title' => 'ระบุ Requester',
            'content' =>  $this->renderAjax('confirm_requester'),
        ];
    }else{
        return $this->render('confirm_requester');
    }
}


}