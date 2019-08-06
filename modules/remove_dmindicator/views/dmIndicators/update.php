<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\dmindicator\models\DmIndicators */

$this->title = 'Update Dm Indicators: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dm Indicators', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dm-indicators-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
