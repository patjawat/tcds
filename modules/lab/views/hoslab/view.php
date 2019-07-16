<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\lab\models\Hoslab */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Hoslabs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hoslab-view">

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
            'cid',
            'hos_hn',
            'hos_vn',
            'hos_date_visit',
            'lab_code_hos',
            'lab_code_moph',
            'lab_name_hos',
            'request_at',
            'result_at',
            'data_json',
            'lab_name_moph',
        ],
    ]) ?>

</div>
