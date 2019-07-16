<?php

namespace app\modules\doctorworkbench\controllers;

use Yii;
use app\modules\doctorworkbench\models\Diagnosis;
use app\modules\doctorworkbench\models\DiagnosisSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\helpers\Json;
use app\components\PatientHelper;
use app\modules\doctorworkbench\models\CIcd10tm;
use app\modules\doctorworkbench\models\CIcd10tmSearch;
use app\modules\chiefcomplaint\models\Chiefcomplaint;


/**
 * DiagnosisController implements the CRUD actions for Diagnosis model.
 */
class DiagnosisController extends Controller
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
        $pcc_vn  = PatientHelper::getCurrentPccVn();
        $vn = PatientHelper::getCurrentVn();
        $searchModel = new DiagnosisSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->Where(['pcc_vn' => $pcc_vn,'vn' => $vn]);

        if(Yii::$app->request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $this->renderAjax('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,

            ]);
            }else{
                return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);
            }
    }



    public function actionItems()
    {
        $keys = Yii::$app->request->get('keys');
        $searchModel = new CIcd10tmSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andFilterWhere(['like', 'diagcode', $keys]);
        $dataProvider->query->orFilterWhere(['like', 'diagename', $keys]);
        $dataProvider->query->orFilterWhere(['like', 'diagtname', $keys]);
        // $dataProvider->pagination  = false;
        $dataProvider->pagination = ['pageSize' => 20];
            if(Yii::$app->request->isAjax){
                Yii::$app->response->format = Response::FORMAT_JSON;
                return [
                    'title' => '<i class="fas fa-pills"></i> Diagnosis',
                    'content' => $this->renderAjax('items', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider]),
                    'footer' => Yii::$app->request->get('keys')
                ];


                }else{
                    return $this->renderAjax('items', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider
                    ]);
                }
    }

    public function actionShowItems()
    {
        if(Yii::$app->request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => '<i class="fas fa-stethoscope"></i> Diagnosis',
                'content' => $this->renderAjax('show_items'),
                'footer' => ''
            ];

            // return $this->renderAjax('show_items');


            }else{
                return $this->render('show_items');
            }
    }


    public function actionAddItems(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $icd_code = Yii::$app->request->get('id');
        $model = new Diagnosis();
        $model->icd_code = $icd_code;
        return $model->save(false);

    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionCreate()
    {
        $hn = PatientHelper::getCurrentHn();
        $pcc_vn = PatientHelper::getCurrentPccVn();
        $vn = PatientHelper::getCurrentVn();
         $chiefcomplaint  =  Chiefcomplaint::findOne(['hn' => $hn,'pcc_vn' => $pcc_vn]);
        $check_visit = Diagnosis::find()->where(['hn' => $hn,'vn' => $vn,'pcc_vn' => $pcc_vn])->one();
        if($check_visit){
          $model = $check_visit;
        }else {
            $model = new Diagnosis();
            $model->diag_text = $chiefcomplaint->cc_text =="" ? '' : $chiefcomplaint->cc_text;           
        }

        if ($model->load(Yii::$app->request->post()) ) {
            if(Yii::$app->request->isAjax){
              Yii::$app->response->format = Response::FORMAT_JSON;
              PatientHelper::clearCurrent();

            // return $this->redirect(['view', 'id' => $model->id]);
          return $model->save(false);
          // return $model;
         }
        }

        if(Yii::$app->request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => 'Diagnosis',
                'content' => $this->renderAjax('create', ['model' => $model]),
                'footer' => ''
            ];
            }else{
                return $this->render('create', [
                    'model' => $model,
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
        Yii::$app->response->format = Response::FORMAT_JSON;
        return $this->findModel($id)->delete();
    }

    protected function findModel($id)
    {
        if (($model = Diagnosis::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionHistory(){
        $searchModel = new DiagnosisSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->joinWith('opdVisit');
        $dataProvider->query->Where(['diagnosis.pcc_vn' => PatientHelper::getCurrentPccVn()]);

        if(Yii::$app->request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => 'Diagnosis',
                'content' => $this->renderAjax('history', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,

                ]),
                'footer' => ''
            ];
            }else{
                return $this->render('history', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);
            }
    }




}
