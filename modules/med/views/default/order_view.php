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
    /* .panel-default>.panel-heading {
        color: #05867a !important;
        background-color: #fff !important;
        border-color: #ddd !important;
        text-shadow: -1px 0px white, 0 1px white, 1px 0 white, 0 -1px white;
    }
     */
    .panel-default>.panel-heading {
    color: #348ca7 !important;
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

    .list-cell__med_cancel {
        width: 100px;
    }

    .list-cell__icode {
        width: 250px;
    }

</style>
<h3 class="text-center">คีย์ยา</h3>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fas fa-user-tag"></i> NAME : <?=$model->patient($model->hn);?></h3>

    
    </div>
    <div class="panel-body">
    <?php $form = ActiveForm::begin(['id' => 'form-med-order']); ?>
    <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"> <h5> HN : <code><?=$model->hn?></code> </h5> </div>
                <div class="col-xs-4 col-sm-3 col-md-3 col-lg-3"> <h5> Physician : <code>1234</code></h5> </div>
                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5"> <h5> ผล LAB eGFR : <code>1234</code></h5> </div>
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><?= Html::submitButton('<i class="far fa-save"></i> บันทึก', ['class' => 'btn btn-success pull-right']); ?></div>
            </div>
            <br>
        

<hr>
        
        <?= $form->field($model, 'med_accept_requester')->hiddenInput(['class' => 'requester'])->label(false) ?>
        <?= $form->field($model, 'items')->widget(MultipleInput::className(), [
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
                    'type'  => MultipleInputColumn::TYPE_DROPDOWN,
                    'title' => 'ยกลเลิกยา',
                    'defaultValue' => 1,
                    'items' => [
                        0 => 'ใช้',
                        1 => 'ยกเลิก'
                    ],
                    'enableError' => true,
                    'options' => [
                        'class' => 'new_class',
                        'onchange' => '$(this).init_change();' //ส่งค่าไปเรียก Ajax
                    ]
                ],
            ],
        ])->label(false);
        ?>
        <br>
        <?php ActiveForm::end(); ?>

        <?php
        $js = <<< JS

// $.fn.init_change = function(){
                
//                 var id = $(this).val();
//                 var result = $(this).attr('id').split("-");
//                 // var result = data.split("-");

//                 console.log(result[2]);
//                 // console.log(data);
//                 $('#opdvisit-items-'+result[2]+'-med_note').prop('readonly', true);
//                 $('#opdvisit-items-'+result[2]+'-qty_adjust').prop('readonly', true);
//                 $('#opdvisit-items-'+result[2]+'-druguse').prop('readonly', true);
//                 $('#opdvisit-items-'+result[2]+'-icode').prop("readonly", true);
            
//             };



$("#form-med-order").on('beforeSubmit', function (e) {
  e.preventDefault();
  var form = $(this);
  var formId = form.attr('id');

   if ($('#opdvisit-med_accept_requester').val() == '') {
        getRequester("#form-med-order");
        return false;
    }else{
        return true;
    }
        return false;
});

JS;
$this->registerJS($js, View::POS_END, 'my-options');
?>