<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\lab\models\LabGroup */

$this->title = 'Create Lab Group';
$this->params['breadcrumbs'][] = ['label' => 'Lab Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lab-group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
