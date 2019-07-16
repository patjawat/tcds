<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\emr\models\PccService */

$this->title = 'Update Pcc Service: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pcc Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pcc-service-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
