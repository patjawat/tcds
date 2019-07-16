<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\opdvisit\models\OpdVisit */

$this->title = 'Create Opd Visit';
$this->params['breadcrumbs'][] = ['label' => 'Opd Visits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="opd-visit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
