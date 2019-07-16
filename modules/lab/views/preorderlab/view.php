<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\lab\models\Preorderlab */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Preorderlabs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="preorderlab-view">

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
            'pcc_vn',
            'data_json',
            'pcc_start_service_datetime',
            'pcc_end_service_datetime',
            'data1',
            'data2',
            'hospcode',
            'lab_code',
            'lab_name',
            'lab_request_date',
            'lab_result_date',
            'lab_result',
            'standard_result',
            'lab_price',
            'lab_code_moph',
            'last_update',
        ],
    ]) ?>

</div>
