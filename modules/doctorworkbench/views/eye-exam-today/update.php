<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\doctorworkbench\models\EyeExamToday */

$this->title = 'Update Eye Exam Today: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Eye Exam Todays', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="eye-exam-today-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
