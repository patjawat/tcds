<?php
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
<h2><i class="fas fa-clipboard-check"></i> Dietitian</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">OPD  Visit</a></li>
    <li><a data-toggle="tab" href="#menu1">IPD Visit</a></li>
    <li><a data-toggle="tab" href="#menu2">OPD HD Visit</a></li>
    <li><a data-toggle="tab" href="#menu3">IPD HD Visit</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <!-- <h3>HOME</h3> -->
      <h3><i class="fas fa-tasks"></i> แบบฟอร์ม OPD NUTRITION VISIT RECORD</h3>

      <?php if($hn):?>
      <iframe width="100%" height="600" src="<?=Url::base(true);?>/index.php?r=dietitian/default/form&form_name='opd_nutrition_visit_record'" frameborder="0" allowfullscreen></iframe>

<?php endif;?>
    </div>
    <div id="menu1" class="tab-pane fade">
    <h3><i class="fas fa-tasks"></i> แบบฟอร์ม IPD NUTRITION VISIT RECORD</h3>

    <?php if($hn):?>
    <iframe width="100%" height="600" src="<?=Url::base(true);?>/index.php?r=dietitian/default/form&form_name='ipd_nutrition_visit_record'" frameborder="0" allowfullscreen></iframe>
    <?php endif;?>
    </div>
    <div id="menu2" class="tab-pane fade">
    <h3><i class="fas fa-tasks"></i> แบบฟอร์ม OPD NUTRITIONAL ASSESSMENT FOR HEMODIALYSIS PATIENT</h3>

    <?php if($hn):?>
    <iframe width="100%" height="600" src="<?=Url::base(true);?>/index.php?r=dietitian/default/form&form_name='opd_nutritional_assessment_for_hemodialysis_patient'" frameborder="0" allowfullscreen></iframe>
    <?php endif;?>
    </div>
    <div id="menu3" class="tab-pane fade">
    <h3><i class="fas fa-tasks"></i> แบบฟอร์ม IPD NUTRITIONAL ASSESSMENT FOR HEMODIALYSIS PATIEN</h3>

    <?php if($hn):?>
    <iframe width="100%" height="600" src="<?=Url::base(true);?>/index.php?r=dietitian/default/form&form_name='ipd_nutritional_assessment_for_hemodialysis_patient'" frameborder="0" allowfullscreen></iframe>
    <?php endif;?>
    </div>
  </div>
