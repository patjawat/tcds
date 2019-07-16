<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\doctorworkbench\models\PccDiagnosisSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pcc-diagnosis-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'hn') ?>

    <?= $form->field($model, 'vn') ?>

    <?= $form->field($model, 'provider_code') ?>

    <?= $form->field($model, 'provider_name') ?>

    <?php // echo $form->field($model, 'date_service') ?>

    <?php // echo $form->field($model, 'time_service') ?>

    <?php // echo $form->field($model, 'icd_code') ?>

    <?php // echo $form->field($model, 'icd_name') ?>

    <?php // echo $form->field($model, 'diag_type') ?>

    <?php // echo $form->field($model, 'data_json') ?>

    <?php // echo $form->field($model, 'last_update') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
