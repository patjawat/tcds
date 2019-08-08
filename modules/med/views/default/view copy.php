<?php
use app\components\PatientHelper;
use kartik\grid\GridView;
use yii\helpers\Html;

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
</style>

<div class="panel panel-default">
    <div class="panel-body">
        <!-- Start Row -->
        <div class="row">
            <div class="col-xs-5 col-sm-5 col-md-3 col-lg-3">
                <h4>NAME : <?=$visit->patient->fullname($visit->hn);?></h4>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <h4>HN : <?=$visit->hn;?></h4>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3">
                <h4>Physician : <?=$visit->hn;?></h4>
            </div>
        </div>
        <!-- End Row -->

        <!-- Start Row -->
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                <h4>ผล LAB eGFR : <?=$visit->patient->fullname($visit->hn);?></h4>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                <h4>จุดรับยา : <?=$visit->hn;?></h4>
            </div>
        </div>
        <!-- End Row -->
        
    </div>
    <!-- End Body -->
</div>
<!-- End panel -->

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Panel title</h3>
    </div>
    <div class="panel-body">
        <?=GridView::widget([
    'id' => 'crud-datatable',
    'dataProvider' => $dataProvider,
    // 'filterModel' => $searchModel,
    'pjax' => true,
    'columns' => [
        [
            'class' => 'kartik\grid\SerialColumn',
            'width' => '30px',
        ],
        [
            'class' => '\kartik\grid\DataColumn',
            'attribute' => 'icode',
            'header' => 'รหัสยา',
        ],
        [
            'class' => '\kartik\grid\DataColumn',
            'attribute' => 'icode',
            'header' => 'รหัสยา',
        ],
        [
            'class' => '\kartik\grid\DataColumn',
            'attribute' => 'druguse',
            'header' => 'วิธีการใช้',
        ],
        [
            'class' => '\kartik\grid\DataColumn',
            'attribute' => 'qty',
            'header' => 'จำนวน',
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            //'class'=>'\kartik\grid\DataColumn',
             'header' => 'ปรับจำนวนยา',
             // 'pageSummary' => 'มูลค่ารวม',
             'pageSummary' => true,
             'attribute' => 'qty_adjust',
             'width' => '150px',        
              'editableOptions' => [
                  'inputType' => \kartik\editable\Editable::INPUT_TEXT,
                  'formOptions' => [
                      'action' => \yii\helpers\Url::to(['/doctorworkbench/medication/editable']),
                      'method' => 'post'
                  ], 
                  'asPopover' => true,
                  'placement' => 'top',
                  'type' => 'primary',
                  'valueIfNull' => '-',
                  'submitButton' => ['class' => 'btn btn-primary', 'icon' => '<i class="glyphicon glyphicon-ok"></i>'],
                  'resetButton' => ['class' => 'btn btn-warning', 'icon' => '<i class="glyphicon glyphicon-refresh"></i>'],
                  'pluginEvents' => [
                     "editableSuccess"=>"function(event, val) { 
                         // console.log('Successful submission of value ' + val); 
                       //$.pjax.reload({container: '#grid-medication'});
                       //loadMedication();
                     }",
                 ],
                 ],
     
         ],
        [
            'class' => '\kartik\grid\DataColumn',
            'attribute' => 'med_note',
            'header' => 'หมายเหตุ',
        ],
        


        [
            'class' => 'kartik\grid\ActionColumn',
            'template' => '{accept}',
            'buttons' => [
                'accept' => function ($url, $model) {
                    return Html::a('<i class="fas fa-folder-plus"></i>', ['/med/default/view', 'id' => $model->id], [
                        'title' => Yii::t('yii', 'Delete'),
                        'class' => '',
                        'aria-label' => Yii::t('yii', 'Delete'),
                        'data' => ['confirm' => 'ddd', 'confirm-title' => 'www'],

                    ]);
                },
            ],
        ],
    ],
    'toolbar' => [
        ['content' =>
            Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],
                ['role' => 'modal-remote', 'title' => 'Create new Document Types', 'class' => 'btn btn-default']) .
            Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                ['data-pjax' => 1, 'class' => 'btn btn-default', 'title' => 'Reset Grid']) .
            '{toggleData}' .
            '{export}',
        ],
    ],
    'krajeeDialogSettings' => [
        'options' => ['title' => '<i class="fas fa-exclamation"></i> ยืนยัน'],
    ],
    'striped' => true,
    'condensed' => true,
    'responsive' => true,
])?>

    </div>
</div>