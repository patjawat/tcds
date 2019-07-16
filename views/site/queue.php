
<input type="text" id="search" value="" class="form-control" style="width:49%;margin-bottom:11px;">
<div id="show-queue"></div>
<?php

$js = <<< JS
loadQueue();

$('#search').keyup(function(e){
    if(e.keyCode == 13){
        loadQueue();
    }
});
function loadQueue(){
    var keys = $('#search').val();
    $.ajax({
        type: "get",
        url: "index.php?r=site/show-queue",
        data:{
            keys:keys,
            department:localStorage.getItem("department")
        },
        dataType: "json",
        success: function (response) {
            $('#show-queue').html(response.content);
        }
    });
}
JS;
$this->registerJS($js);
?>
