$(function(){
    $('.select-on-check-all, .checkbox-row').click(function(){
        console.log();
    })

    $('.kv-row-checkbox').click(function(e){
        var keys = $("#crud-diagnosis").yiiGridView("getSelectedRows");
        var id = $(this).attr('value');
        if(keys.length > 1){
            swal('เลือกเพียง 1 รายการ');
            return false;
        }else{
            if (e.target.checked) {
               
                // $('#id');
                $.ajax({
                    type: "post",
                    url: "index.php?r=doctorworkbench/pcc-diagnosis/get-diag",
                    data:{id:id},
                   dataType: "json",
                    success: function (response) {
                        console.log(JSON.stringify(response));
                        var diag_text = JSON.parse(response.diag_text);
                        $('#diag_text').val(diag_text);
                        // $('#icd_code').val(response.icd_code).trigger('change');
                        $('#icd_code').val(response.icd_code);
                        $('#diag_type').val(response.diag_type).trigger('change');
                        $('#form-diagnosis').attr('action', $('#update').attr('action'));
                        $('#id').attr('disabled',false).val(response.id);
                        $('#btn_text').text('แก้ไข');
                        $('#btn-save').removeClass('btn-success');
                        $('#btn-save').addClass('btn-warning');
                        $('#icon').removeClass('fas fa-plus');
                        $('#icon').addClass('fas fa-edit');
                    }
                });
            }else{
                $('#form-diagnosis')[0].reset();
                $('#form-diagnosis').attr('action', $('#create').attr('action'));
                $('#id').attr('disabled',true).val('');
                $('#btn_text').text('เพิ่ม');
                $('#btn-save').addClass('btn-success');
                $('#btn-save').removeClass('btn-warning');
                $('#icon').addClass('fas fa-plus');
                $('#icon').removeClass('fas fa-edit');
                $('#diag_text').val('');
            }
        }
    });
    

    // $('#diag_type').change(function(e){
    //     var id = $(this).val();
    //     var markup = '"' + id + '",';
    //     $('#cc').append(markup);
    // });
});
