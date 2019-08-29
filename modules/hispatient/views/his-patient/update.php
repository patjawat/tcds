<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\hispatient\models\HisPatient */

$this->title = 'Update His Patient: ' . $model->hn;
$this->params['breadcrumbs'][] = ['label' => 'His Patients', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->hn, 'url' => ['view', 'id' => $model->hn]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="his-patient-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
