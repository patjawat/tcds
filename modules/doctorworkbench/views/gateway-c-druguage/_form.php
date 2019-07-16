<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\doctorworkbench\models\GatewayCDruguage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gateway-cdruguage-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'drugusage')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shortlist')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ename1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ename2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ename3')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
