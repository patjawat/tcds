<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\emr\models\PccService */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pcc-service-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'hn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'provider_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'provider_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_service')->textInput() ?>

    <?= $form->field($model, 'time_service')->textInput() ?>

    <?= $form->field($model, 'cc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pe')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bpd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bps')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'temperature')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pulse')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_json')->textInput() ?>

    <?= $form->field($model, 'last_update')->textInput() ?>

    <?= $form->field($model, 'department')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'o2sat')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
