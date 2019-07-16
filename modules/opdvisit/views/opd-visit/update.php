<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\opdvisit\models\OpdVisit */

$this->title = 'Update Opd Visit: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Opd Visits', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="opd-visit-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
