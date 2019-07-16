<?php

use yii\helpers\Html;
use kartik\grid\GridView;
$this->title = 'Doctor Frees';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-free-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'id',
                'header' => 'รหัส',
                'hAlign' => 'right', 
                'vAlign' => 'middle',
                'width' => '10%',
                'value' => function($model){
                    return $model->id;
                }
            ],
            [
                'attribute' => 'df_code',
                'hAlign' => 'left', 
                'vAlign' => 'middle',
                // 'width' => '7%',
                'value' => function($model){
                   
                    return $model->dfItems($model->df_code);
                }
            ],
            [
                'attribute' => 'price',
                'hAlign' => 'right', 
                'vAlign' => 'middle',
                'width' => '7%',
                'value' => function($model){
                    return $model->price;
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width:80px;',
                    'noWrap' => true
                ],
                'template' => '<div>{delete}</div>',
                'buttons' => [
                    'delete' => function($url, $model, $key) {
                        return Html::a('<i class="glyphicon glyphicon-trash"></i>', $url, [
                                    'title' => Yii::t('yii', 'Delete'),
                                    'class' => 'btn btn-danger btn-xs',
                                    'onclick' => "
                                    if (confirm('ลบข้อมูล?')) {
                                        $.ajax('$url', {
                                            type: 'POST'
                                        }).done(function(data) {
                                            if(data.status == 'success'){
                                                loadDoctorFree();
                                                loadFormDoctorFree();
                                            }else{
                                                alert(data)
                                            }
                                            console.log(data);                                            

                                        });
                                    }
                                    return false;
                                ",
                        ]);
                    }
                ]
            ]
        ],
    ]); ?>
</div>
