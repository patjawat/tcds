

<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use app\components\DbHelper;
use yii\web\JsExpression;
use app\components\loading\ShowLoading;
use yii\helpers\Url;
//use Yii;

//echo ShowLoading::widget();
?>
<?php
    /*$this->title = 'EMR';
    $this->params['breadcrumbs'][] = ['label' => 'Order', 'url' => ['/doctorworkbench/order/emr/']];
    $this->params['breadcrumbs'][] = $this->title;*/
    
    ?>

<div class="hoslab-index">

    <div style="margin-bottom: 3px">
        <?php $alert = 'swal("ส่งทีละหลายรายการ...")'; ?>

    </div>
    <?php Pjax::begin(); ?>
    <?php
    $colorPluginOptions = [
        'showPalette' => true,
        'showPaletteOnly' => true,
        'showSelectionPalette' => true,
        'showAlpha' => false,
        'allowEmpty' => false,
        'preferredFormat' => 'name',
        'palette' => [
            [
                "white", "black", "grey", "silver", "gold", "brown",
            ],
            [
                "red", "orange", "yellow", "indigo", "maroon", "pink"
            ],
            [
                "blue", "green", "violet", "cyan", "magenta", "purple",
            ],
        ]
    ];
    ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        //'showPageSummary'=>true,
        'pjax' => true,
        'pjaxSettings' => [
            'neverTimeout' => true,
        ],
        'striped' => true,
        'hover' => true,
        'columns' => [
            [
                'class' => 'kartik\grid\ExpandRowColumn',
                'width' => '100px',
                'value' => function ($model, $key, $index, $column) {
                    return GridView::ROW_COLLAPSED;
                },
                'detail' => function ($model, $key, $index, $column) {

                    //return Yii::$app->controller->renderPartial('test', ['provider_code' => $model->provider_code,'vn'=>$model->vn]);
                    //return Yii::$app->controller->renderPartial('emrdetail', 
//                            ['provider_code' => $model->provider_code,
//                             'vn'=>$model->vn]);
                    //return Yii::$app->controller->renderPartial('_detail_orden_pago' ['ordenPagoModel' => $ordenPagoModel]);
                    return $this->render('../emrdetail/detail', ['id' => $model->id, 'vn' => $model->vn, 'hospcode' => $model->hospcode]);
                },
                'headerOptions' => ['class' => 'kartik-sheet-style'],
                'expandOneOnly' => true,
                'expandIcon' => '<i class="fa fa-plus"></i>',
                 'collapseIcon'=> '<i class="fa fa-angle-down"></i>'
            ],
            [
                'attribute' => 'date_visit',
                'value' => function ($model, $key, $index, $widget) {
                    if ($model->cc == '' && $model->pe == '' && $model->pi == '' && $model->pulse == '' && $model->bpd == '') {
                        $color = '#FF4081';
                    } else {
                        $color = '#4DB6AC';
                    }
                    $tyear = Yii::$app->formatter->asDate($model->date_visit, 'yyyy') + 543;
                    return "<span class='badge' style='background-color: {$color};color:{$color}'>.</span>  <code style='color: black;font-size:16px;' >" .
                            Yii::$app->formatter->asDate($model->date_visit, 'dd/MM/') . $tyear . ' ----- ' . $model->hospname . '</code>';
                },
                'filterType' => GridView::FILTER_COLOR,
                'filterWidgetOptions' => [
                    'showDefaultPalette' => false,
                    'pluginOptions' => $colorPluginOptions,
                ],
                'vAlign' => 'middle',
                'format' => 'raw',
            ],
        /* [
          'attribute' => 'date_service',
          'value' => function ($model, $key, $index, $widget) {
          return $model->date_service . ' ' . $model->provider_name;
          },
          'filter' => false,
          //'filterType'=>GridView::FILTER_SELECT2,
          //'filter'=>ArrayHelper::map(Suppliers::find()->orderBy('company_name')->asArray()->all(), 'id', 'company_name'),
          //'filterWidgetOptions'=>[
          //    'pluginOptions'=>['allowClear'=>true],
          // ],
          //'filterInputOptions'=>['placeholder'=>'Any supplier'],
          'group' => true, // enable grouping,
          'groupedRow' => true, // move grouped column to a single grouped row
          'groupOddCssClass' => 'kv-grouped-row', // configure odd group cell css class
          'groupEvenCssClass' => 'kv-grouped-row', // configure even group cell css class
          ],
          ['class' => 'yii\grid\CheckboxColumn',],
          'cc',
          'pe', */
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>

</div>

