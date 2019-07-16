<?php
use yii\helpers\Html;
use app\components\PatientHelper;
$qr = $model->hn.'-'.$model->vn;
?>

<barcode code="<?=$qr?>" type="QR" size="0.7" error="M" disableborder = "1" style="margin-left:2%"/>
<div class="" style="position: absolute;left:2px;border: 1px solid #000;height:95%;width:73%;margin-left:90px;">
<!-- ------------------------------------------------break---------------------------------------------------------- --> 
<table width="100%" height="100%" border="0" style="width: 100%;margin: auto;margin-left: 1px;">
<tr>
<td>
<table width="100%">
<tr>
<td width="20%"><?=Html::img(Yii::getAlias('@app/web/img/').'logo-01.png', ['width' => 130])?></td>
<td align="center" width="80%"><b>New DM History</b></td>
</tr>
</table>
</td>
</tr>
<!-- ------------------------------------------------break---------------------------------------------------------- --> 
<tr>
<td>
<table style="margin-left: 2px;">
	<tr>
		<td>NAME</b></td>
		<td><u><?=$model->patient->prefix.$model->patient->fname.' '.$model->patient->lname;?></u></td>
		<td>HN</td>
		<td><u><?=$model->hn;?></u></td>
		<td>SEX</td>
		<td><u><?=$model->patient->sex = 'M'? 'ชาย' : 'หญิง';?></u></td>
		<td>AGE</td>
		<td><u><?=$model->patient->PatientAge($model->patient->birthday_date);?></td>
		<td>BIRTH DATE</td>
		<td><u><?=PatientHelper::masterDateToThaiDate($model->patient->birthday_date);?></td>
		<td>VN</td>
		<td><u><?=$model->vn;?></td>
	</tr>
</table>
<table style="margin-left: 2px;">
	<tr>
		<td>DATE</td>
		<td><u><?=PatientHelper::masterDateToThaiDate($model->service_start_date);?></u></td>
		<td>RECORDER</td>
		<td><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td align="right">Diabetes Educator Record</td>
	</tr>
</table>
</td>
</tr>
<!-- ------------------------------------------------break---------------------------------------------------------- --> 
<tr>
<td>
<?=Html::img(Yii::getAlias('@app/web/img/').'blank01.png', ['width' => 1000])?>
</td>
</tr>
<!-- ------------------------------------------------break---------------------------------------------------------- --> 
<tr>
<td align="left" width="90%"><br>Recorder's Signature ___________________________ ( _____________________________ )</td>
<td width="10%"></td>
</tr>
<!-- ------------------------------------------------break---------------------------------------------------------- --> 
</table>
<!-- ------------------------------------------------break---------------------------------------------------------- --> 
</div>
