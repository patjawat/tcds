<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\document\models\DocumentQrType */
?>
<div class="document-qr-type-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'other_type',
        ],
    ]) ?>

</div>
