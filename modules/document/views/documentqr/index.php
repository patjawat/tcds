<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\document\models\DocumentqrSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Documentqrs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documentqr-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Documentqr', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'hn',
            'type_id',
            'print',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
