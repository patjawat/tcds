<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\doctorworkbench\models\GatewayCDrugdose */
?>
<div class="gateway-cdrugdose-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'hospcode',
            'drugcode',
            'doseno',
            'dosedescription',
            'doseprefix',
        ],
    ]) ?>

</div>
