<?php
use yii\helpers\Html;
use kartik\grid\GridView;
use app\modules\lab\models\LabResult;
use app\components\FormatYear;
use yii\helpers\ArrayHelper;
use app\components\PatientHelper;
$hn = PatientHelper::getCurrentHn();

$this->params['pt_title'] = PatientHelper::getPatientTitleByHn($hn);

?>

<!-- <h1>Lab Result on Patient : 817452</h1> -->
<style media="screen">
.pagination {
    display: inline-block;
    padding-left: 0;
    margin: 0px 0;
    border-radius: 4px;
}
#labview-container{
  height: 500px;
  /* background-color: #eee; */
  /* border-style: solid; */
  border-bottom: .25rem solid #36b9cc!important;
}
</style>
<!-- select `theptarin`.`lis_order`.`lis_number` AS `lis_number`,`theptarin`.`lis_order`.`reference_number` AS `reference_number`,`theptarin`.`lis_order`.`patient_id` AS `patient_id`,`ttr_hims`.`lab_request`.`checkin_date` AS `checkin_date`,`ttr_hims`.`lab_request`.`checkin_time` AS `checkin_time`,`ttr_hims`.`lab_request`.`eat_date` AS `eat_date`,`ttr_hims`.`lab_request`.`eat_time` AS `eat_time`,`theptarin`.`lis_order`.`accept_time` AS `accept_time`,`theptarin`.`lis_order`.`request_div` AS `request_div`,`theptarin`.`lis_result`.`lis_code` AS `lis_code`,`theptarin`.`lis_result`.`test` AS `test`,`theptarin`.`lis_result`.`lab_code` AS `lab_code`,`theptarin`.`lis_result`.`result_code` AS `result_code`,`theptarin`.`lis_result`.`result` AS `result`,`theptarin`.`lis_result`.`unit` AS `unit`,`theptarin`.`lis_result`.`normal_range` AS `normal_range`,`theptarin`.`lis_result`.`remark` AS `remark`,`theptarin`.`lis_result`.`result_date` AS `result_date`,`theptarin`.`lis_result`.`user_id` AS `user_id` from `theptarin`.`lis_order` join `theptarin`.`lis_result` join `ttr_hims`.`lab_request` where ((`theptarin`.`lis_order`.`lis_number` = `theptarin`.`lis_result`.`lis_number`) and (`theptarin`.`lis_order`.`reference_number` = `ttr_hims`.`lab_request`.`file_no`) and (`theptarin`.`lis_result`.`lab_code` = `ttr_hims`.`lab_request`.`request_lab_id`)) -->
<?php

// $query = LabResult::find()
// ->where(['patient_id' => '817452'])
// ->where(['lis_code' => '10120'])
// ->andWhere(['BETWEEN', 'checkin_date', '2018-11-16', '2018-11-16'])
// ->orderBy('checkin_time DESC')->limit(4)->all();
// foreach ($query as $key => $value) {
//   echo $value->checkin_date.' : '. $value->checkin_time.'<br>';
// }

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    // 'filterPosition' => \yii\grid\GridView::FILTER_POS_HEADER,
    // 'layout'=>"{pager}\n{summary}\n{items}",
    'id' => 'labview',
    'pjax' => true,
    'bordered' => true,
    'striped' => true,
    'condensed' => true,
    'responsive' => true,
    'floatHeader' => true,
    'floatHeaderOptions' => ['scrollingTop' => '20'],
    'perfectScrollbar' => true,
    'footerRowOptions' => ['style' => 'font-weight:bold;text-decoration: underline; position: absolute'],
    'filterSelector' => "select[name='".$dataProvider->getPagination()->pageSizeParam."'],input[name='".$dataProvider->getPagination()->pageParam."']",
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
      [
  'class' => 'kartik\grid\SerialColumn',
  'contentOptions' => ['class' => 'kartik-sheet-style'],
  'width' => '36px',
  'header' => '#',
  'headerOptions' => ['class' => 'kartik-sheet-style']
],

        [
            // 'attribute' => 'lis_code',
            'header' => 'รหัสผลตรวจ',
            'vAlign' => 'middle',
            'hAlign' => 'right',
            'width' => '5%',
              'value' => function ($model, $key, $index, $widget) {
                return $model->lis_code;
              }
        ],
            [
          'attribute' => 'lis_code',
          'vAlign' => 'middle',
          'width' => '30%',
          'value' => function ($model, $key, $index, $widget) {
            return $model->test;
              // return Html::a($model->lab_code,
              //     '#',
              //     ['title' => 'View author detail', 'onclick' => 'alert("This will open the author page.\n\nDisabled for this demo!")']);
          },
          'filterType' => GridView::FILTER_SELECT2,
          'filter' => ArrayHelper::map(LabResult::find()->where(['patient_id' => '817452'])->groupBy(['lis_code'])->all(), 'lis_code', 'test'),
          'filterWidgetOptions' => [
              'pluginOptions' => ['allowClear' => true],
              'options' => ['multiple' => true]
          ],
          'filterInputOptions' => ['placeholder' => 'Select Lab Name'],
          'format' => 'raw'
          ],
        [
            'attribute' => 'normal_range',
            'vAlign' => 'middle',
            'hAlign' => 'right',
            'width' => '10%',
        ],
        [
            'attribute' => 'unit',
            'vAlign' => 'middle',
            'hAlign' => 'right',
            'width' => '10%',
        ],
        // [
        //     'attribute' => 'checkin_date',
        //     'vAlign' => 'middle',
        //     'hAlign' => 'right',
        //     'width' => '9px',
        //     'value' => function($model){
        //       return FormatYear::toThai($model->checkin_date);
        //     }
        // ],
        [
            'header' => '<span id="h_date1">date</span>',
            'mergeHeader' => true,
            'vAlign' => 'middle',
            'hAlign' => 'right',
            'width' => '50px',
            'format' => 'raw',
            'value' => function($model){
              $data = $model->checkin($model->patient_id,$model->lis_code,$model->checkin_date);
              return count($data) > 2 ? '<code>'.$data[0]->result.'</code>' : '-';
            },
            'filter' => function($model){
              return $model->checkin_date;
            }

        ],

        [
            'header' => '<span id="h_date2">date</span>',
            'mergeHeader' => true,
            'vAlign' => 'middle',
            'hAlign' => 'right',
          'width' => '50px',
            'format' => 'raw',
            'value' => function($model){
              $data = $model->checkin($model->patient_id,$model->lis_code,$model->checkin_date);
              return count($data) > 2 ? '<code>'.$data[1]->result.'</code>' : '-';
            }
        ],
        [
            'header' => '<span id="h_date3">date</span>',
            'mergeHeader' => true,
            'vAlign' => 'middle',
            'hAlign' => 'right',
            'format' => 'raw',
            'width' => '50px',
            'value' => function($model){
             $data = $model->checkin($model->patient_id,$model->lis_code,$model->checkin_date);
             return count($data) > 2 ? '<code>'.$data[2]->result.'</code>' : '-';

             // return $model->lis_code;
            }
        ],
        [
          'header' => '<span id="h_date4">date</span>',
            'mergeHeader' => true,
            'vAlign' => 'middle',
            'hAlign' => 'right',
            'format' => 'raw',
            'width' => '50px',
            'value' => function($model){
            $data = $model->checkin($model->patient_id,$model->lis_code,$model->checkin_date);
            return count($data) > 3 ? '<code>'.$data[3]->result.'</code>' : '-';

            }
        ],
      ]
]);
 ?>

 <?php
$js = <<< JS

loadLabel();

$('#labview-pjax').on('pjax:end', function(event, data, status, xhr, options) {
  loadLabel();

  });

  function loadLabel(){
$.ajax({
  url: 'index.php?r=lab/default/lab-date',
  type: 'get',
  dataType: 'json',
  // data: {param1: 'value1'}
  success: function(response){
    $('#h_date1').text(response.h_date1);
    $('#h_date2').text(response.h_date2);
    $('#h_date3').text(response.h_date3);
    $('#h_date4').text(response.h_date4);


  }
});
}



JS;
$this->registerJS($js);
  ?>
