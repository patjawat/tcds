<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\opdvisit\models\OpdVisitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Opd Visits';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="opd-visit-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Opd Visit', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'vn',
            'hn',
            'requester',
            'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',
            //'service_start_date',
            //'service_start_time',
            //'service_end_date',
            //'service_end_time',
            //'service_type',
            //'service_department',
            //'pcc_vn',
            //'department',
            //'doctor_id',
            //'data_json:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
