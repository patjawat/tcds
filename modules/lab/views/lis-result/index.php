<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\lab\models\LisResultSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lis Results';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lis-result-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Lis Result', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'lis_number',
            'lis_code',
            'test',
            'lab_code',
            //'result_code',
            //'result',
            //'unit',
            //'normal_range',
            //'technical_time',
            //'medical_time',
            //'result_date',
            //'user_id',
            //'remark:ntext',
            //'sec_user',
            //'sec_time',
            //'sec_ip',
            //'sec_script',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
