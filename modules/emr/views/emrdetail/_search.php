<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\emr\models\PccServiceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pcc-service-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'hn') ?>

    <?= $form->field($model, 'vn') ?>

    <?= $form->field($model, 'provider_code') ?>

    <?= $form->field($model, 'provider_name') ?>

    <?php // echo $form->field($model, 'date_service') ?>

    <?php // echo $form->field($model, 'time_service') ?>

    <?php // echo $form->field($model, 'cc') ?>

    <?php // echo $form->field($model, 'pe') ?>

    <?php // echo $form->field($model, 'bpd') ?>

    <?php // echo $form->field($model, 'bps') ?>

    <?php // echo $form->field($model, 'temperature') ?>

    <?php // echo $form->field($model, 'pulse') ?>

    <?php // echo $form->field($model, 'rr') ?>

    <?php // echo $form->field($model, 'data_json') ?>

    <?php // echo $form->field($model, 'last_update') ?>

    <?php // echo $form->field($model, 'department') ?>

    <?php // echo $form->field($model, 'o2sat') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
