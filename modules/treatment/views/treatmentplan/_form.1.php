<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\treatmment\models\Treatmmentplan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="treatmmentplan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'pcc_vn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_json')->textInput() ?>

    <?= $form->field($model, 'pcc_start_service_datetime')->textInput() ?>

    <?= $form->field($model, 'pcc_end_service_datetime')->textInput() ?>

    <?= $form->field($model, 'data1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hoscode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'plan_text')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
