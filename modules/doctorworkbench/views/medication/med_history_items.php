<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use app\modules\doctorworkbench\models\Medication;
use app\components\FormatYear;
?>



<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>#</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($OpdVisit as $mainModel):?>
        <tr>
            <td>
            <?=Html::checkbox($mainModel->id).'  <span class="label label-primary"> <i class="fas fa-calendar-alt"></i> '.FormatYear::toThai($mainModel->service_start_date).' </span>' ;?>
            </td>
        </tr>
        <?php $subQuery = Medication::find()->where(['pcc_vn' => $mainModel->pcc_vn])->all();?>
        <?php foreach ($subQuery as $subModel):?>
        <tr>
            <td>
            <?php
            echo Html::checkbox($subModel->icode).'  '.$subModel->drugitems->name.' '.$subModel->drugitems->strength.' '.$subModel->drugitems->units;
            ?>
            </td>
        </tr>
        <?php endforeach;?>

    <?php endforeach;?>
       
    </tbody>
</table>