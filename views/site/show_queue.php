<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use app\components\DbHelper;
use app\components\FormatYear;
use app\components\PatientHelper;
use app\components\UserHelper;

$this->title = 'รายการผู้รับบริการ';
?>

<div class="opd-visit-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'id' => 'opd-visit',
        'pjax' => true,
        //'filterUrl'=> Url::to(["/nursescreen/opd-visit"]),
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
            [
                'attribute' => 'service_start_date',
                'header' => 'วันที่',
                'contentOptions' => ['style' => 'max-width: 100px;'],
                'format' => 'raw',
                'value' => function ($model) {
                    return FormatYear::toThai($model['service_start_date']);
                }
            ],
            'service_start_time:text:เวลา',
            'hn',
            [
                'attribute' => 'pcc_vn',
                'header' => 'VN',
                'contentOptions' => ['style' => 'max-width: 100px;'],
                'format' => 'raw',
                'value' => function ($model) {
                return $model['pcc_vn'];
                    
                }
            ],
            [
                'header' => 'ชื่อ-สกุล',
                'format' => 'raw',
                'width' => '150px',
                'value' => function ($model) {
                //    return PatientHelper::GetPatient($model['hn']);
                   return '<span id="'.$model->hn.'">'.$model->hn.'</span>';
                }
                
            ],
            [
                'header' => 'แพทย์ที่รักษา',
                'value' => function ($model) {
                    return UserHelper::getDoctorIs($model->doctor_id);
                }
                
            ],
            [
                'header' => 'OPD DOCTOR RECORD',
                'format' => 'raw',
                'hAlign' => 'center',
                'vAlign' => 'middle',
                'value' => function ($model) {
                    return $model->print ? '<i class="fas fa-print"></i>' : '-';
                }
                
            ],
            [
                'header' => 'LAB',
                'format' => 'raw',
                'hAlign' => 'center',
                'vAlign' => 'middle',
                'value' => function ($model) {
                    return '-';
                }
                
            ],

            [
                'class' => 'kartik\grid\ActionColumn',
                'contentOptions' => ['style' => 'width:80px;',
                    'noWrap' => true
                ],
                'width' => '15%',
                'template' => '<div>{update} </div>',
                'buttons' => [
                    'update' => function($url, $model, $key) {
                            $pcc_vn = $model['pcc_vn'];
                            $vn = $model['vn'];
                            $hn = $model['hn'];
                            // return Html::a('<i class="fas fa-edit"></i> ตรวจ', ['/opdvisit/opd-visit/revisit', 'pcc_vn' => $pcc_vn,'hn' => $hn], ['class' => '', 'data-confirm' => 'แก้ไข Visit นี้']);
                            return Html::a('<i class="fas fa-edit"></i> ตรวจรักษา', ['/opdvisit/opd-visit/revisit', 'pcc_vn' => $pcc_vn,'hn' => $hn,'vn'=> $vn], [
                                'class' => '', 
                                // 'data-confirm' => 'แก้ไข Visit นี้'
                                'data' => ['confirm' => '<h4 class="text-center">HN : '.$model->hn.'</h4><h4 class="text-center">'.$model->patient($model->hn).'</h4>']

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
</div>

<?php
$js = <<< JS

$('tbody > tr').each(function(){ 
    var hn = $(this).find('td').eq(3).text()
            getPatientname(hn)
});

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
            $('#'+hn).html(response.content);
        }
    });
}


JS;
$this->registerJS($js);
?>