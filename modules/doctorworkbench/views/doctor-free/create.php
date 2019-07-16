<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\doctorworkbench\models\DoctorFree */

$this->title = 'Create Doctor Free';
$this->params['breadcrumbs'][] = ['label' => 'Doctor Frees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-free-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
