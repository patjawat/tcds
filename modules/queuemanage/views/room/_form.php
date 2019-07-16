<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\queuemanage\models\CDoctorRoom */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cdoctor-room-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'room_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'doctor_id')->textInput() ?>

    <?= $form->field($model, 'is_active')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
