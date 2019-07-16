<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\modules\doctorworkbench\models\DoctorFreeItems;

/* @var $this yii\web\View */
/* @var $model app\modules\doctorworkbench\models\DoctorFree */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="doctor-free-form">

    <?php $form = ActiveForm::begin(['id' => 'df-form']); ?>


<div class="row"  style="padding-top: 25px;padding-bottom: 25px;widyh: 90%;width: 100%;margin: auto;background-color: #e6e6e6;">
    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
    <?php // $form->field($model, 'df_code')->textInput(['id' => 'df_code','maxlength' => true,'placeholder' => 'เลือกบริการ'])->label(false) ?>
    <?php echo $form->field($model, 'df_code')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(DoctorFreeItems::find()->all(), 'id','name'),
    'options' => ['id' => 'df_code','placeholder' => 'Select Drug Items ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
    'pluginEvents' => [
        "change" => "function() { console.log('change'); }",
        "select2:opening" => "function() { console.log('select2:opening'); }",
        "select2:open" => "function() { console.log('open'); }",
        "select2:closing" => "function() { console.log('close'); }",
        "select2:close" => "function() { console.log('close'); }",
        "select2:selecting" => "function() { console.log('selecting'); }",
        "select2:select" => "function() {  $('#price').select(); }",
        "select2:unselecting" => "function() { console.log('unselecting'); }",
        "select2:unselect" => "function() { console.log('unselect'); }"
    ],
])->label(false);
?>     
    </div>
    
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
    <?= $form->field($model, 'price')->textInput(['id' => 'price','maxlength' => true,'placeholder' => 'ค่าบริการ'])->label(false) ?>
        
    </div>
    
</div>



    <?php ActiveForm::end(); ?>

</div>

<?php
$js = <<< JS

$('#price').keypress(function(e){
    if(e.keyCode == 13){
        saveDF();
        loadDoctorFree();
    }
});


function saveDF(){
    
    $.ajax({
        type: "post",
        url: "index.php?r=doctorworkbench/doctor-free/create",
        data: $('#df-form').serialize(),
        dataType: "json",
        success: function (response) {
            // $('#df-form').trigger("reset");
            
        }
    });
}

JS;
$this->registerJS($js);
?>