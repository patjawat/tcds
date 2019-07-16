<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\queuemanage\models\CDoctorRoom */

$this->title = 'เพิ่ม';
$this->params['breadcrumbs'][] = ['label' => 'รายการห้องตรวจ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cdoctor-room-create">

   
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
