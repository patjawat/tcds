<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\hispatient\models\HisPatient */

$this->title = 'Create His Patient';
$this->params['breadcrumbs'][] = ['label' => 'His Patients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="his-patient-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
