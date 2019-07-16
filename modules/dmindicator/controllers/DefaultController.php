<?php

namespace app\modules\dmindicator\controllers;

use Yii;
use app\modules\dmindicator\models\DmIndicators;
use app\modules\dmindicator\models\DmIndicatorsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use app\components\PatientHelper;
use \yii\web\Response;


class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $pcc_vn = PatientHelper::getCurrentPccVn();
        $vn = PatientHelper::getCurrentVn();
        $hn = PatientHelper::getCurrentHn();
        $checkvn = DmIndicators::findOne(['pcc_vn' => $pcc_vn, 'vn' => $vn]);

        if ($checkvn) {
            $model = $checkvn;
            

        } else {
            $model = new DmIndicators();
            // $model->id = substr(Yii::$app->getSecurity()->generateRandomString(),10);
            $model->hn = $hn;
            $model->vn = $vn;
            $model->pcc_vn = $pcc_vn;
        }

        if ($model->load(Yii::$app->request->post())) {
            // return $this->redirect(['view', 'id' => $model->id]);
            $eye_out_hos = [
                'no_dr' => $model->eye_out_hos['no_dr'],
                'neuropathy_vaseular' => $model->eye_out_hos['neuropathy_vaseular']
            ];
            $model->eye_out_hos = Json::encode($eye_out_hos);
            $model->save();
        }
        $model->eye_out_hos = Json::decode($model->eye_out_hos);
        $model->neuropathy_vaseular = Json::decode($model->neuropathy_vaseular);

        return $this->render('index', [
            'model' => $model,
        ]);
    }
}
