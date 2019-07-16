<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\emr\models\PccService */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pcc Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pcc-service-view">

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
            'cc',
            'pe',
            'bpd',
            'bps',
            'temperature',
            'pulse',
            'rr',
            'data_json',
            'last_update',
            'department',
            'o2sat',
        ],
    ]) ?>

</div>
