<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\doctorworkbench\models\PccProcedure */
?>
<div class="pcc-procedure-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'hn',
            'vn',
            'provider_code',
            'provider_name',
            'date_service',
            'time_service',
            'procedure_code',
            'procedure_name',
            'start_date',
            'start_time',
            'end_date',
            'end_time',
            'procedure_price',
            'data_json',
            'last_update',
            'doctor',
        ],
    ]) ?>

</div>
