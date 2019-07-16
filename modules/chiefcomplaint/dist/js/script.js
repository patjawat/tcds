

loadForm()
loadNc()




function save(requester){
    $.ajax({
        type: "post",
        // beforeSend:function(){
        //     // $('#vs').html('<img src="img/loading.gif" style="margin-left: 300px;margin-top: 100px;padding-bottom: 100px;" />');
        //     // $('#vs').html('<div class="stage"><div class="dot-pulse"></div></div>')
        //     $('.form-group-vs').hide();
        // },
        url: "index.php?r=chiefcomplaint/chiefcomplaint/show-form",
        dataType: "json",
        data:$('#form-pi').serialize(),
        success: function (response) {
            $('#vs').html(response)
           // loadVs();
            // $('.form-group-vs').hide();

        }
    });
}

function saveNc(requester){
    $.ajax({
        type: "post",
        url: "index.php?r=nursescreen/nurse-screening/update-vn",
        dataType: "json",
        data:$('#form-nc').serialize(),
        success: function (response) {
           // loadNc();
        }
    });
}
