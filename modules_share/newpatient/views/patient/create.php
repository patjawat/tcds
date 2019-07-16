<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules_share\newpatient\models\mPatient */

$this->title = 'เพิ่มรายใหม่';
$this->params['breadcrumbs'][] = ['label' => 'รายชื่อ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="m-patient-create">

   

    <?= $this->render('_form', [
        'model' => $model,
        'hn_lock'=>FALSE
    ]) ?>

</div>
