<?php
use app\components\PatientHelper;
use app\components\DbHelper;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use lo\widgets\modal\ModalAjax;
use kartik\tabs\TabsX;

$hn = PatientHelper::getCurrentHn() ? PatientHelper::getCurrentHn()  : "";
$hnEmr = PatientHelper::getCurrentHnEmr();
// PatientHelper::DrugAlert();

$this->params['pt_title'] = PatientHelper::getPatientTitleByHn($hn);
?>
<style>
.navbar-default .navbar-nav>li.dropdown:hover>a,
.navbar-default .navbar-nav>li.dropdown:hover>a:hover,
.navbar-default .navbar-nav>li.dropdown:hover>a:focus {
    background-color: rgb(231, 231, 231);
    color: rgb(85, 85, 85);
}

li.dropdown:hover>.dropdown-menu {
    display: block;
    background-color: #eee;
}

.nav-tabs>li {
    background-color: #eee;
}

.nav-tabs>li>a {
    color: #353535;
    margin-right: -1px;
}

.panel-default>.panel-heading {
    color: #05867a;
    background-color: #ddd;
    border-color: #ddd;
    text-shadow: -1px 0px white, 0 1px white, 1px 0 white, 0 -1px white;
}
</style>
<h2 style="margin-top: -7px;"><i class="fas fa-procedures"></i> Patient EMR</h2>
<?php

// $items = [
//     [
//         'label' => '<i class="far fa-folder-open"></i> Document',
//         // 'linkOptions' => ['data-url' => Url::to(['/emr/defaulst/dashbroad'])],
//         'options' => ['id' => 'main-document','style' => 'margin-top: -10px;'],
//         'active'=>true,
//         'content' => $this->render('./document',[
//             'initialPreview'=> $initialPreview,
//             'initialPreviewConfig'=> $initialPreviewConfig,
//             ])  
//     ],
//     [
//         'label'=>'<i class="fas fa-home"></i> Dashbroad',
//         'options' => ['id' => 'home'],
//             'content'=>$this->render('dashbroad'),
//     ],
// ];



// Left
// echo TabsX::widget([
//     'items'=>$items,
//     'position'=>TabsX::POS_LEFT,
//     'encodeLabels'=>false,
//     'enableStickyTabs' => true,
//     'stickyTabsOptions' => [
//         'selectorAttribute' => 'data-target',
//         'backToTop' => true,
//     ],
// ]);

echo $this->render('./document',[
    'initialPreview'=> $initialPreview,
    'initialPreviewConfig'=> $initialPreviewConfig,
    ])  
?>
