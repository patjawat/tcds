<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\hispatient\models\HisPatient */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="his-patient-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'hn')->textInput() ?>

    <?= $form->field($model, 'prefix')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sex')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birthday_date')->textInput() ?>

    <?= $form->field($model, 'idcard')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UPDATE_TIME')->textInput() ?>

    <?= $form->field($model, 'doctor_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'doctor_history')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
