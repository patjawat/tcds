<?php

use app\components\DbHelper;
use app\components\PatientHelper;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\modules\doctorworkbench\models\DfCharge;
use app\modules\doctorworkbench\models\DfReceipt;
use app\modules\doctorworkbench\models\DfReceiptDoctor;
use app\modules\doctorworkbench\models\DfChargeDoctorType;

$vn = PatientHelper::getCurrentVn();
$hn = PatientHelper::getCurrentHn();

$sql = "SELECT * from df_items
WHERE id NOT IN (SELECT df_code from df WHERE hn = '$hn' AND vn = '$vn' AND delete_status = 'N')";
$query = DbHelper::queryAll('db', $sql);

$df = ArrayHelper::map($query, 'id', 'name');

// ->where(['NOT IN', 'id', [DoctorFree::find()->where(['hn' => $hn,'vn' => $vn])->all()->df_code]])
// ->all(), 'id','name')
?>


<div class="show-precress">
    <h3>กำลังบันทึกข้อมูล...</h3>
    <!-- <p>The .active class animates the progress bar:</p> -->
    <div class="progress">
        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0"
            aria-valuemax="100" style="width:100%">
            40%
        </div>
    </div>
</div>

<div class="doctor-free-form">

    <?php $form = ActiveForm::begin(['id' => 'df-form']);?>


    <div class="row"
        style="padding-top: 25px;padding-bottom: 25px;widyh: 90%;width: 100%;margin: auto;background-color: #e6e6e6;">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <?php //$form->field($model, 'df_code')->textInput(['id' => 'df_code','maxlength' => true,'placeholder' => 'เลือกบริการ'])->label(false) ?>
            <?php echo $form->field($model, 'df_code')->widget(Select2::classname(), [
    'data' => $df,
    'options' => [
        'id' => 'df_code',
        'placeholder' => 'Select Drug Items ...',
        'disabled' => $hn ? false : true,
    ],
    'pluginOptions' => [
        'allowClear' => true,
    ],
    'pluginEvents' => [
        "select2:select" => "function() {  $('#price').select(); }",

    ],
])->label(false);
?>
        </div>




        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <?=$form->field($model, 'price')->textInput(['id' => 'price', 'maxlength' => true, 'placeholder' => 'ค่าบริการ', 'disabled' => $hn ? false : true])->label(false)?>

        </div>

    </div>



    <?php ActiveForm::end();?>

</div>

<?php
$js = <<< JS
 $('.show-precress').hide();
$('#df_code').select2('open');
$('#df_code').keypress(function(e){
    if(e.keyCode == 13){
        $('#price').select();
    }
});

$('#price').keypress(function(e){
    if(e.keyCode == 13){
        if($(this).val() == ''){
            alert('ระบุราคา');
            $('#price').select();
            return false;
        }else{
        e.preventDefault();
    $.ajax({
        type: "post",
        url: "index.php?r=doctorworkbench/df/create",
        beforeSend: function() {
            $('.show-precress').show();
            $('.doctor-free-form').hide()
        },
        data: $('#df-form').serialize(),
        dataType: "json",
        success: function (response) {
            if(response.error){
                alert(response.error);
                console.log(response.error);
                $('.show-precress').hide();
                $('.doctor-free-form').show()
                return false;
            }else{
                $('#df-form').trigger("reset");
                loadDf();
                loadFormDf();
            }

        }
    });

    }
}
});

JS;
$this->registerJS($js);
?>