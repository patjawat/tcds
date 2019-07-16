<?=$this->render('../default/panel_top',[
'emr' => '',
'lab' => 'active',
'drug' => '',
'diagnosis' => '',
'medication' => '',
'procedure' => '',
'pre_order_lab' =>'',
'apointment' => '',
'treatmment_plan' => '',
'cc' => '',
'pi' => '',
'pe' => '',
'education' => ''

]);?>
<?php

   echo $this->render('@app/modules/lab/views/pcclab/index',[
    'searchModel' => $searchModel,
    'dataProvider' => $dataProvider,
]);

?>
<?=$this->render('../default/panel_foot');?>


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
