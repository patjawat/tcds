<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\components\PatientHelper;
use app\modules\opdvisit\models\OpdVisit;
use app\modules\opdvisit\models\HisPatient;
use app\modules\chiefcomplaint\models\Chiefcomplaint;

$vn = PatientHelper::getCurrentVn();
$hn = PatientHelper::getCurrentHn();
$model = OpdVisit::findOne(['hn' => $hn,'vn' => $vn]);
$vs_data = Chiefcomplaint::findOne(['hn' => $hn,'vn' => $vn]);
$vs_data ? $vs = $vs_data : $vs = new Chiefcomplaint();
$this->params['pt_title'] = PatientHelper::getPatientTitleByHn($hn);

?>
<style>
.navbar-default .navbar-nav>li.dropdown:hover>a,
.navbar-default .navbar-nav>li.dropdown:hover>a:hover,
.navbar-default .navbar-nav>li.dropdown:hover>a:focus {
    background-color: rgb(231, 231, 231);
    color: rgb(85, 85, 85);
}

li.dropdown:hover>.dropdown-menu {
    display: block;
    background-color: #eee;
}

.nav-tabs>li {
    background-color: #eee;
}

.nav-tabs>li>a {
    color: #353535;
    margin-right: -1px;
}

.text-right {
    text-align: right;
}

.text-center {
    text-align: center;
}
</style>
<h2 class=""><i class="fas fa-clipboard-check"></i> ฟอร์ม Dietitian</h2>
<ul>
<li><?=Html::a('แบบฟอร์ม OPD NUTRITION VISIT RECORD', ['/dietitian/default/form','form_name' => 'opd_nutrition_visit_record','title' => 'OPD NUTRITION VISIT RECORD'],['target' => '_blank'])?></li>

<li><?=Html::a('แบบฟอร์ม IPD NUTRITION VISIT RECORD', ['/dietitian/default/form','form_name' => 'ipd_nutrition_visit_record','title' => 'IPD NUTRITION VISIT RECORD'],['target' => '_blank'])?></li>

<li><?=Html::a('แบบฟอร์ม OPD NUTRITIONAL ASSESSMENT FOR HEMODIALYSIS PATIENT', ['/dietitian/default/form','form_name' => 'opd_nutritional_assessment_for_hemodialysis_patient','title' => 'OPD NUTRITIONAL ASSESSMENT FOR HEMODIALYSIS PATIENT'],['target' => '_blank'])?></li>

<li><?=Html::a('แบบฟอร์ม IPD NUTRITIONAL ASSESSMENT FOR HEMODIALYSIS PATIENT', ['/dietitian/default/form','form_name' => 'ipd_nutritional_assessment_for_hemodialysis_patient','title' => 'IPD NUTRITIONAL ASSESSMENT FOR HEMODIALYSIS PATIENT'],['target' => '_blank'])?></li>

<li><?=Html::a('แบบฟอร์ม OPD NUTRITION VISIT RECORD FOR HEALTH CHECK-UP', ['/dietitian/default/form','form_name' => 'opd_nutrition_visit_record_for_health_check-up','title' => 'OPD NUTRITION VISIT RECORD FOR HEALTH CHECK-UP'],['target' => '_blank'])?></li>

<li><?=Html::a('แบบฟอร์ม THEPTARIN PRENATAL WEIGHT GAIN CHART FOR NORMAL WEIGHT MOTHER', ['/dietitian/default/form','form_name' => 'Theptarin_prenatal_weight_gain_chart_for_normal_weight_mother','title' => 'THEPTARIN PRENATAL WEIGHT GAIN CHART FOR NORMAL WEIGHT MOTHER'],['target' => '_blank'])?></li>

<li><?=Html::a('แบบฟอร์ม THEPTARIN PRENATAL WEIGHT GAIN CHART FOR OBESE MOTHER', ['/dietitian/default/form','form_name' => 'Theptarin_prenatal_weight_gain_chart_for_obese_mother','title' => 'THEPTARIN PRENATAL WEIGHT GAIN CHART FOR OBESE MOTHER'],['target' => '_blank'])?></li>

<li><?=Html::a('แบบฟอร์ม THEPTARIN PRENATAL WEIGHT GAIN CHART FOR OVERWEIGHT MOTHER', ['/dietitian/default/form','form_name' => 'Theptarin_prenatal_weight_gain_chart_for_overweight_mother','title' => 'THEPTARIN PRENATAL WEIGHT GAIN CHART FOR OVERWEIGHT MOTHER'],['target' => '_blank'])?></li>

<li><?=Html::a('แบบฟอร์ม THEPTARIN PRENATAL WEIGHT GAIN CHART FOR UNDERWEIGHT MOTHER', ['/dietitian/default/form','form_name' => 'Theptarin_prenatal_weight_gain_chart_for_underweight_mother','title' => 'THEPTARIN PRENATAL WEIGHT GAIN CHART FOR UNDERWEIGHT MOTHER'],['target' => '_blank'])?></li>

</ul>
      
      
      
      
      
    
