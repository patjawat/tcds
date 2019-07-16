<?php

use app\components\PatientHelper;
use yii\widgets\DetailView;
use app\components\loading\ShowLoading;

echo ShowLoading::widget();
$hn = PatientHelper::getCurrentHn();
$this->params['pt_title'] = PatientHelper::getPatientTitleByHn($hn);
?>

<div class="panel panel-success">
    <div class="panel-heading">
        <h4><i class="fa fa-sticky-note-o" aria-hidden="true"></i> Patient Entry </h4>            
    </div>
    <div class="panel-body">
        <div  style="margin-bottom: 3px">
            <button class="btn btn-default">Open Service</button>
            <button class="btn btn-default">Vital Sign</button>
            <button class="btn btn-default" >CC</button>
            <button class="btn btn-default" >DM</button>
        </div>
        <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                'hn',
                'prename',
                'fname',
                'mname',
                'lname',
                'agey',
                'agem',
                'aged'
            ]
        ])
        ?>
    </div>
</div>







