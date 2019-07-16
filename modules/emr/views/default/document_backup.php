<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use app\components\PatientHelper;
use app\modules\document\models\DocumentType;

$this->title = 'Documents';
$hn = PatientHelper::getCurrentHn();
$this->params['pt_title'] = PatientHelper::getPatientTitleByHn($hn);
?>
<style>
#grid-document-container{
    height: 600px;
}
</style>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'id' => 'grid-document',
        'pjax' => true,
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'floatHeader' => true,
        'floatHeaderOptions' => ['scrollingTop' => '20'],
        'perfectScrollbar' => true,
        'footerRowOptions' => ['style' => 'font-weight:bold;text-decoration: underline; position: absolute'],
        // 'filterSelector' => "select[name='".$dataProvider->getPagination()->pageSizeParam."'],input[name='".$dataProvider->getPagination()->pageParam."']",
    'pager' => [
        'class' => \liyunfang\pager\LinkPager::className(),
        'template' => '<div class="row" style="margin-top: 20px;"> <div class="col-md-10">{pageButtons}</div> <div class="col-md-2">{pageSize}</div></div>',
        'pageSizeList' => [50,100,500],
        'pageSizeMargin' => 'margin-left:5px;margin-right:5px;',
        'pageSizeOptions' => ['class' => 'form-control','style' => 'display: inline-block;width:100px;margin-top:0px;'],
        'customPageWidth' => 50,
        'customPageBefore' => ' Jump to ',
        'customPageAfter' => ' Page ',
        'customPageMargin' => 'margin-left:50px;margin-right:5px;',
        'customPageOptions' => ['class' => 'form-control','style' => 'display: inline-block;margin-top:0px;'],
        'prevPageLabel' => 'Previous',
        'nextPageLabel' => 'Next',
        'firstPageLabel'=>'First',
        'lastPageLabel'=>'Last',
        'nextPageCssClass'=>'next',
        'prevPageCssClass'=>'prev',
        'firstPageCssClass'=>'first',
        'lastPageCssClass'=>'last',
    ],
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
        //     [
        //         'attribute' => 'filename',
        //         'header' => 'File Scan',
        //         'format' => 'raw',
        //         'value' => function($model){
        //           return '<p>'.$model->filename.'</p><p>'.$model->barcode.'</p>';
        //         }
        //     ],

            [
                'attribute' => 'sub_dir',
                'header' => 'เอกสาร',
                'vAlign' => 'middle',
                'width' => '30%',
                'value' => function ($model, $key, $index, $widget) {
                    $label = '
                    ประเภทเอกสาร : <span class="label label-primary">'.$model->type($model->sub_dir).$model->sub_dir.'</span>
                    ชื่อเอกสาร : <span class="label label-success">'.$model->filename.'</span>
                    Barcode : <span class="label label-info">'.$model->barcode.'</span>';
                        $img = 'REG/'.$model->hn.'/'.$model->sub_dir.'/'.$model->filename.'.jpg';
                        return '<br>'.$label.Html::img($img,['width' => '100%']);
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => ArrayHelper::map(DocumentType::find()->all(), 'id', 'name'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                    'options' => ['multiple' => true]
                ],
                'filterInputOptions' => ['placeholder' => 'เลือหประเภทเอกสาร'],
                'format' => 'raw'
                ],
            // [
            //     'attribute' => 'barcode',
            //     'header' => 'Pictures',
            //     'content' => function ($model){
            //         $img = 'REG/'.$model->hn.'/'.$model->sub_dir.'/'.$model->filename.'.jpg';
            //         $images = [               // images at popup window of prettyPhoto galary
            //             1 => [
            //                     'src' => $img,
            //                     'title' => $model->filename,
            //                 ],
            //         ];
            //         return LightBoxWidget::widget([
            //             'id'     =>'lightbox',  // id of plugin should be unique at page
            //             'class'  =>'galary',    // class of plugin to define style
            //             'height' =>'400px',     // height of image visible in widget
            //             'width' =>'400px',      // width of image visible in widget
            //             'images' => $images,
            //         ]);
            //     }
            // ],

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
