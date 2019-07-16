<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\lab\models\PcclabSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pcclab-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'hospcode') ?>

    <?= $form->field($model, 'hospname') ?>

    <?= $form->field($model, 'hn') ?>

    <?= $form->field($model, 'vn') ?>

    <?php // echo $form->field($model, 'an') ?>

    <?php // echo $form->field($model, 'date_visit') ?>

    <?php // echo $form->field($model, 'time_visit') ?>

    <?php // echo $form->field($model, 'lab_code') ?>

    <?php // echo $form->field($model, 'lab_name') ?>

    <?php // echo $form->field($model, 'lab_result') ?>

    <?php // echo $form->field($model, 'standard_result') ?>

    <?php // echo $form->field($model, 'lab_request_date') ?>

    <?php // echo $form->field($model, 'lab_result_date') ?>

    <?php // echo $form->field($model, 'lab_price') ?>

    <?php // echo $form->field($model, 'data_json') ?>

    <?php // echo $form->field($model, 'last_update') ?>

    <?php // echo $form->field($model, 'cid') ?>

    <?php // echo $form->field($model, 'provider') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
