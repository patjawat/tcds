<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\appointment\models\PccAppointment */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pcc Appointments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pcc-appointment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'hn',
            'vn',
            'provider_code',
            'provider_name',
            'date_service',
            'time_service',
            'clinic',
            'appoint_date',
            'appoint_time',
            'detail',
            'data_json',
            'last_update',
        ],
    ]) ?>

</div>
