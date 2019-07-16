<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\doctorworkbench\models\DfCharge */
?>
<div class="df-charge-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
        ],
    ]) ?>

</div>
