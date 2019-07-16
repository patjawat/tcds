<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use app\components\PatientHelper;

$this->title = 'Documents';
$hn = PatientHelper::getCurrentHn();
$this->params['pt_title'] = PatientHelper::getPatientTitleByHn($hn);
?>



<div class="document-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?php // Html::a('Create Document', ['create'], ['class' => 'btn btn-success']) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'filename',
                'header' => 'File Scan',
                'format' => 'raw',
                'value' => function($model){
                  return '<p>'.$model->filename.'</p><p>'.$model->barcode.'</p>';
                }
            ],
            [
                'attribute' => 'barcode',
                'header' => 'File Scan',
                'format' => 'raw',
                'value' => function($model){
                    $img = 'REG/'.$model->hn.'/'.$model->sub_dir.'/'.$model->filename.'.jpg';
                  return Html::img($img,['width' => 800]);
                }
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
