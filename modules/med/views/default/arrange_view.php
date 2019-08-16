<?php
use app\components\PatientHelper;
use kartik\dialog\Dialog;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\bootstrap\ActiveForm;

$hn = PatientHelper::getCurrentHn();
$vn = PatientHelper::getCurrentVn();
$this->params['pt_title'] = PatientHelper::getPatientTitleByHn($hn);
?>
<style>
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

.list-cell__med_cancel{
    width: 100px;
}
.list-cell__icode{
    width: 250px;
}
.med-cancel{
    background-color: #ccc;
    color: #555555;
}
.med-cancel:hover{
    background-color: #eee!important;
    color: #000;
}
</style>
<h3 class="text-center">จัดยา</h3>

<?php $form = ActiveForm::begin(['id' => 'form-med-arrange','method' => 'post']);?>

<?=$form->field($model, 'med_arrange_requester')->hiddenInput(['class' => 'requester'])->label(false)?>
   
   <?=GridView::widget([
    'dataProvider' => $dataProvider,
    'id' => 'grid-med-accept',
    'pjax' => true,
    'bordered' => true,
    'striped' => false,
    'condensed' => false,
    'responsive' => true,
    'hover' => true,
    'floatHeader' => true,
    'floatHeader' => true,
    'floatHeaderOptions' => ['scrollingTop' => '10'],
    'perfectScrollbar' => true,
    'footerRowOptions' => ['style' => 'font-weight:bold;text-decoration: underline; position: absolute'],
    'rowOptions' => function ($model) {
        if ($model->med_cancel == '1') {
            return ['class' => 'med-cancel'];
        }
    },
    'toolbar' => [
        [
            'content' => Html::submitButton('<i class="fas fa-check"></i> บันทึก', ['class' => "btn btn-success"]),
            'toolbarContainerOptions' => ['class' => 'btn-toolbar pull-right'],
        ],
    ],
    'panel' => [
        'heading' => '<h3 class="panel-title"><i class="fas fa-user-tag"></i> NAME : ' . $model->patient($model->hn) . '</h3>',
        'type' => GridView::TYPE_DEFAULT,
        'before' => '
            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"> <h5> HN : <code>' . $model->hn . '</code> </h5> </div>
                <div class="col-xs-4 col-sm-3 col-md-3 col-lg-3"> <h5> Physician : <code>1234</code></h5> </div>
                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5"> <h5> ผล LAB eGFR : <code>1234</code></h5> </div>
            </div>',
        'after' => '<i class="fas fa-check"></i>  <span class="label label-success">รายการที่ใช้งาน </span>&nbsp |  <i class="fas fa-times"></i>  <span class="label label-default">รายการที่ถูกยกเลิก</span>',
        'showFooter' => false,
    ],
    'columns' => [
        [
            'class' => 'kartik\grid\SerialColumn',
            'contentOptions' => ['class' => 'kartik-sheet-style'],
            'width' => '36px',
            'pageSummary' => 'Total',
            'pageSummaryOptions' => ['colspan' => 6],
            'header' => '',
            'headerOptions' => ['class' => 'kartik-sheet-style'],
        ],
        [
            'attribute' => 'icode',
            'header' => 'รายการ',
            'vAlign' => 'middle',
            'hAlign' => 'right',
            'width' => '5%',
        ],
        [
            'attribute' => 'druguse',
            'vAlign' => 'middle',
            'hAlign' => 'left',
            'width' => '35%',
            'value' => function ($model) {
                return $model->Drugitems($model->icode);
            },
        ],
        [
            'attribute' => 'qty',
            'vAlign' => 'middle',
            'hAlign' => 'center',
            'width' => '5%',
        ],
        [
            'attribute' => 'qty_adjust',
            'vAlign' => 'middle',
            'hAlign' => 'center',
            'width' => '5%',
            'format' => 'raw',
            'value' => function ($model) {
                return $model->qty_adjust;
            },

        ],
        'med_note',
        [
            'class' => 'kartik\grid\ActionColumn',
            'header' => 'ยกเลิกยา',
            'width' => '100px',
            'template' => '{med-canel}',
            'buttons' => [
                'med-canel' => function ($url, $model, $key) {
                    return $model->med_cancel == '0' ? '<i class="fas fa-check med-active"></i> <span class="label label-success">ใช้ </span>' : '<i class="fas fa-times med-cancel-text"></i> <span class="label label-default">ยกเลิก </span>';
                },
            ],
            'dropdownOptions' => ['class' => 'float-right'],
            'urlCreator' => function ($action, $model, $key, $index) {return '#';},
            'viewOptions' => ['title' => 'This will launch the book details page. Disabled for this demo!', 'data-toggle' => 'tooltip'],
            'updateOptions' => ['title' => 'This will launch the book update page. Disabled for this demo!', 'data-toggle' => 'tooltip'],
            'deleteOptions' => ['title' => 'This will launch the book delete action. Disabled for this demo!', 'data-toggle' => 'tooltip'],
            'headerOptions' => ['class' => 'kartik-sheet-style'],
        ],
    ],
]);?>
 <?php ActiveForm::end();?>
<?php

echo Dialog::widget([
    'libName' => 'krajeeDialogCust',
    'options' => ['draggable' => true, 'closable' => true],
]);

$request = Yii::$app->request;
$js = <<< JS

$("#form-med-arrange").on('beforeSubmit', function (e) {
  e.preventDefault();
  var form = $(this);
  var formId = form.attr('id');

   if ($('#opdvisit-med_arrange_requester').val() == '') {
        getRequester("#form-med-arrange");
        return false;
    }else{
        return true;
    }
        return false;
});

JS;
$this->registerJS($js, View::POS_END, 'my-options');
?>