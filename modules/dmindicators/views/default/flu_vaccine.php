<?php
use app\modules\dmindicators\models\DmIndicators;
use app\components\PatientHelper;
use app\components\FormatYear;
$hn = PatientHelper::getCurrentHn();
$vn = PatientHelper::getCurrentVn();

if($hn){

$model = DmIndicators::find()
->where(['hn' => $hn])
->andWhere(['NOT IN', 'vn', $vn])
->andWhere('JSON_CONTAINS(`flu_vaccine`,  \'{"out_hospital": "1"}\')')
->orderby(['created_at' => SORT_DESC])->all();
}

?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fas fa-list-ul"></i> Flu Vaccine</h3>
    </div>
    <div class="panel-body shadow">


        <table class="table table-bordered table-hover table-striped" style="background-color: #fff;">
            <thead>
                <tr>
                    <th>ทำมาแล้ว</th>
                    <th>วันที่</th>

                </tr>
            </thead>
            <tbody>
                <?php if($hn):?>
                <?php foreach($model as $model):?>
                <tr>
                    <td><?=FormatYear::ymd($model->created_at);?></td>
                    <td><?=FormatYear::toThai($model->created_at);?></td>
                </tr>
                <?php endforeach;?>
                <?php endif;?>
            </tbody>
        </table>


    </div>
</div>