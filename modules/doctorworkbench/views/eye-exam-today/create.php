<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\doctorworkbench\models\EyeExamToday */

$this->title = 'Create Eye Exam Today';
$this->params['breadcrumbs'][] = ['label' => 'Eye Exam Todays', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="panel panel-default">
      <div class="panel-heading">
            <h3 class="panel-title"> Eye Exam Today</h3>
      </div>
      <div class="panel-body">
      <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

      </div>
</div>



