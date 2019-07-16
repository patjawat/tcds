<?php

use yii\helpers\Html;
// use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use kartik\widgets\Select2;
use yii\web\JsExpression;
use yii\web\View;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\modules\doctorworkbench\models\CIcd10tm;
\kartik\select2\Select2Asset::register($this);


$url = \yii\helpers\Url::to(['icd10-list']); //กำหนด URL ที่จะไปโหลดข้อมูล

// $prefix = empty($model->id) ? '' : CIcd10tm::findOne($model->icd_code)->diagcode; //กำหนดค่าเริ่มต้น
$action_create = Url::to(['create']);
$action_update = Url::to(['update']);

if($model->id){
    $action = Url::to(['update','id' => $model->id]);
    if($model->icd_code){
        $fix = CIcd10tm::findOne(['diagcode' => $model->icd_code]);
        $prefix = '('.$fix->diagcode.') - '.$fix->diagename.' - '.$fix->diagtname;
    }else{
    $prefix = '';
    }
    
}else{
    $action = Url::to(['create']);
    $prefix = '';

}

$formatJs = <<< 'JS'
var formatRepo = function (repo) {
    if (repo.loading) {
        return repo.text;
    }
    var markup =
'<div class="row">' + 
    '<div class="col-lg-5 col-md-5 col-sm-5">' + repo.diagename + '</div>' +
    '<div class="col-lg-5 col-md-5 col-sm-5">' + repo.diagtname + '</div>' +
    '<div class="col-lg-2 col-md-2 col-sm-2">' +
        '<b style="margin-left:5px"><code>' + repo.id+ '</code></b>' + 
    '</div>' +
'</div>';
    return '<div style="overflow:hidden;">' + markup + '</div>';
};

var formatRepoSelection = function (repo) {
    return repo.full_name || repo.text;
}

JS;

// Register the formatting script
$this->registerJs($formatJs, View::POS_HEAD);

// script to parse the results into the format expected by Select2
$resultsJs = <<< JS
function (data, params) {
    params.page = params.page || 1;
    return {
        results: data.items,
        pagination: {
            more: (params.page * 30) < data.total_count
        }
    };
}
JS;
?>
<style>
    .select2-container--krajee .select2-selection--multiple {
        min-height: 123px;
    }
    .btn-diag-info {
    color: #ffffff;
    background-color: #009ee1;
    border-color:#ffffff00;
}
.btn-diag-info:hover{
    color: #ffffff;
    background-color: #0886bb;
    border-color: #ffffff00;
}

</style>
<div class="pcc-diagnosis-form">
<fieldset style="height:350px;padding-top: 10px;">

    <!-- <legend class="scheduler-border"><i class="fas fa-user-md"></i> Diagnosis Form 
    <button class="btn btn-default"><i class="fas fa-address-card"></i> General</button>
    <button class="btn btn-primary"><i class="fas fa-female"></i> Obs-Gyn</button>
    <button class="btn btn-success"><i class="fas fa-user-md"></i> Surgery</button>
    <button class="btn btn-diag-info"><i class="fas fa-pills"></i> Medicine</button>
    <button class="btn btn-warning"><i class="fas fa-child"></i> Pediatric</button>
    <button class="btn btn-danger"><i class="fas fa-user-md"></i> E-E-N-T</button> -->
    <legend class="scheduler-border"><i class="fas fa-universal-access"></i> Diagnosis Form

</legend> 

<span id="create" action="<?=$action_create;?>"></span>
<span id="update" action="<?=$action_update;?>"></span>
<span class="get_id" id="" ></span>
<div id="some-element" data=""></div>
<div id="text"></div>

    <?php // $form = ActiveForm::begin(['id' => 'form-diagnosis', 'action' => $action, 'options' => ['data-pjax' => 1],]); ?>
    
    <?php $form = ActiveForm::begin([ 
      'id' => 'form',
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-lg-2 col-md-2 col-sm-2',
                'wrapper' => 'col-lg-8 col-md-8 col-sm-8',
            ]
          ],
            'layout' => 'horizontal'
          ]); ?>
    <?php echo $form->field($model, 'id')->hiddenInput(['id' => 'id','disabled' => true])->label(false); ?>
    <?= $form->field($model, 'hn')->hiddenInput()->label(false); ?>
        <?= $form->field($model, 'vn')->hiddenInput()->label(false); ?>
        <?= $form->field($model, 'pcc_vn')->hiddenInput()->label(false); ?>
        <?= $form->field($model, 'cid')->hiddenInput()->label(false); ?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

    <?=$form->field($model, 'icd_code')->widget(Select2::className(), [
        'initValueText' => $prefix, //กำหนดค่าเริ่มต้น
        'options' => ['id' => 'icd_code', 'placeholder' => 'Select ICD10...','class' => 'clear'],
        'pluginOptions' => [
            'allowClear' => true,
            'minimumInputLength' => 1,
            'language' => [
                'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
            ],
            'ajax' => [
                'url' => $url,
                'dataType' => 'json',
                'data' => new JsExpression('function(params) { return {q:params.term}; }')
            ],
            'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
            'templateResult' => new JsExpression('formatRepo'),
        ],
        'pluginEvents' => [
           "select2:select" => "function() { $('#diag_type').select2('open'); }",
        ]
    ]);
    ?>

      <?=
    $form->field($model, 'diag_type')->widget(Select2::className(), [
        'data' => ArrayHelper::map(app\modules\doctorworkbench\models\CDiagtype::find()->orderBy(['diagtype' => SORT_ASC])->all(), 'diagtype', function($model, $defaultValue) {
                    return $model->diagtype . '-' . $model->name1;
                }),
        'options' => [
            'placeholder' => 'DiagType...','id' => 'diag_type'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
        'pluginEvents' => [
            "select2:select" => "function() { $('#btn-save').focus(); }",
        ]
    ]);
    ?>
            </div>
</div>
<?php //$form->field($model, 'diag_text')->text(['id' => 'diag_text','placeholder' => 'Diagtext']);?>
<?= $form->field($model, 'diag_text')->textarea(['id' => 'diag_text', 'class' => 'cctext form-control', 'rows' => 4,'cols'=>80,'style' =>'margin-left: 1px;width: 540px;']); ?>


<div class="row">
    
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <?php if($model->id):?>
<?php   // echo Html::submitButton('<i id="icon" class="fa fa-edit"></i><span id="btn_text"></span> บันทึก', ['class' => 'btn btn-warning', 'id' => 'btn-save']) ?>
<?php else:?>
        <?php  // echo Html::submitButton('<i id="icon" class="fa fa-plus"></i><span id="btn_text"></span> บันทึก', ['class' => 'btn btn-success pull-left', 'id' => 'btn-save','style' => 'margin-left: 107px;']) ?>
      
        <?php endif;?>
<?php  // echo Html::button('<i class="fa fa-trash"></i> ลบรายการ', ['class' => 'btn btn-danger', 'id' => 'btn-delete', 'style' => 'margin-left:5px;']) ?>    
<span style="margin-left: 119px;" class="btn <?=$model->id ? 'btn-warning' :'btn-success'?>" id="save-diag" url="index.php?r=chiefcomplaint/pccservicepe/create"> <i class="fas fa-check"></i> 
<?=$model->id ? 'แก้ไข' :'บันทึก'?>
</span>
    </div>
</div>
    </fieldset>
    </div>
<?php ActiveForm::end(); ?>
<?php
$js  = <<< JS

$(function(){
    // $('#icd_code').select2();
    $.fn.modal.Constructor.prototype.enforceFocus = function() {};

        $("#save-diag").click(function(event) {
    // alert('cc');
            // event.preventDefault(); // stopping submitting
            var data = $('#form').serialize();
            // var data = $('#pe_text').val();
            var url = $('#form').attr('action');
                $.ajax({
                url: url,
                type: 'post',
                dataType: 'json',
                data: data,
                success : function(response){
                    $.pjax.reload({
                    container:response.forceReload,
                    history:false,
                    replace: false,
                    url:'index.php?r=doctorworkbench/pcc-diagnosis'

                });
                $("#form")[0].reset();
                $('textarea#diag_text').text('');
                $("#form").attr('action','index.php?r=doctorworkbench/pcc-diagnosis/create');
                }
            }).fail(function() {
                console.log("error");
            });

            console.log(data);
        
                });
});
JS;
$this->registerJS($js);

?>