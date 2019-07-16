<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\doctorworkbench\models\DoctorFree */

$this->title = 'Update Doctor Free: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Doctor Frees', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="doctor-free-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
