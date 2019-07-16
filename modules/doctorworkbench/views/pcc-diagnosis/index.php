<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use yii\web\View;
use kartik\widgets\Select2;
use yii\web\JsExpression;
use yii\widgets\Pjax;
use app\components\PatientHelper;
// $this->registerJs($this->render('../../dist/js/script.js'));
$this->registerJs($this->render('../../dist/js/rediag.js'));
$this->registerCss($this->render('../../dist/css/style.css'));

$action_index = Url::to(['index']);
?>
<span id="index" action="<?=$action_index;?>"></span>
<style>
.pagination {
    display: inline-block;
    padding-left: 0;
    margin: 0px;
    border-radius: 4px;
}
#diagenosis-container{
    height:248px
}
</style>
<div class="show-data"></div>
<?php
// กำหนด laypout ของ Gridvire เอง
$layout = <<< HTML
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
{items}    
   </div>
    </div>
<div class="clearfix"></div>

<div class="row" style="margin-top:8px;">
    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
    {pager}        
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
<button class="btn btn-info modal-show pull-right" value="index.php?r=doctorworkbench/pcc-diagnosis/complaint-history">ประวัติ Chief Complaint</button>
        
        </div>
</div>
HTML;
?>
        <?php Modal::begin([
        'id' => 'activity-modal',
        'header' => '<i class="fas fa-universal-access"></i> ประวัติ Chief Complaint',
        'size'=>'modal-lg',
       
        'footer' => '<button class="btn btn-info" id="re-diag" onClick=<?php //new JsExpression($alert)?><i class="fa fa-check"></i>  ส่งรายการเฉพาะที่เลือก ไปยัง Present Diagnosis</button>
        <a href="#" class="btn btn-primary" data-dismiss="modal">ปิด</a>',
        
        ]);
       
        Modal::end();
        ?>
<div class="row">


<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
    <div id="ShowDiagForm"></div>
</div>

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

    <fieldset style="height:350px;padding-top: 10px;">
        <legend class="scheduler-border"><i class="fas fa-universal-access"></i> Diagnosis List

        </legend> 

 <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        // 'filterUrl' => Url::to(["/doctorworkbench/pcc-diagnosis"]),
        //'showPageSummary'=>true,
        // 'summary'=>false,
        'pjax'=>true,
        'pjaxSettings'=>[
            'neverTimeout'=>true,
        ],
        'options' => [
            'id' => 'diagenosis'
        ],
        'floatHeader' => true,
        'floatHeaderOptions' => ['scrollingTop' => '20'],
        'perfectScrollbar' => true,
        'footerRowOptions' => ['style' => 'font-weight:bold;text-decoration: underline; position: absolute'],
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover'=>true, 
        'toolbar' =>  ['{toggleData}',],
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'], 
        'headerRowOptions' => ['style' => 'background-color: #00bfa5;color:#fff;'],
        'rowOptions' => function ($model, $key, $index, $grid) { //สามารถกำหนด data-key ใหม่ (ปกติจะใช้ PK)
            return ['data' => ['key' => [
                'pcc_vn' => $model->pcc_vn,
                'diag_text' => $model->diag_text,
                'icd_code' => $model->icd_code,
                'diag_type' => $model->diag_type,
                'hn' => $model->hn,
                'vn' => $model->vn,
            ]]];
        }, 
        'layout' => $layout,
        'columns' => [
            [
                'class' => 'yii\grid\CheckboxColumn',
                'header' => false,
                'checkboxOptions' =>

                function($model) {
        
                    return ['value' => $model->id, 'class' => $model->pcc_vn, 'id' => 'checkbox'];
        
                }
            ],
            [
                'attribute'=>'date_visit', 
                'format'=>'raw',
                'value'=>function ($model, $key, $index, $widget) { 
                    return Html::checkbox($model->pcc_vn).' '.$model->thaidate($model->date_service);
                },
                'filter'=>false,
                // 'group'=>true,  // enable grouping,
                'groupedRow'=>true,                    // move grouped column to a single grouped row
                'groupOddCssClass'=>'kv-grouped-row',  // configure odd group cell css class
                'groupEvenCssClass'=>'kv-grouped-row', // configure even group cell css class
            ],
            // [
            //     'class'=>'\kartik\grid\DataColumn',
            //     'attribute'=>'diag_text',
            //     'header' => 'DiagText',
            //     'width' => '185px',
            //     'value' => function($model){
            //         return $model->diag_text;
            //     }

            // ],
            [
                'class'=>'\kartik\grid\DataColumn',
                'width' => '40px',
                'attribute'=>'icd_code',
                'header' => 'ICD10',
            ],
            [
                'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'icd_name',
                'header' => 'ชื่อโรค',
        
            ],
            [
                // 'class' => '\kartik\grid\DataColumn',
                'attribute' => 'diag_type',
                'hAlign' => 'left',
                'vAlign' => 'middle',
                'header' => 'ประเภท',
                'value' => function($model){
                    if($model->diag_type != ''){
                        return $model->diagtype1->diagtype.'-'.$model->diagtype1->name1;
                    } else {
                        return '-';
                    }
                    
                }
            ],
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
                                    $('#ShowDiagForm').html(response)
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
        ],
            
    ]); ?>

</fieldset>

        
</div>
</div>

<?php // echo $this->render('../default/panel_foot');?>

<?php
$js = <<< JS
// ====> การลบข้อมูลที่เลือก
 $("#btn-delete").click(function(){
     // ลบแบบ checkbox
    var keys = $("#crud-diagnosis").yiiGridView("getSelectedRows");
    //console.log(keys);
    var url = 'index.php?r=doctorworkbench/pcc-diagnosis/bulk-delete'
    if(keys.length>0){
        $.ajax({
            url:url,
            method:'post',
            data:{pks:keys.join()},
            success: function(){
             $.pjax.reload({container: "#crud-diagnosis-pjax"});
             $('.clear').val(null).trigger('change');
                $('.fires').val(null).select2('open');
                totalPrice($('#cid').val());
               $('#form-diagnosis')[0].reset();
               $('#id').attr('disabled',true).val('');
               $('#icon').removeClass('fas fa-edit');
               $('#icon').addClass('fas fa-plus');
               $('#btn-save').addClass('btn-success');
                $('#btn-save').removeClass('btn-warning');
                $('#form-diagnosis').attr('action', $('#create').attr('action'));
            }
        });
    }else{
        swal('เลือข้อมูล');
    }


  });

      $('.kv-row-checkbox').click(function(e){ // ใช้สำหรับ checkbox
        var keys = $("#crud-diagnosis").yiiGridView("getSelectedRows");
        // var url = Url::to(['index']);
        var id = $(this).attr('value');
        if(keys.length > 1){
            swal('เลือกเพียง 1 รายการ');
            return false;
        }else{
            if (e.target.checked) {
               
            //  alert();
            window.location.href = $('#index').attr('action')+'&id='+id;
            }else{
            window.location.href = $('#index').attr('action');
               
            }
        }

    });

 $('#crud-diagnosis').on('grid.radiochecked', function(ev, key, val) { // ใช้สำหรับ Radiobox
     //console.log("Key = " + key + ", Val = " + val);
               window.location.href = $('#index').attr('action')+'&id='+val;
 });
 $('#crud-diagnosis').on('grid.radiocleared', function(ev, key, val) {
    //console.log("Key = " + key + ", Val = " + val);
    window.location.href = $('#index').attr('action');
});

function loadDiagForm(){
    $.ajax({
        type: "get",
        url: "index.php?r=doctorworkbench%2Fpcc-diagnosis%2Fcreate",
        dataType: "json",
        success: function (response) {
            $('#ShowDiagForm').html(response);
        }
    });
}

$(function(){
    loadDiagForm();
    $('#form-search').keyup(function (e) { 
        console.log(e.target.value);
        $('.show-data').html(e.target.value)
    });


    $(".modal-show").click(function(e) {
                    $.get(
                        $(this).attr('value'),
                        function (data)
                        {
                            $("#activity-modal").find(".modal-body").html(data);
                            $(".modal-body").html(data);
                            $(".modal-title").html("เพิ่มข้อมูลสมาชิก");
                            $("#activity-modal").modal("show");
                        }
                    );
                    console.log($(this).attr('value'));
                });


});

$('#diagenosis-pjax').on('pjax:start', function(event, data, status, xhr, options) {
        loadDiagForm();
    });
 
JS;
$this->registerJS($js);
?>

