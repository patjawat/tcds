<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\lab\models\LisResult */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lis-result-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lis_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lis_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'test')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lab_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'result_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'result')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'unit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'normal_range')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'technical_time')->textInput() ?>

    <?= $form->field($model, 'medical_time')->textInput() ?>

    <?= $form->field($model, 'result_date')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sec_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sec_time')->textInput() ?>

    <?= $form->field($model, 'sec_ip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sec_script')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
