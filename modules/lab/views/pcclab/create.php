<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\lab\models\Pcclab */

$this->title = 'Create Pcclab';
$this->params['breadcrumbs'][] = ['label' => 'Pcclabs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pcclab-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
