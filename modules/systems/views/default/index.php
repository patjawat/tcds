<?php
use yii\helpers\Json;
use app\modules\systems\models\SystemData;
// $data= Json::decode(SystemData::findOne(['id' => 'system'])->data);
// echo $data['his_api'];
?>
<div class="systems-default-index">
    <h1><span class="glyphicon glyphicon-tasks"></span> ตั้งค่าพื้นฐานของระบบ</h1>
    <p>
        This is the view content for action "<?= $this->context->action->id ?>".
        The action belongs to the controller "<?= get_class($this->context) ?>"
        in the "<?= $this->context->module->id ?>" module.
    </p>
    <p>
        You may customize this page by editing the following file:<br>
        <code><?= __FILE__ ?></code>
    </p>
</div>

<h1><?php
// print_r($data['api_his']);
?></h1>
<div id="view-form"></div>
<?php
$js = <<< JS

loadForm()

function loadForm(){
    $.ajax({
        type: "get",
        url: "index.php?r=systems/default/form",
        dataType: "json",
        success: function (response) {
            $('#view-form').html(response)
            console.log('xx')
        }
    });
}

JS;
$this->registerJS($js);
?>