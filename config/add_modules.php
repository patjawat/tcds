<?php

use \kartik\datecontrol\Module;

//เพิ่ม module ที่นี่ที่เดียว
$modules = [];

$modules['gridview'] = ['class' => '\kartik\grid\Module']; //system
$modules['test'] = ['class' => 'app\modules_share\test\Test']; //share //tehn
$modules['patient'] = ['class' => 'app\modules_share\patient\Patient']; //share //tehn
$modules['test2'] = ['class' => 'app\modules_nurse\test2\Test2'];
$modules['newpatient'] = ['class' => 'app\modules_share\newpatient\NewPatient'];
$modules['patiententry'] = ['class' => 'app\modules_nurse\patiententry\PatientEntry'];
$modules['servicedummy'] = ['class' => 'app\modules_nurse\servicedummy\ServiceDummy']; //test
// $modules['opdvisit'] = ['class' => 'app\modules_share\opdvisit\OpdVisit'];
$modules['opdvisit'] = ['class' => 'app\modules\opdvisit\Opdvisit'];
$modules['foot'] = ['class' => 'app\modules_share\foot\Foot']; //oh
$modules['nursescreen'] = ['class' => 'app\modules_nurse\nurse_screen\Nursescreen']; //pond
$modules['emr'] = ['class' => 'app\modules\emr\Emr']; //jub
$modules['dietitian'] = ['class' => 'app\modules_nurse\dietitian\Dietitian']; //jub
$modules['printout'] = ['class' => 'app\modules_share\printout\PrintOut']; //tehnn
$modules['settings'] = ['class' => 'app\modules\settings\Settings']; //Oh
$modules['listorder'] = ['class' => 'app\modules\listorder\Listorder']; //Oh
$modules['listresults'] = ['class' => 'app\modules\listreu\Listorder']; //Oh


$modules['datecontrol'] = [
    'class' => 'kartik\datecontrol\Module',
    'displaySettings' => [
        Module::FORMAT_DATE => 'dd/MM/yyyy',
        Module::FORMAT_TIME => 'hh:mm:ss a',
        Module::FORMAT_DATETIME => 'dd/MM/yyyy hh:mm:ss a',
    ],
    'saveSettings' => [
        Module::FORMAT_DATE => 'php:Y-m-d',
        Module::FORMAT_TIME => 'php:H:i:s',
        Module::FORMAT_DATETIME => 'php:Y-m-d H:i:s',
    ],
    'displayTimezone' => 'Asia/Bankok',
    'saveTimezone' => 'UTC',
    'autoWidget' => true,
    'autoWidgetSettings' => [
        Module::FORMAT_DATE => ['type' => 2, 'pluginOptions' => ['autoclose' => true]], // example
        Module::FORMAT_DATETIME => [],
        Module::FORMAT_TIME => [],
    ],]; //Oh

$modules['user'] = [
    'class' => 'dektrium\user\Module',
    'enableUnconfirmedLogin' => true,
    'confirmWithin' => 21600,
    'cost' => 12,
    'admins' => ['admin']];
$modules['admin'] = ['class' => 'mdm\admin\Module'];// oh
$modules['rbac'] = ['class' => 'dektrium\rbac\RbacWebModule']; //inam
$modules['qmanage'] = ['class' => 'app\modules_share\qmanage\Qmanage'];//tehnn
$modules['icath'] = ['class' => 'app\modules_stock\icath\Icath']; //inam
/* PCC EMR */
$modules['lab'] = ['class' => 'app\modules\lab\Lab']; //pond
$modules['drug'] = ['class' => 'app\modules\drug\Drug']; //pond
$modules['doctorworkbench'] = ['class' => 'app\modules\doctorworkbench\Doctorworkbench']; //oh
$modules['queuemanage'] = ['class' => 'app\modules\queuemanage\QueueManage']; //tehnn
//$modules['emr'] = ['class' => 'app\modules\emr\Emr']; //jub
//$modules['printout'] = ['class' => 'app\modules\printout\PrintOut'];
$modules['report'] = ['class' => 'app\modules\report\Report'];
$modules['stock'] = ['class' => 'app\modules\stock\Stock'];
$modules['setsession'] = ['class' => 'app\modules\setsession\SetSession']; //tehnn
$modules['patientexit'] = ['class' => 'app\modules\patientexit\PatientExit']; //tehnn
$modules['chiefcomplaint'] = ['class' => 'app\modules\chiefcomplaint\Chiefcomplaint'];//pond
$modules['treatment'] = ['class' => 'app\modules\treatment\Treatment'];//pond
$modules['appointment'] = ['class' => 'app\modules\appointment\Appointment'];//pond
$modules['questionare'] = ['class' => 'app\modules\questionare\Questionare'];//inam
/* PCC EMR*/
$modules['dmassessment'] = ['class' => 'app\modules_nurse\dmassessment\Dmassessment']; //pond
$modules['usermanager'] = ['class' => 'app\modules\usermanager\Usermanager']; //pond
return $modules;
