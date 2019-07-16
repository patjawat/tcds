<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\emr\models\MDocument */

$this->title = 'Update M Document: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'M Documents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mdocument-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
