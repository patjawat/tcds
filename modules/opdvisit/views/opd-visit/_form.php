<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\opdvisit\models\OpdVisit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="opd-visit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'requester')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'service_start_date')->textInput() ?>

    <?= $form->field($model, 'service_start_time')->textInput() ?>

    <?= $form->field($model, 'service_end_date')->textInput() ?>

    <?= $form->field($model, 'service_end_time')->textInput() ?>

    <?= $form->field($model, 'service_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'service_department')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pcc_vn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'department')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'doctor_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_json')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
