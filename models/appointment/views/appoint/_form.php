<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\modules\appointment\models\GatewayEmrAppointment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gateway-emr-appointment-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'hospcode')->hiddenInput(['value' => NULL])->label(FALSE) ?>
    <?= $form->field($model, 'hospname')->hiddenInput(['value' => NULL])->label(FALSE) ?>
    <?= $form->field($model, 'hn')->hiddenInput(['value' => NULL])->label(FALSE) ?>
    <?= $form->field($model, 'vn')->hiddenInput(['value' => NULL])->label(FALSE) ?>
    <?= $form->field($model, 'date_visit')->hiddenInput(['value' => date('Y-m-d')])->label(FALSE) ?>
    <?= $form->field($model, 'time_visit')->hiddenInput(['value' => date('H:m:s')])->label(FALSE) ?>

    <div style="margin:20px">
        <div class="row">
            <div class="col-md-12">
                <?= $form->field($model, 'appoint_date')->textInput(['value'=>$date]) ?>
            </div>
        </div>

        <div class="row" style="margin-top: 10px">
            <div class="col-md-12">
                <?= $form->field($model, 'appoint_time')->textInput() ?>
            </div>
        </div>
        <div class="row" style="margin-top: 10px">
            <div class="col-md-12">
                <?=
                        $form->field($model, 'clinic')->widget(Select2::className(), [
                            'data' =>
                            ArrayHelper::map(app\modules\appointment\models\CClinic::find()->all(), 'code', 'name'),
                            'options' => [
                                'placeholder' => '<--กรุณาเลือก-->',
                                'value' => '',
                            //'onchange' => 'alert (this.value)',
                            ],
                            'pluginOptions' =>
                                [
                                'allowClear' => true
                            ],
                        ]);
                        ?>
            </div>
        </div>
        <div class="row" style="margin-top: 10px">
            <div class="col-md-12">
                <?= $form->field($model, 'detail')->textarea(['rows'=>5]) ?>
            </div>
        </div>
         <div class="row" style="margin-top: 10px">
            <div class="col-md-12">
                <?php //$form->field($model, 'appoint_doctor')->textInput() ?>
            </div>
        </div>

        <div class="row" style="margin-top: 20px;margin-bottom: 50px">
            <div class="col-md-12">
                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
