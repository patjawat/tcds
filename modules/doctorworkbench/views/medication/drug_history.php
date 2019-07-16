<?php
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;
use app\components\PatientHelper;
// echo "<pre>";
//    print_r($model);
// echo "</pre>";

$dataProvider = new ArrayDataProvider([
    'allModels' => $model,
    'pagination' => [
        'pageSize' => 100,
    ],
    'sort' => [
        'attributes' => ['id', 'name'],
    ],
]);


$rows = $dataProvider->getModels();
// print_r($rows[0]);
?>
<div class="grid-container">
<?php 
echo '<p>'.Html::button('<i class="far fa-window-restore"></i> ReMed',['id' => 'remed','class' => 'btn btn-danger pull-right']).'</p>';
?>

<br><br>
</div>
<div class="progress" style=" height: 34px;margin-bottom: -8px;">
  <div id='p' class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="padding-top: 8px; font-size: 20px;"></div>
  
  </div>

  <div class="grid-container">
<?php
 echo GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'id' => 'gridview',
        'pjax' => true,
        'filterUrl'=> Url::to(["/nursescreen/opd-visit"]),
        'pjaxSettings' => [
            'options' => [
                'enablePushState' => false,
            ],
        ],
        'rowOptions' => function ($model, $key, $index, $grid) { //สามารถกำหนด data-key ใหม่ (ปกติจะใช้ PK)
            return ['data' => [
                'key' => [
                'drug_id' => $model->drug_id,
                'discription' => $model->discription_1.' '.$model->discription_2,
                'qty' => $model->quantity
                ],
            ],
        ];
        }, 
        'summary' => false,
        'columns' => [
            // [
            //     'class' => 'yii\grid\SerialColumn',
            // ],
            // [
            //     'class' => 'yii\grid\CheckboxColumn',
            //     'checkboxOptions' => function($model) {
            //         return ['value' => $model->drug_id, 'datalab' => ['key' => $model->drug_id]];
            //     },
            //     // 'header' => false,
            // ],
            [
                'class' => 'yii\grid\CheckboxColumn',
                'header' => false,
                'checkboxOptions' =>

                function($model) {
        
                    return ['value' => $model->vn, 'class' => $model->vn, 'id' => 'checkbox'];
        
                }
            ],
            
            [
                'attribute'=>'date_visit', 
                'header' => 'Date Visit',
                'format'=>'raw',
                'value'=>function ($model, $key, $index, $widget) { 
                    if(array_key_exists('doctor_name', $model)){
                        $doctor =  $model->doctor_name;
                       }else {
                        $doctor = '-';
                       }
                    return Html::checkbox($model->vn).' '.PatientHelper::viewCurrentThaiDate($model->document_date).' '.$doctor.'';
                },
                'filter'=>false,
                'group'=>true,  // enable grouping,
                'groupedRow'=>true,                    // move grouped column to a single grouped row
                'groupOddCssClass'=>'kv-grouped-row',  // configure odd group cell css class
                'groupEvenCssClass'=>'kv-grouped-row', // configure even group cell css class
            ],
            [
            'format'=>'raw',              // move grouped column to a single grouped row
            'groupOddCssClass' => 'kv-grouped-row',  // configure odd group cell css class
            'groupEvenCssClass' => 'kv-grouped-row', // configure even group cell css class
                'value' => function($model){
                    return $model->drug_trade_name.' VN '.$model->vn;
                    // return Html::checkbox($model->drug_trade_name);
                    // return Html::checkbox($model->drug_trade_name);
                }
            ],
            [
                'header' => 'วิธีใช้',
                'value' => function($model){
                    return $model->discription_1.' '.$model->discription_2;
                }
            ],
            [
                'header' => 'จำนวนจ่าย',
                'hAlign' => 'center',
                'vAlign' => 'middle',
                'value' => function($model){
                    return $model->quantity;
                }
            ],
           
            // [
            //     'class' => 'yii\grid\ActionColumn',
            //     'contentOptions' => ['style' => 'width:80px;',
            //         'noWrap' => true
            //     ],
            //     'template' => '<div>{update} </div>',
            //     'buttons' => [
            //         'update' => function($url, $model, $key) {
            //             // return $model->div_id;
            //                 // $pcc_vn = $model['pcc_vn'];
            //                 // $hn = $model['hn'];
            //                 return Html::a('<i class="fas fa-edit"></i> เลือก', ['/patient/search/change-visit',
            //                 'hn' => $model->hn,
            //                 'vn' => $model->vn,
            //                 'div_id' => $model->div_id,
            //                 'doctor_id' => $model->doctor_id,
            //                 'doctor_prefix' => $model->doctor_prefix,
            //                 'doctor_fname' => $model->doctor_fname,
            //                 'doctor_lname' => $model->doctor_lname,
            //                 'visit_date' => $model->visit_date
            //             ], ['class' => '']);
            //         },
            //     ]
            // ]
        ],
    ]);
    ?>
    </div>
<?php
$js = <<< JS

$('.progress').hide();
$('#remed').click(function (e) { 
    e.preventDefault();
var keys = $("#gridview").yiiGridView("getSelectedRows"); // ดึง data-key ที่มีการ checked เกิดขึ้น
if(keys.length < 1){
    swal('เลือกข้อมูล');
}else{
// console.log(keys);
$('.grid-container').hide();
$('.progress').show();


var i = 1;  // ตั้งค่าตัวแปร ลำดับเอาไว้
$.each(keys, function (index, value) {   //  Loop ข้อมูลที่ได้จาก  data-key

$.ajax({ // ส่งค่าไปยัง url เพื่แบันทึก
    method:'POST',
    dataType:'json',
    async: true,
    url:'index.php?r=doctorworkbench/medication/re-med',
    data:{id:value,count:keys.length},  // ส่ง id ไปประมวลผลที่ action
    beforeSend: function(response){

  },
    success:function(response) { // เมื่อทำสำเร็จ
       var total = parseInt(keys.length);  // นับจำนวน  id ที่ส่งไป
       var n = i++;  // สร้าง n เป็นตัวแปรลำดับ
       var p = ((n / total) * 100).toFixed( 0 );  //หาค่าร้อยละของจำนวนที่ส่งไปแล้ว
       $('#p').html(p+'%'); // แสดง % ที่ progress bar
       $('#p').css('width',p+'%');  // กำหนดความยาวของ pregress bar
    //    $('#'+value+'').html('<i class="fas fa-flask"></i>'); // เมื่อสำเร็จให้ใส่เครื่องหมาย เช็คถูกตาม select id ที่ส่งมา
       if(p==100){  // เมื่อครบ 100 % ปิด pregressbar 
        $('.progress').delay(2000).fadeOut('slow', function(){
            $('#p').css('width','0%'); // set 0 ให้กับ pregress  bar
            // loadMedication();
            $('#createCompany').modal('hide');
            $.pjax.reload({
                        container:'#grid-medication-pjax',
                        history:false,
                        replace: false,
                        url:'index.php?r=doctorworkbench/medication'
                         });
            });
            }

    // console.log(value);
        },
    });
});

}
    
});
$("input[type='checkbox']").change(function(){ // เมื่อมีการ ckeckbox
    if(this.checked) {
    $('.'+$(this).attr('name')+'').prop('checked', true); // ใช้ checkbox อ้างอิงจาก class 
    }else{
        $('.'+$(this).attr('name')+'').prop('checked', false);
    // console.log($(this).attr('name'));    
}
});


JS;
$this->registerJS($js);

?>