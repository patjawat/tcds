$('body').on('beforeSubmit', '#form', function () {
    var form = $("#form");
    // return false if form still have some validation errors
    if (form.find('.has-error').length) {
         return false;
    }
    $.ajax({
         url: form.attr('action'),
         type: 'post',
         data: form.serialize(),
         success: function (response) {
              console.log('Success');
             $.pjax.reload({container: "#crud-datatable-pjax"});
            //  $('#icd_code').val(null).trigger('change');
            $("#form")[0].reset();
            totalPrice($('#hn').val(),$('#vn').val());
         }
    });
    return false;
});

function totalPrice(hn,vn){
    $.ajax({
      type: "get",
      url: "index.php?r=doctorworkbench/pcc-medication/sum-price",
      data:{hn:hn,vn:vn},
      dataType: "json",
      success: function (response) {
          console.log(response);
        //   $('#totalprice').html(response);

          const formatter = new Intl.NumberFormat('th', {
           // style: 'currency',
           // currency: 'USD',
            minimumFractionDigits: 2
          })

          $('#totalprice').html(formatter.format(response));
      }
  });
  }