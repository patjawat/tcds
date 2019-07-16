<?php
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\editable\Editable;
return [
    [
        'class' => 'kartik\grid\RadioColumn',
        'width' => '20px',
        'radioOptions' => function ($model) {
            return [
                'value' => $model->id,
                'checked' => $model->id == Yii::$app->request->get('id'),
                'onclick'=> 'window.location.href = "'.Url::to(['/doctorworkbench/pcc-diagnosis','id' => $model->id]).'"'
            ];
        }
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'diag_text',
        'header' => 'DiagText',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'width' => '40px',
        'attribute'=>'icd_code',
        'header' => 'ICD10',
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
            if($model->diag_type != ''){
                return $model->diagtype1->diagtype.'-'.$model->diagtype1->name1;
            } else {
                return '-';
            }
            
        }

    ],

    [
        'class' => 'kartik\grid\ActionColumn',
        'template' => '{delete}',
        'buttons' => [
            'delete' => function ($url) {
                return Html::a('<i class="far fa-trash-alt"></i> ', '#', [
                    'title' => Yii::t('yii', 'Delete'),
                    'class' => '',
                    'aria-label' => Yii::t('yii', 'Delete'),
                    'onclick' => "
                        // if (confirm('ok?')) {
                            $.ajax('$url', {
                                type: 'POST'
                            }).done(function(data) {
                                $.pjax.reload({container: '#crud-diagnosis-pjax'});
                            });
                        // }
                        return false;
                    ",
                ]);
            },
        ],
    ],

];   