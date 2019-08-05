<?php
?>
<div class="form-group">
    <input type="password" name="requester" id="master-requester" class="form-control" placeholder="Requester" value="">
    <input type="text" name="success-requester" id="success-requester" class="form-control" hidden="true">

</div>

<?php
$js = <<< JS
// ตั้งค่า auto Focus ตอนแสดง modal
   $('#main-modal').on('shown.bs.modal', function () {
    $('#master-requester').focus();
});
// ## จบ

$('#success-requester').hide();
$('#master-requester').keyup(function(e){
        var value = $(this).val();
        console.log(value);
            if(e.keyCode == 13){
                if($('#success-requester').val() == ""){
                    $.ajax({
                        type: "post",
                        url: "index.php?r=requester/check",
                        data: {keys:value},
                        dataType: "json",
                        beforeSend: function(){
                            $('.modal-title').html('<i class="fas fa-search"></i> กำลังค้นหา...');
                            $('.save').hide();
                        },
                        success: function (response) {
                            console.log(response);
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
                            return true;
                        } else {
                            return false;
                        }
                }
    }
    });

JS;
$this->registerJS($js);
?>