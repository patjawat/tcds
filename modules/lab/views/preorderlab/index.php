<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\lab\models\PreorderlabSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->registerJS($this->render('@app/modules/doctorworkbench/dist/js/script.js'));


$this->title = 'Preorderlabs';
$action_index = Url::to(['/doctorworkbench/order/pre-order-lab']);
?>
<span id="index" action="<?=$action_index;?>"></span>

 <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
<br>
<?php
// กำหนด laypout ของ Gridvire เอง
$layout = <<< HTML
<div class="panel panel-info">
      <div class="panel-heading">
            <h3 class="panel-title">Procedure List</h3>
      </div>
      <div class="panel-body">
<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
    <div class="pull-left">
<!-- <button class="btn btn-danger"id="btn-delete" style="margin-bottom:5px;"><i class="fa fa-trash"></i> ลบรายการ</button> -->
        </div>
    {pager}
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
       
        <div class="pull-right">
        {toggleData}
        {export}
        </div>
     </div>
    </div>
<div class="clearfix"></div>
{items}
</div>
</div>
HTML;
?>

<div class="preorderlab-index">
 <?=
        GridView::widget([
            'id' => 'preorderlab',
            'dataProvider' => $dataProvider,
            'pjax' => true,
            'rowOptions'=>function($model,$id){
                if($model->id == Yii::$app->request->get('id')){
                    return ['class' => 'success'];
                }
            },
            'columns' => [
                [
                    'class' => 'kartik\grid\RadioColumn',
                    'width' => '20px',
                    'radioOptions' => function ($model) {
                        return [
                            'value' => $model->id,
                            'checked' => $model->id == Yii::$app->request->get('id'),
                            'onclick'=> 'window.location.href = "'.Url::to(['/doctorworkbench/order/pre-order-lab','id' => $model->id]).'"'
                        ];
                    }
                ],
                [
                    'class' => 'kartik\grid\SerialColumn',
                    'width' => '30px',
                ],
                [
                    'class'=>'\kartik\grid\DataColumn',
                    'attribute'=>'lab_name',
                    'header' => 'lab_name',
                    'value' => function($model){
                        return $model->labname->labname_en;
                    }
                ],
                [
                    'class'=>'\kartik\grid\DataColumn',
                    'attribute'=>'lab_request_date',
                    'header' => 'lab_request_date',
                    'value' => function($model){
                        return $model->thaidate($model->lab_request_date);
                    }
                ],
                [
                    'class'=>'\kartik\grid\DataColumn',
                    'attribute'=>'lab_result_date',
                    'header' => 'lab_result_date',
                    'value' => function($model){
                        return $model->thaidate($model->lab_result_date);
                    }
                ],
                [
                    'class'=>'\kartik\grid\DataColumn',
                    'attribute'=>'standard_result',
                    'header' => 'standard_result',
                    'value' => function($model){
                        return $model->standard_result;
                    }
                ],
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'header' => 'Action',
                    'template' => '{delete}',
                    'buttons' => [
                        'delete' => function ($url, $model) {
                            $uri = Url::to(['/lab/preorderlab/delete', 'id' => $model->id]);
                            // $url = Url::to(['post/view', 'id' => 100]);
                            return Html::a('<i class="far fa-trash-alt"></i> ', '#', [
                                'title' => Yii::t('yii', 'Delete'),
                                'class' => '',
                                'aria-label' => Yii::t('yii', 'Delete'),
                                'onclick' => "
                                    // if (confirm('ok?')) {
                                        $.ajax('$uri', {
                                            type: 'POST'
                                        }).done(function(data) {
                                            $.pjax.reload({container: '#preorderlab-pjax'});
                                        });
                                    // }
                                    return false;
                                ",
                            ]);
                        },
                    ],
                ],
            ],
            'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
            'showPageSummary' => true,
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'headerRowOptions' => ['style' => 'background-color: #eee;'],
            'summary' => false,
            //'layout' => $layout,
            'replaceTags' => [
                '{custom}' => function($widget) {
                    if ($widget->panel === true) {
                        return '';
                    } else {
                        return '';
                    }
                }
            ],
            'pager' => [
                'options'=>['class'=>'pagination'], 
                'prevPageLabel' => 'Previous', 
                'nextPageLabel' => 'Next',
                'firstPageLabel'=>'First',
                'lastPageLabel'=>'Last',
                'nextPageCssClass'=>'next',
                'prevPageCssClass'=>'prev',
                'firstPageCssClass'=>'first',
                'lastPageCssClass'=>'last',
                'maxButtonCount'=>10,
        ],        
        ])
?>
</div>
<?php
$js = <<< JS
 $("#btn-delete").click(function(){
    var keys = $("#preorderlab").yiiGridView("getSelectedRows");
    //console.log(keys);
    var url = 'index.php?r=lab/preorderlab/bulk-delete'
    if(keys.length>0){
        $.ajax({
            url:url,
            method:'post',
            data:{pks:keys.join()},
            success: function(response){
            $.pjax.reload({container:response.forceReload});
            }
        });
    }
  });
  $('#preorderlab').on('grid.radiocleared', function(ev, key, val) {
    //console.log("Key = " + key + ", Val = " + val);
    window.location.href = $('#index').attr('action');
    //alert();
});
JS;
$this->registerJS($js);
?>

