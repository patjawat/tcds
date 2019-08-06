<?php

use yii\helpers\Html;
// use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

?>

<div class="dm-indicators-form">
    <?php $form = ActiveForm::begin([
    'layout' => 'horizontal',
    'fieldConfig' => [
        'horizontalCssClasses' => [
            'label' => 'col-sm-4',
            'offset' => 'col-sm-offset-4',
            'wrapper' => 'col-sm-8',
            'error' => '',
            'hint' => '',
        ],
    ],
  ]); ?>
    <?= $form->field($model, 'eye_out_hos[no_dr]')->inline()->checkboxList(['Rt' => 'Rt','Rl' => 'Rl'],['itemOptions' => ['disabled' => true]])->label('No DR'); ?>      
    <?= $form->field($model, 'eye_out_hos[dme]')->inline()->checkboxList(['Rt' => 'Rt','Rl' => 'Rl'],['itemOptions' => ['disabled' => true]])->label('DME'); ?>      
    <?= $form->field($model, 'eye_out_hos[npdr]')->inline()->checkboxList(['Rt' => 'Rt','Rl' => 'Rl'],['itemOptions' => ['disabled' => true]])->label('NPDR'); ?>      
    <?= $form->field($model, 'eye_out_hos[mile]')->inline()->checkboxList(['Rt' => 'Rt','Rl' => 'Rl'],['itemOptions' => ['disabled' => true]])->label('Mild'); ?>      
    <?= $form->field($model, 'eye_out_hos[servere]')->inline()->checkboxList(['Rt' => 'Rt','Rl' => 'Rl'],['itemOptions' => ['disabled' => true]])->label('Servere'); ?>      
    <?= $form->field($model, 'eye_out_hos[PRD]')->inline()->checkboxList(['Rt' => 'Rt','Rl' => 'Rl'],['itemOptions' => ['disabled' => true]])->label('PDR'); ?>      
    <?= $form->field($model, 'eye_out_hos[laser_rx]')->inline()->checkboxList(['Rt' => 'Rt','Rl' => 'Rl'],['itemOptions' => ['disabled' => true]])->label('Laser Rx'); ?>      
    <?= $form->field($model, 'eye_out_hos[no_laser_rx]')->inline()->checkboxList(['Rt' => 'Rt','Rl' => 'Rl'],['itemOptions' => ['disabled' => true]])->label('No laser Rx'); ?>      
    <?= $form->field($model, 'eye_out_hos[pdr_with_hrc]')->inline()->checkboxList(['Rt' => 'Rt','Rl' => 'Rl'],['itemOptions' => ['disabled' => true]])->label('PDR with HRC'); ?>      
    <?= $form->field($model, 'eye_out_hos[cataract]')->inline()->checkboxList(['Rt' => 'Rt','Rl' => 'Rl'],['itemOptions' => ['disabled' => true]])->label('Cataract'); ?>      
    <?= $form->field($model, 'eye_out_hos[cataract_no]')->inline()->checkboxList(['Rt' => 'Rt','Rl' => 'Rl'],['itemOptions' => ['disabled' => true]])->label('No'); ?>      
    <?= $form->field($model, 'eye_out_hos[cataract_yes]')->inline()->checkboxList(['Rt' => 'Rt','Rl' => 'Rl'],['itemOptions' => ['disabled' => true]])->label('Yes'); ?>      
    <?= $form->field($model, 'eye_out_hos[operation]')->inline()->checkboxList(['Rt' => 'Rt','Rl' => 'Rl'],['itemOptions' => ['disabled' => true]])->label('Operation'); ?>      
    <?= $form->field($model, 'eye_out_hos[glaucerna]')->inline()->checkboxList(['Rt' => 'Rt','Rl' => 'Rl'],['itemOptions' => ['disabled' => true]])->label('Glaucerna'); ?>      
    <?= $form->field($model, 'eye_out_hos[glaucerna_no]')->inline()->checkboxList(['Rt' => 'Rt','Rl' => 'Rl'],['itemOptions' => ['disabled' => true]])->label('No'); ?>      
    <?= $form->field($model, 'eye_out_hos[glaucerna_ye]')->inline()->checkboxList(['Rt' => 'Rt','Rl' => 'Rl'],['itemOptions' => ['disabled' => true]])->label('Yes'); ?>      
    <?= $form->field($model, 'eye_out_hos[no_slit_lamp_exam]')->inline()->checkboxList(['Rt' => 'Rt','Rl' => 'Rl'],['itemOptions' => ['disabled' => true]])->label('No slit-lamp exam'); ?>      
    <div class="form-group">
        <?php // Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
