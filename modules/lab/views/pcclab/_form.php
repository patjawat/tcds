<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\lab\models\Pcclab */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pcclab-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'hospcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hospname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'an')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_visit')->textInput() ?>

    <?= $form->field($model, 'time_visit')->textInput() ?>

    <?= $form->field($model, 'lab_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lab_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lab_result')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'standard_result')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lab_request_date')->textInput() ?>

    <?= $form->field($model, 'lab_result_date')->textInput() ?>

    <?= $form->field($model, 'lab_price')->textInput() ?>

    <?= $form->field($model, 'data_json')->textInput() ?>

    <?= $form->field($model, 'last_update')->textInput() ?>

    <?= $form->field($model, 'cid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'provider')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
