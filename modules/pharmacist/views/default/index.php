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
<li><?=Html::a('แบบฟอร์ม OPD MEDICATION RECONCILIATION', ['/pharmacist/default/form','form_name' => 'opd_medication_reconciliation','title' => 'OPD MEDICATION RECONCILIATION'],['target' => '_blank'])?></li>
</ul>
      
      
      
      
      
    
