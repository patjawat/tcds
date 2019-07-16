
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

// use Model
use app\modules\doctorworkbench\models\CIcd10tm;

$url = \yii\helpers\Url::to(['order/icd10-list']);//กำหนด URL ที่จะไปโหลดข้อมูล
$prefix = empty($person->prefix_id) ? '' : BasePrefix::findOne($model->prefix_id)->prefix_name;//กำหนดค่าเริ่มต้น
?>
<style>
.navbar-default .navbar-nav > li.dropdown:hover > a, 
.navbar-default .navbar-nav > li.dropdown:hover > a:hover,
.navbar-default .navbar-nav > li.dropdown:hover > a:focus {
    background-color: rgb(231, 231, 231);
    color: rgb(85, 85, 85);
}
li.dropdown:hover > .dropdown-menu {
    display: block;
	background-color: #eee;
}
.nav-tabs > li {
    background-color: #c7c7c7c7;
}
.nav-tabs > li > a {
    color:#353535;
}
.text-right{
    text-align: right;
}
.text-center{
    text-align: center;
}
/* .form-group {
    margin-bottom: -20px;
} */

</style>
  <!-- start panel -->

 
<div class="panel panel-info">
	<div class="panel-heading">
		<div class="panel-title"><li class="fa fa-stethoscope"></li> Doctor Order Today</div>
	</div>
	<div class="panel-body">
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<!-- tabs -->
  <ul class="nav nav-tabs">
  <li class="<?=$emr;?>"><?=Html::a('EMR', ['/doctorworkbench/order/emr'])?></li>    
  <li class="<?=$lab;?>"><?=Html::a('Lab History', ['/doctorworkbench/order/lab'])?></li> 
  <li class="<?=$drug;?>"><?=Html::a('Drug History', ['/doctorworkbench/order/drug'])?></li>  
  <li class="<?=$cc;?>"><?=Html::a('CC', ['/doctorworkbench/order/cc'])?></li>    
    <li class="<?=$diagnosis;?>"><?=Html::a('Diganosis', ['/doctorworkbench/pcc-diagnosis'])?></li>
    <li class="<?=$medication;?>"><?=Html::a('Medication', ['/doctorworkbench/pcc-medication'])?></li>
    <li class="<?=$procedure;?>"><?=Html::a('Procedure', ['/doctorworkbench/pcc-procedure'])?></li>
    <li class="<?=$pre_order_lab;?>"><?=Html::a('Pre-Order Lab', ['/doctorworkbench/order/pre-order-lab'])?></li>
    <li class="<?=$apointment;?>"><?=Html::a('Appointment', ['/doctorworkbench/order/appointment'])?></li>
    <li class="<?=$treatmment_plan;?>"><?=Html::a('Treatment Plan', ['/doctorworkbench/order/treatmment-plan'])?></li>    
  
  </ul>

  <div class="tab-content">
  <br>