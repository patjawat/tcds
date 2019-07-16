<?php
// load JavaScript From @web/js/chiefcomplaint.js
use yii\helpers\Html;
use yii\helpers\Url;
use app\components\PatientHelper;
use app\components\DateTimeHelper;
use app\components\ReportHelper;
use app\modules\chiefcomplaint\models\Chiefcomplaint;
use app\modules\opdvisit\models\OpdVisit;

$hn = PatientHelper::getCurrentHn();
$vn = PatientHelper::getCurrentVn();

$this->params['pt_title'] = PatientHelper::getPatientTitleByHn($hn);

?>
<style>
.btn-patient-alert{
    display:none;
}
</style>
<?php if($model->print == 'print'):?>
<body style="margin:0px;padding:0px;overflow:hidden">
    <iframe src="<?=Url::to(ReportHelper::Url());?>viewer.php?report_name='<?=$report_name;?>'&hn='<?=$hn;?>'&vn='<?=$vn;?>'" frameborder="0" style="overflow:hidden;height:900;width:100%" height="900" width="100%"></iframe>
</body>
    <?php else:?>

    <?php endif;?>
<?php
$js = <<< JS

FisPrintStatus();

function FisPrintStatus(){
    $.ajax({
        type: "post",
        url: "index.php?r=opdvisit/opd-visit/set-print-status",
        dataType: "json",
        success: function (response) {
            
        }
});
}

JS;
$this->registerJS($js);

?>