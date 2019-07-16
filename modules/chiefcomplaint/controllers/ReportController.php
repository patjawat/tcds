<?php

namespace app\modules\chiefcomplaint\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\components\PatientHelper;
use app\components\DbHelper;
use app\components\UnitHelper;
use \yii\web\Response;
use yii\helpers\Html;
use yii\helpers\Json;
use kartik\mpdf\Pdf;
use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;
use app\modules\opdvisit\models\OpdVisit;
use app\modules\opdvisit\models\HisPatient;
use app\modules\chiefcomplaint\models\Chiefcomplaint;
use app\modules\lab\models\LabResult;
use app\modules\document\models\Documentqr;

class ReportController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $vn = PatientHelper::getCurrentVn();
        $hn = PatientHelper::getCurrentHn();
        $report_name = Yii::$app->request->get('report_name');
        $model = OpdVisit::findOne(['hn' => $hn,'vn' => $vn]);
        if(Yii::$app->request->isAjax) {

            Yii::$app->response->format = Response::FORMAT_JSON;
            return $this->renderAjax('index',[
                'report_name' => $report_name,
                'model' => $model
            ]);

        }else{

            return $this->render('index',[
                'model' => $model,
                'report_name' => $report_name,
            ]);

        }
    }


    public function actionOpdDoctorRecord(){
        $vn = PatientHelper::getCurrentVn();
        $hn = PatientHelper::getCurrentHn();
        $model = OpdVisit::findOne(['hn' => $hn,'vn' => $vn]);
        $vs_data = Chiefcomplaint::findOne(['hn' => $hn,'vn' => $vn]);
        $vs_data ? $vs = $vs_data : $vs = new Chiefcomplaint();
        $type_id = 'A01';
        // กำหนดรูปแบบ QR Code
        $qr1 = $model->hn.'-'.$model->vn.'-'.$type_id.'-1';
        $qr2 = $model->hn.'-'.$model->vn.'-'.$type_id.'-2';
        //  จบ

        // บันทึกสถานะการปริ้นเอกสาร
        $docQr1 = Documentqr::find()->where(['real_filename' => $qr1.'.jpg'])->one();
        if($docQr1){
            $docQr1->print = '1';
            $docQr1->save();
        }else{
            $docQr1 = new Documentqr();
            $docQr1->id = substr(Yii::$app->getSecurity()->generateRandomString(), 10);
            $docQr1->hn = $hn;
            $docQr1->type_id = $type_id;
            $docQr1->real_filename = $qr1.'.jpg';
            $docQr1->print = '1';
            $docQr1->save();
        }
        
        // จบ

        if(LabResult::find()->where(['patient_id' => $hn])->one()){
            $labs = LabResult::find()->where(['patient_id' => $hn])
            ->groupBy(['checkin_date','checkin_time'])
            ->limit(4)->all();
          }else {
            $labs = LabResult::find()->where(['patient_id' => $hn])->all();
          }

        $content = $this->renderPartial('opd_doctor_record', [
            'model' => $model,
            'vs' => $vs,
            'labs' => $labs,
            'qr1' => $qr1,
            'qr2' => $qr2
        ]);
    
        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            // 'cssFile' => '@app/web/css/pdf.css',
            'cssFile' => '@app/web/css/kv-mpdf-bootstrap.css',
            // any css to be embedded if required
            'cssInline' => '.bd{border:1.5px solid; text-align: center;} .ar{text-align:right} .imgbd{border:1px solid}',
            // set mPDF properties on the fly
            'options' => ['title' => 'Preview Report Case: '],
            // call mPDF methods on the fly
            'methods' => [
                // 'SetHeader'=>'OPD-DOCTOR-RECORD',
                // 'SetFooter'=>['{PAGENO}'],
                'SetHeader'=>false,
                'SetFooter'=>false,
            ],
            'marginLeft' => 1,
            'marginRight' => 1,
            'marginTop' => 5,
            // 'marginBottom' => 10,
            // 'marginFooter' => 5
            
        ]);
        // Fonts Config
        $defaultConfig = (new ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];

        $defaultFontConfig = (new FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];

        $pdf->options['fontDir'] = array_merge($fontDirs, [
            Yii::getAlias('@webroot').'/fonts'
        ]);
        $pdf->options['fontdata'] = $fontData + [
                'angsana' => [
                    'R' => 'Angsana.ttf',
                    'TTCfontID' => [
                        'R' => 1,
                    ],
                ],
                'sarabun' => [
                    'R' => 'thsarabunnew-webfont.ttf',
                ]
            ];

        return $pdf->render();
       
    }

}