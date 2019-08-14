<?php

namespace app\modules\doctorworkbench\controllers;

use app\components\PatientHelper;
use app\modules\doctorworkbench\models\Medication;
use app\modules\doctorworkbench\models\MedicationSearch;
use app\modules\opdvisit\models\OpdVisit;
use app\modules\doctorworkbench\models\HisDrug;
use JsonRpc;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class MedicationController extends Controller
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

    /**
     * Lists all Medication models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MedicationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->Where(['pcc_vn' => PatientHelper::getCurrentPccVn(), 'vn' => PatientHelper::getCurrentVn(), 'hn' => PatientHelper::getCurrentHn()]);

        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $this->renderAjax('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        } else {
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Medication();
        $vn = PatientHelper::getCurrentVn();
        $pcc_vn = PatientHelper::getCurrentPccVn();
        $hn = PatientHelper::getCurrentHn();
        if ($model->load(Yii::$app->request->post())) {
            $model->vn  = $vn;
            $model->hn = $hn;
            $model->pcc_vn = $pcc_vn;
            $model->save(false);
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return $model;
            } else {
                // return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionAddDrugItems()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $icode = Yii::$app->request->get('icode');
        $model = new Medication();
        $model->icode = $icode;
        return $model->save();

    }

    public function actionUpdate($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // return $this->redirect(['view', 'id' => $model->id]);
            return $model;
        }

        return $this->renderAjax('update', [
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
        if (($model = Medication::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    // public function actionHistory(){

    //     $MedSearchModel = new MedicationSearch();
    //     $MedDataProvider = $MedSearchModel->search(Yii::$app->request->queryParams);
    //     $MedDataProvider->query->Where(['hn' => PatientHelper::getCurrentHn()]);

    //     $OpdVisit = OpdVisit::find()->all();

    //     if(Yii::$app->request->isAjax){
    //     \Yii::$app->response->format = Response::FORMAT_JSON;
    //     return [
    //         'title' => 'ประวัติการใช้ยา',
    //         'content' => $this->renderAjax('med_history_items',[
    //             'MedSearchModel' => $MedSearchModel,
    //         'MedDataProvider' => $MedDataProvider,
    //         'OpdVisit' => $OpdVisit
    //         ]),
    //         'footer' => ''
    //     ];
    // }else{
    //     return $this->render('med_history_items',[
    //         'MedSearchModel' => $MedSearchModel,
    //         'MedDataProvider' => $MedDataProvider,
    //         'OpdVisit' => $OpdVisit
    //     ]);
    // }
    // }

    public function actionEditable()
    {
        if (Yii::$app->request->post('hasEditable')) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $id = Yii::$app->request->post('editableKey');
            $model = Medication::findOne($id);
            $posted = current($_POST['Medication']);
            $post['Medication'] = $posted;
            if ($model->load($post)) {
                $model->save(false);
                //$value = $_POST['PccMedication'];
                return ['output' => '', 'message' => ''];
            }
        }
    }

    public function actionHistory()
    {
        $searchModel = new MedicationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->joinWith('opdVisit');
        $dataProvider->query->Where(['s_opd_visit.pcc_vn' => PatientHelper::getCurrentPccVn()]);

        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => 'Medication',
                'content' => $this->renderAjax('history', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,

                ]),
                'footer' => '',
            ];
        } else {
            return $this->render('history', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    public function actionItems()
    {
        $keys = Yii::$app->request->get('keys');
        $searchModel = new DrugitemsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andFilterWhere(['ilike', 'name', $keys]);
        $dataProvider->query->orFilterWhere(['ilike', 'icode', $keys]);
        $dataProvider->pagination = false;
        // $dataProvider->pagination = ['pageSize' => 10];
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => '<i class="fas fa-pills"></i> รายการยา',
                'content' => $this->renderAjax('items', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider]),
                'footer' => Yii::$app->request->get('keys'),
            ];

        } else {
            return $this->renderAjax('items', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }
    public function actionDrugHistory()
    {
        // return $this->render('show_drugitems');
        $hn = PatientHelper::getCurrentHn();
        $url = PatientHelper::getUrl() . 'DrugDispenseRpcS';
        $Client = new JsonRpc\Client($url);
        $success = false;
        $success = $Client->call('getByHn', [$hn]);

        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $this->renderAjax('drug_history', [
                'model' => $Client->result,
            ]);
        } else {
            return $this->render('drug_history', [
                'model' => $Client->result,
            ]);
        }
    }

    public function actionShowDrugitems()
    {
        // return $this->render('show_drugitems');
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => '<i class="fas fa-pills"></i> รายการยา',
                'content' => $this->renderAjax('show_drugitems'),
                'footer' => '',
            ];

        } else {
            return $this->render('show_drugitems');
        }
    }

    public function actionDruguseItem()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $this->renderAjax('druguse_item');
    }

    // public function actionDrugItemsList($q = null, $id = null){
    //     Yii::$app->response->format = \yii\web\Response::FORMAT_JSON; //กำหนดการแสดงผลข้อมูลแบบ json
    //     $out = ['results'=>['id'=>'','text'=>'']];
    //     $useMed =Medication::find()->select('icode')->where(['pcc_vn' => PatientHelper::getCurrentPccVn(),'vn' => PatientHelper::getCurrentVn(),'hn' => PatientHelper::getCurrentHn()])->all();

    //     $dataMed = [];

    //     foreach ($useMed  as $key => $value):
    //         $dataMed[]=$value->icode;
    //     endforeach;

    //     if(!is_null($q)){
    //         // $useMed =Medication::find()->select('icode')->where(['pcc_vn' => PatientHelper::getCurrentPccVn(),'vn' => PatientHelper::getCurrentVn(),'hn' => PatientHelper::getCurrentHn()])->all();
    //         $query = new \yii\db\Query();
    //         $query->select(['id','concat(trade_name," [",general_name,"]") as text'])
    //                 ->from('his_drug')
    //                 ->where("trade_name LIKE '%".$q."%'")
    //                 ->orwhere("general_name LIKE '%".$q."%'")
    //                 // ->orwhere("id LIKE '%".$q."%'")
    //                 ->andWhere(['NOT IN','id',$dataMed])
    //                 ->limit(20);
    //         $command = $query->createCommand();
    //         $data = $command->queryAll();
    //         $out['results'] = array_values($data);
    //     }else if($id>0){
    //         $out['results'] = ['id'=>$id,'text'=> HisDrug::find($id)->trade_name];
    //     }
    //     $out
    // }

    public function actionDrugItemsList($q = null, $id = null)
    {
        {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $clientCodes = HisDrug::find()
            ->where(['LIKE', 'id', $q])
            ->orWhere(['or',['LIKE', 'trade_name', $q]])
            ->all();
            $data = [['id' => '', 'text' => '']];
            foreach ($clientCodes as $clientCode) {
                $data[] = ['id' => $clientCode->id, 'text' => $clientCode->trade_name];
            }
            return ['results' => $data];
        }
    }

    public function actionReMed()
    {
        $request = Yii::$app->request;
        $vn = PatientHelper::getCurrentVn();
        $pcc_vn = PatientHelper::getCurrentPccVn();
        $hn = PatientHelper::getCurrentHn();
        $data = $request->post('id');
        $pks = explode(',', $data['drug_id']);
        if ($request->isPost) {
            \Yii::$app->response->format = Response::FORMAT_JSON;

            $check = Medication::findOne([
                'hn' => $hn,
                'vn' => $vn,
                'pcc_vn' => $pcc_vn,
                'icode' => $data['drug_id'],
            ]);
            if ($check == null) {
                $model = new Medication();
                $model->icode = $data['drug_id'];
                $model->druguse = $data['discription'];
                $model->qty = $data['qty'];
                $model->hn = $hn;
                $model->vn = $vn;
                $model->pcc_vn = $pcc_vn;
                $model->save(false);
            }
            return [
                'msg' => 'ย้านข้อมูลสำเร็จ',
                'count' => count($pks),
            ];
        }
    }

    //กำหนดสถานะการจ่ายยา
    public function actionCheckNomed()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $hn = PatientHelper::getCurrentHn();
        $pcc_vn = PatientHelper::getCurrentPccVn();
        $vn = PatientHelper::getCurrentVn();
        $model = OpdVisit::findOne(['hn' => $hn, 'vn' => $vn, 'pcc_vn' => $pcc_vn]);
        $med = Medication::findOne(['hn' => $hn, 'vn' => $vn, 'pcc_vn' => $pcc_vn]);
        if ($med) {
            return ['status' => false];
        } else {
            if ($model->no_med === 'N') {
                $model->no_med = 'Y';
            } else if ($model->no_med === 'Y') {
                $model->no_med = 'N';
            }
            $model->save();

            return ['status' => true];

        }

        // return $model->no_med;
    }

    // บอกสถานะการจ่ายยา
    public function actionCheckNomedStatus()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $hn = PatientHelper::getCurrentHn();
        $pcc_vn = PatientHelper::getCurrentPccVn();
        $vn = PatientHelper::getCurrentVn();
        $model = OpdVisit::findOne(['hn' => $hn, 'vn' => $vn, 'pcc_vn' => $pcc_vn]);
        $med = Medication::find()->where(['hn' => $hn, 'vn' => $vn, 'pcc_vn' => $pcc_vn])->count();
        // return $model->no_med;
        return [
            'no_med' => $model->no_med,
            'count' => $med,
        ];
    }

}
