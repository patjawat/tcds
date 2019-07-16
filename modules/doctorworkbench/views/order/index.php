<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use phpnt\ICheck\ICheck;
use kartik\datecontrol\DateControl;
use app\components\PatientHelper;
use app\components\MessageHelper;
use app\components\loading\ShowLoading;
use unclead\multipleinput\MultipleInput;
use kartik\widgets\Select2;
use yii\web\JsExpression;
use kartik\tabs\TabsX;
use yii\helpers\Url;


// use Model
use app\modules\doctorworkbench\models\CIcd10tm;

$url = \yii\helpers\Url::to(['order/icd10-list']);//กำหนด URL ที่จะไปโหลดข้อมูล
$prefix = empty($person->prefix_id) ? '' : BasePrefix::findOne($model->prefix_id)->prefix_name;//กำหนดค่าเริ่มต้น
?>
<?=$this->render('../default/panel_top',[
'emr' => '',
'lab' => '',
'drug' => '',
'diagnosis' => '',
'medication' => '',
'procedure' => '',
'pre_order_lab' =>'',
'apointment' => '',
'treatmment_plan' => '',
'cc' => '',
'pi' => '',
'pe' => '',
'education' => ''

]);?>
<h1 class="text-center">ORDER</h1>
<?=$this->render('../default/panel_foot');?>
