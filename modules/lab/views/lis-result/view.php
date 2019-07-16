<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\lab\models\LisResult */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lis Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="lis-result-view">

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
            'lis_number',
            'lis_code',
            'test',
            'lab_code',
            'result_code',
            'result',
            'unit',
            'normal_range',
            'technical_time',
            'medical_time',
            'result_date',
            'user_id',
            'remark:ntext',
            'sec_user',
            'sec_time',
            'sec_ip',
            'sec_script',
        ],
    ]) ?>

</div>
