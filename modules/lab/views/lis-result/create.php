<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\lab\models\LisResult */

$this->title = 'Create Lis Result';
$this->params['breadcrumbs'][] = ['label' => 'Lis Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lis-result-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
