<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\doctorworkbench\models\CIcd10tm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cicd10tm-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'diagcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diagename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diagtname')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
