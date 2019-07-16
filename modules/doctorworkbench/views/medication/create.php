<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\doctorworkbench\models\Medication */

$this->title = 'Create Medication';
$this->params['breadcrumbs'][] = ['label' => 'Medications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="medication-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
