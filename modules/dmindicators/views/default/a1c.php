<?php
use app\modules\lab\models\LabResult;
use app\components\PatientHelper;
use app\components\FormatYear;
$hn = PatientHelper::getCurrentHn();
$vn = PatientHelper::getCurrentVn();
$model = LabResult::find()->where(['patient_id' => $hn,'lis_code' => '10890'])->orderby(['checkin_date' => SORT_DESC])->all();


?>
<br>

<style>
.p-buttom{
    border-bottom-style: dotted;
    border-color: #1d89ff;
    border-bottom-width: thin;
    width: 100px;
}
</style>

 <div class="panel panel-default">
       <div class="panel-heading">
             <h3 class="panel-title"><i class="fas fa-list-ul"></i>  A1C</h3>
       </div>
       <div class="panel-body">

 <table class="table table-bordered table-hover">
     <thead>
         <tr>
             <th>Result</th>
             <th>ทำมาแล้วเมื่อ</th>
             <th>วันที่</th>
             <th>Previous Result</th>
             <th>Remote Result</th>
         </tr>
     </thead>
     <tbody>
         <tr>
             <td style="background-color: #ff59db1a;">
             <?=$model ? $model[0]->result : '-';?> <?=$model ? $model[0]->unit : '-';?>
             </td>
             <td style="background-color: #ff59db1a;">
             <?=$model ? FormatYear::ymd($model[0]->checkin_date) : '-';?>
             </td>
             <td style="background-color: #ff59db1a;">
             <?=$model ? FormatYear::toThai($model[0]->checkin_date) : '-';?>
             </td>
             <td>
             <?=count($model) > 1 ? $model[1]->result : '-';?> <?=count($model) > 1 ? $model[1]->unit : '';?>
             </td>
             <td>
             <?=count($model) > 1  ? $model[2]->result : '-';?> <?=count($model) > 1 ? $model[2]->unit : '';?>
             </td>
         </tr>
     </tbody>
 </table>
 

       </div>
 </div>
 
 