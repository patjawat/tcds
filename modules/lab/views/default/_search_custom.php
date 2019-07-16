<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use app\modules\lab\models\LabResult;
use app\components\FormatYear;
use yii\helpers\ArrayHelper;
use app\components\PatientHelper;
use kartik\widgets\Select2;
$hn = PatientHelper::getCurrentHn();

?>

<div class="lis-result-search">

    <?php $form = ActiveForm::begin([
        // 'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
    <?php
    echo $form->field($model, 'lis_code')->widget(Select2::classname(), [
        'data' =>ArrayHelper::map(LabResult::find()->where(['patient_id' => $model->patient_id])->groupBy(['lis_code'])->all(), 'lis_code', 'test'),
        'options' => ['placeholder' => 'Select ...', 'multiple' => true],
        'pluginOptions' => [
            'tags' => true,
            'allowClear' => true,
            'tokenSeparators' => [',', ' '],
            'maximumInputLength' => 10
        ],
    ])->label('รหัสการตรวจของ');
    ?>
            </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2">
       <?= $form->field($model, 'patient_id')->label('HN'); ?>   
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-1">
       <?= $form->field($model, 'limit')->label('จำนวนแสดง'); ?>   
        </div>
  
  <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
  <div class="form-group" style="margin-top: 25px;">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php  echo Html::resetButton('<i class="fas fa-print"></i> Print', ['id' => 'print_this','class' => 'btn btn-default']) ?>
    </div>
  </div>
  
    
</div>

   



    <?php ActiveForm::end(); ?>

</div>
