<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\db\Expression;

$this->title = 'Chiefcomplaints';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chiefcomplaint-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('Create Chiefcomplaint', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php
$expression = new Expression('NOW()');
$now = (new \yii\db\Query)->select($expression)->scalar();  // SELECT NOW();
echo Yii::$app->formatter->asDate($now, 'php:YmdHis'); // 2014-10-06
?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'pcc_vn',
            'date_service',
            'time_service',
            //'data1',
            //'data2',
            //'hospcode',
            //'pi_text:ntext',
            //'sbp',
            //'dbp',
            //'temp',
            //'pp',
            //'pr',
            //'o2sat',
            //'height',
            //'weight',
            //'cid',
            //'vn',
            //'hn',
            //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',
            //'requester',
            //'bt',
            //'position',
            //'arm',
            //'pr_rhythm',
            //'rr',
            //'bw',
            //'ht',
            //'ibw',
            //'bmi',
            //'wc',
            //'ic',
            //'ec',
            //'hc',
            //'bp',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
