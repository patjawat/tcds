<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\dmindicator\models\DmIndicatorsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dm Indicators';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dm-indicators-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Dm Indicators', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'hn',
            'vn',
            'pcc_vn',
            'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',
            //'eye_out_hos:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
