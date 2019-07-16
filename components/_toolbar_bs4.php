<?php
// use Yii;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\components\PatientHelper;
$hn = PatientHelper::getCurrentHn();
$module = \Yii::$app->controller->module->id;
$a = 'color: #17a2b8;';
$a_icon = 'color: #17a2b8;';
?>

<style>
.a_icon {
    color: #a9a9a9;
}
</style>
<div class="nav-scroller bg-white shadow-sm" style="margin-top: 60px;">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- <a class="navbar-brand" href="#">Navbar</a> -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="navbarNavDropdown" class="navbar-collapse collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <?=Yii::$app->user->can('chiefcomplaint') ? Html::a('<i class="fas fa-user-friends a_icon"></i> Patient Data',['/chiefcomplaint'],['class' => $module == 'chiefcomplaint' ? 'nav-link on-active' : 'nav-link non-active']) : ''?>
                </li>
                <li class="nav-item">
                    <?=Yii::$app->user->can('dm-nurse') ? Html::a('<i class="fa fa-stethoscope a_icon"></i> DM PATIENT & EDUCATION',['/dm'],['class' => $module == 'dm' ? 'nav-link on-active' : 'nav-link non-active']) : ''?>
                </li>
                <li class="nav-item">
                    <?=Yii::$app->user->can('doctor') ? Html::a('<i class="fa fa-ambulance a_icon"></i> ระบบของแพทย์',['/doctorworkbench'],['class' => $module == 'doctorworkbench' ? 'nav-link on-active' : 'nav-link non-active']) : ''?>
                </li>
                <li class="nav-item">
                    <?=Yii::$app->user->can('dietitian') ? Html::a('<i class="fas fa-utensils a_icon"></i> Dietitian ',['/dietitian'],['class' => $module == 'dietitian' ? 'nav-link on-active' : 'nav-link non-active']) : ''?>
                </li>
                <li class="nav-item">
                    <?=Yii::$app->user->can('foot') ? Html::a('<i class="fa fa-wheelchair a_icon"></i> FOOT',['/foot'],['class' => $module == 'foot' ? 'nav-link on-active' : 'nav-link non-active']) : ''?>
                </li>
                <li class="nav-item">
                    <?=Yii::$app->user->can('hbot') ? Html::a('<i class="fa fa-wheelchair a_icon"></i> HBOT',['/hbot'],['class' => $module == 'hbot' ? 'nav-link on-active' : 'nav-link non-active']) : ''?>
                </li>
                <li class="nav-item">
                    <?=Yii::$app->user->can('hd') ? Html::a('<i class="fas fa-heartbeat a_icon"></i> HD',['/hd'],['class' => $module == 'hd' ? 'nav-link on-active' : 'nav-link non-active']) : ''?>
                </li>
                <li class="nav-item">
                    <?=Yii::$app->user->can('pharmacist') ? Html::a('<i class="fas fa-prescription-bottle-alt a_icon"></i> Pharmacist',['/pharmacist'],['class' => $module == 'pharmacist' ? 'nav-link on-active' : 'nav-link non-active']) : ''?>
                </li>
                <li class="nav-item">
                    <?=Yii::$app->user->can('med') ? Html::a('<i class="fas fa-notes-medical a_icon"></i> ห้องจ่ายยา',['/med'],['class' => $module == 'med' ? 'nav-link on-active' : 'nav-link non-active']) : ''?>
                </li>
                <li class="nav-item">
                    <?=Yii::$app->user->can('dmindicator') ? Html::a('<i class="fas fa-notes-medical a_icon"></i> DM-Indocator',['/dmindicator'],['class' => $module == 'dmindicator' ? 'nav-link on-active' : 'nav-link non-active']) : ''?>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <?=Yii::$app->user->can('pacs') ? Html::a('<i class="fas fa-expand"></i> PACS',['/doctorworkbench/default/pacs'],['class' => $module == 'lab' ? 'nav-link on-active' : 'nav-link non-active']) : ''?>
                </li>
                <li class="nav-item">
                    <?=Yii::$app->user->can('lab') ? Html::a('<i class="fas fa-microscope"></i> LAB',['/lab/default/lab-result-custom'],['class' => $module == 'lab' ? 'nav-link on-active' : 'nav-link non-active']) : ''?>
                </li>
                <?php if (\Yii::$app->user->can('admin')):?>

                <li class="nav-item dropdown dropleft">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-sliders-h"></i> ตั้งค่า
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <!-- <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a> -->
                        <?=Html::a('แผนก / คลินิก', ['/settings/department'],['class' => 'dropdown-item'])?>
                        <?=Html::a('ประเภทเอกสาร', ['/document/document-type'],['class' => 'dropdown-item'])?>
                        <?=Html::a('ผู้ใช้งานระบบ', ['/usermanager'],['class' => 'dropdown-item'])?>
                        <?=Html::a('กำหนดเส้นทาง', ['/admin/route'],['class' => 'dropdown-item'])?>
                        <?=Html::a('กลุ่มผู้ใช้งาน', ['/admin/role/index'],['class' => 'dropdown-item'])?>
                        <?=Html::a('การกำหนดการใช้งาน', ['/admin/assignment'],['class' => 'dropdown-item'])?>
                        <?=Html::a('ค่าบริการทางการแพทย์', ['/doctorworkbench/df-items'],['class' => 'dropdown-item'])?>
                    </div>
                </li>
                <?php endif;?>

            </ul>

        </div>
    </nav>


</div>