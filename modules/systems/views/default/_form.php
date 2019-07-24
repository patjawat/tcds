<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<style>
    .help-block {
        display: block;
        margin-top: 0px;
        margin-bottom: 0px;
        color: #737373;
    }

    .form-group {
        margin-bottom: 5px;
    }
</style>
<div class="opd-visit-form">

<?php $form = ActiveForm::begin([
    'id' => 'system-form',
    'fieldConfig' => [
        'horizontalCssClasses' => [
            'label' => 'col-lg-4 col-md-4 col-sm-4',
            'wrapper' => 'col-lg-8 col-md-8 col-sm-8',
        ],
    ],
    'layout' => 'horizontal',
]);?>

    <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'data[his_api]')->textInput()->label(' HIS API') ?>
    <?= $form->field($model, 'data[barcode_api]')->textInput()->label('Barcode API') ?>
    <div class="form-group">
        <?= Html::submitButton('บันทึก', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>

<?php
$js = <<< JS

$('body').on('beforeSubmit', 'form#system-form', function () {
     var form = $(this);
     // return false if form still have some validation errors
     if (form.find('.has-error').length) {
          return false;
     }
     // submit form
     $.ajax({
          url: form.attr('action'),
          type: 'post',
          data: form.serialize(),
          success: function (response) {
               // do something with response
               var data = response;
               if(response.data.success == true){
                alert(response.data.message)
               }else{
                alert(response.data.message)
                return false;
               }
          }
     });
     return false;
});

JS;
$this->registerJS($js);
?>
