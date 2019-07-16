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
<h2 class=""><i class="fas fa-clipboard-check"></i> ฟอร์ม DM PATIENT & EDUCATION</h2>
<ul>
<li><?=Html::a('แบบฟอร์ม DM Assessment Today', ['/dm/default/form','form_name' => 'dm_assessment_today','title' => 'DM Assessment Today'],['target' => '_blank'])?></li>
<li><?=Html::a('แบบฟอร์ม Multidisciplinary Team Record of Diabetic Education', ['/dm/default/form','form_name' => 'multidisciplinary_team_record_of_diabetic_education','title' => 'Multidisciplinary Team Record of Diabetic Education'],['target' => '_blank'])?></li>
<li><?=Html::a('แบบฟอร์ม Seven self-care behavior assessment and evaluation', ['/dm/default/form','form_name' => 'seven_self_care_behavior_assessment_and_evaluation','title' => 'Seven self-care behavior assessment and evaluation'],['target' => '_blank'])?></li>
<li><?=Html::a('แบบฟอร์ม New DM History', ['/dm/default/form','form_name' => 'new_dm_history','title' => 'New DM History'],['target' => '_blank'])?></li>
<li><?=Html::a('DM Indicators', null,['target' => '_blank'])?></li>
</ul>
      
      
      
      
      
    
