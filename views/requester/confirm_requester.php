<?php
use yii\bootstrap4\Html;
?>
<div class="form-group">
    <input type="password" name="requester" id="master-requester" class="form-control" placeholder="Requester" value="">
    <input type="text" name="success-requester" id="success-requester" class="form-control" hidden="true">
</div>
<?php
$img = Html::img('@web/img/loadding30.gif',['width' => '80px']);
$js = <<< JS

$('#testFrm').click(function (e) { 
    // e.preventDefault();
    // $('$formId').submit();
    console.log('$formId')
    
});
// ตั้งค่า auto Focus ตอนแสดง modal
   $('#main-modal').on('shown.bs.modal', function () {
    $('#master-requester').focus();
});
// ## จบ

$('#success-requester').hide();
$('#master-requester').keyup(function(e){
        var value = $(this).val();
        console.log(value);
        console.log(e.keyCode);
        
            if(e.keyCode == 13){
                if($('#success-requester').val() == ""){
                    $.ajax({
                        type: "post",
                        url: "index.php?r=requester/check",
                        data: {keys:value},
                        dataType: "json",
                        beforeSend: function(){
                            // $('.modal-title').html('<i class="fas fa-search"></i> กำลังค้นหา <img src="/img/loadding30.gif" width="80px"/>');
                            $('.modal-title').html('<i class="fas fa-search"></i> กำลังค้นหา'+'$img');
                            $('.save').hide();
                        },
                        success: function (response) {
                            // console.log(response);
                            $('.modal-title').html(response.title);
                            $('.modal-footer').html(response.footer);
                            if(response.status == true){
                                $('.save').show();
                                $('.requester').val($('#master-requester').val());
                                $('#success-requester').val($('#master-requester').val());
                            }
                        }
                    });
                }else{
                    var r = confirm("ยืนยันการบันทึก!");
                        if (r == true) {
                            $('$formId').submit();
                            // console.log(r)
                            // console.log('$formId')
                            return true;
                        } else {
                            console.log(r)
                            return false;
                        }
                }
    }

    if(e.keyCode == 8){
        $('#master-requester').val(null);
        $('.requester').val(null);
        $('#success-requester').val(null);
    }
    });

JS;
$this->registerJS($js);
?>