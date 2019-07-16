<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\components\PatientHelper;
use app\components\loading\ShowLoading;
// echo ShowLoading::widget();
$hn = PatientHelper::getCurrentHn();
$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
$this->params['pt_title']= PatientHelper::getPatientTitleByHn($hn);
?>
<div class="site-about">
    <div><h2> ระบบจัดการ Profile ผู้ใช้งาน : <?=\Yii::$app->user->identity->username?></h2></div>
    <div><h2><?= Html::a('ออกจากระบบ',['/site/logout'],['class'=>'btn btn-danger'])?></h2></div>
</div>
