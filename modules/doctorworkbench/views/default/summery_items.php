<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
?>

<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th>รายการ</th>
            <th>จำนวน</th>
            <th>ค่าบริการ</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($diagDataProvider->getModels()  as $diag):?>
        <tr>
            <td>
            <?=$diag->icd10tm->diagtname;?>
            <code> <?=$diag->icd10tm->diagename;?></code>
           
            </td>
            <td></td>
            <td></td>
        </tr>
    <?php endforeach;?>
    <?php foreach($medicationDataProvider->getModels()  as $med):?>
        <tr>
            <td>
            <?=$med->drugitems->therapeutic;?>
            <code><?=$med->drugitems->name;?></code>
            </td>
            <td><?=$med->qty;?></td>
            <td></td>
           
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
