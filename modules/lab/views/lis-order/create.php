<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\lab\models\LisOrder */

$this->title = 'Create Lis Order';
$this->params['breadcrumbs'][] = ['label' => 'Lis Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lis-order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
