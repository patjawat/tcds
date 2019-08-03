
$("#form-chiefcomplaint").on('beforeSubmit', function (e) {
  e.preventDefault(); // stopping submitting
  var form = $(this);
  if (form.find('.has-error').length) {
    //   return false;
    console.log(form.find('.has-error').length)
  } else {
    if ($('#chiefcomplaint-requester').val() == '') {
      confirmRequester();
    } else {
      alert('success');
    }
    console.log(form.find('.has-error').length)
    return false;
  }
  return false;
});


$('.save').click(function(){
  console.log('save');
  $('.save').hide();
  $('.requester').val($('#master-requester').val());
  $("#form-chiefcomplaint").submit();
});

function loadFormChiefcomplaint() {
  $.ajax({
    type: 'get',
    beforeSend: function () {
      $('#showForm-chiefcomplaint').html('<img src="img/loading.gif" style="margin-left: 600px;margin-top: 50px;padding-bottom: 18px;" />');
      // $('#vs').html('<div class="stage"><div class="dot-pulse"></div></div>')
      $('.form-group-vs').hide();
    },
    url: "index.php?r=chiefcomplaint/chiefcomplaint/show-form",
    dataType: "json",
    success: function (response) {
      $('#showForm-chiefcomplaint').html(response)
      // $('#btnGroupPi').hide();
      // $('.form-group-vs').show();
      // window.location.replace("/");
      // alert();



    }
  });
}



function confirmRequester() {
  $.ajax({
    type: "get",
    url: "index.php?r=chiefcomplaint/chiefcomplaint/requester",
    dataType: "json",
    success: function (response) {
      $('#main-modal').modal('show');
      $('.modal-title').html(response.title);
      $('.modal-body').html(response.content);
      $('.modal-footer').html(response.footer);
      $('.save').hide();
      // window.location.replace("/");
      // alert();
    }
  });


}


// function loadNc(){
//     $.ajax({
//         type: "get",
//         // beforeSend:function(){
//         //     $('#nc').html('<img src="img/loading.gif" style="margin-left: 500px;margin-top: 100px;padding-bottom: 100px;" />');

//         //     // $('#nc').html('<div class="stage"><div class="dot-pulse"></div></div>')
//         // },
//         url: "index.php?r=nursescreen/nurse-screening/update-vn",
//         dataType: "json",
//         success: function (response) {
//             $('#nc-form').html(response)
//             $('.form-group-nc').hide();

//         }
//     });
// }

function saveChiefcomplaint() {
  $("#form-chiefcomplaint").submit();
  // $.ajax({
  //   type: "post",
  //   beforeSend: function () {
  //     $('#main-modal').modal('hide');
  //     $(".view-container").hide();
  //     $(".view-process").show();
  //   },
  //   url: "index.php?r=chiefcomplaint/chiefcomplaint/show-form",
  //   dataType: "json",
  //   data: $('#form-chiefcomplaint').serialize(),
  //   success: function (response) {

  //     // if(response == true){
  //     //   window.location.replace("/");
  //     // }
  //     // alert('xx');

  //     // loadFormChiefcomplaint()
  //     // $('#showForm-chiefcomplaint').html(response)
  //   }
  // });

}
function loadDrugAllergy() {
  $.ajax({
    url: 'index.php?r=opdvisit/default/check-drug-allergy',
    // beforeSend:function(){
    //   $('.modal-title').html('<i class="far fa-clock"></i> กำลังดึงข้อมูลแพ้ยา...');
    //   $('#drug-alert-modal').modal('show');
    //   $('.modal-body').html('<img src="img/loading.gif" style="margin-left: 45%;margin-top: 50px;padding-bottom: 18px;" />');
    // },
    type: 'get',
    dataType: 'json',
    success: function (response) {
      if (response.status == true) {
        $('#patient-alert').modal('show');
      }
    }
  })
    .done(function () {
      console.log("success");
    })
    .fail(function () {
      console.log("error");
    })
    .always(function () {
      console.log("complete");
    });


}
