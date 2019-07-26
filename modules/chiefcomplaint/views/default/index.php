<?php
// load JavaScript From @web/js/chiefcomplaint.js
use yii\helpers\Html;
use yii\helpers\Url;
use yii\base\InvalidConfigException;
use yii\bootstrap\Modal;
use yii\web\JsExpression;
use yii\web\View;
use app\components\PatientHelper;
use app\components\DateTimeHelper;
use app\components\ReportHelper;
use app\modules\chiefcomplaint\models\Chiefcomplaint;

$hn = PatientHelper::getCurrentHn();
$vn = PatientHelper::getCurrentVn();
$this->params['pt_title'] = PatientHelper::getPatientTitleByHn($hn);

use app\modules\opdvisit\models\OpdVisit;
$type_id = 'A01';
$model = OpdVisit::findOne(['hn' => $hn,'vn' => $vn]);
// Modal::begin([
//     'header' => '<h4>Hello world</h4>',
//     // 'toggleButton' => ['label' => 'click me'],
//     'id' => 'report-modal',
//     'size'   => 'model-lg',
//     'clientOptions' => ['backdrop' => 'static', 'keyboard' => false],
//     'footer' => '<button class="btn btn-danger" data-dismiss="modal">ปิด</button>'
    

// ]);

// // echo 'Say hello...';

// Modal::end();

?>

<style>
.btn-patient-alert{
    display:none;
}
#report-modal > .modal-dialog{
    width:70%;
}
</style>

<?php
// $qr2 = $model->hn.'-'.$model->vn.'-'.$type_id.'-2';

?>
<div class="view-process">
<div class="row">
    <div class="col-xs-6 col-xs-offset-3 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
<h3>บันทึกข้อมูล กรุณารอสักครู่ ...</h3>
<div class="progress progress-striped active">
   <div class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
      <span class="sr-only">45% Complete</span>
   </div>
</div>
</div>
        
</div>
</div>

<div class="view-container">

<div id="showForm-chiefcomplaint"></div>

</div>
<?php
$hn  = PatientHelper::getCurrentHn();
$js = <<< JS

$(".view-process").hide();

loadFormChiefcomplaint();
loadDrugAllergy();
$('.patient-alert').click(function(){
    $('#patient-alert').modal('show');
});

JS;
$this->registerJS($js);
?>
