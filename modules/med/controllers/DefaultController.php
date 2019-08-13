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
                $model->save();
                Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อย');
                return $this->redirect(['index']);

            } catch (Exception $e) {
                $transaction->rollBack();
                Yii::$app->session->setFlash('error', 'มีข้อผิดพลาดในการบันทึก');
                return $this->redirect(['index']);
            }

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

    public function actionAccept()
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
            }])->andWhere(['checkout' => 'Y', 'med_accept' => '1']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $this->renderAjax('accept', [
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
            ]);
        } else {
            return $this->render('accept', [
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
            ]);
        }
    }

    public function actionAcceptView($id)
    {
        $model = OpdVisit::findOne(['vn' => $id]); //เลือกใบ Order
        // $model->items = Medication::find()->where(['vn' => $model->vn])->all();
        $searchModel = new MedicationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if (Yii::$app->request->isPost) {
            return 'xxx';
        } else {
            return $this->render('accept_view', [
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
                        'forceReload'=>'#grid-med-accept-pjax'
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
