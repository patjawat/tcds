<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\lab\models\LisOrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lis-order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'message_date') ?>

    <?= $form->field($model, 'patient_id') ?>

    <?= $form->field($model, 'patient_name') ?>

    <?= $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'birth_date') ?>

    <?php // echo $form->field($model, 'lis_number') ?>

    <?php // echo $form->field($model, 'reference_number') ?>

    <?php // echo $form->field($model, 'accept_time') ?>

    <?php // echo $form->field($model, 'request_div') ?>

    <?php // echo $form->field($model, 'sec_user') ?>

    <?php // echo $form->field($model, 'sec_time') ?>

    <?php // echo $form->field($model, 'sec_ip') ?>

    <?php // echo $form->field($model, 'sec_script') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
