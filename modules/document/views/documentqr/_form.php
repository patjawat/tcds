<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\document\models\Documentqr */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="documentqr-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type_id')->textInput(['maxlength' => true]) ?>
    <?php
echo $form->field($model, 'print')->dropDownList(
            ['N' => 'N', 'Y' => 'Y']
    ); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
