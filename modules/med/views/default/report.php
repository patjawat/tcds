<?php

use app\components\PatientHelper;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\dialog\Dialog;
use yii\web\JsExpression;
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fas fa-edit"></i> ระบบรายงานการจ่ายยา </h3>
    </div>
    <br>
    <?php // echo $this->render('report_search', ['model' => $searchModel]); 
    ?>
    <div class="panel-body">
        <?php
        echo GridView::widget([
            'id' => 'grid-med-report',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'filterUrl' => Url::to(["/med/default/report"]),
            'pjax' => true,
            'pjaxSettings' => [
                'options' => [
                    'enablePushState' => false,
                ],
            ],
            'rowOptions' => function ($model) {
                if ($model->med_success == '1') {
                    return ['class' => 'success'];
                }
            },
            'columns' => [
                [
                    'class' => 'kartik\grid\SerialColumn',
                    'width' => '30px',
                ],
                [
                    'attribute' => 'service_start_date',
                    'width' => '10%',
                    // 'hAlign' => 'center',
                    'vAlign' => 'middle',
                    'options' => [
                        'format' => 'YYYY-MM-DD',
                    ],
                    'filterType' => GridView::FILTER_DATE_RANGE,
                    'filterWidgetOptions' => ([
                        'attribute' => 'service_start_date',
                        'presetDropdown' => true,
                        'convertFormat' => false,
                        'language' => 'th',
                        'pluginOptions' => [
                            'separator' => ' - ',
                            'format' => 'YYYY-MM-DD',
                            'locale' => [
                                'format' => 'YYYY-MM-DD'
                            ],
                        ],
                        'pluginEvents' => [
                            "apply.daterangepicker" => "function() { apply_filter('service_start_date') }",
                        ],
                    ])
                ],
                [
                    'class' => '\kartik\grid\DataColumn',
                    'attribute' => 'checkout_time',
                    'header' => 'เวลาสั่งยา',
                    'width' => '30px',
                    'hAlign' => 'center',
                    'vAlign' => 'middle',
                ],
                [
                    'class' => '\kartik\grid\DataColumn',
                    'attribute' => 'pcc_vn',
                    'header' => 'VN',
                    'width' => '80px',
                    'hAlign' => 'left',
                    'vAlign' => 'middle',
                ],
                [
                    'class' => '\kartik\grid\DataColumn',
                    'attribute' => 'hn',
                    'header' => 'HN',
                    'width' => '100px',
                    'hAlign' => 'left',
                    'vAlign' => 'middle',
                ],
                [
                    'class' => '\kartik\grid\DataColumn',
                    'header' => 'ชื่อ-สกุล',
                    'width' => '200px',
                    'hAlign' => 'left',
                    'vAlign' => 'middle',
                    'value' => function ($model) {
                        return $model->patient ? $model->patient->fullname($model->hn) : '-';
                    }
                ],
                [
                    'class' => '\kartik\grid\DataColumn',
                    'attribute' => 'doctor_id',
                    'header' => 'แพทย์',
                    'hAlign' => 'left',
                    'vAlign' => 'middle',
                ],
                [
                    'class' => '\kartik\grid\DataColumn',
                    'attribute' => 'med_accept_requester',
                    'format' => 'raw',
                    'hAlign' => 'center',
                    'vAlign' => 'middle',
                    'enableSorting' => false,
                    'contentOptions' => function ($model, $key, $index, $column) {
                        return ['style' => 'background-color:' . (!empty($model->med_accept_requester) && $model->med_accept > 0 ? '#fdecd4' : '')];
                    },
                    'value' => function ($model) {
                        return $model->med_accept_requester ?
                            '<h5 class="text-center"><i class="fas fa-user-check text-success"></i>
                        </h5><h5 class="text-center">' . PatientHelper::RequesterName($model->med_accept_requester) . '</h5>' : '-';
                    }
                ],
                [
                    'class' => '\kartik\grid\DataColumn',
                    'attribute' => 'med_accept_time',
                    'format' => 'raw',
                    'hAlign' => 'center',
                    'vAlign' => 'middle',
                    'enableSorting' => false,
                    'contentOptions' => function ($model, $key, $index, $column) {
                        return ['style' => 'background-color:' . (!empty($model->med_accept_time) && $model->med_accept > 0 ? '#fdecd4' : '')];
                    },
                    'value' => function ($model) {
                        return $model->med_accept_time ? '<h5 class="text-center"><i class="fas fa-clock"></i></h5><h5 class="text-center">' . $model->med_accept_time . '</h5>' : '-';
                    }
                ],
                [
                    'class' => '\kartik\grid\DataColumn',
                    'attribute' => 'med_arrange_requester',
                    'format' => 'raw',
                    'hAlign' => 'center',
                    'vAlign' => 'middle',
                    'enableSorting' => false,
                    'contentOptions' => function ($model, $key, $index, $column) {
                        return ['style' => 'background-color:' . (!empty($model->med_arrange_requester) && $model->med_arrange > 0 ? '#fdecd4' : '')];
                    },
                    'value' => function ($model) {
                        return $model->med_arrange_requester ? '<h5 class="text-center"><i class="fas fa-user-check text-success"></i></h5><h5 class="text-center">' . PatientHelper::RequesterName($model->med_arrange_requester) . '</h5>' : '-';
                    }

                ],
                [
                    'class' => '\kartik\grid\DataColumn',
                    'attribute' => 'med_arrange_time',
                    'format' => 'raw',
                    'hAlign' => 'center',
                    'vAlign' => 'middle',
                    'enableSorting' => false,
                    'contentOptions' => function ($model, $key, $index, $column) {
                        return ['style' => 'background-color:' . (!empty($model->med_arrange_time) && $model->med_arrange > 0 ? '#fdecd4' : '')];
                    },
                    'value' => function ($model) {
                        return $model->med_arrange_time ? '<h5 class="text-center"><i class="fas fa-clock"></i></h5><h5 class="text-center">' . $model->med_arrange_time . '</h5>' : '-';
                    }
                ],
                [
                    'class' => '\kartik\grid\DataColumn',
                    'attribute' => 'med_check_requester',
                    'format' => 'raw',
                    'hAlign' => 'center',
                    'vAlign' => 'middle',
                    'enableSorting' => false,
                    'contentOptions' => function ($model, $key, $index, $column) {
                        return ['style' => 'background-color:' . (!empty($model->med_check_requester) && $model->med_check > 0 ? '#fdecd4' : '')];
                    },
                    'value' => function ($model) {
                        return $model->med_check_requester ? '<h5 class="text-center"><i class="fas fa-user-check text-success"></i></h5><h5 class="text-center">' . PatientHelper::RequesterName($model->med_check_requester) . '</h5>' : '-';
                    }
                ],
                [
                    'class' => '\kartik\grid\DataColumn',
                    'attribute' => 'med_check_time',
                    'format' => 'raw',
                    'hAlign' => 'center',
                    'vAlign' => 'middle',
                    'enableSorting' => false,
                    'contentOptions' => function ($model, $key, $index, $column) {
                        return ['style' => 'background-color:' . (!empty($model->med_check_time) && $model->med_check > 0 ? '#fdecd4' : '')];
                    },
                    'value' => function ($model) {
                        return $model->med_check_time ? '<h5 class="text-center"><i class="fas fa-clock"></i></h5><h5 class="text-center"><h5 class="text-center">' . $model->med_check_time . '</h5>' : '-';
                    }
                ],
                [
                    'class' => '\kartik\grid\DataColumn',
                    'attribute' => 'med_success_requester',
                    'format' => 'raw',
                    'hAlign' => 'center',
                    'vAlign' => 'middle',
                    'enableSorting' => false,
                    'contentOptions' => function ($model, $key, $index, $column) {
                        return ['style' => 'background-color:' . (!empty($model->med_success_requester) && $model->med_success > 0 ? '#fdecd4' : '')];
                    },
                    'value' => function ($model) {
                        return $model->med_success_requester ? '<h5 class="text-center"><i class="fas fa-user-check text-success"></i></h5><h5 class="text-center">' . PatientHelper::RequesterName($model->med_success_requester) . '<h5>' : '-';
                    }
                ],
                [
                    'class' => '\kartik\grid\DataColumn',
                    'attribute' => 'med_success_time',
                    'format' => 'raw',
                    'hAlign' => 'center',
                    'vAlign' => 'middle',
                    'enableSorting' => false,
                    'contentOptions' => function ($model, $key, $index, $column) {
                        return ['style' => 'background-color:' . (!empty($model->med_success_time) && $model->med_success > 0 ? '#fdecd4' : '')];
                    },
                    'value' => function ($model) {
                        return $model->med_success_time ? '<h5 class="text-center"><i class="fas fa-clock text-success"></i></h5><h5 class="text-center">' . $model->med_success_time . '</h5>' : '-';
                    }
                ],
                // [
                //     'class' => 'kartik\grid\ActionColumn',
                //     'template' => '{accept}',
                //     'width' => '120px',
                //     'buttons' => [
                //         'accept' => function ($url,$model) {
                //             return Html::a('รับทราบข้อมูล',['/med/default/order-view','id' => $model->vn ], [
                //                 'title' => Yii::t('yii', 'Delete'),
                //                 'class' => '',
                //                 'aria-label' => Yii::t('yii', 'Delete'),
                //                 'data' => ['confirm' => '<h4 class="text-center">HN : '.$model->hn.'</h4><h4 class="text-center">'.$model->patient($model->hn).'</h4>']

                //             ]);
                //         },
                //     ],
                // ],
            ],
            'toolbar' => [
                [
                    'content' =>
                    Html::a(
                        '<i class="glyphicon glyphicon-plus"></i>',
                        ['create'],
                        ['role' => 'modal-remote', 'title' => 'Create new Document Types', 'class' => 'btn btn-default']
                    ) .
                        Html::a(
                            '<i class="glyphicon glyphicon-repeat"></i>',
                            [''],
                            ['data-pjax' => 1, 'class' => 'btn btn-default', 'title' => 'Reset Grid']
                        ) .
                        '{toggleData}' .
                        '{export}',
                ],
            ],
            'krajeeDialogSettings' => [
                'id' => 'a11',
                'libName' => 'krajeeDialogOrder', // ตั้งชื่อของ Dialog
                'overrideYiiConfirm' => true,
                'options' => [
                    'title' => '<i class="fas fa-edit"></i> การแจ้งเตือน',
                    'size' => Dialog::SIZE_SMALL,
                    'type' => Dialog::TYPE_WARNING,
                    'btnOKLabel' => '<i class="fas fa-check"></i> ตกลง',
                    'btnCancelLabel' => '<i class="fas fa-ban"></i> ยกเลิก'
                ],
            ],
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
        ]);
        ?>
    </div>
</div>
<!-- End Panel -->



<?php
$js = <<< JS

// var input;
// var submit_form = false;
// var filter_selector = '#grid-med-report-filters input';

// $("body").on('beforeFilter', "#grid-med-report" , function(event) {
//     return submit_form;
// });

// $("body").on('afterFilter', "#grid-med-report" , function(event) {
//     submit_form = false;
// });

// $(document)
// .off('keydown.yiiGridView change.yiiGridView', filter_selector)
// .on('keyup', filter_selector, function() {
//     input = $(this).attr('name');

//     if(submit_form === false) {
//         submit_form = true;
//         $("#grid-med-report").yiiGridView("applyFilter");
//     }
// })
// .on('pjax:success', function() {
//     var i = $("[name='"+input+"']");
//     var val = i.val();
//     i.focus().val(val);
// });

JS;
$this->registerJS($js);
?>