<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
// use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use karatae99\datepicker\DatePicker;
use app\modules\foot\models\ItemsOccupation;
use app\modules\foot\models\ItemsSmokingFoot;
use app\modules\foot\models\ItemsSmokingHowLongAgo;
use app\modules\foot\models\ItemsActivity;
use app\modules\foot\models\ItemsSpecify;
use app\modules\foot\models\ItemsSpecifySiteDigit;
use app\modules\foot\models\ItemsSpecifyTypeSite;
use app\modules\foot\models\ItemsSpecifySite;
use app\modules\foot\models\ItemsProsthesisFor;
use app\modules\foot\models\ItemsSpecifyProcedureDate;

use app\components\PatientHelper;
$vn = PatientHelper::getCurrentVn();
$hn = PatientHelper::getCurrentHn();
$this->params['pt_title'] = PatientHelper::getPatientTitleByHn($hn);
?>
<style>
.radio,
.checkbox {
    position: relative;
    display: block;
    margin-top: 10px;
    margin-bottom: 10px;
    background-color: #e2e2e2;
    padding: 6px;
    /* width: 216px; */
    border-radius: 5px;
}

.checkbox:hover {
    background-color: #c5c5c5;
}

.field-footassessment-record_complete-smoking_how_long_ago>.control-label {
    background-color: #999;
    color: #fff;
    height: 33px;
    padding: 6px;
    margin-top: -5px;
    margin-bottom: -5px;
    border-radius: 5px;
    width: 100%;
}

.field-footassessment-record_complete-smoking_how_long_ago {
    margin-top: -5px;
}

.box-border {
    background-color: #FFF;
    border-radius: 5px;
    padding: 10px;
    margin-top: 15px;
}

.box-sub-border {
    border: 0.5px #039285 solid;
    border-radius: 5px;
    padding: 10px;
    margin-top: 15px;
}

.box-card {
    background-color: #FFF;
    border-radius: 8px;
    padding: 10px;
    margin-top: 15px;
}

.box-container {
    width: 50%;
    margin: auto;
}

.box-border {
    border-radius: 15px;
    padding: 20px;
    border: 1.5px #ddd solid;
    border-style: dashed;
}


.box-sub-border {
    border-radius: 15px;
    padding: 20px;
    border: 1.5px #ddd solid;
    border-style: dashed;
    margin-bottom: 27px;
}

.box-sub-title {
    text-align: -webkit-auto;
    color: #999;
    margin-top: -48px;
    background-color: #fff;
    width: 35%;
    text-align: -webkit-center;
    padding: 18px;
}

.box-title {
    text-align: -webkit-auto;
    color: #999;
    margin-top: -32px;
    background-color: #fff;
    width: 35%;
    padding: 2px;
}

.item-text-center {
    text-align: -webkit-center;
}

.control {
    display: inline-block;
    max-width: 100%;

    font-weight: 700;
    /* color: #039285; */
}

#footassessment-record_complete-specify_site_digit_right,
#footassessment-record_complete-specify_site_digit_left {

    display: block;
    margin-top: -10px;
    background-color: #e2e2e2;
    padding: 6px;
    border-radius: 5px;
}

#footassessment-record_complete-using_ambulation_aid {
    display: block;
    margin-top: 10px;
    background-color: #e2e2e2;
    padding: 6px;
    border-radius: 5px;
}
</style>


<?php $form = ActiveForm::begin([
    'id' => 'formFootComplate',
    'fieldConfig' => [
        'horizontalCssClasses' => [
            'label' => 'col-lg-4 col-md-4 col-sm-4',
            'wrapper' => 'col-lg-8 col-md-8 col-sm-8',
        ],
    ],
    // 'layout' => 'horizontal',
]);?>
<?=$form->field($model, 'requester')->hiddenInput(['class' => 'requester'])->label(false)?>


<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#menu1"><i class="fas fa-print"></i> Personal and Past Medical
            History</a></li>
    <li><a data-toggle="tab" href="#menu2"><i class="fas fa-clipboard-check"></i> Current foot problem and
            Examination</a></li>
    <li><a data-toggle="tab" href="#menu3"><i class="fas fa-clipboard-check"></i> Footwear assessment</a></li>
    <li><a data-toggle="tab" href="#menu4"><i class="fas fa-clipboard-check"></i> Education foot care assessment</a>
    </li>
</ul>

<div class="tab-content">
    <div id="menu1" class="tab-pane fade in active">
        <?=$this->render('medical_history', ['form' => $form,'model' => $model]);?>
    </div>
    <div id="menu2" class="tab-pane fade">
        <?=$this->render('problem_examination', ['form' => $form,'model' => $model]);?>
    </div>
    <div id="menu3" class="tab-pane fade">
        <?=$this->render('footwear_assessment', ['form' => $form,'model' => $model]);?>
    </div>
    <div id="menu4" class="tab-pane fade">
        <?=$this->render('education_foot_care_assessment', ['form' => $form,'model' => $model]);?>
    </div>
</div>

<br>
<!-- Start Row -->
<div class="row">
    <!-- start col -->
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
        <?=Html::submitButton('<i class="fas fa-check"></i> บันทึก', ['class' => "btn btn-success"]); ?>
    </div>
</div>
<!-- End Col -->

<?php ActiveForm::end(); ?>

<?php
$js = <<< JS
$(function(){
$("#formFootComplate").on('beforeSubmit', function (e) {
  e.preventDefault(); // stopping submitting
  if($('.requester').val() == ''){ //ถ้า requester == ''
    getRequester("#formFootComplate") // เรียก function พร้อมระบบ form id ไปด้วย
  }else{
  var form = $(this);
  if (form.find('.has-error').length) {
    return false;
    console.log(form.find('.has-error').length)
  } else {
   $.ajax({
       type: form.attr('method'),
       url: form.attr('action'),
       data: form.serialize(),
       dataType: "json",
       success: function (response) {
           console.log(response)
       }
   });
   return false;
  }
} // End Else
  return false;
});

});



JS;
$this->registerJS($js);
?>