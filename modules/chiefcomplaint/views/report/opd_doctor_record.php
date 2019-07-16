<?php
use yii\helpers\Html;
use app\components\PatientHelper;
use app\components\DateTimeHelper;

?>

<barcode code="<?=$qr1?>" type="QR" size="0.7" error="M" disableborder = "1" style="margin-left:2%"/>
<div class="" style="position: absolute;left:2px;border: 1px solid #000;height:95%;width:73%;margin-left:90px;">

<table width="100%" height="100%" border="0" style="width: 100%;margin: auto;margin-left: 1px;">
<tr>
<td>
<table width="100%">
<tr>
<td width="20%"><?=Html::img(Yii::getAlias('@app/web/img/').'logo-01.png', ['width' => 130])?></td>
<td align="center" width="80%"><b>OPD RECORD DOCTOR</b></td>
</tr>
</table>
</td>
</tr>

<tr>
<td>
<table style="margin-left: 2px;">
	<tr>
		<td>NAME</td>
		<td><?=$model->patient->prefix.$model->patient->fname.' '.$model->patient->lname;?></td>
		<td>HN</td>
		<td><?=$model->hn;?></td>
		<td>SEX</td>
		<td><?=$model->patient->sex = 'M'? 'ชาย' : 'หญิง';?></td>
		<td>AGE</td>
		<td><?=$model->patient->PatientAge($model->patient->birthday_date);?></td>
		<td>BIRTH DATE</td>
		<td><?=PatientHelper::masterDateToThaiDate($model->patient->birthday_date);?></td>
		<td>VN</td>
		<td><?=$model->vn;?></td>
	</tr>
</table>
<table style="margin-left: 2px;">
	<tr>
		<td>DATE</td>
		<td></td>
		<td>CLINIC</td>
		<td></td>
		<td>PHYSICIAN</td>
		<td></td>
		<td>ATTENDING PHYSICIAN</td>
		<td></td>
	</tr>
</table>
<table style="margin-left: 2px;">
	<tr>
		<td>PRIVIOUS ADR</td>
		<td>N</td>
		<td>Y</td>
		<td>DM STAGE</td>
		<td></td>
		<td>CVD RISK(THAI)</td>
		<td></td>
	</tr>
	<tr>
		<td>TYPE OF PATIENT</td>
		<td colspan="2"></td>
		<td>DM RISK</td>
		<td></td>
		<td>CVD RISK(ACC)</td>
		<td></td>
	</tr>
</table>
</td>
</tr>

<tr>
<td>
<table width="100%"  border="0">
	<tr>
		<td colspan="9" align="center">VITAL SIGNS AND CONTOUR OF PATIENT</td>
		<td colspan="6" align="center">NURSING ASSESSMENT AND CHIEF COMPLAINT</td>
	</tr>
	<tr>
		<td>BT</td>
		<td> </td>
		<td>C</td>
		<td>BW</td>
		<td> </td>
		<td>kg</td>
		<td>WC</td>
		<td> </td>
              	<td>cm</td>

		<td>Triage</td>
		<td colspan="3"></td>
		<td>Access</td>
		<td></td>
	</tr>
	<tr>
              	<td>BP</td>
		<td> </td>
              	<td>mm</td>
		<td>Ht.</td>
              	<td> </td>
              	<td>cm</td>
		<td>IC</td>
              	<td> </td>
              	<td>cm</td>

		<td>Pain Score</td>
		<td>(Adult)</td>
		<td></td>
		<td>(Child)</td>
		<td></td>
		<td colspan="2"></td>
	</tr>
	<tr>
              	<td>PR</td>
              	<td> </td>
              	<td>/min</td>
		<td>BMI</td>
              	<td> </td>
              	<td></td>
		<td>EC</td>
              	<td> </td>
              	<td>cm</td>

		<td colspan="6">CC</td>
	</tr>
	<tr>
		<td>RR</td>
		<td> </td>
		<td>/min</td>
		<td>IBW</td>
		<td> </td>
		<td>kg</td>
		<td>HC</td>
		<td> </td>
		<td>cm</td>

		<td colspan="6"></td>
	</tr>
	<tr>
		<td>O2sat</td>
		<td> </td>
		<td>%</td>
		<td colspan="3"></td>
		<td colspan="3"></td>

		<td colspan="6"></td>
	</tr>
</table>	
</td>
</tr>

<tr>
<td>
<table class="table table-bordered" width="100%" border="1">
    <tr>
        <td colspan="17" align="center">SELECTED LAB RESULTS : PREVIOUS AND UPDATE</td>
    </tr>
    <tr>
        <th align="center">DATE</th>
        <th align="center">PG</th>
        <th align="center">A1C</th>
        <th align="center">Cr</th>
        <th align="center">eGFR</th>
        <th align="center">TC</th>
        <th align="center">TG</th>
        <th align="center">HDL-C</th>
        <th align="center">LDL-C</th>
        <th align="center">noneLDL-C</th>
        <th align="center">MAU</th>
        <th align="center">T3</th>
        <th align="center">FT3</th>
        <th align="center">T4</th>
        <th align="center">FT4</th>
        <th align="center">TSH</th>
        <th align="center">Tg</th>
    </tr>
    <?php foreach ($labs as $lab):?>
    <tr>
        <td>
            <?php
            PatientHelper::masterDateToThaiDate($lab->checkin_date).' '.$lab->checkin_time;
            echo $lab->checkin_date.' '.$lab->checkin_time;
            ?>
            </td>
        <td align="center"><?=$lab->ResultReport($lab->patient_id,$lab->checkin_date,$lab->checkin_time,'10020')?></td>
        <td align="center"><?=$lab->ResultReport($lab->patient_id,$lab->checkin_date,$lab->checkin_time,'10890')?></td>
        <td align="center"><?=$lab->ResultReport($lab->patient_id,$lab->checkin_date,$lab->checkin_time,'10045')?></td>
        <td align="center"><?=$lab->ResultReport($lab->patient_id,$lab->checkin_date,$lab->checkin_time,'10050')?></td>
        <td align="center"><?=$lab->ResultReport($lab->patient_id,$lab->checkin_date,$lab->checkin_time,'10060')?></td>
        <td align="center"><?=$lab->ResultReport($lab->patient_id,$lab->checkin_date,$lab->checkin_time,'10080')?></td>
        <td align="center"><?=$lab->ResultReport($lab->patient_id,$lab->checkin_date,$lab->checkin_time,'10090')?></td>
        <td align="center"><?=$lab->ResultReport($lab->patient_id,$lab->checkin_date,$lab->checkin_time,'10100')?></td>
        <td align="center"><?=$lab->ResultReport($lab->patient_id,$lab->checkin_date,$lab->checkin_time,'109060')?></td>
        <td align="center"><?=$lab->ResultReport($lab->patient_id,$lab->checkin_date,$lab->checkin_time,'10720')?></td>
        <td align="center"><?=$lab->ResultReport($lab->patient_id,$lab->checkin_date,$lab->checkin_time,'20010')?></td>
        <td align="center"><?=$lab->ResultReport($lab->patient_id,$lab->checkin_date,$lab->checkin_time,'20020')?></td>
        <td align="center"><?=$lab->ResultReport($lab->patient_id,$lab->checkin_date,$lab->checkin_time,'20030')?></td>
        <td align="center"><?=$lab->ResultReport($lab->patient_id,$lab->checkin_date,$lab->checkin_time,'20040')?></td>
        <td align="center"><?=$lab->ResultReport($lab->patient_id,$lab->checkin_date,$lab->checkin_time,'20050')?></td>
        <td align="center"><?=$lab->ResultReport($lab->patient_id,$lab->checkin_date,$lab->checkin_time,'20310')?></td>

    </tr>
<?php endforeach;?>
</table>
</td>
</tr>

<tr>
<td>
<table width="100%" border="0">

<?php  $x = 1; while($x <= 25):?>

  <?php $x++?>;
  <tr >
    <td style="border-bottom-style:dotted;border-bottom-width: 1.5px;"> &nbsp;</td>
</tr>
<?php endwhile;?> 

</table>
</td>
</tr>

<tr>
<td align="center"><br>Physician's Signature ___________________________ MD.( _____________________________ )</td>
</tr>

<tr>
<td align="center">CHECK-OUT STATUS</td>
</tr>

<tr>
<td>
<table border="1">
<tr>
<td>
<table>
<tr>
<td>FU</td>
<td>N</td>
<td>Y</td>
<td>Date&Time</td>
<td colspan="2"></td>
</tr>
<tr>
<td colspan="2">consult</td>
<td>Today</td>
<td>FU</td>
<td>1.</td>
<td>(__/__/____)</td>
</tr>
<tr>
<td colspan="4"></td>
<td>2.</td>
<td>(__/__/____)</td>
</tr>
<tr>
<td colspan="4"></td>
<td>3.</td>
<td>(__/__/____)</td>
</tr>
<tr>
<td colspan="1">ADMIT</td>
<td colspan="2">Today</td>
<td colspan="2">Appointment Date</td>
<td></td>
</tr>
</table>
</td>
<td>
<table>
<tr>
<td>Investigation request Next Visit</td>
<td></td>
</tr>
<tr>
<td colspan="2"></td>
</tr>
<tr>
<td colspan="2"></td>
</tr>
<tr>
<td colspan="2"></td>
</tr>
</table>
</td>
<td>
<table>
<tr>
<td>Assistant Signature</td>
<tr>
<td>____________</td>
</tr>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>

</td>
</tr>

</table>
<table width="100%">
<tr>
<td width="90%">หมายเหตุ : แพทย์บันทึกต่อหน้า 2 หรือบันทึกแยกใน DOCTOR RECORD ได้</td>
<td align="right">PAGE</td>
</tr>
</table>
</div>

<!-- ขึ้นหน้าใหม่ -->
<?php  $x = 1; while($x <= 50):?>
  <?php $x++?>
<br/>
<?php endwhile;?> 
<!-- จบ loop -->

<h1>หน้าใหม่</h1>