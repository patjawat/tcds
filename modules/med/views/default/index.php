<?php
use app\components\PatientHelper;
use kartik\grid\GridView;
use yii\helpers\Html;

$hn = PatientHelper::getCurrentHn();
$vn = PatientHelper::getCurrentVn();
$this->params['pt_title'] = PatientHelper::getPatientTitleByHn($hn);
?>
<style>
.panel-default>.panel-heading {
    color: #05867a !important;
    background-color: #fff !important;
    border-color: #ddd !important;
    text-shadow: -1px 0px white, 0 1px white, 1px 0 white, 0 -1px white;
}
</style>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">ระบบห้องยาระบบห้องยา</h3>
    </div>
    <div class="panel-body">

<?=GridView::widget([
    'id' => 'crud-datatable',
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'pjax' => true,
    'columns' => require (__DIR__ . '/_columns.php'),
    'toolbar' => [
        ['content' =>
            Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],
                ['role' => 'modal-remote', 'title' => 'Create new Document Types', 'class' => 'btn btn-default']) .
            Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                ['data-pjax' => 1, 'class' => 'btn btn-default', 'title' => 'Reset Grid']) .
            '{toggleData}' .
            '{export}',
        ],
    ],
    'krajeeDialogSettings' => [
        'options' => ['title' => '<i class="fas fa-exclamation"></i> ยืนยัน']
    ],
    'striped' => true,
    'condensed' => true,
    'responsive' => true,
])?>
    </div>
</div>