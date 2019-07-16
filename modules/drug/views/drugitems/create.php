<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\drug\models\Drugitems */

$this->title = 'Create Drugitems';
$this->params['breadcrumbs'][] = ['label' => 'Drugitems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="drugitems-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
