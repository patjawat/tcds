<?php
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;
use app\components\PatientHelper;


$dataProvider = new ArrayDataProvider([
    'allModels' => $data,
    'pagination' => [
        'pageSize' => 10,
    ],
    'sort' => [
        'attributes' => ['id', 'name'],
    ],
]);

// get the rows in the currently requested page
$rows = $dataProvider->getModels();
// print_r($rows[0]);

?>
<?php
 echo GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
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
                'header' => 'วัน/เวลา',
                'contentOptions' => ['style' => 'max-width: 100px;'],
                'format' => 'raw',
                'value' => function ($model) {
                    // return PatientHelper::viewCurrentAge($model->visit_thdate);
                   // return PatientHelper::viewCurrentThaidate($model->visit_thdate).' ';
                    return PatientHelper::viewCurrentThaidate($model->visit_date).' ';
                }
            ],
            [
                'header' => 'VN',
                'contentOptions' => ['style' => 'max-width: 100px;'],
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->vn;
                }
            ],
            [
                'header' => 'จุดรับบริการ',
                'contentOptions' => ['style' => 'max-width: 100px;'],
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->div_name;
                }
            ],
            [
                'header' => 'แพทย์',
                'contentOptions' => ['style' => 'max-width: 100px;'],
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->doctor_prefix.$model->doctor_fname.''.$model->doctor_lname;
                }
            ],
            // // 'service_start_date:text:เข้ารับบริการ',
            // 'service_start_time:text:เวลา',
            // 'hn',
            // [
            //     'header' => 'ชื่อ-สกุล',
            //     'value' => function ($model) {
            //         return PatientHelper::GetPatient($model['hn']);
            //     }

            // ],
            // [
            //     'header' => 'แพทย์ที่รักษา',
            //     'value' => function ($model) {
            //         return '-';
            //     }

            // ],
            // [
            //     'attribute' => 'vn',
            //     'header' => 'VN',
            //     'contentOptions' => ['style' => 'max-width: 100px;'],
            //     'format' => 'raw',
            //     'value' => function ($model) {
            //     return $model['pcc_vn'];

            //     }
            // ],
            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width:80px;',
                    'noWrap' => true
                ],
                'template' => '<div>{update} </div>',
                'buttons' => [
                    'update' => function($url, $model, $key) {
                        // return $model->div_id;
                            // $pcc_vn = $model['pcc_vn'];
                            // $hn = $model['hn'];
                            return Html::a('<i class="fas fa-edit"></i> เลือก', ['/opdvisit/opd-visit/change-visit',
                            'hn' => $model->hn,
                            'vn' => $model->vn,
                            'div_id' => $model->div_id,
                            'doctor_id' => $model->doctor_id,
                            'doctor_prefix' => $model->doctor_prefix,
                            'doctor_fname' => $model->doctor_fname,
                            'doctor_lname' => $model->doctor_lname,
                            'visit_date' => $model->visit_date
                        ], ['class' => '']);
                    },
                ]
            ]
        ],
    ]);
    ?>
