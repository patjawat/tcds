<?php

namespace app\modules\hd\controllers;

use Yii;
use yii\web\Controller;
use \yii\web\Response;
use yii\helpers\Html;
use yii\helpers\Json;
use kartik\mpdf\Pdf;
use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;
use app\components\PatientHelper;
use app\modules\opdvisit\models\OpdVisit;
use app\modules\opdvisit\models\HisPatient;
use app\modules\chiefcomplaint\models\Chiefcomplaint;

class DefaultController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionForm(){
        $vn = PatientHelper::getCurrentVn();
        $hn = PatientHelper::getCurrentHn();
        $model = OpdVisit::findOne(['hn' => $hn,'vn' => $vn]) ? OpdVisit::findOne(['hn' => $hn,'vn' => $vn]) : new  OpdVisit() ;
        $vs_data = Chiefcomplaint::findOne(['hn' => $hn,'vn' => $vn]);
        $vs_data ? $vs = $vs_data : $vs = new Chiefcomplaint();
        // $form_name = substr(Yii::$app->request->get('form_name'), 1,-1);
        $form_name = Yii::$app->request->get('form_name');
        $title = Yii::$app->request->get('title');
        $content = $this->renderPartial($form_name, [
            'model' => $model,
            'vs' => $vs,
            'title' => $title
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
                'SetHeader' => $this->renderPartial('hd_o_header',[
                    'model' => $model,
                    'vs' => $vs,
                    'title' => $title

                ]),
                'SetFooter'=> $this->renderPartial('hd_footer'),
                // 'SetHeader'=>true,
                // 'SetFooter'=>true,
            ],
            'marginLeft' => 10,
            'marginRight' => 10,
            'marginTop' => 38,
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
