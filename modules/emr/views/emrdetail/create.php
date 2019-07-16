<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\emr\models\PccService */

$this->title = 'Create Pcc Service';
$this->params['breadcrumbs'][] = ['label' => 'Pcc Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pcc-service-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
