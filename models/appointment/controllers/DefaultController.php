<?php

namespace app\modules\appointment\controllers;

use yii\web\Controller;
use app\modules\appointment\models\PccAppoinmentShow;
/**
 * Default controller for the `appointment` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $events = PccAppoinmentShow::find()->all();
        
        $masker = [];
        foreach ($events as $eve) {
            
            $event = new \yii2fullcalendar\models\Event();
            $event->id = $eve->id;
            $event->title ='test';
            $event->start = $eve->startdate;
            $event->end = $eve->enddate;
            $event->backgroundColor = $eve->color;
            $masker[] = $event;
        }
        
        // ---- table ---
        $sql ="SELECT a.provider_name,a.hn,a.date_visit,a.time_visit,a.appoint_date,a.appoint_detail,p.cid,a.clinic
                FROM gateway_emr_appointment a 
                LEFT JOIN pcc_patient p ON p.hn = a.hn
                WHERE p.cid='3200700311770'
                ORDER BY appoint_date";

        try {
            $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
            
        } catch (Exception $ex) {
            throw new \yii\web\ConflictHttpException('Sql Error');
        }
        $dataProvider = new \yii\data\ArrayDataProvider([
            'allModels'=> $rawData 
        ]);

        return $this->render('index', [
                    'events' => $masker,
                    'dataProvider'=>$dataProvider
        ]);
    }
}
