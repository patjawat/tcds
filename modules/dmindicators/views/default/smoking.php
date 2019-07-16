<?php
use yii\helpers\Json;
use app\components\PatientHelper;
use app\components\FormatYear;
$hn = PatientHelper::getCurrentHn();
$vn = PatientHelper::getCurrentVn();
use yii\helpers\ArrayHelper;
use yii\helpers\Html;


?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fas fa-list-ul"></i>  Last Smoking</h3>
    </div>
    <div class="panel-body shadow">

        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>วันที่</th>
                    <th>Smoking</th>
                    <th>How long ago?</th>
                </tr>
            </thead>
            <tbody>
            <?php if($hn):?>
                <?php foreach($model as $model):?>

                <tr>
                    <td><?=FormatYear::toThai($model->created_at);?></td>
                    <td>
                        <?php 
                $array = Json::decode($model->smoking);
                echo Html::checkboxList('smoking_check', ArrayHelper::toArray($array['check']), $model->getItemSmoking(), ['item'=>function ($index, $label, $name, $checked, $value){
                    return Html::checkbox($name, $checked, [
                       'value' => $value,
                       'label' => $label,
                       'class' => 'any class',
                    ]);
                }]);
                ?>
                    </td>
                    <td>
                        <?php 
                $array = Json::decode($model->smoking);
                echo Html::checkboxList('smoking_check_how_long_ago', ArrayHelper::toArray($array['check_how_long_ago']), $model->getItemHowLongAgo(), ['item'=>function ($index, $label, $name, $checked, $value){
                    return Html::checkbox($name, $checked, [
                       'value' => $value,
                       'label' => $label,
                    //    'class' => 'inline checkbox',
                    ]);
                }]);
                ?>
                    </td>
                </tr>
                <?php endforeach;?>
            <?php endif;?>
            </tbody>
        </table>


    </div>
</div>