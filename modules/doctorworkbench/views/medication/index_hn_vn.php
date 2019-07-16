<?php

use yii\helpers\Html;
use app\modules\doctorworkbench\models\Drugusage;
use yii\helpers\ArrayHelper;
use kartik\editable\Editable;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;

$this->title = 'Medications';
$this->params['breadcrumbs'][] = $this->title;
?>
<?=Html::a('<i class="fas fa-pills"></i> Medication',['//doctorworkbench/medication/show-drugitems'] ,['role'=>'remoteModal-ajax','class' =>'btn btn-primary'])?>
<!-- <button type="button" class="btn btn-primary" role="modal-remote" value="<?php //Url::to(['/drug/drugitems/show-drugitems'])?>"><i class="fas fa-pills"></i> Medication</button>
<button type="button" class="btn btn-success" role="modal-remote" value="<?php //Url::to(['/doctorworkbench/medication/med-history'])?>"><i class="fas fa-history"></i> Medication History</button> -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'id' => 'grid-medication',
        'pjax' => true,
        'columns' => [
            [
                'class' => 'kartik\grid\SerialColumn',
                'width' => '30px',
            ],
            [
                'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'drug_name',
                'header' => 'ยาที่จ่าย',
                'value' => function($model){
                    $items = $model->drugitems->name.' '.$model->drugitems->strength.' '.$model->drugitems->units;
                    return $items;
                }
            ],      
         [
                 'class' => 'kartik\grid\EditableColumn',
                 'attribute' => 'druguse',
                 'header'=>'วิธีใช้', 
                 'width' => '500px',
                 'refreshGrid' => true,
                //  'value' => function($model){
                //     return $model->id;
                //  },
                'value'  => 'druguse.shortlist',
                 'editableOptions' => [
                     'inputType' => \kartik\editable\Editable::INPUT_SELECT2,
                     'formOptions' => [
                         'action' => \yii\helpers\Url::to(['/doctorworkbench/medication/editable']),
                         'method' => 'post'
                     ],
                     'asPopover' => true,
                     'placement' => 'top',
                     'type' => 'primary',
                     'size'=>'lg',
                     'valueIfNull' => '-',
                     'submitButton' => ['class' => 'btn btn-primary', 'icon' => '<i class="glyphicon glyphicon-ok"></i>'],
                     'resetButton' => ['class' => 'btn btn-warning', 'icon' => '<i class="glyphicon glyphicon-refresh"></i>'],
                     'options' => [
                         'data' => ArrayHelper::map(Drugusage::find()->where(['status'=>'Y'])->all(), 'drugusage', 'shortlist'),
                         'options' => [
                             'placeholder' => 'Please select...',
                             'multiple' => false,
                             'style'=>'width:800px', 
                             'width' => '800px',
                             
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
                   
                        // return $model->findDruguse($model->druguse);
               
                 }
             ],
           [
               'class' => 'kartik\grid\EditableColumn',
               //'class'=>'\kartik\grid\DataColumn',
                'header' => 'จำนวนจ่าย',
                'pageSummary' => 'มูลค่ารวม',
                'attribute' => 'qty',
                'width' => '150px',        
                 'editableOptions' => [
                     'inputType' => \kartik\editable\Editable::INPUT_TEXT,
                     'formOptions' => [
                         'action' => \yii\helpers\Url::to(['/doctorworkbench/medication/editable']),
                         'method' => 'post'
                     ],
                     'asPopover' => true,
                     'placement' => 'top',
                     'type' => 'primary',
                     'valueIfNull' => '-',
                     'submitButton' => ['class' => 'btn btn-primary', 'icon' => '<i class="glyphicon glyphicon-ok"></i>'],
                     'resetButton' => ['class' => 'btn btn-warning', 'icon' => '<i class="glyphicon glyphicon-refresh"></i>'],
                     'pluginEvents' => [
                        "editableSuccess"=>"function(event, val) { 
                            // console.log('Successful submission of value ' + val); 
                          //$.pjax.reload({container: '#grid-medication'});
                          //loadMedication();
                        }",
                    ],
                    ],
        
            ],
            // [
            //     'class' => '\kartik\grid\DataColumn',
            //     'attribute' => 'totalprice',
            //     'header' => 'รวมราคา',
            //     'format' => ['decimal', 2],
            //     'pageSummary' => true,
            //     'width' => '60px',
            //     'value' => function($model) {
            //         $total = $model->qty * $model->unitprice;
            //         return $total;
            //     }
            // ],
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
                                                // $.pjax.reload({
                                                //     container:data.forceReload,
                                                //     history:false,
                                                //     replace: false,
                                                //     url: data.url  
                                                //     });
                                                loadMedication();
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
<?php
// $js = <<< JS

// $('[role="modal-remote"]').click(function(e){
//     var url = $(this).attr('value');
//     $('#doctorworkbench-modal').modal('show');
//     $.ajax({
//         type: "get",
//         url: url,
//         // beforeSend:function(){
//         //     $('.modal-title').html('Loadding...');
//         //     $('.modal-body').html('<img src="img/loading2.gif" style="margin-left: 40%;margin-top: 10%;padding-bottom: 10%;width: 23%;" />');
//         // },
//         // dataType: "json",
//         success: function (response) {
//             $('.modal-title').html(response.title);
//             $('.modal-body').html(response.content);
//             $('.modal-footer').html(response.footer);   
           
//         }
//     });

// });
// JS;
// $this->registerJS($js);
?>