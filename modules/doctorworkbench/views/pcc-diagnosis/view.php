<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\doctorworkbench\models\PccDiagnosis */
?>
<div class="pcc-diagnosis-view">
 
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
            'icd_code',
            'icd_name',
            'diag_type',
            'data_json',
            'last_update',
        ],
    ]) ?>

</div>
