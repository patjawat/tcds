<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>
<style>
.help-block {
    display: block;
    margin-top: 0px;
    margin-bottom: 0px;
    color: #737373;
}
</style>
<div class="opd-visit-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    'options' => ['data-pjax' => true ]
]);?>
    <?php $form = ActiveForm::begin([
    'id' => 'form-med_report_search',
    'fieldConfig' => [
        'horizontalCssClasses' => [
            'label' => 'col-lg-2 col-md-2 col-sm-2',
            'wrapper' => 'col-lg-10 col-md-10 col-sm-10',
        ],
    ],
    'layout' => 'horizontal',
]);?>


<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
    <?=$form->field($model, 'hn', [
        'horizontalCssClasses' => [
            'label' => 'col-lg-2 col-md-2 col-sm-2',
            'wrapper' => 'col-lg-10 col-md-10 col-sm-10',
        ],
    ])?>
    </div>

    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
      <?=$form->field($model, 'vn', [
            'horizontalCssClasses' => [
                'label' => 'col-lg-2 col-md-2 col-sm-2',
                'wrapper' => 'col-lg-10 col-md-10 col-sm-10',
            ],
        ])?>
        </div>
</div>

<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        
    <div class="form-group" style="margin-left:17%;">
        <?=Html::submitButton('Search', ['class' => 'btn btn-primary'])?>
        <?=Html::resetButton('Reset', ['class' => 'btn btn-default'])?>
    </div>

    </div>
</div>



    <?php ActiveForm::end();?>

</div>
