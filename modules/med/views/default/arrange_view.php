<?php
use app\components\PatientHelper;
use app\modules\doctorworkbench\models\HisDrug;
use unclead\multipleinput\MultipleInput;
use unclead\multipleinput\MultipleInputColumn;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\JsExpression;
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

.list-cell__med_cancel{
    width: 100px;
}
.list-cell__icode{
    width: 250px;
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
        <h3 class="panel-title">รายการสั่งยา</h3>
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
            'type' => \kartik\select2\Select2::class,
            'name' => 'icode',
            'title' => 'icode',
            'options' => [
                'data' => ArrayHelper::map(HisDrug::find()->all(), 'id', 'trade_name'),
                'pluginOptions' => [
                    'allowClear' => true,
                    'minimumInputLength' => 3, //ต้องพิมพ์อย่างน้อย 3 อักษร ajax จึงจะทำงาน
                    'ajax' => [
                        'url' => \yii\helpers\Url::to(['/doctorworkbench/medication/drug-items-list']),
                        'dataType' => 'json', //รูปแบบการอ่านคือ json
                        'data' => new JsExpression('function(params) { return {q:params.term};}'),
                    ],
                ],
            ],
            'enableError' => true,
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
            'options' => ['class' => 'input-priority'],
            'value' => function ($data) {
                return Html::textInput('xxx', $data['qty'], ['class' => 'form-control', 'disabled' => 'true']);
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
                return $data['med_cancel'];
            },
            'enableError' => true,
        ],
        [
            'name' => 'med_cancel',
            'type' => MultipleInputColumn::TYPE_STATIC,
            'title' => 'ยกลเลิกยา',
            'defaultValue' => 1,
            'value' => function ($data) {
                // return number_format($data['qty'], 2);
                // return Html::button('<i class="far fa-hand-paper"></i>',['class' => 'btn btn-warning','style' => 'margin-top:0px;']);
                return Html::checkbox($data['med_cancel'], $data['med_cancel']);
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