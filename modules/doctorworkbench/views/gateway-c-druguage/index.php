<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\doctorworkbench\models\GatewayCDruguageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gateway Cdruguages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gateway-cdruguage-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Gateway Cdruguage', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'drugusage',
            'code',
            'name1',
            'name2',
            //'name3',
            //'shortlist',
            //'status',
            //'ename1',
            //'ename2',
            //'ename3',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
