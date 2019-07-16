<?php
use \kartik\datecontrol\Module;

//เพิ่ม module ที่นี่ที่เดียว
$modules = [];

$modules['gridview'] = ['class' => '\kartik\grid\Module']; //system 

$modules['lab'] = ['class' => 'app\modules\lab\Lab']; //pond 
$modules['drug'] = ['class' => 'app\modules\drug\Drug']; //pond 
$modules['doctorworkbench'] = ['class' => 'app\modules\doctorworkbench\Doctorworkbench']; //oh
$modules['queuemanage'] = ['class' => 'app\modules\queuemanage\QueueManage']; //tehnn
$modules['emr'] = ['class' => 'app\modules\emr\Emr']; //jub
$modules['printout'] = ['class' => 'app\modules\printout\PrintOut'];
$modules['report'] = ['class' => 'app\modules\report\Report'];
$modules['stock'] = ['class' => 'app\modules\stock\Stock'];
$modules['setsession'] = ['class' => 'app\modules\setsession\SetSession']; //tehnn
$modules['patientexit'] = ['class' => 'app\modules\patientexit\PatientExit']; //tehnn
$modules['user'] = [
    'class' => 'dektrium\user\Module',
    'enableUnconfirmedLogin' => true,
    'confirmWithin' => 21600,
    'cost' => 12,
    'admins' => ['admin']]; // inam
$modules['rbac'] = ['class' => 'dektrium\rbac\RbacWebModule']; //inam
$modules['admin'] = ['class' => 'mdm\admin\Module',
                                'layout'=>'left-menu']; //inam
$modules['chiefcomplaint'] = ['class' => 'app\modules\chiefcomplaint\Chiefcomplaint'];//pond 
$modules['treatment'] = ['class' => 'app\modules\treatment\Treatment'];//pond
$modules['appointment'] = ['class' => 'app\modules\appointment\Appointment'];//pond
$modules['questionare'] = ['class' => 'app\modules\questionare\Questionare'];//inam
$modules['education'] = ['class' => 'app\modules\education\Education'];//jub
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

$modules['eform']= ['class' => 'app\modules\eform\Eform']; 
$modules['accounting'] = ['class' => 'app\modules\accounting\Accounting'];// โอ๋

return $modules;

