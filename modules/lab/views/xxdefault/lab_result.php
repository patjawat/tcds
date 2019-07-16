<?php
use kartik\grid\GridView;
use app\modules\lab\models\LabResult;
use app\components\FormatYear;
?>

<h1>Lab Result on Patient : 817452</h1>


<!-- select `theptarin`.`lis_order`.`lis_number` AS `lis_number`,`theptarin`.`lis_order`.`reference_number` AS `reference_number`,`theptarin`.`lis_order`.`patient_id` AS `patient_id`,`ttr_hims`.`lab_request`.`checkin_date` AS `checkin_date`,`ttr_hims`.`lab_request`.`checkin_time` AS `checkin_time`,`ttr_hims`.`lab_request`.`eat_date` AS `eat_date`,`ttr_hims`.`lab_request`.`eat_time` AS `eat_time`,`theptarin`.`lis_order`.`accept_time` AS `accept_time`,`theptarin`.`lis_order`.`request_div` AS `request_div`,`theptarin`.`lis_result`.`lis_code` AS `lis_code`,`theptarin`.`lis_result`.`test` AS `test`,`theptarin`.`lis_result`.`lab_code` AS `lab_code`,`theptarin`.`lis_result`.`result_code` AS `result_code`,`theptarin`.`lis_result`.`result` AS `result`,`theptarin`.`lis_result`.`unit` AS `unit`,`theptarin`.`lis_result`.`normal_range` AS `normal_range`,`theptarin`.`lis_result`.`remark` AS `remark`,`theptarin`.`lis_result`.`result_date` AS `result_date`,`theptarin`.`lis_result`.`user_id` AS `user_id` from `theptarin`.`lis_order` join `theptarin`.`lis_result` join `ttr_hims`.`lab_request` where ((`theptarin`.`lis_order`.`lis_number` = `theptarin`.`lis_result`.`lis_number`) and (`theptarin`.`lis_order`.`reference_number` = `ttr_hims`.`lab_request`.`file_no`) and (`theptarin`.`lis_result`.`lab_code` = `ttr_hims`.`lab_request`.`request_lab_id`)) -->
<?php

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'pjax' => true,
    'columns' => [
      [
  'class' => 'kartik\grid\SerialColumn',
  'contentOptions' => ['class' => 'kartik-sheet-style'],
  'width' => '36px',
  'header' => '',
  'headerOptions' => ['class' => 'kartik-sheet-style']
],
'lis_number',
        [
            'attribute' => 'lis_code',
            'vAlign' => 'middle',
            'hAlign' => 'right',
            'width' => '10%',
        ],
        [
            'attribute' => 'lab_code',
            'vAlign' => 'middle',
            'hAlign' => 'right',
            'width' => '10%',
        ],
        [
            'attribute' => 'test',
            'vAlign' => 'middle',
            'hAlign' => 'right',
            'width' => '20%',
        ],
        [
            'attribute' => 'normal_range',
            'vAlign' => 'middle',
            'hAlign' => 'right',
            'width' => '9px',
        ],
        [
            'attribute' => 'checkin_date',
            'vAlign' => 'middle',
            'hAlign' => 'right',
            'width' => '9px',
            'value' => function($model){
              return FormatYear::toThai($model->checkin_date);
            }
        ],
        [
            'header' => 'Time1',
            'vAlign' => 'middle',
            'hAlign' => 'right',
            'width' => '10%',
            'format' => 'raw',
            'value' => function($model){
              $data =  $model->checkin($model->patient_id,$model->lis_code);
              // return $data[0]->result ? $data[0]->result : '-';
            }
        ],

        [
            'header' => 'Time2',
            'vAlign' => 'middle',
            'hAlign' => 'right',
            'width' => '10%',
            'format' => 'raw',
            'value' => function($model){
              $data = $model->checkin($model->patient_id,$model->lis_code);
              return count($data) > 2 ? $data[1]->result : '-';
            }
        ],
        [
            'header' => 'Time3',
            'vAlign' => 'middle',
            'hAlign' => 'right',
            'format' => 'raw',
            'width' => '10%',
            'value' => function($model){
              $data =  $model->checkin($model->patient_id,$model->lis_code);
             return count($data) > 2 ? $data[2]->result : '-';
             // return $model->lis_code;
            }
        ],
        [
            'header' => 'Time4',
            'vAlign' => 'middle',
            'hAlign' => 'right',
            'format' => 'raw',
            'width' => '10%',
            'value' => function($model){
              $data =  $model->checkin($model->patient_id,$model->lis_code);
             return count($data) > 2 ? $data[3]->result : '-';
            }
        ],


      ]
]);
 ?>
