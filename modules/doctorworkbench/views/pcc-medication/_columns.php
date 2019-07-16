<?php

use yii\helpers\Url;
use yii\helpers\Html;
use app\modules\doctorworkbench\models\GatewayCDruguage;
use yii\helpers\ArrayHelper;
use kartik\editable\Editable;
use kartik\grid\GridView;
use yii\helpers\Json;

return [
    // [
    //     'class' => 'kartik\grid\CheckboxColumn',
    //     'width' => '20px',
    // ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'drug_name',
        'header' => 'รายการยา',
        'value' => function($model){
            return $model->drug_name;
        }
    ],
//    [
//        'class' => '\kartik\grid\DataColumn',
//        'attribute' => 'icode',
//        'header' => 'รายการยา',
//        'value' => function($model) {
//            return $model->drugitems->name . ' ' . $model->drugitems->strength . ' ' . $model->drugitems->units;
//        }
//    ],
//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'header'=>'หน่วย',
//         'value' => function($model){
//             return $model->drugitems->units;
//         }
//    ],
//    [
//        'class'=>'\kartik\grid\DataColumn',
//        'header'=>'ความแรง/ขนาด',
//         'value' => function($model){
//             return $model->drugitems->strength;
//         }
//    ],
//      [
//       'class'=>'\kartik\grid\DataColumn',
//       //'attribute' =>'usage_line1',  
//       'attribute' =>'druguse',     
//       'header'=>'วิธีใช้',         
//   ],         
 [
         'class' => 'kartik\grid\EditableColumn',
         'attribute' => 'druguse',
         'header'=>'วิธีใช้', 
         'refreshGrid' => true,
         'editableOptions' => [
             'inputType' => \kartik\editable\Editable::INPUT_SELECT2,
             'formOptions' => [
                 'action' => \yii\helpers\Url::to(['/doctorworkbench/pcc-medication/editable']),
                 'method' => 'post'
             ],
             'valueIfNull' => '-',
             'submitButton' => ['class' => 'btn btn-primary', 'icon' => '<i class="glyphicon glyphicon-ok"></i>'],
             'resetButton' => ['class' => 'btn btn-warning', 'icon' => '<i class="glyphicon glyphicon-refresh"></i>'],
             'options' => [
                 'data' => ArrayHelper::map(GatewayCDruguage::find()->where(['status'=>'Y'])->all(), 'drugusage', 'shortlist'),
                 'options' => [
                     'placeholder' => 'Please select...',
                     'multiple' => false,
                 ]
                 ],
                 
         ],
         'contentOptions' => ['class' => 'pjax-load'],
         'value' => function($model) {
            //  $models = GatewayCDruguage::find()->where(['drugusage' => $model->druguse])->one();
            //  if ($model->druguse != '') {
            //     // return $model->drugusehos->shortlist;
            //      //return $models->shortlist
            //      return $model->druguse;
            //  } else {
            //      return '-';
            //  }
           
                return $model->findDruguse($model->druguse);
       
         }
     ],
   [
       'class' => 'kartik\grid\EditableColumn',
       //'class'=>'\kartik\grid\DataColumn',
        'header' => 'จำนวนจ่าย',
        'pageSummary' => 'มูลค่ารวม',
        'attribute' => 'qty',
        'width' => '80px',        
         'editableOptions' => [
             'inputType' => \kartik\editable\Editable::INPUT_TEXT,
             'formOptions' => [
                 'action' => \yii\helpers\Url::to(['/doctorworkbench/pcc-medication/editable']),
                 'method' => 'post'
             ],
             'valueIfNull' => '-',
             'submitButton' => ['class' => 'btn btn-primary', 'icon' => '<i class="glyphicon glyphicon-ok"></i>'],
             'resetButton' => ['class' => 'btn btn-warning', 'icon' => '<i class="glyphicon glyphicon-refresh"></i>'],
             'pluginEvents' => [
                "editableSuccess"=>"function(event, val) { 
                    // console.log('Successful submission of value ' + val); 
                    var cid = $('#cid').val();
                    $.ajax({
                        type: 'get',
                        url: 'index.php?r=doctorworkbench/pcc-medication/sum-price',
                        data:{cid:cid},
                        dataType: 'json',
                        success: function (response) {
                            const formatter = new Intl.NumberFormat('th', {
                             // style: 'currency',
                             // currency: 'USD',
                              minimumFractionDigits: 2
                            })
                            $('#totalprice').html(formatter.format(response));
                        }
                    });
                    $.pjax.reload({container: '#crud-medication-pjax'});
                }",
            ],
            ],

    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'totalprice',
        'header' => 'รวมราคา',
        'format' => ['decimal', 2],
        'pageSummary' => true,
        'width' => '60px',
        'value' => function($model) {
            $total = $model->qty * $model->unitprice;
            return $total;
        }
    ],
        //  [
        //     'class' => 'kartik\grid\ActionColumn',
        //     'template' => '{delete}',
        //     'buttons' => [
        //         'delete' => function ($url) {
        //             return Html::a('<i class="far fa-trash-alt"></i> ', '#', [
        //                 'title' => Yii::t('yii', 'Delete'),
        //                 'class' => '',
        //                 'aria-label' => Yii::t('yii', 'Delete'),
        //                 'onclick' => "
        //                     // if (confirm('ok?')) {
        //                         $.ajax('$url', {
        //                             type: 'POST'
        //                         }).done(function(data) {
        //                             $.pjax.reload({container: '#crud-medication-pjax'});
        //                         });
        //                     // }
        //                     return false;
        //                 ",
        //             ]);
        //         },
        //     ],
        // ],
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
                                $('#showForm').html(response)
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
