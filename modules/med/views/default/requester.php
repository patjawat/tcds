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


JS;
$this->registerJS($js);
?>