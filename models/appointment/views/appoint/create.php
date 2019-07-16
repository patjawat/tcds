<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\appointment\models\PccAppointment */

$this->title = 'Create Pcc Appointment';
$this->params['breadcrumbs'][] = ['label' => 'Pcc Appointments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
   

    <?= $this->render('_form', [
        'model' => $model,
        'date'=>$date
    ]) ?>

</div>
