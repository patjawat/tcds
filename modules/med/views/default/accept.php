<?php
use app\components\PatientHelper;
use kartik\grid\GridView;
use yii\helpers\Html;
use kartik\dialog\Dialog;
use yii\web\JsExpression;
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fas fa-clipboard-check"></i> ระบบการจัดยา</h3>
    </div>
    <div class="panel-body">
        <?php
        echo GridView::widget([
            'id' => 'grid-accept',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax' => true,
            'columns' => [
                [
                    'class' => 'kartik\grid\SerialColumn',
                    'width' => '30px',
                ],
                [
                    'class'=>'\kartik\grid\DataColumn',
                    'attribute'=>'checkout_time',
                    'header' => 'เวลาสั่งยา',
                    'width' => '30px',
                ],
                [
                    'class'=>'\kartik\grid\DataColumn',
                    'attribute'=>'hn',
                    'header' => 'HN',
                ],
                [
                    'class'=>'\kartik\grid\DataColumn',
                    'attribute'=>'hn',
                    'header' => 'Fullname',
                    'value' => function($model){
                        return $model->patient ? $model->patient->fullname($model->hn) : '-';
                    }
                ],
                [
                    'class'=>'\kartik\grid\DataColumn',
                    'attribute'=>'hn',
                    'header' => 'แพทย์',
                ],
                [
                    'class'=>'\kartik\grid\DataColumn',
                    'attribute'=>'hn',
                    'header' => 'หน่วยงาน',
                ],
                [
                    'class'=>'\kartik\grid\DataColumn',
                    'attribute'=>'hn',
                    'header' => 'จุดรับยา',
                ],
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'template' => '{accept}',
                    'buttons' => [
                        'accept' => function ($url,$model) {
                            return Html::a('<i class="fas fa-clipboard-check"></i> จัดยา',['/med/default/accept-view','id' => $model->vn ], [
                                'title' => '',
                                'class' => 'setdialog',
                                'aria-label' => '',
                                'data' => ['confirm' => '<h4 class="text-center">HN : '.$model->hn.'</h4><h4 class="text-center">'.$model->patient($model->hn).'</h4>'],
                                'onclick' => 'return setDialog("Test")'
                                
                            ]);
                        },
                    ],
                ],
            ],
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
                'id' => 'a22',
                'libName' => 'krajeeDialogAccept', // ตั้งชื่อของ Dialog
                'overrideYiiConfirm' => false,
                'options' => [
                    'title' => '<i class="fas fa-edit"></i> รับทราบ',
                    'size' => Dialog::SIZE_LARGE,
                    'type' => Dialog::TYPE_DANGER,
                ],
            ],
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
        ]);
        ?>
    </div>
</div>
<!-- End Panel -->


<?php
$js = <<< JS


JS;
$this->registerJS($js);
?>