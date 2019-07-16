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
// $this->params['breadcrumbs'][] = $this->title;
?>

<div class="opd-visit-index">
    
    <?php //yii\widgets\Pjax::begin(['id' => 'grid-user-pjax','timeout'=>5000]) ?>
    <?php //   echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'id' => 'opd-visit',
        'pjax' => true,
        'filterUrl'=> Url::to(["/nursescreen/opd-visit"]),
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
            // 'service_start_date:text:เข้ารับบริการ',
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
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width:80px;',
                    'noWrap' => true
                ],
                'template' => '<div>{update} </div>',
                'buttons' => [
                    'update' => function($url, $model, $key) {
                            $pcc_vn = $model['pcc_vn'];
                            $hn = $model['hn'];
                            return Html::a('<i class="fas fa-edit"></i> ตรวจ', ['/site/revisit', 'pcc_vn' => $pcc_vn,'hn' => $hn], ['class' => '', 'data-confirm' => 'แก้ไข Visit นี้']);
                      
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
            // console.log(response.content);
            $('#'+hn).html(response.content);
        }
    });
}


JS;
$this->registerJS($js);
?>