<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\chiefcomplaint\models\Chiefcomplaint */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Chiefcomplaints', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="chiefcomplaint-view">

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
            // 'data_json',
            'date_service',
            'time_service',
            'data1',
            'data2',
            'hospcode',
            'pi_text:ntext',
            'sbp',
            'dbp',
            'temp',
            'pp',
            'pr',
            'o2sat',
            'height',
            'weight',
            'cid',
            'vn',
            'hn',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
            'requester',
            'bt',
            'position',
            'arm',
            'pr_rhythm',
            'rr',
            'bw',
            'ht',
            'ibw',
            'bmi',
            'wc',
            'ic',
            'ec',
            'hc',
            'bp',
        ],
    ]) ?>

</div>
