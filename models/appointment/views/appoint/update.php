<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\appointment\models\PccAppointment */

$this->title = 'Update Pcc Appointment: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pcc Appointments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pcc-appointment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
