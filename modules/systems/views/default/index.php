<?php
use yii\helpers\Json;
use app\modules\systems\models\SystemData;
// $data= Json::decode(SystemData::findOne(['id' => 'system'])->data);
// echo $data['his_api'];
?>
<div class="systems-default-index">
   
</div>


<div class="form-group">
<label class="control-label col-lg-1 col-md-1 col-sm-1"></label>
<div class="col-lg-4 col-md-4 col-sm-4">
<h1><span class="glyphicon glyphicon-tasks"></span> ตั้งค่าพื้นฐานของระบบ</h1>
    <p>
        การตั้งค่าพื้นฐานและการเชื่อมต่อระบบ API ติดต่อข้อมูลต่างๆ
    </p>
<p class="help-block help-block-error "></p>
</div>
<br><br>
<br><br><br><br>
<div id="view-form"></div>
<?php
$js = <<< JS

loadForm()

function loadForm(){
    $.ajax({
        type: "get",
        beforeSend:function(){
            $('#view-form').html('<img src="img/loading.gif" style="margin-left: 600px;margin-top: 50px;padding-bottom: 18px;" />');
        },
        url: "index.php?r=systems/default/form",
        dataType: "json",
        success: function (response) {
            $('#view-form').html(response)
        }
    });
}

JS;
$this->registerJS($js);
?>