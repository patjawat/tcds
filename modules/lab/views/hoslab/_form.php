<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\lab\models\Hoslab */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hoslab-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'cid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hos_hn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hos_vn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hos_date_visit')->textInput() ?>

    <?= $form->field($model, 'lab_code_hos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lab_code_moph')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lab_name_hos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'request_at')->textInput() ?>

    <?= $form->field($model, 'result_at')->textInput() ?>

    <?= $form->field($model, 'data_json')->textInput() ?>

    <?= $form->field($model, 'lab_name_moph')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
