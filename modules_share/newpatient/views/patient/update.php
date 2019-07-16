<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules_share\newpatient\models\mPatient */

$this->title = 'Update ' . $model->hn;
$this->params['breadcrumbs'][] = ['label' => 'รายชื่อ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->hn, 'url' => ['view', 'hn' => $model->hn]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="m-patient-update">

  
    <?= $this->render('_form', [
        'model' => $model,
        'hn_lock'=>TRUE
    ]) ?>

</div>
