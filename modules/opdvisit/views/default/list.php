<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use app\components\DbHelper;
use app\components\FormatYear;
use app\components\PatientHelper;
use kartik\daterange\DateRangePicker;

$this->title = 'รายการผู้รับบริการ';
// $this->params['breadcrumbs'][] = $this->title;
?>

<style>
.modal-ajax-loader {
    border: 5px solid #f3f3f3;
    -webkit-animation: spin 1s linear infinite;
    animation: spin 1s linear infinite;
    border-top: 5px solid #555;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    margin: auto;
}
</style>
<div class="opd-visit-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'id' => 'opd-visit',
        'pjax' => true,
        // 'filterUrl'=> Url::to(["/nursescreen/opd-visit"]),
        // 'filterUrl'=> Url::to(["/nursescreen/opd-visit"]),
        'pjaxSettings' => [
            'options' => [
                'enablePushState' => false,
            ],
        ],
        'summary' => false,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
            ],

            // [
            //     'attribute' => 'service_start_date',
            //     'header' => 'วันที่',
            //     'width' => '8%',
            //     'contentOptions' => ['style' => 'max-width: 100px;'],
            //     'format' => 'raw',
            //     'value' => function ($model) {
            //         return FormatYear::toThai($model['service_start_date']);
            //     }
            // ],
            [
                'attribute'=>'service_start_date',
                'width' => '20%',
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
                'attribute' => 'service_start_time',
                'header' => 'เวลา',
                'width' => '7%',
                'contentOptions' => ['style' => 'max-width: 100px;'],
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->service_start_time;
                }
            ],
            // 'service_start_date:text:เข้ารับบริการ',
            // 'service_start_time:text:เวลา',
            [
                'attribute' => 'hn',
                'header' => 'HN',
                'format' => 'raw',
                'width' => '8%',
                'value' => function ($model) {
                //    return PatientHelper::GetPatient($model['hn']);
                //    return '<span id="'.$model->hn.'">'.$model->hn.'</span>';
                return $model->hn;
                }

            ],
            [
                'header' => 'ชื่อ-สกุล',
                'format' => 'raw',
                'mergeHeader' => true,
                'value' => function ($model) {
                //    return PatientHelper::GetPatient($model['hn']);
                //    return '<span id="'.$model->hn.'">'.$model->hn.'</span>';
                return $model->patient($model->hn);
                }

            ],
            [
                'header' => 'แพทย์ที่รักษา',
                'mergeHeader' => true,
                'value' => function ($model) {
                    return $model->DoctorName($model->doctor_id);
                }

            ],
            [
                'attribute' => 'vn',
                'header' => 'VN',
                'width' => '9%',
                'contentOptions' => ['style' => 'max-width: 100px;'],
                'format' => 'raw',
                'value' => function ($model) {
                return $model['pcc_vn'];

                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width:80px;',
                    'noWrap' => true
                ],
                'template' => '<div>{update} </div>',
                'buttons' => [
                    'update' => function($url, $model, $key) {
                            $pcc_vn = $model['pcc_vn'];
                            $hn = $model['hn'];
                            $vn = $model['vn'];
                            return Html::a('<i class="fas fa-edit"></i> แก้ไข', ['/opdvisit/opd-visit/revisit', 'pcc_vn' => $pcc_vn,'hn' => $hn,'vn'=> $vn], ['class' => '', 'data-confirm' => 'แก้ไข Visit นี้']);

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
                                                container:data.container,
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
        ],
    ]); ?>
    <?php // yii\widgets\Pjax::end() ?>
</div>

<?php
$js = <<< JS

// loop ตาราง เพื่อดึงข้อมูลชื่อจาก API
// var num = 1;
// $('tbody > tr').each(function(){
//     var hn = $(this).find('td').eq(4).text()
//             // console.log(hn)
//             getPatientname(hn)
// });

// GetRows();

function getPatientname(hn){
    $.ajax({
        type: "get",
        url: "index.php?r=site/getpatient",
        data: {hn:hn},
        dataType: "json",
        beforeSend: function(){
            $('#'+hn).html('<code>กำลังโหลดข้อมูล...</code>');
        },
        success: function (response) {
            // console.log(response.content);
            $('#'+hn).html(response.content);
        }
    });
}

// function GetRows() {

//     $("table").each(function () {
//     //    console.log($(this).find("data-col-seq").val())
//     console.log('row');

//     });
// }

JS;
$this->registerJS($js);
?>
