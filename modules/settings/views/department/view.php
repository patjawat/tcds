<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\settings\models\CDepartment */
?>
<div class="cdepartment-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'code',
            'name',
        ],
    ]) ?>

</div>
