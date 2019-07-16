<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\lab\models\PreorderlabSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="preorderlab-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'pcc_vn') ?>

    <?= $form->field($model, 'data_json') ?>

    <?= $form->field($model, 'pcc_start_service_datetime') ?>

    <?= $form->field($model, 'pcc_end_service_datetime') ?>

    <?php // echo $form->field($model, 'data1') ?>

    <?php // echo $form->field($model, 'data2') ?>

    <?php // echo $form->field($model, 'hospcode') ?>

    <?php // echo $form->field($model, 'lab_code') ?>

    <?php // echo $form->field($model, 'lab_name') ?>

    <?php // echo $form->field($model, 'lab_request_date') ?>

    <?php // echo $form->field($model, 'lab_result_date') ?>

    <?php // echo $form->field($model, 'lab_result') ?>

    <?php // echo $form->field($model, 'standard_result') ?>

    <?php // echo $form->field($model, 'lab_price') ?>

    <?php // echo $form->field($model, 'lab_code_moph') ?>

    <?php // echo $form->field($model, 'last_update') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
