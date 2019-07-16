<?php
use app\modules\doctorworkbench\models\Diagnosis;
use app\modules\chiefcomplaint\models\Chiefcomplaint;
use app\components\PatientHelper;
use app\components\FormatYear;
$hn = PatientHelper::getCurrentHn();
$vn = PatientHelper::getCurrentVn();
$model = Diagnosis::find()->where(['hn' => $hn])->limit(5)->all();

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
             <h3 class="panel-title"><i class="fas fa-list-ul"></i>  BP</h3>
       </div>
       <div class="panel-body">

 <table class="table table-bordered table-hover">
     <thead>
         <tr>
             <th>confirm BP</th>
             <th>ทำมาแล้วเมื่อ</th>
             <th>วันที่</th>
             <th>Previous Result</th>
             <th>Remote Result</th>
         </tr>
     </thead>
     <tbody>
         <tr>
             <td style="background-color: #ff59db1a;">
             <span class="p-buttom"><?=$model ? $model[0]->bp1_confirm : '-';?></span> / <span  class="p-buttom"><?=$model ? $model[0]->bp2_confirm : '';?></span>
             </td>
             <td style="background-color: #ff59db1a;">
             <?php
             $cf0 = Chiefcomplaint::find()->where(['vn' => $model ? $model[0]->vn : 0])->one();
             echo $cf0 ? FormatYear::ymd($cf0->date_service) : '-';
            ?>
             </td>
             <td style="background-color: #ff59db1a;">
             <?=$cf0 ? FormatYear::toThai($cf0->date_service) : '-'?>
             </td>
             <td>
             <?php
             $cf1 = Chiefcomplaint::find()->where(['vn' => $model ? $model[1]->vn : 0])->one();
            echo $cf1 ? FormatYear::ymd($cf1->date_service) : '-';
            ?>
             </td>
             <td>
             <?php
             $cf2 = Chiefcomplaint::find()->where(['vn' => $model ? $model[2]->vn : 0])->one();
            echo $cf2 ? FormatYear::ymd($cf2->date_service) : '-';
            ?>
             </td>
         </tr>
     </tbody>
 </table>
 

       </div>
 </div>
 
 