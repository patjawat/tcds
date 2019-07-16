<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\lab\models\Preorderlab */

$this->title = 'Update Preorderlab: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Preorderlabs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="preorderlab-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
