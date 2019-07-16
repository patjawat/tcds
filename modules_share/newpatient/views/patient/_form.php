<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\lookup\CPrename;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\modules_share\newpatient\models\mPatient */
/* @var $form yii\widgets\ActiveForm */

$prename_items = CPrename::find()->where(['is_active' => true])->orderBy('id')->all();
$prename_items = ArrayHelper::map($prename_items, 'id', 'title_th')
?>

<div class="m-patient-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'hn')->textInput(['maxlength' => true,'disabled'=>$hn_lock]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'pid')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-2">           
            <?php
            echo $form->field($model, 'prename')->widget(Select2::classname(), [
                'data' => $prename_items,
                'language' => 'th',
                'options' => ['placeholder' => 'เลือก...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>

        <div class="col-lg-4">
            <?= $form->field($model, 'fname')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'mname')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-2">
            <?= $form->field($model, 'sex')->dropDownList([1 => '1-ชาย', 2 => '2-หญิง']) ?>
        </div>
        <div class="col-lg-2">           
            <?php
            echo '<label class="control-label">เกิด</label>';
            echo DatePicker::widget([
                'language' => 'th',
                'model' => $model,
                'attribute' => 'birth',
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]);
            ?>
        </div>

    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
