<?php
use app\modules\lab\models\LabResult;
use app\components\PatientHelper;
use app\components\FormatYear;
$hn = PatientHelper::getCurrentHn();
$loop = LabResult::find()->where(['patient_id' => $hn])->all();

?>



<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>รหัสผลตรวจ</th>
            <th>รหัสการตรวจของ LIS</th>
            <th width="70%">Normal Range</th>
            <th>Unit</th>
            <?php foreach ($loop as $key => $value):?>
            <th><?=FormatYear::toThai($value->checkin_date);?></th>
            <?php endforeach;?>
        </tr>
    </thead>
    <tbody>
    <?php  foreach ($data as $key => $model):?>
        <tr>
            <td><?php  echo $model['lis_code'];?></td>
            <td><?php  echo $model['test'];?></td>
            <td><?php  echo $model['normal_range'];?></td>
            <td><?php  //echo $model['unit'];?></td>
            <?php foreach ($loop as $key => $value):?>
            <td><?=$value->result;?></td>
            <?php endforeach;?>
        </tr>
    <?php  endforeach;?>

    </tbody>
</table>
<?php
$js = <<< JS

$('table').fixedTblHdrLftCol({
          scroll: {
            height: 200,
            width: 330,
            leftCol: {
              fixedSpan: 3
            }
          }
        });

JS;
$this->registerJS($js);
?>