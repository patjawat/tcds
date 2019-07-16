<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\doctorworkbench\models\PccMedication */
?>
<div class="pcc-medication-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'vn',
            'hn',
            'an',
            'icode',
            'qty',
            'unitprice',
            'costprice',
            'totalprice',
            'provider_code',
            'provider_name',
            'date_service',
            'time_service',
            'data_json',
        ],
    ]) ?>

</div>
