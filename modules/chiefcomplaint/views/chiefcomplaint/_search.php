<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\chiefcomplaint\models\ChiefcomplaintSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="chiefcomplaint-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>


    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'pcc_vn') ?>

    <?= $form->field($model, 'data_json') ?>

    <?= $form->field($model, 'date_service') ?>

    <?= $form->field($model, 'time_service') ?>

    <?php // echo $form->field($model, 'data1') ?>

    <?php // echo $form->field($model, 'data2') ?>

    <?php // echo $form->field($model, 'hospcode') ?>

    <?php // echo $form->field($model, 'pi_text') ?>

    <?php // echo $form->field($model, 'sbp') ?>

    <?php // echo $form->field($model, 'dbp') ?>

    <?php // echo $form->field($model, 'temp') ?>

    <?php // echo $form->field($model, 'pp') ?>

    <?php // echo $form->field($model, 'pr') ?>

    <?php // echo $form->field($model, 'o2sat') ?>

    <?php // echo $form->field($model, 'height') ?>

    <?php // echo $form->field($model, 'weight') ?>

    <?php // echo $form->field($model, 'cid') ?>

    <?php // echo $form->field($model, 'vn') ?>

    <?php // echo $form->field($model, 'hn') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'requester') ?>

    <?php // echo $form->field($model, 'bt') ?>

    <?php // echo $form->field($model, 'position') ?>

    <?php // echo $form->field($model, 'arm') ?>

    <?php // echo $form->field($model, 'pr_rhythm') ?>

    <?php // echo $form->field($model, 'rr') ?>

    <?php // echo $form->field($model, 'bw') ?>

    <?php // echo $form->field($model, 'ht') ?>

    <?php // echo $form->field($model, 'ibw') ?>

    <?php // echo $form->field($model, 'bmi') ?>

    <?php // echo $form->field($model, 'wc') ?>

    <?php // echo $form->field($model, 'ic') ?>

    <?php // echo $form->field($model, 'ec') ?>

    <?php // echo $form->field($model, 'hc') ?>

    <?php // echo $form->field($model, 'bp') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
