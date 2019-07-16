<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\queuemanage\models\CDoctorRoom */

$this->title = 'แก้ไข' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'รายการห้องตรวจ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->room_title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cdoctor-room-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
