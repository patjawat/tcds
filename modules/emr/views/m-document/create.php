<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\emr\models\MDocument */

$this->title = 'Create M Document';
$this->params['breadcrumbs'][] = ['label' => 'M Documents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mdocument-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
