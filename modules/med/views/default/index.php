<?php
use app\components\PatientHelper;
use app\components\DateTimeHelper;
use app\components\ReportHelper;
use app\modules\chiefcomplaint\models\Chiefcomplaint;

$hn = PatientHelper::getCurrentHn();
$vn = PatientHelper::getCurrentVn();
$this->params['pt_title'] = PatientHelper::getPatientTitleByHn($hn);
?>
<h2>ระบบห้องยา</h2>
<ul>
<li>รับใบยา</li>
<li>ข้อมูลการรับใบยา</li>
<li>ข้อมูลจัดยา</li>
</ul>