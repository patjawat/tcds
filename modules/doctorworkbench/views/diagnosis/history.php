
      <?php
      use yii\helpers\Html;
      use kartik\grid\GridView;
      use yii\widgets\Pjax;
      use yii\db\Query;
      use app\modules\doctorworkbench\models\Medication;
      use app\components\FormatYear;

    //   $query = new Query;
    //     $query	->select(['*'])  
    //             ->from('medication')
    //             ->join(	'inner join', 
    //                 's_opd_visit',
    //                 's_opd_visit.hn = medication.hn'
    //             ); 
    //     $command = $query->createCommand();
    //     $data = $command->queryAll();
    //     print_r($data);

    // $model =  Medication::find()
    // ->joinWith('opdVisit')
    // ->where(['s_opd_visit.service_start_date' => '2019-04-07'])
    // ->All();
    // echo '<pre>';
    // print_r($dataProvider->getModels());
    // echo '</pre>';
      ?>
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
            'icd_code',
            'icd10tm.diagename',
            'icd10tm.diagtname',
            
            
          

        ],
    ]);
    ?>