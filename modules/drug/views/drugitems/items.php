<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\db\Expression;
use yii\bootstrap\Modal;
use yii\web\View;

$this->title = 'Drugitems';
$this->params['breadcrumbs'][] = $this->title;
?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'id' => 'drugItems',
        'pjax' => true,
        'floatHeader' => true,
            'floatHeaderOptions' => ['scrollingTop' => '20'],
            'perfectScrollbar' => true,
            'footerRowOptions' => ['style' => 'font-weight:bold;text-decoration: underline; position: absolute'],
            'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'headerRowOptions' => ['style' => 'background-color:'],
            'rowOptions'=>function($model){
                // if($model->date_service == Date('Y-m-d')){
                //     return ['class' => 'info'];
                // }
            },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'icode',
            'name',
            'strength',
            'units',
            'unitprice',
           
            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width:80px;',
                    'noWrap' => true
                ],
                'template' => '<div>{select}</div>',
                'buttons' => [
                    'select' => function($url, $model, $key) {
                    //     return Html::button('<i class="fas fa-edit"></i>', [
                    //         'value' => \yii\helpers\Url::to(['update', 'id' => $model->id]),
                    //         'title' =>'แก้ไขการ'.$this->title,
                    //         'class' => 'btn btn-primary btn-xs open-modal',
                    //         // 'onclick' =>''
                    //         'onclick' => "
                    //         $.ajax({
                    //             type: 'get',
                    //             url: '".\yii\helpers\Url::to(['update', 'id' => $model->id])."',
                    //             beforeSend: function(){
                                   
                    //             },
                    //             success: function (response) {
                    //                 $('#pccservicecc-form').html(response)
                    //             }
                    //         });
                    //         ",
                    //         ]);
                    return Html::a('<i class="fas fa-check"></i> เลือก','#',[
                        'onclick' => "
                             $.ajax({
                                 type: 'get',
                                 url: '".\yii\helpers\Url::to(['/doctorworkbench/medication/add-drug-items', 'icode' => $model->icode])."',
                                 beforeSend: function(){
                                   
                                 },
                                 success: function (response) {
                                     //$('#pccservicecc-form').html(response)
                                     loadMedication();
                                }
                             });
                             ",
                    ]);
                    },
                  
                ]
            ]
        ],
    ]); ?>

