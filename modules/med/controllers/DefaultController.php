<?php

namespace app\modules\med\controllers;

use app\modules\doctorworkbench\models\Medication;
use app\modules\doctorworkbench\models\MedicationSearch;
use app\modules\opdvisit\models\OpdVisit;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;
use yii\web\Controller;
use yii\web\Response;
use app\components\DateTimeHelper;

class DefaultController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionRequester()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return [
            'title' => 'xx',
            'content' => $this->renderAjax('requester'),
            'footer' => 'eee'
        ];
    }

    public function actionOrderView($id)
    {
        $model = OpdVisit::findOne(['vn' => $id]); //เลือกใบ Order
        $model->items = Medication::find()->where(['vn' => $model->vn])->all();

        // Set session เพื่อใช้ behaviors บันทึกใน model => Medication;
        \Yii::$app->session->set('hn', $model->hn);
        \Yii::$app->session->set('vn', $model->vn);
        \Yii::$app->session->set('pcc_vn', $model->pcc_vn);
        // end #####
        if ($model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $transaction = Yii::$app->tcds->beginTransaction();
            try {
                $items = Yii::$app->request->post();
                foreach ($items['OpdVisit']['items'] as $key => $val) { //นำรายการสินค้าที่เลือกมา loop บันทึก
                    if (empty($val['id'])) {
                        $medication = new Medication;
                    } else {
                        $medication = Medication::findOne(['id' => $val['id']]);
                    }
                    $medication->hn = $model->hn;
                    $medication->vn = $model->vn;
                    $medication->pcc_vn = $model->pcc_vn;
                    $medication->icode = $val['icode'];
                    $medication->druguse = $val['druguse'];
                    $medication->qty_adjust = $val['qty_adjust'];
                    //$medication->med_note = $val['med_note'];
                    $medication->med_cancel = $val['med_cancel'];
                    $medication->save(false);
                }
                $transaction->commit();
                $model->med_accept = '1';
                $model->med_accetp_time = DateTimeHelper::getDbNow();
                $model->save();
                Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อย');
                return $this->redirect(['index']);
            } catch (Exception $e) {
                $transaction->rollBack();
                Yii::$app->session->setFlash('error', 'มีข้อผิดพลาดในการบันทึก');
                return $this->redirect(['index']);
            }
        } else {
            $model->med_accept_requester = '';
        }

        return $this->render('order_view', [
            'model' => $model,
        ]);
    }

    public function actionOrder()
    {
        \Yii::$app->session->remove('hn');
        \Yii::$app->session->remove('vn');
        \Yii::$app->session->remove('pcc_vn');

        $searchModel = new MedicationSearch();
        $date = Date('Y-m-d');
        $query = OpdVisit::find()
            ->joinWith(['patient' => function (ActiveQuery $query) {
                return $query;
                // ->andWhere(['=', 'his_patient.hn', 460028]);
            }])->andWhere(['checkout' => 'Y', 'med_accept' => '0']);
        //->andWhere(['between', 'checkout_date', $date, $date]);
        // ->joinWith(['availability' => function (ActiveQuery $query) {
        //     return $query
        //         ->andOnCondition(['>=', 'availability.start', strtotime('+7 days')])
        //         ->andWhere(['IS', 'availability.ID', NULL]);
        // }])
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $this->renderAjax('order', [
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
            ]);
        } else {
            return $this->render('order', [
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
            ]);
        }
    }

    // public function actionAccept()
    // {
    //     \Yii::$app->session->remove('hn');
    //     \Yii::$app->session->remove('vn');
    //     \Yii::$app->session->remove('pcc_vn');

    //     $searchModel = new MedicationSearch();
    //     $date = Date('Y-m-d');
    //     $query = OpdVisit::find()
    //         ->joinWith(['patient' => function (ActiveQuery $query) {
    //             return $query;
    //             // ->andWhere(['=', 'his_patient.hn', 460028]);
    //         }])->andWhere(['checkout' => 'Y', 'med_accept' => '1', 'med_arrange' => '0']);
    //     $dataProvider = new ActiveDataProvider([
    //         'query' => $query,
    //         'pagination' => [
    //             'pageSize' => 20,
    //         ],
    //     ]);

    //     if (Yii::$app->request->isAjax) {
    //         Yii::$app->response->format = Response::FORMAT_JSON;
    //         return $this->renderAjax('accept', [
    //             'dataProvider' => $dataProvider,
    //             'searchModel' => $searchModel,
    //         ]);
    //     } else {
    //         return $this->render('accept', [
    //             'dataProvider' => $dataProvider,
    //             'searchModel' => $searchModel,
    //         ]);
    //     }
    // }

    // public function actionAcceptView($id)
    // {
    //     $model = OpdVisit::findOne(['vn' => $id]);
    //     $searchModel = new MedicationSearch();
    //     $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    //     if ($model->load(Yii::$app->request->post())) {
    //         $model->med_arrange = '1';
    //         $model->med_arrange_time = DateTimeHelper::getDbNow();
    //         $model->save();
    //         return $this->redirect(['index', 'active' => 'tab2']);
    //     } else {
    //         $model->med_arrange_requester = '';
    //         return $this->render('accept_view', [
    //             'searchModel' => $searchModel,
    //             'dataProvider' => $dataProvider,
    //             'model' => $model,
    //             'id' => $id
    //         ]);
    //     }
    // }



// จัดยา
    public function actionArrange()
    {
        $searchModel = new MedicationSearch();
        $query = OpdVisit::find()
            ->joinWith(['patient' => function (ActiveQuery $query) {
                return $query;
            }])->andWhere(['checkout' => 'Y', 'med_accept' => '1', 'med_arrange' => '0']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $this->renderAjax('arrange', [
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
            ]);
        } else {
            return $this->render('arrange', [
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
            ]);
        }
    }

// แสดงรายการจัดยา
    public function actionArrangeView($id)
    {
        $model = OpdVisit::findOne(['vn' => $id]);
        $searchModel = new MedicationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if ($model->load(Yii::$app->request->post())) {
            $model->med_arrange = '1';
            $model->med_arrange_time = DateTimeHelper::getDbNow();
            $model->save();
            return $this->redirect(['index', 'active' => 'tab2']);
        } else {
            $model->med_arrange_requester = '';
            return $this->render('arrange_view', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'model' => $model,
                'id' => $id
            ]);
        }
    }



// ตรวจสอบ
public function actionCheck()
{
    $searchModel = new MedicationSearch();
    $query = OpdVisit::find()
        ->joinWith(['patient' => function (ActiveQuery $query) {
            return $query;
        }])->andWhere(['checkout' => 'Y', 'med_accept' => '1', 'med_arrange' => '1','med_check' => '0']);
    $dataProvider = new ActiveDataProvider([
        'query' => $query,
        'pagination' => [
            'pageSize' => 20,
        ],
    ]);

    if (Yii::$app->request->isAjax) {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return $this->renderAjax('check', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    } else {
        return $this->render('check', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }
}

// แสดงรายการตรวจสอบ
public function actionCheckView($id)
{
    $model = OpdVisit::findOne(['vn' => $id]);
    $searchModel = new MedicationSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    if ($model->load(Yii::$app->request->post())) {
        $model->med_check = '1';
        $model->med_check_time = DateTimeHelper::getDbNow();
        $model->save();
        return $this->redirect(['index', 'active' => 'tab3']);
    } else {
        $model->med_check_requester = '';
        return $this->render('check_view', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
            'id' => $id
        ]);
    }
}




// จ่ายยา
public function actionSuccess()
{
    $searchModel = new MedicationSearch();
    $query = OpdVisit::find()
        ->joinWith(['patient' => function (ActiveQuery $query) {
            return $query;
        }])->andWhere(['checkout' => 'Y', 'med_accept' => '1', 'med_arrange' => '1','med_check' => '1','med_success' => '0']);
    $dataProvider = new ActiveDataProvider([
        'query' => $query,
        'pagination' => [
            'pageSize' => 20,
        ],
    ]);

    if (Yii::$app->request->isAjax) {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return $this->renderAjax('success', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    } else {
        return $this->render('success', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }
}

// แสดงรายการจ่ายยา
public function actionSuccessView($id)
{
    $model = OpdVisit::findOne(['vn' => $id]);
    $searchModel = new MedicationSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    if ($model->load(Yii::$app->request->post())) {
        $model->med_success = '1';
        $model->med_success_time = DateTimeHelper::getDbNow();
        $model->save();
        return $this->redirect(['index', 'active' => 'tab4']);
    } else {
        $model->med_success_requester = '';
        return $this->render('success_view', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
            'id' => $id
        ]);
    }
}
    
    public function actionMedCancel($type)
    {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $id = Yii::$app->request->post('id');
            $model = Medication::findOne($id);
            if (Yii::$app->request->post()) {
                if ($model) {
                    $model->med_cancel = $type;
                    $model->save(false);
                    return [
                        'forceReload' => '#grid-med-accept-pjax'
                    ];
                }
            }
        }
    }

    protected function findVisitModel($id)
    {
        if (($model = OpdVisit::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
