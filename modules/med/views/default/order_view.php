<?php
use app\components\PatientHelper;
use app\modules\doctorworkbench\models\HisDrug;
use unclead\multipleinput\MultipleInput;
use unclead\multipleinput\MultipleInputColumn;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;
use yii\web\View;

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
<div class="panel-heading">
        <h3 class="panel-title"><i class="fas fa-user-edit"></i> ข้อมูลทั่วไป</h3>
    </div>
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
        <h3 class="panel-title"><i class="fas fa-list-ul"></i> รายการสั่งยา</h3>
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
        // [
        //     'name' => 'druguse',
        //     'title' => 'วิธีการใช้',
        //     'enableError' => true,
        //     'options' => [
        //         'class' => 'input-priority',
        //     ],
        // ],
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
                return Html::textInput($data['qty'], $data['qty'], ['class' => 'form-control', 'disabled' => 'true']);
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
        // [
        //     'name' => 'med_note',
        //     'title' => 'หมายเหตุ',
        //     'type' => MultipleInputColumn::TYPE_STATIC,
        //     'enableError' => true,
        //     'value' => function ($data) {
        //         return Html::textInput($data['med_note'], $data['med_note'], ['class' => 'form-control' ]);
        //     },
        // ],
        [
            'name' => 'med_cancel',
            // 'type' => MultipleInputColumn::TYPE_STATIC,
            'type'  => MultipleInputColumn::TYPE_DROPDOWN,
            'title' => 'ยกลเลิกยา',
            'defaultValue' => 1,
            'items' => [
                1 => 'ใช้',
                0 => 'ยกเลิก'
            ],
            // 'value' => function ($model) {
            //     // return Html::checkbox($model['med_cancel'], $model['med_cancel'],['onclick' => 'return alert($(this).attr("class"))']);
            
            // },
            'enableError' => true,
            'options' => [
                'class' => 'new_class',
                // 'prompt' => 'เลือกสินค้า',
                'onchange' => '$(this).init_change();' //ส่งค่าไปเรียก Ajax
            ]
        ],
    ],
])->label(false);
?>
        <br>
        <?=Html::submitButton('<i class="far fa-save"></i> บันทึก', [
            'class' => 'btn btn-success',
            'data' => [
                'confirm' => 'ยืนยันการบันทึก?',

            ],
            ]);?>
        <?php ActiveForm::end();?>
    </div>
</div>

<?php
$js = <<< JS

function medCancel(){
    
}

$.fn.init_change = function(){
                
                var id = $(this).val();
                var result = $(this).attr('id').split("-");
                // var result = data.split("-");

                console.log(result[2]);
                // console.log(data);
                $('#opdvisit-items-'+result[2]+'-med_note').prop('readonly', true);
                $('#opdvisit-items-'+result[2]+'-qty_adjust').prop('readonly', true);
                $('#opdvisit-items-'+result[2]+'-druguse').prop('readonly', true);
                $('#opdvisit-items-'+result[2]+'-icode').prop("readonly", true);
            
            };
JS;
$this->registerJS($js);
?>
