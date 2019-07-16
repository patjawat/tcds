<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\doctorworkbench\models\CDiagtext */
?>
<div class="cdiagtext-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'text',
            'use',
        ],
    ]) ?>

</div>
