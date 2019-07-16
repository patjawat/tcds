<?php
use kartik\grid\GridView;
use app\modules\lab\models\LabResult;
use app\components\FormatYear;
use app\components\DbHelper;

?>

<h1>Lab Result on Patient : 817452</h1>


<!-- select `theptarin`.`lis_order`.`lis_number` AS `lis_number`,`theptarin`.`lis_order`.`reference_number` AS `reference_number`,`theptarin`.`lis_order`.`patient_id` AS `patient_id`,`ttr_hims`.`lab_request`.`checkin_date` AS `checkin_date`,`ttr_hims`.`lab_request`.`checkin_time` AS `checkin_time`,`ttr_hims`.`lab_request`.`eat_date` AS `eat_date`,`ttr_hims`.`lab_request`.`eat_time` AS `eat_time`,`theptarin`.`lis_order`.`accept_time` AS `accept_time`,`theptarin`.`lis_order`.`request_div` AS `request_div`,`theptarin`.`lis_result`.`lis_code` AS `lis_code`,`theptarin`.`lis_result`.`test` AS `test`,`theptarin`.`lis_result`.`lab_code` AS `lab_code`,`theptarin`.`lis_result`.`result_code` AS `result_code`,`theptarin`.`lis_result`.`result` AS `result`,`theptarin`.`lis_result`.`unit` AS `unit`,`theptarin`.`lis_result`.`normal_range` AS `normal_range`,`theptarin`.`lis_result`.`remark` AS `remark`,`theptarin`.`lis_result`.`result_date` AS `result_date`,`theptarin`.`lis_result`.`user_id` AS `user_id` from `theptarin`.`lis_order` join `theptarin`.`lis_result` join `ttr_hims`.`lab_request` where ((`theptarin`.`lis_order`.`lis_number` = `theptarin`.`lis_result`.`lis_number`) and (`theptarin`.`lis_order`.`reference_number` = `ttr_hims`.`lab_request`.`file_no`) and (`theptarin`.`lis_result`.`lab_code` = `ttr_hims`.`lab_request`.`request_lab_id`)) -->


<!--
select checkin_date,checkin_time,lis_code,test,normal_range,unit from lab_result
WHERE patient_id = '817452'
GROUP BY checkin_date ,lis_code
ORDER BY  checkin_date DESC ,lis_code ASC -->
<style media="screen">
/* .table-scroll {
	position:relative;
	max-width:98%;
	margin:auto;
	overflow:hidden;
	border:1px solid #000;
}
.table-wrap {
	width:100%;
	overflow:auto;
}
.table-scroll table {
	width:100%;
	margin:auto;
	border-collapse:separate;
	border-spacing:0;
}
.table-scroll th, .table-scroll td {
	padding:5px 10px;
	border:1px solid #000;
	background:#fff;
	white-space:nowrap;
	vertical-align:top;
}
.table-scroll thead, .table-scroll tfoot {
	background:#f9f9f9;
}
.clone {
	position:absolute;
	top:0;
	left:0;
	pointer-events:none;
}
.clone th, .clone td {
	visibility:hidden
}
.clone td, .clone th {
	border-color:transparent
}
.clone tbody th {
	visibility:visible;
	color:red;
}
.clone .fixed-side {
	border:1px solid #000;
	background:#eee;
	visibility:visible;
}
.clone thead, .clone tfoot{background:transparent;} */

/* .table-fixed thead {
  width: 97%;
}
.table-fixed tbody {
  height: 230px;
  overflow-y: auto;
  width: 100%;
}
.table-fixed thead, .table-fixed tbody, .table-fixed tr, .table-fixed td, .table-fixed th {
  display: block;
}
.table-fixed tbody td, .table-fixed thead > tr> th {
  float: left;
  border-bottom-width: 0;
} */

/* 
table {
    width: 100%;
}

thead, tbody, tr, td, th { display: block; }

tr:after {
    content: ' ';
    display: block;
    visibility: hidden;
    clear: both;
}

thead th {
    height: 30px;

    /*text-align: left;*/
}

tbody {
    height: 120px;
    overflow-y: auto;
}

thead {
    /* fallback */
}


tbody td, thead th {
    width: 19.2%;
    float: left;
}
 */

</style>

<?php
$group_dates = LabResult::find()
->where(['patient_id' => '817452'])
->groupBy(['checkin_date'])
->orderBy(['checkin_date' => SORT_DESC])->limit(4)->all();
 ?>
 <div id="table-scroll" class="table-scroll">
   <div class="table-wrap">
     <table class="main-table table table-bordered table-fixed">
<thead>
  <tr>
    <th class="fixed-side">#</th>
    <th>Lis Code</th>
    <th>Test</th>
    <th>Normal Range</th>
    <?php foreach ($group_dates  as $th):?>
    <th><?=FormatYear::toThai($th->checkin_date);?></th>
  <?php endforeach;?>

  </tr>
</thead>
<tbody>

  <?php $num = 1;foreach ($query as $model) :?>
  <tr>
      <!-- <th class="fixed-side">Left Column</th> -->
    <th class="fixed-side"><?=$num++;?></hh>
    <th class="fixed-side"><?php //$model->lis_code;?></th>
    <th class="fixed-side"><?php //$model->test;?></th>
    <th class="fixed-side"><?php //$model->normal_range;?></th>
    <?php foreach ($group_dates  as $group_date):?>
     <td>
        <?php
        // $data  = $group_date->checkin($group_date->patient_id,$model->lis_code,$group_date->checkin_date);
        //   echo count($data) > 0 ?  $data->result : '-';
         ?>
       </td>
   <?php endforeach;?>

  <?php endforeach;?>
  </tr>
</tbody>
</table>
</div>
</div>
<?php
$js = <<< JS

   // $(".main-table").clone(true).appendTo('#table-scroll').addClass('clone');

JS;
$this->registerJS($js);

 ?>
