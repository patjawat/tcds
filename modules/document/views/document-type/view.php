<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\document\models\DocumentType */
?>
<div class="document-type-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
        ],
    ]) ?>

</div>
