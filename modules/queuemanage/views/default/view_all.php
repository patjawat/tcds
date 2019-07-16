<?php
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Json;
?>

<?php Pjax::begin(); ?>
<div class="panel panel-info">
    <div class="panel-heading">
        <div class="panel-title">
        <i class="fas fa-user-clock"></i> รายการผู้เข้ารับบริการ 
            <object align='right' style="margin-top: -5px;">
            <?= Html::a('กลับ', 
                // ['/queuemanage/pcc-visit'], [
                ['/queuemanage'], [
                'class' => 'btn btn-lbrown',
            ]) ?>
            </object>
        </div>
    </div>
    <div class="panel-body">
<?php

echo $this->render('_search', ['model' => $searchModel]);
echo GridView::widget([
    'id' => 'view',
    'dataProvider'=> $dataProvider,
    'columns' => require(__DIR__ . '/_columns.php'),
    'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '-'],
    'responsive'=>true,
    'hover'=>true,
   'pjax' =>true, 
    'summary' => false,
]);

?>
<?php 
Pjax::end();

?>
 </div>