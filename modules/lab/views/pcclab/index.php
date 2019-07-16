<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\lab\models\PcclabSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pcclabs';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pcclab-index">

    <?php Pjax::begin(); ?>
    <?php //Html::beginForm(['/lab/pcclab/preorder'],'post');?>

    <div style="margin-bottom: 1px">
        <?php $alert = 'swal("ส่งทีละหลายรายการ...")' ;?>
            
            <?php // Html::a('<button id="btn-add" onClick='.new JsExpression($alert).' class="btn btn-info" ><i class="fa fa-check"></i> ส่งรายการเฉพาะที่เลือก ไปยัง PreOrder Lab</button>', ['/doctorworkbench/order/pre-order-lab']) ?>
            <div class="row" style="margin-bottom: 3px;">
            <div class="col-xs-ภ col-sm-3 col-md-3 col-lg-3">
            <button class="btn btn-info" id="order-lab" onClick=<?php //new JsExpression($alert)?>>
            <i class="fa fa-check"></i> ส่งรายการเฉพาะที่เลือก ไปยัง Pre-Order-Lab</button>

                </div>
            
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
            <div class="progress" style=" height: 34px;margin-bottom: -8px;">
  <div id='p' class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="padding-top: 8px; font-size: 20px;"></div>
</div>
            </div>
            
        </div>
        </div>

      <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        //'showPageSummary'=>true,
        'pjax'=>true,
        'pjaxSettings'=>[
            'neverTimeout'=>true,
        ],
        'options' => [
            'id' => 'gridview-id'
        ],
        'striped'=>true,
        'hover'=>true, 
        //'panel' => [ 'befor' => 'Lab History'],
       // 'panel'=>['heading'=>'Lab History'],
        'toolbar' =>  ['{toggleData}',],
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'], 
        'rowOptions' => function ($model, $key, $index, $grid) { //สามารถกำหนด data-key ใหม่ (ปกติจะใช้ PK)
            return ['data' => ['key' => $model->id]];
        }, 
        'columns' => [
            [
                'class' => 'yii\grid\CheckboxColumn',
                'header' => false,
                'checkboxOptions' =>

                function($model) {
        
                    return ['value' => $model->id, 'class' => $model->vn, 'id' => 'checkbox'];
        
                }
            ],
            [
                'attribute'=>'date_visit', 
                'header' => 'Date Visit',
                'format'=>'raw',
                'value'=>function ($model, $key, $index, $widget) { 
                    return Html::checkbox($model->vn).' '.$model->date_visit.' (รพ.แม่ข่าย)';
                },
                'filter'=>false,
                'group'=>true,  // enable grouping,
                'groupedRow'=>true,                    // move grouped column to a single grouped row
                'groupOddCssClass'=>'kv-grouped-row',  // configure odd group cell css class
                'groupEvenCssClass'=>'kv-grouped-row', // configure even group cell css class
            ],
            /*[
                'class' => 'yii\grid\CheckboxColumn',
                'header' => false,
                
            ],*/
            [
                'attribute'=>'lab_name',
                'header' => 'lab Name',
                'format' => 'raw',
                'options' => ['id' => 'lab_name'],
                'value'=>function ($model, $key, $index, $widget) { 
                    return '<div >'.$model->lab_name.'&nbsp<span style="color:#0399cc" id="'.$model->id.'"></span></div>';

                },
            ],
            [
                'attribute'=>'lab_result_date',
                'header' => 'Lab Result Date',
                'options' => ['id' => 'lab_result_date'],
                'value'=>function ($model, $key, $index, $widget) { 
                    return $model->lab_result_date;
                },
            ],
            [
                'attribute'=>'lab_result',
                'header' => 'Lab Result',
                'options' => [ 'id' => 'lab_result'],
                'value'=>function ($model, $key, $index, $widget) { 
                    return $model->lab_result;
                },
            ],
            [
                'attribute'=>'standard_result',
                'header' => 'Standard Result',
                'options' => [ 'id' => 'standard_result'],
                'value'=>function ($model, $key, $index, $widget) { 
                    return $model->standard_result;
                },
            ],
            [
                'width'=>'310px',
                'label'=>'Notyfil'
            ],

        ],
    ]); ?>
     <?php // Html::endForm();?> 
    <?php Pjax::end(); ?>
</div>
<?php
$js = <<< JS
$('.progress').hide(); // ซ่อน progress
$("input[type='checkbox']").change(function(){ // เมื่อมีการ ckeckbox
    if(this.checked) {
    $('.'+$(this).attr('name')+'').prop('checked', true); // ใช้ checkbox อ้างอิงจาก class 
    }else{
        $('.'+$(this).attr('name')+'').prop('checked', false);
    }
});

$('#order-lab').click(function(){ // คลิกปุ่ม ส่งรายการเฉพาะที่เลือก ไปยัง Medication
var keys = $("#gridview-id").yiiGridView("getSelectedRows"); // ดึง data-key ที่มีการ checked เกิดขึ้น

if(keys.length < 1){
    swal('เลือกข้อมูล');
}else{

$('.progress').fadeIn(800); // แสดง progress bar ขึ้นมา

var i = 1;  // ตั้งค่าตัวแปร ลำดับเอาไว้
$.each(keys, function (index, value) {   //  Loop ข้อมูลที่ได้จาก  data-key

$.ajax({ // ส่งค่าไปยัง url เพื่แบันทึก
    method:'POST',
    dataType:'json',
    async: true,
    url:'index.php?r=lab/preorderlab/re-lab',
    data:{id:value,count:keys.length},  // ส่ง id ไปประมวลผลที่ action
    beforeSend: function(response){

  },
    success:function(response) { // เมื่อทำสำเร็จ
       var total = parseInt(keys.length);  // นับจำนวน  id ที่ส่งไป
       var n = i++;  // สร้าง n เป็นตัวแปรลำดับ
       var p = ((n / total) * 100).toFixed( 0 );  //หาค่าร้อยละของจำนวนที่ส่งไปแล้ว
       $('#p').html(p+'%'); // แสดง % ที่ progress bar
       $('#p').css('width',p+'%');  // กำหนดความยาวของ pregress bar
       $('#'+value+'').html('<i class="fas fa-flask"></i>'); // เมื่อสำเร็จให้ใส่เครื่องหมาย เช็คถูกตาม select id ที่ส่งมา
       if(p==100){  // เมื่อครบ 100 % ปิด pregressbar 
        $('.progress').delay(2000).fadeOut('slow', function(){
            $('#p').css('width','0%'); // set 0 ให้กับ pregress  bar
            });
            }
        },
    });
});
}

});
    

JS;
$this->registerJS($js);
?>
