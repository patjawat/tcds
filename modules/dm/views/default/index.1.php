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
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">DM Assessment Today (FU)</a></li>
    <li><a data-toggle="tab" href="#menu1">Team Record</a></li>
    <li><a data-toggle="tab" href="#menu2">Case Manager Summary</a></li>
    <li><a data-toggle="tab" href="#menu3">New DM History</a></li>
    <li><a data-toggle="tab" href="#menu4">DM Indicators</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <!-- <h3>HOME</h3> -->
      <h3><i class="fas fa-tasks"></i> แบบฟอร์ม DM Assessment Today</h3>
      <?php if($hn):?>
      <?=Html::a('DM Assessment Today', ['/dm/default/form','form_name' => 'dm_assessment_today','title' => 'DM Assessment Today'],['target' => '_blank'])?>
      <!-- <iframe width="100%" height="800" src="<?php //Url::base(true);?>/index.php?r=dm/default/form&form_name='dm_assessment_today'&title='DM Assessment Today'" frameborder="0" allowfullscreen></iframe> -->

<?php endif;?>
    </div>
    <div id="menu1" class="tab-pane fade">
   <h3><i class="fas fa-tasks"></i> แบบฟอร์ม Multidisciplinary Team Record of Diabetic Education</h3>
    <?php if($hn):?>
    <!-- <iframe width="100%" height="800" src="<?php //Url::base(true);?>/index.php?r=dm/default/form&form_name='multidisciplinary_team_record_of_diabetic_education'&title='Team Record'" frameborder="0" allowfullscreen></iframe> -->
    <?php endif;?>
    </div>
    <div id="menu2" class="tab-pane fade">
    <h3><i class="fas fa-tasks"></i> แบบฟอร์ม Seven self-care behavior assessment and evaluation</h3>
    <?php if($hn):?>
    <!-- <iframe width="100%" height="800" src="<?php //Url::base(true);?>/index.php?r=dm/default/form&form_name='seven_self_care_behavior_assessment_and_evaluation'&title='Case Manager Summary'" frameborder="0" allowfullscreen></iframe> -->
    <?php endif;?>
    </div>
    <div id="menu3" class="tab-pane fade">
    <h3><i class="fas fa-tasks"></i> แบบฟอร์ม New DM History</h3>
    <?php if($hn):?>
    <!-- <iframe width="100%" height="800" src="<?php //Url::base(true);?>/index.php?r=dm/default/form&form_name='new_dm_history'&title='New DM History'" frameborder="0" allowfullscreen></iframe> -->
    <?php endif;?>
    </div>
    <div id="menu4" class="tab-pane fade">
<h1 class="text-center">Comming soon</h1>
    </div>
  </div>
