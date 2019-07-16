<div class="usermanager-default-index">
    <h2>ระบบจัดการทำเบียนผู้ใช้งานระบบ</h2>
</div>

<div class="show-user"></div>

<?php
$js = <<< JS
loadUser();

function loadUser(){
    $.ajax({
        type: "get",
        url: "index.php?r=usermanager/user",
        dataType: "json",
        success: function (response) {
            $('.show-user').html(response);
            // console.log(response);
        }
    });
}
JS;
$this->registerJS($js);
?>