<?php

namespace app\modules\lab\controllers;

use Yii;
use yii\web\Controller;
use app\components\DbHelper;
use app\components\FormatYear;
use app\components\PatientHelper;
use app\modules\lab\models\LabResult;
use app\modules\lab\models\LabResultSearch;
use yii\web\Response;

//use yii\data\ActiveDataProvider;

/**
 * Default controller for the `lab` module
 */
class DefaultController extends Controller {

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        return $this->render('index');
    }

    public function actionLabView() {
        $sql = 'SELECT * from lis_order o
          LEFT JOIN lis_result r ON r.lis_number = o.lis_number
          WHERE o.patient_id = "640735"
          GROUP BY r.lis_number
          ORDER BY o.sec_time ASC';
        $model = DbHelper::queryAll('db', $sql);
        return $this->render('lab_view', ['model' => $model]);
    }

    public function actionLabResult() {
        $hn = PatientHelper::getCurrentHn();
        // $hn = '10661';
        $perPage = Yii::$app->request->get('per-page');
        $pageSize = $perPage ? intval($perPage) : 50;
        $searchModel = new LabResultSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andFilterWhere(['patient_id' => $hn]);
        $dataProvider->query->andFilterWhere(['lis_code' => $searchModel->lis_code]);
        $dataProvider->query->groupBy(['lis_code']);
        // $dataProvider->query->orderBy(['lis_code' => SORT_ASC]);
        $dataProvider->setSort(['defaultOrder' => ['lis_code' => SORT_ASC],]);
        $dataProvider->setPagination(['pageSize' => $pageSize]);

        return $this->render('lab_result', [
                    'hn' => $hn,
                    // 'query' => $query,
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
                    // 'pages' => $pages,
                    'pagination' => ['pageSize' => $pageSize,],
        ]);
    }

    //เอาวันที่ไปใส่ Header ของ Gridview
    public function actionLabDate() {
        $hn = PatientHelper::getCurrentHn();
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = LabResult::find()
                        ->where(['patient_id' => $hn])
                        // ->where(['lis_code' => $lis_code])
                        // ->andWhere(['BETWEEN', 'checkin_date', $checkin_date, $checkin_date])
                        ->orderBy(['checkin_date' => SORT_DESC])->limit(10)->all();

        return [
            'h_date1' => FormatYear::toThai($model[0]->checkin_date),
            'h_date2' => FormatYear::toThai($model[1]->checkin_date),
            'h_date3' => FormatYear::toThai($model[2]->checkin_date),
            'h_date4' => FormatYear::toThai($model[3]->checkin_date),
        ];
    }

    //แสดง lab แบบช่วงวันที่
    public function actionLabResultSelect() {
        Yii::$app->response->format = Response::FORMAT_JSON;
        // $keys = explode(',', Yii::$app->request->post('keys'));
        $data = Yii::$app->request->post('keys');
        return $this->renderAjax('lab_select', ['data' => $data]);
    }

    /**
     * รายงานผลแลปตามผู้ป่วย
     * @return void
     */
    public function actionLabResultCustom() {
        //$perPage = Yii::$app->request->get('per-page');
        //$pageSize = $perPage ? intval($perPage) : 500;
        $searchModel = new LabResultSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if (empty($searchModel->patient_id) && empty(PatientHelper::getCurrentHn())) {
            $patient_id = "0";
        } else if (empty($searchModel->patient_id) && !empty(PatientHelper::getCurrentHn())) {
            $searchModel->patient_id = PatientHelper::getCurrentHn();
            $patient_id = $searchModel->patient_id;
        } else {
            $patient_id = $searchModel->patient_id;
        }
        $dataProvider->query->andFilterWhere(['patient_id' => $patient_id])->andFilterWhere(['lis_code' => $searchModel->lis_code])->groupBy(['lis_code']);
        return $this->render('lab_result_custom', [
                    'hn' => $searchModel->patient_id,
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
                    'pagination' => ['pageSize' => 500,],
        ]);
    }

}
