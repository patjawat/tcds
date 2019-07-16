<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\doctorworkbench\models\CIcd10tm */

$this->title = 'Update C Icd10tm: ' . $model->diagcode;
$this->params['breadcrumbs'][] = ['label' => 'C Icd10tms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->diagcode, 'url' => ['view', 'id' => $model->diagcode]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cicd10tm-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
