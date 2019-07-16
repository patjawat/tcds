<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\document\models\Documentqr */

$this->title = 'Create Documentqr';
$this->params['breadcrumbs'][] = ['label' => 'Documentqrs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documentqr-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
