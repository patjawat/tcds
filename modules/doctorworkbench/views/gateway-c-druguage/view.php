<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\doctorworkbench\models\GatewayCDruguage */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Gateway Cdruguages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gateway-cdruguage-view">

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
            'drugusage',
            'code',
            'name1',
            'name2',
            'name3',
            'shortlist',
            'status',
            'ename1',
            'ename2',
            'ename3',
        ],
    ]) ?>

</div>
