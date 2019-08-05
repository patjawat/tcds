<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
// use kartik\form\ActiveForm;
use yii\web\View;
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
    <li><a data-toggle="tab" href="#menu1"><i class="fas fa-print"></i> Personal and Past Medical
            History</a></li>
    <li  class="active"><a data-toggle="tab" href="#menu2"><i class="fas fa-clipboard-check"></i> Current foot problem and
            Examination</a></li>
    <li><a data-toggle="tab" href="#menu3"><i class="fas fa-clipboard-check"></i> Footwear assessment</a></li>
    <li><a data-toggle="tab" href="#menu4"><i class="fas fa-clipboard-check"></i> Education foot care assessment</a>
    </li>
</ul>

<div class="tab-content">
    <div id="menu1" class="tab-pane fade">
        <?=$this->render('medical_history', ['form' => $form,'model' => $model]);?>
    </div>
    <div id="menu2" class="tab-pane fade in active">
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



AbiRight()
AbiLeft()
TbiRight()
TbiLeft()



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



occupationOtherCheck()

$(".occupation").click(function(e, parameters) {
var nonUI = false;
try {
    nonUI = parameters.nonUI;
} catch (e) {}
var checked = nonUI ? !this.checked : this.checked;
// alert('Checked = ' + checked);
var value = e.target.value;
if(checked == true){
    if(value == 11){
        $('#occupation_other').css("background-color",'#fff').prop('readonly', false);
    }
   console.log('checked'+value);
}else{
   console.log('Uncheck'+value);
  
    if(value == 11){
        $('#occupation_other').css("background-color",'#eee').prop('readonly', true);
        $('#occupation_other').val('');
    }
}
});

usingAmbulationAid()
smoking()

$('.using_ambulation_aid').click(function (e) { 
    // e.preventDefault();
    // console.log(e.target.value)
    usingAmbulationAid()
    
});

$('.smoking_item').click(function (e) { 
    smoking()
});



function occupationOtherCheck(){
    $('#footassessment-record_complete-occupation > div > label > input').each(function(index, e){
 // statement
    if(e.checked == true & e.value == 11){
        console.log(e.value)
        $('#occupation_other').css("background-color",'#fff').prop('readonly', false);
    }else{
        $('#occupation_other').css("background-color",'#eee').prop('readonly', true);
        $('#occupation_other').val('');
    }
});
}

function usingAmbulationAid(){
var val = $(".using_ambulation_aid:checked").val();
    if(val == 'Yes'){
        $('.specify_site').show(300)
    }else{
        $('.specify_site').hide(300);
    }
}
//2. Smoking
function smoking(){
    $('#footassessment-record_complete-smoking > div > label > input').each(function(index, e){
    if(e.checked == true & e.value == 3){
        console.log(e.value)
        $('#how_long_ago').show(300)
    }else{
        $('#how_long_ago').hide(300)
    }
   
});
}

//5. Previous foot ulcer
function previousFootUlcer(val,position){
        if(val == 'Yes'){
            $(position).show(300)
            
        }else{
            $(position).hide(300);
        }
}
// 5. Previous foot ulcer Digit
function previousFootUlcerDigit(val,position){
        if(val == 4){
            $(position).show(300)
        }else{
            $(position).hide(300)
        }
        // $('.ulcer_digit_right').show(300)
    console.log(position)
    // alert(position)
    

}

//6. Previous amputation
function previousAmputation(val,position){
    if(val == 'Yes'){
            $(position).show(300)
            // console.log(val,position)
            // previousAmputationDigit(position)
            
        }else{
            $(position).hide(300);
            // console.log(val,position)
            // previousAmputationDigit(position)


        }
}

function previousAmputationDigit(val,position){

    if(val == 7){
        console.log(position)
        $(position).show(300)
    }else{
        $(position).hide(300)
    }

}

function footSum(val){
console.log(val)
// console.log(e.target.value)
} 



function validationNum(num){
    return $.isNumeric(num);
    console.log($.isNumeric(num))
}

function AbiRight(){
    var num1 = $('#abi1_right').val();
    var num2 = $('#abi2_right').val();
    if(num2!==''){
        var result = (num1/num2).toFixed(2);
        // console.log(result)
    }else{
        var result = '00.00'
    }
    $('.abi-result-right').html(result)

}


function AbiLeft(){
    var num1 = $('#abi1_left').val();
    var num2 = $('#abi2_left').val();
    if(num2!==''){
        var result = (num1/num2).toFixed(2);
    }else{
        var result = '00.00'
    }
    $('.abi-result-left').html(result)
}

// #########

function TbiRight(){
    var num1 = $('#tbi1_right').val();
    var num2 = $('#tbi2_right').val();
    if(num2!==''){
        var result = (num1/num2).toFixed(2);
    }else{
        var result = '00.00'
    }
    $('.tbi-result-right').html(result)
console.log(num2)
}


function TbiLeft(){
    var num1 = $('#tbi1_left').val();
    var num2 = $('#tbi2_left').val();
    if(num2!==''){
        var result = (num1/num2).toFixed(2);
    }else{
        var result = '00.00'
    }
    $('.tbi-result-left').html(result)
}


JS;
$this->registerJS($js,View::POS_END, 'my-options');
?>