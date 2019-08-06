<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\dmindicator\models\DmIndicators */

$this->title = 'Create Dm Indicators';
$this->params['breadcrumbs'][] = ['label' => 'Dm Indicators', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dm-indicators-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
