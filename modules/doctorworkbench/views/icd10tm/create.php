<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\doctorworkbench\models\CIcd10tm */

$this->title = 'Create C Icd10tm';
$this->params['breadcrumbs'][] = ['label' => 'C Icd10tms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cicd10tm-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
