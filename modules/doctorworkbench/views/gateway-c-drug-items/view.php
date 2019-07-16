<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\doctorworkbench\models\GatewayCDrugItems */
?>
<div class="gateway-cdrug-items-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'hospcode',
            'hospname',
            'icode',
            'drug_name',
            'qty',
            'unit',
            'usage_line1',
            'usage_line2',
            'usage_line3',
            'tmt24_code',
            'costprice',
            'unitprice',
            'drugtype',
        ],
    ]) ?>

</div>
