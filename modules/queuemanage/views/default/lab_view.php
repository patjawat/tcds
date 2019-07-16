<?php
use yii\helpers\Html;
?>
<?php $i = 1;foreach($model as $lab):?>
<tr>
    <td><?=$i++;?></td>
    <td><?=$lab->lab_name;?></td>
    <td><?=$lab->lab_result;?></td>
    <td><?=$lab->standard_result;?></td>
    <td></td>
</tr>
<?php endforeach;?>