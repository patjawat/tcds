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
<div class="" style="padding: 8px;">
<?php
$mau = LabResult::find()->where(['patient_id' => $hn,'lis_code' => '10720'])->orderby(['checkin_date' => SORT_DESC])->all();
$urine_p = LabResult::find()->where(['patient_id' => $hn,'lis_code' => '10630'])->orderby(['checkin_date' => SORT_DESC])->all();
$urine_c = LabResult::find()->where(['patient_id' => $hn,'lis_code' => '10475'])->orderby(['checkin_date' => SORT_DESC])->all();
$seurm = LabResult::find()->where(['patient_id' => $hn,'lis_code' => '10045'])->orderby(['checkin_date' => SORT_DESC])->all();
$egfr = LabResult::find()->where(['patient_id' => $hn,'lis_code' => '10050'])->orderby(['checkin_date' => SORT_DESC])->all();
?>

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
      <td>MAU <?php echo count($mau)?></td>
      <td><?=$mau ? $mau[0]->result : '';?> <?=$mau ? $mau[0]->unit : '-';?></td>
      <td><?=$mau ? FormatYear::ymd($mau[0]->checkin_date) : '-';?></td>
      <td><?=$mau ? FormatYear::toThai($mau[0]->checkin_date) : '-';?></td>
      <td><?=$mau ? (count($mau) > 1 ? $mau[1]->result : ' ') : '-';?></td>
      <td><?=$mau ? (count($mau) > 1 ? FormatYear::toThai($mau[1]->checkin_date) : '' ): '-';?></td>
      <td><?=$mau ? (count($mau) > 2 ? $mau[2]->result : ''): '-';?></td>
      <td><?=$mau ? (count($mau) > 2 ? FormatYear::toThai($mau[2]->checkin_date) : '') : '-';?></td>
    </tr>
    <tr>
      <td>Urine Protein</td>
      <td><?=$urine_p ? $urine_p[0]->result : '';?> <?=$urine_p ? $urine_p[0]->unit : '-';?></td>
      <td><?=$urine_p ? FormatYear::ymd($urine_p[0]->checkin_date) : '-';?></td>
      <td><?=$urine_p ? FormatYear::toThai($urine_p[0]->checkin_date) : '-';?></td>
      <td><?=$urine_p ? (count($urine_p) > 1 ?$urine_p[1]->result : '') : '-';?></td>
      <td><?=$urine_p ? (count($urine_p) > 0 ? FormatYear::toThai($urine_p[1]->checkin_date) : '') : '-';?></td>
      <td><?=$urine_p ? (count($urine_p) > 2 ? $urine_p[2]->result : '') : '-';?></td>
      <td><?=$urine_p ? (count($urine_p) > 2 ? FormatYear::toThai($urine_p[2]->checkin_date) : '') : '-';?></td>
    </tr>
    <tr>
      <td>Urine Creatinine</td>
      <td><?=$urine_c ? $urine_c[0]->result : '';?> <?=$urine_c ? $urine_c[0]->unit : '-';?></td>
      <td><?=$urine_c ? FormatYear::ymd($urine_c[0]->checkin_date) : '-';?></td>
      <td><?=$urine_c ? FormatYear::toThai($urine_c[0]->checkin_date) : '-';?></td>
      <td><?=$urine_c ? (count($urine_c) > 1 ?$urine_c[1]->result : '' ): '-';?></td>
      <td><?=$urine_c ? (count($urine_c) > 1 ?FormatYear::toThai($urine_c[1]->checkin_date) : '') : '-';?></td>
      <td><?=$urine_c ? (count($urine_c) > 2 ? $urine_c[2]->result : '') : '-';?></td>
      <td><?=$urine_c ? (count($urine_c) > 2 ? FormatYear::toThai($urine_c[2]->checkin_date) : '') : '-';?></td>
    </tr>
    <tr>
      <td>Seurm Creatinine</td>
      <td><?=$seurm ? $seurm[0]->result : '-';?> <?=$seurm ? $seurm[0]->unit : '-';?></td>
      <td><?=$seurm ? FormatYear::ymd($seurm[0]->checkin_date) : '-';?></td>
      <td><?=$seurm ? FormatYear::toThai($seurm[0]->checkin_date) : '-';?></td>
      <td><?=$seurm ? (count($seurm) > 1 ? $seurm[1]->result : '' ) : '-';?></td>
      <td><?=$seurm ? (count($seurm) > 1 ? FormatYear::toThai($seurm[1]->checkin_date) : '' ) : '-';?></td>
      <td><?=$seurm ? (count($seurm) > 1 ? $seurm[2]->result : '-') : '-';?></td>
      <td><?=$seurm ? (count($seurm) > 1 ? FormatYear::toThai($seurm[2]->checkin_date)  : '-') : '-';?></td>
    </tr>
    <tr>
      <td>eGFR</td>
      <td><?=$egfr ? $egfr[0]->result : '-';?> <?=$egfr ? $egfr[0]->unit : '-';?></td>
      <td><?=$egfr ? FormatYear::ymd($egfr[0]->checkin_date) : '-';?></td>
      <td><?=$egfr ? FormatYear::toThai($egfr[0]->checkin_date) : '-';?></td>
      <td><?=$egfr ? (count($egfr) > 1 ? $egfr[1]->result : '' ) : '-';?></td>
      <td><?=$egfr ? (count($egfr) > 1 ? FormatYear::toThai($egfr[1]->checkin_date) : '') : '-';?></td>
      <td><?=$egfr ? (count($egfr) > 2  ? $egfr[2]->result : '-')  : '-';?></td>
      <td><?=$egfr ? (count($egfr) > 2 ? FormatYear::toThai($egfr[2]->checkin_date)  : '-') : '-';?></td>
    </tr>

  </tbody>
</table>

</div>
