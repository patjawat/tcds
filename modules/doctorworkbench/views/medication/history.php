
      <?php
      use yii\helpers\Html;
      use kartik\grid\GridView;
      use yii\widgets\Pjax;
      use yii\db\Query;
      use app\modules\doctorworkbench\models\Medication;
      use app\components\FormatYear;
      ?>
      <style>
      .kv-grouped-row {
            background-color: #eaeaea !important;
            font-size: 1.3em;
            padding-top: 4px !important;
            padding-bottom: 4px !important;
        }
      </style>
      <div style="margin-top: 10px;margin-bottom: 10px;">
      <?=Html::button('<i class="far fa-window-restore"></i> Remed',['class' => 'btn btn-info'])?>      
      </div>
      <?php
       echo GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        //'showPageSummary'=>true,
        'pjax'=>true,
        'pjaxSettings'=>[
            'neverTimeout'=>true,
        ],
        'options' => [
            'id' => 'gridview-id'
        ],
        'striped'=>true,
        'hover'=>true, 
        //'panel' => [ 'befor' => 'Lab History'],
       // 'panel'=>['heading'=>'Lab History'],
        'toolbar' =>  ['{toggleData}',],
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'], 
        'rowOptions' => function ($model, $key, $index, $grid) { //สามารถกำหนด data-key ใหม่ (ปกติจะใช้ PK)
            return ['data' => ['key' => $model->id]];
        }, 
        'columns' => [
            [
                'attribute'=>'date_visit', 
                'header' => 'Date Visit',
                'format'=>'raw',
                'value'=>function ($model, $key, $index, $widget) { 
                    return Html::checkbox($model->vn).' '.FormatYear::toThai($model->opdVisit->service_start_date);
                },
                'filter'=>false,
                'group'=>true,  // enable grouping,
                'groupedRow'=>true,                    // move grouped column to a single grouped row
                'groupOddCssClass'=>'kv-grouped-row',  // configure odd group cell css class
                'groupEvenCssClass'=>'kv-grouped-row', // configure even group cell css class
            ],
            [
                'class' => 'yii\grid\CheckboxColumn',
                'header' => false,
                'checkboxOptions' =>

                function($model) {
        
                    return ['value' => $model->id, 'class' => $model->vn, 'id' => 'checkbox'];
        
                }
            ],
            [
                'class'=>'\kartik\grid\DataColumn',
                'attribute'=>'drug_name',
                'header' => 'รายการยา',
                'value' => function($model){
                    $items = $model->drugitems->name.' '.$model->drugitems->strength.' '.$model->drugitems->units;
                    return $items;
                }
            ],  
            'qty'    
            
            
          

        ],
    ]);
    ?>