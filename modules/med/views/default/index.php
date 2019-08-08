<?php
use app\components\PatientHelper;
use kartik\grid\GridView;
use yii\helpers\Html;

$hn = PatientHelper::getCurrentHn();
$vn = PatientHelper::getCurrentVn();
$this->params['pt_title'] = PatientHelper::getPatientTitleByHn($hn);
?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h2>ระบบห้องยา</h2>
    </div>
</div>


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