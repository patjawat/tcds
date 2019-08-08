<?php
use app\components\PatientHelper;
use unclead\multipleinput\MultipleInput;
use unclead\multipleinput\MultipleInputColumn;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$hn = PatientHelper::getCurrentHn();
$vn = PatientHelper::getCurrentVn();
$this->params['pt_title'] = PatientHelper::getPatientTitleByHn($hn);
?>
<style>
.panel-default>.panel-heading {
    color: #05867a !important;
    background-color: #fff !important;
    border-color: #ddd !important;
    text-shadow: -1px 0px white, 0 1px white, 1px 0 white, 0 -1px white;
}

.form-control-static {
    min-height: 34px;
    padding-top: 0px;
    padding-bottom: 7px;
    margin-bottom: 0;
}

.help-block {
    margin-top: -18px !important;
    margin-bottom: -18px !important;
}
</style>

<div class="panel panel-default">
    <div class="panel-body">
        <!-- Start Row -->
        <div class="row">
            <div class="col-xs-5 col-sm-5 col-md-3 col-lg-3">
                <h4>NAME : <?=$model->patient->fullname($model->hn);?></h4>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <h4>HN : <?=$model->hn;?></h4>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3">
                <h4>Physician : <?=$model->hn;?></h4>
            </div>
        </div>
        <!-- End Row -->

        <!-- Start Row -->
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                <h4>ผล LAB eGFR : <?=$model->patient->fullname($model->hn);?></h4>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <h4>จุดรับยา : <?=$model->hn;?></h4>
            </div>
        </div>
        <!-- End Row -->

    </div>
    <!-- End Body -->
</div>
<!-- End panel -->

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">รายการจ่ายยา</h3>
    </div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin();?>
        <?=$form->field($model, 'items')->widget(MultipleInput::className(), [
    // 'max' => 4,
    'cloneButton' => true,
    'allowEmptyList' => false,
    'enableGuessTitle' => true,
    'allowEmptyList' => true,
    'columns' => [
        [
            'name' => 'id',
            'title' => 'ID',
            'enableError' => true,
            'type' => MultipleInputColumn::TYPE_HIDDEN_INPUT,
        ],
        [
            'name' => 'icode',
            'title' => 'รหัสยา',
            'enableError' => true,
            'options' => [
                'class' => 'input-priority',
            ],
        ],
        [
            'name' => 'druguse',
            'title' => 'วิธีการใช้',
            'enableError' => true,
            'options' => [
                'class' => 'input-priority',
            ],
        ],
        [
            'name' => 'qty',
            'title' => 'จำนวน',
            'type' => MultipleInputColumn::TYPE_STATIC,
            'enableError' => true,
            'options' => [
                'class' => 'input-priority',
            ],
            'value' => function ($data) {
                // return number_format($data['qty'], 2);
                return Html::textInput('xxx', $data['qty'], ['class' => 'form-control','disabled'=>'true']);
            },
        ],
        [
            'name' => 'qty_adjust',
            'title' => 'ปรับจำนวนยา',
            'enableError' => true,
            'options' => [
                'class' => 'input-priority',
            ],
        ],
        [
            'name' => 'med_note',
            'title' => 'หมายเหตุ',
            'enableError' => true,
            'options' => [
                'class' => 'input-priority',
            ],
        ],
        [
            'name' => 'med_cancel',
            'type' => MultipleInputColumn::TYPE_STATIC,
            'title' => 'ยกลเลิกยา',
            'value' => function ($data) {
                // return number_format($data['qty'], 2);
                return Html::button('<i class="far fa-hand-paper"></i>',['class' => 'btn btn-warning','style' => 'margin-top:0px;']);
            },
            'enableError' => true,
        ],
    ],
])->label(false);
?>
        <br>
        <?=Html::submitButton('<i class="far fa-save"></i> บันทึก', ['class' => 'btn btn-success']);?>
        <?php ActiveForm::end();?>
    </div>
</div>