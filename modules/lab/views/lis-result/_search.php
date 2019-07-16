<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\lab\models\LisResultSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lis-result-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'lis_number') ?>

    <?= $form->field($model, 'lis_code') ?>

    <?= $form->field($model, 'test') ?>

    <?= $form->field($model, 'lab_code') ?>

    <?php // echo $form->field($model, 'result_code') ?>

    <?php // echo $form->field($model, 'result') ?>

    <?php // echo $form->field($model, 'unit') ?>

    <?php // echo $form->field($model, 'normal_range') ?>

    <?php // echo $form->field($model, 'technical_time') ?>

    <?php // echo $form->field($model, 'medical_time') ?>

    <?php // echo $form->field($model, 'result_date') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <?php // echo $form->field($model, 'sec_user') ?>

    <?php // echo $form->field($model, 'sec_time') ?>

    <?php // echo $form->field($model, 'sec_ip') ?>

    <?php // echo $form->field($model, 'sec_script') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
