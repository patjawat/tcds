<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\opdvisit\models\OpdVisit */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Opd Visits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="opd-visit-view">

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
            'vn',
            'hn',
            'requester',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
            'service_start_date',
            'service_start_time',
            'service_end_date',
            'service_end_time',
            'service_type',
            'service_department',
            'pcc_vn',
            'department',
            'doctor_id',
            'data_json:ntext',
        ],
    ]) ?>

</div>
