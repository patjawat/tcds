$(function(){
    $('#btn-update-select').click(function(){
     var keys = $("#crud-medication").yiiGridView("getSelectedRows");
     //console.log(keys.join());
     $.ajax({
         type: "post",
         url: "index.php?r=doctorworkbench/pcc-medication/update-med",
         data:{
             id:keys,
             value:{
                 icode:$('#icode').val(),
                 druguse:$('#druguse').val(),
                 qty:$('#qty').val()
            }
         },
         dataType: "json",
         success: function (response) {
            $.pjax.reload({container: response.forceReload});
            $(response.forceReload).on('pjax:complete', function() {
                // totalPrice($('#cid').val());
                $('#icode').val(null).trigger('change');
               $('#form-medication')[0].reset();
             })

         }
     });


    });
    $('.select-on-check-all, .checkbox-row').click(function(){
        console.log();
    })
    $('.kv-row-checkbox').click(function(){
        var id = $(this).attr('value');
      $.ajax({
       type: "post",
       url: "index.php?r=doctorworkbench/pcc-medication/select-med",
       data:{id:id},
       dataType: "json",
       success: function (response) {
           console.log(JSON.stringify(response));
           $('#icode').val(response).trigger('change');
       }
   });
    });
    
});
