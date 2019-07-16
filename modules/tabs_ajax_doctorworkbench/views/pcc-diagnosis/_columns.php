<?php
use yii\helpers\Url;
use kartik\editable\Editable;
return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'icd_code',
        'header' => 'ICD10'
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'icd_name',
        'header' => 'ชื่อโรค',
    ],
    [
        // 'class' => '\kartik\grid\DataColumn',
        'attribute' => 'diag_type',
        'hAlign' => 'left',
        'vAlign' => 'middle',
        'header' => 'ประเภท',
        'value' => function($model){
            return $model->diagtype->nhso_code.'-'.$model->diagtype->name1;
        }
        // 'pageSummary' => true,
        // 'class' => 'kartik\grid\EditableColumn',
        // // 'refreshGrid' => true,
        // 'editableOptions' => [
        //     'inputType' => Editable::INPUT_DROPDOWN_LIST,
        //     'data' => ['1' => '1', '2' => '2'],
        //     'options' => ['class' => 'form-control', 'prompt' => 'Select DiagType...'],
        //     'displayValueConfig' => [                
        //         '1' => '1',
        //         '2' => '2',
        //     ],
        //     //'asPopover' => false,
        //     'formOptions' => [
        //         'action' => \yii\helpers\Url::to(['/doctorworkbench/pcc-diagnosis/editable']),
        //         'method' => 'post'
        //     ],
        //     'valueIfNull' => '-',
        //     'submitButton' => ['class' => 'btn btn-primary', 'icon' => '<i class="glyphicon glyphicon-ok"></i>'],
        //     'resetButton' => ['class' => 'btn btn-warning', 'icon' => '<i class="glyphicon glyphicon-refresh"></i>'],
        // ],
    ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'doctor',
    //     'header'=> 'แพทย์'
    // ],
    // [
    //     'class' => 'kartik\grid\ActionColumn',
    //     'template' => '{delete}',
    //     'dropdown' => false,
    //     'vAlign'=>'middle',
    //     'urlCreator' => function($action, $model, $key, $index) { 
    //             return Url::to([$action,'id'=>$key]);
    //     },
    //     'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
    //     'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
    //     'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
    //                       'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
    //                       'data-request-method'=>'post',
    //                       'data-toggle'=>'tooltip',
    //                       'data-confirm-title'=>'Are you sure?',
    //                       'data-confirm-message'=>'Are you sure want to delete this item'], 
    // ],
    

];   