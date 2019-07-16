<?php

use yii\helpers\Url;
use yii\helpers\Html;
use app\modules\doctorworkbench\models\CDrugusage;
use yii\helpers\ArrayHelper;
use kartik\editable\Editable;
use kartik\grid\GridView;

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
        'attribute'=>'drug_name',
        'header' => 'รายการยา',
    ],
//    [
//        'class' => '\kartik\grid\DataColumn',
//        'attribute' => 'icode',
//        'header' => 'รายการยา',
//        'value' => function($model) {
//            return $model->drugitems->name . ' ' . $model->drugitems->strength . ' ' . $model->drugitems->units;
//        }
//    ],
//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'header'=>'หน่วย',
//         'value' => function($model){
//             return $model->drugitems->units;
//         }
//    ],
//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'header'=>'ความแรง/ขนาด',
//         'value' => function($model){
//             return $model->drugitems->strength;
//         }
//    ],
       [
        'class'=>'\kartik\grid\DataColumn',
        'attribute' =>'usage_line1',   
        'header'=>'วิธีใช้',         
    ],         
//    [
//        'class' => '\kartik\grid\DataColumn',
//        'attribute' => 'druguse',        
//        'header' => 'วิธีใช้',
//        'format' => 'raw',        
//        'editableOptions' => [   
//            
//            'inputType' => \kartik\editable\Editable::INPUT_SELECT2,
//            'formOptions' => [ 
//                'action' => \yii\helpers\Url::to(['/doctorworkbench/pcc-medication/editable']),
//                'method' => 'post'
//            ],
//            'valueIfNull' => '-',
//            'submitButton' => ['class' => 'btn btn-primary', 'icon' => '<i class="glyphicon glyphicon-ok"></i>'],
//            'resetButton' => ['class' => 'btn btn-warning', 'icon' => '<i class="glyphicon glyphicon-refresh"></i>'],
//            'options' => [
//                'data' => ArrayHelper::map(CDrugusage::find()->all(), 'drugusage', 'code'),
//                'options' => [
//                    'placeholder' => 'Please select...',
//                    'multiple' => false,
//                ]
//            ]
//        ],
//        'value' => function($model) {
//            $models = CDrugusage::find()->where(['drugusage' => $model->druguse])->one();
//            if ($model->druguse != '') {
//                return $models->code;
//            } else {
//                return '-';
//            }
//        }
//    ],
    [        
        'class' => '\kartik\grid\DataColumn',
        'header' => 'จำนวนจ่าย',
        'pageSummary' => 'มูลค่ารวม',
        'attribute' => 'qty',
//        'class' => 'kartik\grid\EditableColumn',
//        'editableOptions' => [
//            'formOptions' => [
//                'action' => \yii\helpers\Url::to(['/doctorworkbench/pcc-medication/editable']),
//                'method' => 'post'
//            ],
//            'valueIfNull' => '-',
//            'submitButton' => ['class' => 'btn btn-primary', 'icon' => '<i class="glyphicon glyphicon-ok"></i>'],
//            'resetButton' => ['class' => 'btn btn-warning', 'icon' => '<i class="glyphicon glyphicon-refresh"></i>'],
//        ],
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'totalprice',
        'header' => 'รวมราคา',
        'format' => ['decimal', 2],
        'pageSummary' => true,
        'value' => function($model) {
            $total = $model->qty * $model->unitprice;
            return $total;
        }
    ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'costprice',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'totalprice',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'provider_code',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'provider_name',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'date_service',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'time_service',
        // ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'data_json',
        // ],
        /*
          [
          'class' => 'kartik\grid\ActionColumn',
          'template' => '{delete}',
          'dropdown' => false,
          'vAlign'=>'middle',
          'urlCreator' => function($action, $model, $key, $index) {
          return Url::to([$action,'id'=>$key]);
          },
          'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
          'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
          'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete',
          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
          'data-request-method'=>'post',
          'data-toggle'=>'tooltip',
          'data-confirm-title'=>'Are you sure?',
          'data-confirm-message'=>'Are you sure want to delete this item'],
          ],
         */
];
