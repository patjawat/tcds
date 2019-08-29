<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\hispatient\models\HisPatient */

$this->title = $model->hn;
$this->params['breadcrumbs'][] = ['label' => 'His Patients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="his-patient-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->hn], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->hn], [
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
            'hn',
            'prefix',
            'fname',
            'lname',
            'sex',
            'birthday_date',
            'idcard',
            'UPDATE_TIME',
            'doctor_id',
            'doctor_history:ntext',
        ],
    ]) ?>

</div>
