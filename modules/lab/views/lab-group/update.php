<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\lab\models\LabGroup */

$this->title = 'Update Lab Group: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lab Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lab-group-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
