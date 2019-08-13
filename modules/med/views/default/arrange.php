<?php
use app\components\PatientHelper;
use kartik\grid\GridView;
use yii\helpers\Html;
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fas fa-clipboard-check"></i> ระบบการจัดยา</h3>
    </div>
    <div class="panel-body">
        <?php
        echo GridView::widget([
            'id' => 'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax' => true,
            'columns' => [
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
                            return Html::a('<i class="fas fa-clipboard-check"></i>',['/med/default/order-view','id' => $model->vn ], [
                                'title' => Yii::t('yii', 'Delete'),
                                'class' => '',
                                'aria-label' => Yii::t('yii', 'Delete'),
                                'data' => ['confirm' => 'รับทราบข้อมูล']
                                
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
                'options' => ['title' => '<i class="fas fa-edit"></i> ยืนยัน'],
            ],
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
        ]);
        ?>
    </div>
</div>
<!-- End Panel -->