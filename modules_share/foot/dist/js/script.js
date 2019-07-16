$('#save').click(function(){
    var form = $('#form');
    // if ($('#requester').val() =="") {

    //             $('#requester').focus();
    //             swal("requester ต้องไม่ว่าง");
    //             return false;
    //         } else {
            // submit form
            SaveData();

            $('#requester').val("")       
      //  }
});
// $('input').iCheck('disable');
$('input').on('ifUnchecked', function(event){
    SaveData();
    console.log($(this).val());
});
$('input').on('ifChecked', function(event){
    SaveData();
    console.log($(this).val());
});

function SaveData(){
    var form = $('#form');
    $.ajax({
            url    : form.attr('action'),
            type   : 'post',
            data   : form.serialize(),
            success: function (data) 
            {
             console.log(JSON.stringify(data.data));
              // console.log('Success');
   
            },
            error  : function () {
                console.log('internal server error');
            }
            });
            return false;
}