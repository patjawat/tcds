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

$qr2 = $model->hn.'-'.$model->vn.'-'.$type_id.'-2';
echo $qr2;
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
<!-- Single button -->
<!-- <div class="btn-group" style="    position: absolute;right: 0;margin-right: 22px;margin-top: 2.5%;z-index: 1;">
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i class="far fa-file-alt"></i> เอกสาร <span class="caret"></span>
  </button>
  <ul class="dropdown-menu dropdown-menu-right">
    <li>
    <li><?php // Html::a('แบบฟอร์ม OPD DOCTOR RECORD', ['/chiefcomplaint/report/opd-doctor-record','report_name' => 'opd-doctor-record','hn' => $hn,'vn' => $vn],['class' => 'print']) ?></li>
    <li><?php //Html::a('แบบฟอร์ม OPD NOTE.mrt', Url::to(ReportHelper::Url().'opd_note.php', true),['target' => '_blank'])?></li>
  </ul>
</div> -->

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


// $('.print').click(function(e){
//     e.preventDefault();
//     var url = $(this).attr('href');
//     $.ajax({
//         type: "post",
//         url: "index.php?r=opdvisit/opd-visit/check-print-status",
//         dataType: "json",
//         success: function (response) {
//             if(response == "print"){
//                 $.alert({
//                     theme:'modern',
//                     title: 'แจ้งเตือน!',
//                     content: 'OPD DOCTOR RECORD ได้ถูกพิมพ์แล้ว',
//                     backgroundDismiss: false,
//                     backgroundDismissAnimation: 'glow',
//                     animation: 'zoom',
//                     closeAnimation: 'scale'
//                     // animationSpeed: 900,
//                 }
//                 );

//                 return false;
//             }else{
//                 $.confirm({
//                     theme:'modern',
//                     title: 'พิมพ์ OPD DOCTOR RECORD',
//                     content: 'ยืนยันการพิมพ์ OPD DOCTOR RECORD!',
//                     buttons: {
//                         confirm: function () {
//                             window.open(url);
//                         },
//                         cancel: function () {
//                             $.alert('Canceled!');
//                         },
//                     }
//                 });


               
//             }
//         }
//     });
    
// });


JS;
$this->registerJS($js);
?>
