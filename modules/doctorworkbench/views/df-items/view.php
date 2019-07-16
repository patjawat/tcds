<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\doctorworkbench\models\DfItems */
?>
<div class="df-items-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'charge_id',
            'receipt_id',
            'df_charge_id',
            'df_receipt_id',
        ],
    ]) ?>

</div>
