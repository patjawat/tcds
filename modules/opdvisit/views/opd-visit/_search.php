<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\opdvisit\models\OpdVisitSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="opd-visit-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'vn') ?>

    <?= $form->field($model, 'hn') ?>

    <?= $form->field($model, 'requester') ?>

    <?= $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'service_start_date') ?>

    <?php // echo $form->field($model, 'service_start_time') ?>

    <?php // echo $form->field($model, 'service_end_date') ?>

    <?php // echo $form->field($model, 'service_end_time') ?>

    <?php // echo $form->field($model, 'service_type') ?>

    <?php // echo $form->field($model, 'service_department') ?>

    <?php // echo $form->field($model, 'pcc_vn') ?>

    <?php // echo $form->field($model, 'department') ?>

    <?php // echo $form->field($model, 'doctor_id') ?>

    <?php // echo $form->field($model, 'data_json') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
