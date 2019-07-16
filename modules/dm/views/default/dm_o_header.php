<?php
use yii\helpers\Html;
use app\components\PatientHelper;

$qr = $model->hn.'-'.$model->vn;
?>

<table width="100%" style="margin-left:90px;">
    <tr>
        <td width="33%"><?=Html::img(Yii::getAlias('@app/web/img/').'logo-01.png', ['width' => 130])?></td>
        <!-- <td width="33%" align="center">DM ASSESSMENT TODAY</td> -->
        <td width="33%" align="center"><?=$title;?></td>
        <td width="33%" style="text-align: right;">{PAGENO}/{nbpg}</td>
    </tr>
</table>
<table class="table table-hover" border="0">

    <tr>
        <td width="1">
            <barcode code="<?=$qr?>" type="QR" size="0.7" error="M" disableborder="1" style="margin-left:1%;margin-top:-30px;" />

        </td>
        <td>
            <table style="margin-left: 2px;font-size: 13px;">
                <tr>
                    <td width="30">NAME</b></td>
                    <td><u><b><?=$model->patient->prefix.$model->patient->fname.' '.$model->patient->lname;?></b></u>
                    </td>
                    <td width="30">HN</td>
                    <td><u><b><?=$model->hn;?></b></u></td>
                    <td>SEX</td>
                    <td><u><b><?=$model->patient->sex = 'M'? 'ชาย' : 'หญิง';?></b></u></td>
                    <td width="30">AGE</td>
                    <td><u><b><?=$model->patient->PatientAge($model->patient->birthday_date);?></b></td>
                    <td width="80">BIRTH DATE</td>
                    <td width="30"><u><b><?=PatientHelper::masterDateToThaiDate($model->patient->birthday_date);?></b></td>
                    <td width="30">VN</td>
                    <td><u><b><?=$model->vn;?></b></td>
                </tr>
            </table>
            <table style="margin-left: 2px;font-size: 13px;">
                <tr>
                    <td>DATE</td>
                    <td><u><b><?=PatientHelper::masterDateToThaiDate($model->service_start_date);?></b></u></td>
                    <td>RECORDER</td>
                    <td align="right"><b>______________________________</b></td>
                </tr>
            </table>


        </td>
    </tr>

</table>
