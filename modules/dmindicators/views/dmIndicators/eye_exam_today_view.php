<?php

use yii\helpers\Html;
// use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\doctorworkbench\models\EyeExamToday */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="eye-exam-today-form">

    <?php $form = ActiveForm::begin([
    'id' => 'form-eye-exam-today',
    'fieldConfig' => [
        'horizontalCssClasses' => [
            'label' => 'col-lg-4 col-md-4 col-sm-4',
            'wrapper' => 'col-lg-8 col-md-8 col-sm-8',
        ],
    ],
    'layout' => 'horizontal',
]);?>



    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <div class="form-group field-eyeexamtoday-form_service-no_dr">
                <label class="control-label col-lg-4 col-md-4 col-sm-4"></label>
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <div id="eyeexamtoday-form_service-no_dr">
                        <label class="col-md-2">
                            Lt</label>
                        <label class="col-md-2">
                            Rt</label></div>
                    <p class="help-block help-block-error "></p>
                </div>
            </div>


            <?= $form->field($model, 'form_service[no_dr]')->inline()->checkboxList([
    'Lt' => '',
    'Rt' => '',
    ],['itemOptions' => [
            'labelOptions' => ['class' => 'col-md-2'],
            'onclick' => '',
            'class' => 'eye-examp',
            'disabled' => true
        ]
    ])->label('No DR');?>

            <?= $form->field($model, 'form_service[dme]')->inline()->checkboxList([
    'Lt' => '',
    'Rt' => '',
    ],['itemOptions' => [
            'labelOptions' => ['class' => 'col-md-2'],
            'class' => 'eye-examp',
            'disabled' => true
        ]
    ])->label('DME');?>

            <?= $form->field($model, 'form_service[npdr_mild]')->inline()->checkboxList([
    'Lt' => '',
    'Rt' => '',
    ],['itemOptions' => [
            'labelOptions' => ['class' => 'col-md-2'],
            'class' => 'eye-examp',
            'disabled' => true
            
        ]
    ])->label('NPDR mild');?>

            <?= $form->field($model, 'form_service[moderate]')->inline()->checkboxList([
    'Lt' => '',
    'Rt' => '',
    ],['itemOptions' => [
            'labelOptions' => ['class' => 'col-md-2'],
            'class' => 'eye-examp',
            'disabled' => true
        ]
    ])->label('Moderate');?>

            <?= $form->field($model, 'form_service[servere]')->inline()->checkboxList([
    'Lt' => '',
    'Rt' => '',
    ],['itemOptions' => [
        'labelOptions' => ['class' => 'col-md-2'],
        'class' => 'eye-examp',
        'disabled' => true
            
        ]
    ])->label('Servere');?>


            <?= $form->field($model, 'form_service[pdr_laser_rx]')->inline()->checkboxList([
    'Lt' => '',
    'Rt' => '',
    ],['itemOptions' => [
        'labelOptions' => ['class' => 'col-md-2'],
        'class' => 'eye-examp',
        'disabled' => true
            
        ]
    ])->label('PDR Laser Rx');?>

            <?= $form->field($model, 'form_service[no_laser_rx]')->inline()->checkboxList([
    'Lt' => '',
    'Rt' => '',
    ],['itemOptions' => [
        'labelOptions' => ['class' => 'col-md-2'],
        'class' => 'eye-examp',
        'disabled' => true
            
        ]
    ])->label('No Laser Rx');?>


            <?= $form->field($model, 'form_service[pdr_with_hcr]')->inline()->checkboxList([
    'Lt' => '',
    'Rt' => '',
    ],['itemOptions' => [
        'labelOptions' => ['class' => 'col-md-2'],
        'class' => 'eye-examp',
        'disabled' => true
            
        ]
    ])->label('PDR with HRC');?>

            <?= $form->field($model, 'form_service[cataract_no]')->inline()->checkboxList([
    'Lt' => '',
    'Rt' => '',
    ],['itemOptions' => [
        'labelOptions' => ['class' => 'col-md-2'],
        'class' => 'eye-examp',
        'disabled' => true
            
        ]
    ])->label('Cataract No');?>

            <?= $form->field($model, 'form_service[cataract_yes]')->inline()->checkboxList([
    'Lt' => '',
    'Rt' => '',
    ],['itemOptions' => [
        'labelOptions' => ['class' => 'col-md-2'],
        'class' => 'eye-examp',
        'disabled' => true
            
        ]
    ])->label('Yes');?>

            <?= $form->field($model, 'form_service[operation]')->inline()->checkboxList([
    'Lt' => '',
    'Rt' => '',
    ],['itemOptions' => [
        'labelOptions' => ['class' => 'col-md-2'],
        'class' => 'eye-examp',
        'disabled' => true
            
        ]
    ])->label('Operation');?>

            <?= $form->field($model, 'form_service[glaueoma_no]')->inline()->checkboxList([
    'Lt' => '',
    'Rt' => '',
    ],['itemOptions' => [
        'labelOptions' => ['class' => 'col-md-2'],
        'class' => 'eye-examp',
        'disabled' => true
            
        ]
    ])->label('Glaueoma No');?>

            <?= $form->field($model, 'form_service[glaueoma_yes]')->inline()->checkboxList([
    'Lt' => '',
    'Rt' => '',
    ],['itemOptions' => [
        'labelOptions' => ['class' => 'col-md-2'],
        'class' => 'eye-examp',
        'disabled' => true
            
        ]
    ])->label('Yes');?>

            <?= $form->field($model, 'form_service[no_slit_lamp_exam]')->inline()->checkboxList([
    'Lt' => '',
    'Rt' => '',
    ],['itemOptions' => [
        'labelOptions' => ['class' => 'col-md-2'],
        'class' => 'eye-examp',
        'disabled' => true
            
        ]
    ])->label('No Slit-lamp exam');?>



        </div>
    </div>



    <div class="form-group">
        <?php Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$js = <<< JS
$(function(){

    $('.eye-examp').click(function (e) { 
        var form = $('#form-eye-exam-today');
        $.ajax({
        type: "post",
        beforeSend:function(){
        
          },
        url: form.attr('action'),
        dataType: "json",
        data:form.serialize(),
        success: function (response) {
           
        }
    });
        
    });

    
});
JS;
$this->registerJS($js);

?>