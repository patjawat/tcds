<?php

namespace app\modules\med\controllers;

use app\modules\doctorworkbench\models\Medication;
use app\modules\doctorworkbench\models\MedicationSearch;
use app\modules\opdvisit\models\OpdVisit;
use app\modules\opdvisit\models\OpdVisitSearch;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;
use yii\web\Controller;
use yii\web\Response;
use yii\helpers\Json;
use app\components\DateTimeHelper;
use yii\web\JsExpression;
use yii\db\JsonExpression;
use app\components\PatientHelper;

class DefaultController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionOrder()
    {
        \Yii::$app->session->remove('hn');
        \Yii::$app->session->remove('vn');
        \Yii::$app->session->remove('pcc_vn');

        $searchModel = new MedicationSearch();
        $date = Date('Y-m-d');
        $condition = ['med_accept_status' => '0'];
        $data = new JsonExpression($condition);
        $query = OpdVisit::find()
            ->joinWith(['patient' => function (ActiveQuery $query) {
                return $query;
                // ->andWhere(['=', 'his_patient.hn', 460028]);
            }])->andWhere(['department' => PatientHelper::getDepartment(),'checkout' => 'Y', 'med_accept' => '0']);
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
                    $medication->med_note = $val['med_note'];
                    $medication->med_cancel = $val['med_cancel'];
                    $medication->save(false);
                }
                $transaction->commit();
                $medAccept = [

                ];
                $model->med_accept = '1';
               $model->med_accept_time = DateTimeHelper::getDbNow();
                $model->save(false);
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

// จัดยา
    public function actionArrange()
    {
        $searchModel = new MedicationSearch();
        $query = OpdVisit::find()
            ->joinWith(['patient' => function (ActiveQuery $query) {
                return $query;
            }])->andWhere(['department' => PatientHelper::getDepartment(),'checkout' => 'Y','med_accept' => '1','med_arrange' => '0']);
            // ->andWhere(['json_column->med_accept' => ['mail1@example.com', 'mail2@example.com']]);
            //  ->andWhere(['med_accept' => ['"med_accept_status":"0"']]);

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
        }])->andWhere(['department' => PatientHelper::getDepartment(),'checkout' => 'Y', 'med_accept' => '1', 'med_arrange' => '1','med_check' => '0']);
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
                    $medication->med_check_note = $val['med_check_note'];
                    $medication->med_cancel = $val['med_cancel'];
                    $medication->save(false);
                }
                $transaction->commit();
                $model->med_check = '1';
                $model->med_check_time = DateTimeHelper::getDbNow();
                $model->save();
                Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อย');
                return $this->redirect(['index', 'active' => 'tab3']);
            } catch (Exception $e) {
                $transaction->rollBack();
                Yii::$app->session->setFlash('error', 'มีข้อผิดพลาดในการบันทึก');
                return $this->redirect(['index', 'active' => 'tab3']);
            }
        } else {
            $model->med_check_requester = '';
        }

        return $this->render('check_view', [
            'model' => $model,
        ]);
}




// จ่ายยา
public function actionSuccess()
{
    $searchModel = new MedicationSearch();
    $query = OpdVisit::find()
        ->joinWith(['patient' => function (ActiveQuery $query) {
            return $query;
        }])->andWhere([
            'department' => PatientHelper::getDepartment(),
            'checkout' => 'Y',
            'med_accept' => '1',
            'med_arrange' => '1',
            'med_check' => '1',
            'med_success' => '0'
            ]);
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
    
public function actionMedCancel($id)
{
    $model = OpdVisit::findOne(['vn' => $id]);
    // if ($model->load(Yii::$app->request->post())) {
        $model->med_accept = '0';
        $model->med_accept_requester = null;
        $model->med_accept_time = null;

        $model->med_arrange = '0';
        $model->med_arrange = '0';
        $model->med_arrange_time = null;
        $model->med_check = '0';
        $model->med_check_time = null;
        $model->med_success = '0';
        $model->med_success_time = null;
        if($model->save()){
            return $this->redirect(['index', 'active' => 'tab4']);
        }
    // }
}
    // public function actionMedCancel($type)
    // {
    //     if (Yii::$app->request->isAjax) {
    //         Yii::$app->response->format = Response::FORMAT_JSON;
    //         $id = Yii::$app->request->post('id');
    //         $model = Medication::findOne($id);
    //         if (Yii::$app->request->post()) {
    //             if ($model) {
    //                 $model->med_cancel = $type;
    //                 $model->save(false);
    //                 return [
    //                     'forceReload' => '#grid-med-accept-pjax'
    //                 ];
    //             }
    //         }
    //     }
    // }


    // จัดยา
    public function actionReport()
    {
        $searchModel = new OpdVisitSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        // $dataProvider->query->joinWith(['patient' => function (ActiveQuery $query) {
        //             return $query;
        //         }]);
        $dataProvider->query->andWhere(['checkout' => 'Y']);
        // $dataProvider->query->andWhere(['opd_visit.doctor_id' => $searchModel->attributes['doctor_id']]);

        // $hn = $searchModel->attributes->hn;
        //     $dataProvider = new ActiveDataProvider([
        //     'query' => $query,
        //     'sort' =>false,
        //     'pagination' => [
        //         'pageSize' => 20,
        //     ],
        // ]);

        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $this->renderAjax('report', [
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
            ]);
        } else {
            return $this->render('report', [
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
                'xhn' => $searchModel->attributes['hn']
            ]);
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
