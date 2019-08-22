<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\components\PatientHelper;
$hn = PatientHelper::getCurrentHn();
$module = \Yii::$app->controller->module->id;
?>

<ul class="nav navbar-nav na">
<?php //if($hn):?>
    <?php if (\Yii::$app->user->can('chiefcomplaint')):?>
    <li><a class="<?=$module == 'chiefcomplaint' ? 'on-active' : 'non-active' ?>" href="<?= Url::to(['/chiefcomplaint/chiefcomplaint/show-form']) ?>" ><i class="fas fa-user-friends"></i> Patient Data</a></li>
    <?php endif;?>

    <?php if (\Yii::$app->user->can('dm-nurse')):?>
    <li><a class="<?=$module == 'dm' ? 'on-active' : 'non-active' ?>" href="<?= Url::to(['/dm']) ?>"><i class="fa fa-stethoscope"></i> DM PATIENT & EDUCATION</a></li>
    <?php endif;?>

    <?php if (\Yii::$app->user->can('doctor')):?>
    <li><a class="<?=$module == 'doctorworkbench' ? 'on-active' : 'non-active' ?>" href="<?= Url::to(['/doctorworkbench']) ?>"><i class="fas fa-user-md"></i> ระบบของแพทย์</a></li>
    <?php endif;?>

    <?php if (\Yii::$app->user->can('dietitian')):?>
    <li><a class="<?=$module == 'dietitian' ? 'on-active' : 'non-active' ?>" href="<?= Url::to(['/dietitian']) ?>"><i class="fas fa-utensils"></i> Dietitian </a></li>
    <?php endif;?>

    <?php if (\Yii::$app->user->can('foot')):?>
    <li><a class="<?=$module == 'foot' ? 'on-active' : 'non-active' ?>" href="<?= Url::to(['/foot/foot-assessment']) ?>"><i class="fa fa-wheelchair"></i> FOOT</a></li>
    <?php endif;?>

    <?php if (\Yii::$app->user->can('hbot')):?>
    <li><a class="<?=$module == 'hbot' ? 'on-active' : 'non-active' ?>" href="<?= Url::to(['/hbot/default/index']) ?>"><i class="fa fa-wheelchair"></i> HBOT</a></li>
    <?php endif;?>

    <?php if (\Yii::$app->user->can('hd')):?>
    <li><a class="<?=$module == 'hd' ? 'on-active' : 'non-active' ?>" href="<?= Url::to(['/hd/default/index']) ?>"><i class="fas fa-heartbeat"></i> HD</a></li>
    <?php endif;?>

    <?php if (\Yii::$app->user->can('pharmacist')):?>
    <li><a class="<?=$module == 'pharmacist' ? 'on-active' : 'non-active' ?>" href="<?= Url::to(['/pharmacist/default/index']) ?>"><i class="fas fa-prescription-bottle-alt"></i> Pharmacist</a></li>
    <?php endif;?>

    <?php if (\Yii::$app->user->can('med')):?>
    <li><a class="<?=$module == 'med' ? 'on-active' : 'non-active' ?>" href="<?= Url::to(['/med/default/index']) ?>"><i class="fas fa-notes-medical"></i> ห้องจ่ายยา</a></li>
    <?php endif;?>

    <?php if (\Yii::$app->user->can('dmindicator')):?>
    <li><a class="<?=$module == 'dmindicator' ? 'on-active' : 'non-active' ?>" href="<?= Url::to(['/dmindicator']) ?>"><i class="fas fa-notes-medical"></i> DM-Indocator</a></li>
    <?php endif;?>
<?php //endif;?>



    <!-- <li>
    <a class="<?php // $module == 'emr' ? 'on-active' : 'non-active' ?>" href="<?php // Url::to(['/emr/document']) ?>"><i class="fas fa-book"></i> E-DOC</a>
</li> -->

</ul>



<?php if (\Yii::$app->user->can('admin')):?>
<ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
            aria-expanded="false"> <i class="fas fa-sliders-h"></i> ตั้งค่า <span class="caret"></span></a>
        <ul class="dropdown-menu" style="z-index: 1024;">
            <li><?=Html::a('แผนก / คลินิก', ['/settings/department'])?></li>
            <li><?=Html::a('ประเภทเอกสาร', ['/document/document-type'])?></li>
            <li><?=Html::a('ผู้ใช้งานระบบ', ['/usermanager'])?></li>
            <li><?=Html::a('กำหนดเส้นทาง', ['/admin/route'])?></li>
            <li><?=Html::a('กลุ่มผู้ใช้งาน', ['/admin/role/index'])?></li>
            <li><?=Html::a('การกำหนดการใช้งาน', ['/admin/assignment'])?></li>
            <li><?=Html::a('ค่าบริการทางการแพทย์', ['/doctorworkbench/df-items'])?></li>
            <li><?=Html::a('ตั้งค่าเอกสาร QR-Code', ['/document/document-qr-type'])?></li>
            <li><?=Html::a('ตั้งค่าระบบ', ['/systems'])?></li>
           
        </ul>
    </li>
</ul>
<?php endif;?>

<ul class="nav navbar-nav navbar-right">
<?php if (\Yii::$app->user->can('pacs')):?>
    <li><a target="_blank" class="<?=$module == 'lab' ? 'on-active' : 'non-active' ?>" href="<?= Url::to(['/doctorworkbench/default/pacs']) ?>"><i class="fas fa-expand"></i> PACS</a></li>
    <?php endif;?>
    <ul class="nav navbar-nav navbar-right">
<?php if (\Yii::$app->user->can('lab')):?>
    <li><a target="_blank" class="<?=$module == 'lab' ? 'on-active' : 'non-active' ?>" href="<?= Url::to(['/lab/default/lab-result-custom']) ?>"><i class="fas fa-microscope"></i> LAB</a></li>
    <?php endif;?>
<?php if (\Yii::$app->user->can('emr')):?>
    <li><a class="<?=$module == 'emr' ? 'on-active' : 'non-active' ?>" href="<?= Url::to(['/emr']) ?>"><i class="fa fa-book"></i> EMR</a></li>

    <?php endif;?>