<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\doctorworkbench\models\GatewayCDruguageSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gateway-cdruguage-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'drugusage') ?>

    <?= $form->field($model, 'code') ?>

    <?= $form->field($model, 'name1') ?>

    <?= $form->field($model, 'name2') ?>

    <?php // echo $form->field($model, 'name3') ?>

    <?php // echo $form->field($model, 'shortlist') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'ename1') ?>

    <?php // echo $form->field($model, 'ename2') ?>

    <?php // echo $form->field($model, 'ename3') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
