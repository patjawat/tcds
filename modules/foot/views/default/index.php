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

.text-right {
    text-align: right;
}

.text-center {
    text-align: center;
}
</style>
<h2 class=""><i class="fas fa-clipboard-check"></i> ฟอร์ม Dietitian</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home"><i class="fas fa-print"></i> ฟอร์ม Dietitian Print</a></li>
    <li><a data-toggle="tab" href="#menu1"><i class="fas fa-clipboard-check"></i> Foot Assessment Record Complete</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
    <h3 class=""><i class="fas fa-print"></i> ฟอร์ม Dietitian Print</h3>
      <ul>
<li><?=Html::a('แบบฟอร์ม IPD DIABETIC FOOT ASSESSMENT RECORD : SUMMARY', ['/foot/default/form','form_name' => 'ipd_diabetic_foot_assessment_record_summary','title' => 'IPD DIABETIC FOOT ASSESSMENT RECORD : SUMMARY'],['target' => '_blank'])?></li>

<li><?=Html::a('แบบฟอร์ม OPD DIABETIC FOOT ASSESSMENT RECORD : SUMMARY', ['/foot/default/form','form_name' => 'opd_diabetic_foot_assessment_record_summary','title' => 'OPD DIABETIC FOOT ASSESSMENT RECORD : SUMMARY'],['target' => '_blank'])?></li>

<li><?=Html::a('แบบฟอร์ม DIABETIC FOOT ASSESSMENT RECORD : COMPLETE', ['/foot/default/form','form_name' => 'diabetic_foot_assessment_record_complete','title' => 'DIABETIC FOOT ASSESSMENT RECORD : COMPLETE'],['target' => '_blank'])?></li>

<li><?=Html::a('แบบฟอร์ม IPD DIABETIC FOOT ULCER VISIT RECORD : IPD DFU FIRST VISIT', ['/foot/default/form','form_name' => 'ipd_diabetic_foot_ulcer_visit_record_ipd_dfu_first_visit','title' => 'IPD DIABETIC FOOT ULCER VISIT RECORD : IPD DFU FIRST VISIT'],['target' => '_blank'])?></li>

<li><?=Html::a('แบบฟอร์ม OPD DIABETIC FOOT ULCER VISIT RECORD : OPD DFU FIRST VISIT', ['/foot/default/form','form_name' => 'opd_diabetic_foot_ulcer_visit_record_opd_dfu_first_visit','title' => 'OPD DIABETIC FOOT ULCER VISIT RECORD : OPD DFU FIRST VISIT'],['target' => '_blank'])?></li>

<li><?=Html::a('แบบฟอร์ม IPD DIABETIC FOOT ULCER VISIT RECORD : IPD DFU FU VISIT', ['/foot/default/form','form_name' => 'ipd_diabetic_foot_ulcer_visit_record_ipd_dfu_fu_visit','title' => 'IPD DIABETIC FOOT ULCER VISIT RECORD : IPD DFU FU VISIT'],['target' => '_blank'])?></li>

<li><?=Html::a('แบบฟอร์ม OPD DIABETIC FOOT ULCER VISIT RECORD : OPD DFU FU VISIT', ['/foot/default/form','form_name' => 'opd_diabetic_foot_ulcer_visit_record_opd_dfu_fu_visit','title' => 'OPD DIABETIC FOOT ULCER VISIT RECORD : OPD DFU FU VISIT'],['target' => '_blank'])?></li>

</ul>
    </div>
    <div id="menu1" class="tab-pane fade">
     <div id="view-foot"></div>
    </div>
  </div>

<?php
$js  = <<< JS

$.ajax({
    type: "get",
    url: "index.php?r=foot/foot-assessment/complate",
    dataType: "json",
    success: function (response) {
        $("#view-foot").html(response)
    }
});
JS;
$this->registerJS($js);
?>