<?php
use yii\helpers\Html;
use yii\helpers\Url;

return [
    // [
    //     'class' => 'kartik\grid\RadioColumn',
    //     'width' => '20px',
    //     'radioOptions' => function ($model) {
    //         return [
    //             'value' => $model->id,
    //             'checked' => $model->id == Yii::$app->request->get('id'),
    //             'onclick'=> 'window.location.href = "'.Url::to(['/doctorworkbench/pcc-procedure','id' => $model->id]).'"'
    //         ];
    //     }
    // ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'header' => 'Procedure Name',
        'attribute'=>'procedure_name',
        'value' => function($model){
            return $model->proced->title.' - '.$model->proced->title_th;
        }
    ],

    [
        'class'=>'\kartik\grid\DataColumn',
        'header' => 'Doctor',
        'attribute'=>'doctor',
    ],
    [
        'class' => 'yii\grid\ActionColumn',
        'contentOptions' => ['style' => 'width:80px;',
            'noWrap' => true
        ],
        'template' => '<div>{update} {delete}</div>',
        'buttons' => [
            'update' => function($url, $model, $key) {
                return Html::button('<i class="fas fa-edit"></i>', [
                    'value' => \yii\helpers\Url::to(['update', 'id' => $model->id]),
                    'title' =>'แก้ไขการ'.$this->title,
                    'class' => 'btn btn-primary btn-xs open-modal',
                    // 'onclick' =>''
                    'onclick' => "
                    $.ajax({
                        type: 'get',
                        url: '".\yii\helpers\Url::to(['update', 'id' => $model->id])."',
                        beforeSend: function(){
                           
                        },
                        success: function (response) {
                            $('#ProcedureForm').html(response)
                        }
                    });
                    ",
                    ]);
            },
            'delete' => function($url, $model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', $url, [
                            'title' => Yii::t('yii', 'Delete'),
                            'class' => 'btn btn-danger btn-xs',
                            'onclick' => "
                            if (confirm('ลบข้อมูล?')) {
                                $.ajax('$url', {
                                    type: 'POST'
                                }).done(function(data) {
                                    $.pjax.reload({
                                        container:data.forceReload,
                                        history:false,
                                        replace: false,
                                        url: data.url  
                                        });
                                });
                            }
                            return false;
                        ",
                ]);
            }
        ]
    ]

];   