<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use yii\web\View;
use kartik\widgets\Select2;
use yii\web\JsExpression;
use yii\widgets\Pjax;
use app\components\PatientHelper;
echo GridView::widget([
    'id'=>'crud-diagnosis',
    'dataProvider' => $dataProvider,
    'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '-'],
    'pjax'=>true,
    'columns' => require(__DIR__.'/_columns.php'),        
    'striped' => true,
    'condensed' => true,
    'responsive' => true,  
    'summary'=>false,
    'showFooter' => false,
    'headerRowOptions' => ['style' => 'background-color: #eee;'],
    //'layout' => $layout,
    'rowOptions'=>function($model,$id){
        if($model->id == Yii::$app->request->get('id')){
            return ['class' => 'success'];
        }
    },
    'options' => [
        'class' => 'background-color: red',
     ],
    'replaceTags' => [
        '{custom}' => function($widget) {
            if ($widget->panel === true) {
                return '';
            } else {
                return '';
            }
        }
    ],
    'pager' => [
        'options'=>['class'=>'pagination'], 
        'prevPageLabel' => 'Previous', 
        'nextPageLabel' => 'Next',
        'firstPageLabel'=>'First',
        'lastPageLabel'=>'Last',
        'nextPageCssClass'=>'next',
        'prevPageCssClass'=>'prev',
        'firstPageCssClass'=>'first',
        'lastPageCssClass'=>'last',
        'maxButtonCount'=>10,
],       
]);

?>