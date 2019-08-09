<?php

namespace app\modules\med\controllers;

use app\components\PatientHelper;
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
        \Yii::$app->session->remove('hn');
        \Yii::$app->session->remove('vn');
        \Yii::$app->session->remove('pcc_vn');

        $searchModel = new MedicationSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        // $dataProvider->query->groupBy('hn');
        $date = Date('Y-m-d');
        $query = OpdVisit::find()
            ->joinWith(['patient' => function (ActiveQuery $query) {
                return $query;
                // ->andWhere(['=', 'his_patient.hn', 460028]);
            }])->where(['checkout' => 'Y']);
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
            return $this->renderAjax('index', [
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
            ]);

        } else {
            return $this->render('index', [
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
            ]);
        }
    }

    public function actionView($id)
    // {
    //     $model = new Medication::find()->Where(['vn' => $id])->;
    //     $visit = $this->findVisitModel($id);
    //     return $this->render('view',[
    //         'dataProvider' => $dataProvider,
    //         'visit' => $visit 
    //     ]);
    // }

    {
        $model = OpdVisit::findOne(['vn' => $id]); //เลือกใบ Order
        $model->items = Medication::find()->where(['vn' => $model->vn])->all();

        // Set session เพื่อใช้ behaviors บันทึกใน model => Medication;
        \Yii::$app->session->set('hn', $model->hn);
        \Yii::$app->session->set('vn', $model->vn);
        \Yii::$app->session->set('pcc_vn', $model->pcc_vn);
        // end #####

        if($model->load(Yii::$app->request->post()))
        {
            Yii::$app->response->format = Response::FORMAT_JSON;
            
            $transaction = Yii::$app->tcds->beginTransaction();
            
            try {
                $items = Yii::$app->request->post();
                foreach($items['OpdVisit']['items'] as $key => $val){ //นำรายการสินค้าที่เลือกมา loop บันทึก
                    if(empty($val['id'])){
                        $medication = new Medication;
                        // print('Create');
                    }
                    else{
                        $medication = Medication::findOne(['id' => $val['id']]);
                        // print('Update');
                    }
                    $medication->hn = $model->hn;
                    $medication->vn = $model->vn;
                    $medication->pcc_vn = $model->pcc_vn;
                   $medication->icode = $val['icode'];
                   $medication->druguse = $val['druguse'];
                //    $medication->qty = $val['qty'];
                   $medication->qty_adjust = $val['qty_adjust'];
                   $medication->med_note = $val['med_note'];
                //    print($val['icode']);
                  $medication->save(false);
                    
                }

                $transaction->commit();
                Yii::$app->session->setFlash('success', 'บันทึกข้อมูลเรียบร้อย');
                return $this->redirect(['index']);
            } catch (Exception $e) {
                $transaction->rollBack();
                Yii::$app->session->setFlash('error', 'มีข้อผิดพลาดในการบันทึก');
                return $this->redirect(['index']);
            }
        }
        return $this->render('view', [
            'model' => $model,
        ]);
    }
    

    protected function findVisitModel($id)
    {
        if (($model = OpdVisit::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
