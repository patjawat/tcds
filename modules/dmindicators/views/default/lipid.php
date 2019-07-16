<?php
use app\modules\lab\models\LabResult;
use app\components\FormatYear;
use app\components\PatientHelper;
$hn = PatientHelper::getCurrentHn();

// $model = LabResult::find();
?>

<style>
/* table {
  border-collapse: collapse;
}

td, th {
  border: 1px solid Black;
  padding: 5px 15px;
}

thead > tr:nth-child(1) > th:nth-child(1) { background-color: Orchid; }
thead > tr:nth-child(1) > th:nth-child(2) { background-color: YellowGreen; }
thead > tr:nth-child(1) > th:nth-child(3) { background-color: Orange; }
thead > tr:nth-child(1) > th:nth-child(4) { background-color: red; }
thead > tr:nth-child(2) > th              { background-color: Gold; } */

</style>

<?php
$tc = LabResult::find()->where(['patient_id' => $hn,'lis_code' => '10070'])->orderby(['checkin_date' => SORT_DESC])->all();
$tg = LabResult::find()->where(['patient_id' => $hn,'lis_code' => '10080'])->orderby(['checkin_date' => SORT_DESC])->all();
$hdl_c = LabResult::find()->where(['patient_id' => $hn,'lis_code' => '10090'])->orderby(['checkin_date' => SORT_DESC])->all();
$hdl = LabResult::find()->where(['patient_id' => $hn,'lis_code' => '10100'])->orderby(['checkin_date' => SORT_DESC])->all();
$none_hdl_c = LabResult::find()->where(['patient_id' => $hn,'lis_code' => '109060'])->orderby(['checkin_date' => SORT_DESC])->all();
?>
<br>
<div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fas fa-list-ul"></i>  Lipid</h3>
            </div>
            <div class="panel-body shadow">

<table class="table table-bordered">
  <thead>
    <tr>
      <th rowspan="2">รายการ</th>
      <th colspan="3">Update Result</th>
      <th colspan="2">Previous Result</th>
      <th colspan="2">Remote Result</th>
    </tr>
    <tr>
      <th>Result     Unit</th>
      <th>ทำมาแล้วเมื่อ</th>
      <th>วดป.</th>
      <th>Result     Unit</th>
      <th>วดป.</th>
      <th>Result     Unit</th>
      <th>วดป.</th>
    </tr>

  </thead>
  <tbody>
    <tr>
      <td>TC</td>
      <td><?=$tc ? $tc[0]->result : '-';?> <?=$tc ? $tc[0]->unit : '';?></td>
      <td><?=$tc ? FormatYear::ymd($tc[0]->checkin_date) : '-';?></td>
      <td><?=$tc ? FormatYear::toThai($tc[0]->checkin_date) : '-';?></td>
      <td><?=$tc ? (count($tc) > 1 ?  $tc[1]->result : '')  : '-';?></td>
      <td><?=$tc ? (count($tc) > 1 ? FormatYear::toThai($tc[1]->checkin_date) : '') : '-';?></td>
      <td><?=$tc ? (count($tc) > 1 ? $tc[2]->result : '') : '-';?></td>
      <td><?=$tc ? (count($tc) > 1 ?  FormatYear::toThai($tc[2]->checkin_date) : '') : '-';?></td>
    </tr>
    <tr>
      <td>TG</td>
      <td><?=$tg ? $tg[0]->result : '-';?> <?=$tg ? $tg[0]->unit : '';?></td>
      <td><?=$tg ? FormatYear::ymd($tg[0]->checkin_date) : '-';?></td>
      <td><?=$tg ? FormatYear::toThai($tg[0]->checkin_date) : '-';?></td>
      <td><?=$tg ? (count($tg) > 1 ? $tg[1]->result : '') : '-';?></td>
      <td><?=$tg ? (count($tg) > 1 ? FormatYear::toThai($tg[1]->checkin_date) : '') : '-';?></td>
      <td><?=$tg ? (count($tg) > 1 ? $tg[2]->result : '') : '-';?></td>
      <td><?=$tg ? (count($tg) > 1 ? FormatYear::toThai($tg[2]->checkin_date) : '') : '-';?></td>
    </tr>
    <tr>
      <td>HDL-C</td>
      <td><?=$hdl_c ? $hdl_c[0]->result : '-';?> <?=$hdl_c ? $hdl_c[0]->unit : '';?></td>
      <td><?=$hdl_c ? FormatYear::ymd($hdl_c[0]->checkin_date) : '-';?></td>
      <td><?=$hdl_c ? FormatYear::toThai($hdl_c[0]->checkin_date) : '-';?></td>
      <td><?=$hdl_c ? (count($hdl_c) > 1 ? $hdl_c[1]->result : '') : '-';?></td>
      <td><?=$hdl_c ? (count($hdl_c) > 1 ? FormatYear::toThai($hdl_c[1]->checkin_date) : '') : '-';?></td>
      <td><?=$hdl_c ? (count($hdl_c) > 1 ? $hdl_c[2]->result : '') : '-';?></td>
      <td><?=$hdl_c ? (count($hdl_c) > 1 ? FormatYear::toThai($hdl_c[2]->checkin_date) : '') : '-';?></td>
    </tr>
    <tr>
      <td>HDL</td>
      <td><?=$hdl ? $hdl[0]->result : '-';?> <?=$hdl ? $hdl[0]->unit : '';?></td>
      <td><?=$hdl ? FormatYear::ymd($hdl[0]->checkin_date) : '-';?></td>
      <td><?=$hdl ? FormatYear::toThai($hdl[0]->checkin_date) : '-';?></td>
      <td><?=$hdl ? (count($hdl) > 1 ?  $hdl[1]->result : ''): '-';?></td>
      <td><?=$hdl ? (count($hdl) > 1 ? FormatYear::toThai($hdl[1]->checkin_date) : '') : '-';?></td>
      <td><?=$hdl ? (count($hdl) > 2 ? $hdl[2]->result : '-') : '-';?></td>
      <td><?=$hdl ? (count($hdl) > 2 ? FormatYear::toThai($hdl[2]->checkin_date)  : '-') : '-';?></td>
    </tr>
    <tr>
      <td>non-HDL-C</td>
      <td><?=$none_hdl_c ? $none_hdl_c[0]->result : '-';?> <?=$none_hdl_c ? $none_hdl_c[0]->unit : '';?></td>
      <td><?=$none_hdl_c ? FormatYear::ymd($none_hdl_c[0]->checkin_date) : '-';?></td>
      <td><?=$none_hdl_c ? FormatYear::toThai($none_hdl_c[0]->checkin_date) : '-';?></td>
      <td><?=$none_hdl_c ? (count($none_hdl_c) > 1 ? $none_hdl_c[1]->result : '') : '-';?></td>
      <td><?=$none_hdl_c ? (count($none_hdl_c) > 1 ? FormatYear::toThai($none_hdl_c[1]->checkin_date) : ''): '-';?></td>
      <td><?=$none_hdl_c ? (count($none_hdl_c) > 1  ? $none_hdl_c[2]->result : '-')  : '-';?></td>
      <td><?=$none_hdl_c ? (count($none_hdl_c) > 1 ? FormatYear::toThai($none_hdl_c[2]->checkin_date)  : '-') : '-';?></td>
    </tr>

  </tbody>
</table>

</div>
        </div>
