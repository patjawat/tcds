<?php
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\editable\Editable;
return [

    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'hn',
        'header' => 'เวลาสั่งยา',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'hn',
        'header' => 'HN',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'hn',
        'header' => 'Fullname',
        'value' => function($model){
            return $model->patient ? $model->patient->fullname($model->hn) : '-';
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'hn',
        'header' => 'แพทย์',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'hn',
        'header' => 'หน่วยงาน',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'hn',
        'header' => 'จุดรับยา',
    ],

    [
        'class' => 'kartik\grid\ActionColumn',
        'template' => '{accept}',
        'buttons' => [
            'accept' => function ($url,$model) {
                return Html::a('<i class="fas fa-folder-plus"></i>',['/med/default/view','id' => $model->vn ], [
                    'title' => Yii::t('yii', 'Delete'),
                    'class' => '',
                    'aria-label' => Yii::t('yii', 'Delete'),
                    'data' => ['confirm' => 'ddd','confirm-title' => 'www']
                    
                ]);
            },
        ],
    ],

];   