<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\lab\models\LisOrder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lis-order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'message_date')->textInput() ?>

    <?= $form->field($model, 'patient_id')->textInput() ?>

    <?= $form->field($model, 'patient_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birth_date')->textInput() ?>

    <?= $form->field($model, 'lis_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reference_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accept_time')->textInput() ?>

    <?= $form->field($model, 'request_div')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sec_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sec_time')->textInput() ?>

    <?= $form->field($model, 'sec_ip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sec_script')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
