<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\lab\models\Preorderlab */

$this->title = 'Create Preorderlab';
$this->params['breadcrumbs'][] = ['label' => 'Preorderlabs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="preorderlab-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
