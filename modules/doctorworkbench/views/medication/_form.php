<?php

use app\components\PatientHelper;
use kartik\widgets\Select2;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;
$hn = PatientHelper::getCurrentHn();

?>

<div class="medication-form">

    <?php $form = ActiveForm::begin([
    'id' => 'form-medication',
]);?>
    <div class="row">
        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
            <?php
//   $drugItems = empty($model->icode) ? '' : BasePrefix::findOne($model->prefix_id)->prefix_name;//กำหนดค่าเริ่
echo $form->field($model, 'icode')->widget(Select2::classname(), [
    // 'data' => ArrayHelper::map(HisDrug::find()->all(), 'id','trade_name'),
    'initValueText' => '', //กำหนดค่าเริ่มต้น
    'options' => [
        'id' => 'icode',
        'placeholder' => 'Select Drug Items ...',
        'disabled' => $hn ? false : true,
    ],
    'pluginOptions' => [
        'allowClear' => true,
        'minimumInputLength' => 3, //ต้องพิมพ์อย่างน้อย 3 อักษร ajax จึงจะทำงาน
        'ajax' => [
            'url' => \yii\helpers\Url::to(['drug-items-list']),
            'dataType' => 'json', //รูปแบบการอ่านคือ json
            'data' => new JsExpression('function(params) { return {q:params.term};}'),
        ],
    ],
    'pluginEvents' => [
        "select2:select" => "function() { $('#druguse').select() }",
    ],
])->label(false);
?>
        </div>

        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
            <?php echo $form->field($model, 'druguse')->textarea(['rows' => 3, 'placeholder' => 'ระบุบวิธีใช้...', 'id' => 'druguse', 'disabled' => $hn ? false : true])->label(false); ?>
        </div>
    </div>

    <div class="row">

    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <?=$form->field($model, 'qty')->textInput(['id' => 'qty', 'maxlength' => true, 'placeholder' => 'จำนวนจ่าย', 'disabled' => $hn ? false : true])->label(false);?>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <?=$form->field($model, 'no_med')->checkbox(['disabled' => $hn ? false : true])->label(false)?>

        </div>
    </div>

    <?php ActiveForm::end();?>

</div>
<?php

$js = <<< JS

$('#icode').select2('open');
loadNomedStatus();


$('#druguse').keypress(function(e){
    // e.preventDefault();
    // if(e.keyCode == 13){
    //     if($(this).val() == ''){
    //         alert('ระบุวิธีใช้');
    //     $('#druguse').select();
    //     return false;
    //     }else{
    //         $('#qty').select();
    //     }
    //     return false;
    // }
});

// $('#qty').keypress(function(e){
//     if(e.keyCode == 13){
//         if($(this).val() == ''){
//             alert('ระบุจำนวนการจ่ายยา');
//             $('#qty').select();
//             return false;

//         }else{
//         var form = $('#form-medication');
//      // return false if form still have some validation errors
//      if (form.find('.has-error').length) {
//           return false;
//      }

//     //  ตรวจสอบค่าว่าง
//     if($('#icode').val() == ""){
//         alert('ระบุรายการยา');
//         $('#icode').select2('open');
//         return false;
//     }else if($('#qty').val() == ''){
//         alert('ระบุจำนวนการจ่ายยา');
//         $('#qty').select();
//         return false;
//     }else if($('#druguse').val() == ''){
//         alert('ระบุจำนวนการจ่ายยา');
//         $('#druguse').select2('open');
//         return false;
//     }else{
//      // submit form
//      $.ajax({
//           url: form.attr('action'),
//           type: 'post',
//           data: form.serialize(),
//           dataTyle:'json',
//           success: function (response) {
//                // do something with response
//             //    $.pjax.reload({container: '#grid-medication-pjax'});
//             //  loadMedication();
//             loadMedicationForm();
//                $.pjax.reload({
//                         container:'#grid-medication-pjax',
//                         history:false,
//                         replace: false,
//                         url:'index.php?r=doctorworkbench/medication'
//                          });
//           }
//      });
//     }
//      return false;
//     }
// }
// });


$('#medication-no_med').click(function (e) {
    // e.preventDefault();
    $.ajax({
    type: "get",
    url: "index.php?r=doctorworkbench/medication/check-nomed",
    dataType: "json",
    success: function (response) {
        // console.log(response);
        if(response.status == true){
            loadNomedStatus();
        }else{
            alert('ต้องไม่มีรายการจ่ายยา');
            // $('#medication-no_med').attr('checked', false);
            // $('#medication-no_med').attr("disabled", true);
            // return false;
        }

    }
});

});


// ตรวจสอบสถานะยืนยันไม่จ่ายยา
function loadNomedStatus(){
$.ajax({
    type: "get",
    url: "index.php?r=doctorworkbench/medication/check-nomed-status",
    dataType: "json",
    success: function (response) {
        if(response.no_med == "Y"){
            $('#medication-no_med').attr('checked', true);
            $("#icode").prop("disabled", true);
            $("#qty").prop("disabled", true);
            $("#druguse").prop("disabled", true);
        }else{
            $('#medication-no_med').attr('checked', false);
            $("#icode").prop("disabled", false);
            $("#qty").prop("disabled", false);
            $("#druguse").prop("disabled", false);
        }
        if(response.count > 0){
            $('#medication-no_med').attr("disabled", true);

        }
        // console.log(response);
    }
});
}

$('#qty').keypress(function(e){
    if(e.keyCode == 13){
        if($(this).val() == ''){
            alert('ระบุจำนวนการจ่ายยา');
            $('#qty').select();
            return false;

        }else{
        var form = $('#form-medication');
     // return false if form still have some validation errors
     if (form.find('.has-error').length) {
          return false;
     }

    //  ตรวจสอบค่าว่าง
    if($('#icode').val() == ""){
        alert('ระบุรายการยา');
        $('#icode').select2('open');
        return false;
    }else if($('#qty').val() == ''){
        alert('ระบุจำนวนการจ่ายยา');
        $('#qty').select();
        return false;
    }else if($('#druguse').val() == ''){
        alert('ระบุจำนวนการจ่ายยา');
        $('#druguse').select2('open');
        return false;
    }else{
     // submit form
     $.ajax({
          url: form.attr('action'),
          type: 'post',
          data: form.serialize(),
          dataTyle:'json',
          success: function (response) {
               // do something with response
            //    $.pjax.reload({container: '#grid-medication-pjax'});
            //  loadMedication();
            loadMedicationForm();
               $.pjax.reload({
                        container:'#grid-medication-pjax',
                        history:false,
                        replace: false,
                        url:'index.php?r=doctorworkbench/medication'
                         });
          }
     });
    }
     return false;
    }
}
});


JS;
$this->registerJS($js);

?>