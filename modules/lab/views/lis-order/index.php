<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\lab\models\LisOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lis Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lis-order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Lis Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'message_date',
            'patient_id',
            'patient_name',
            'gender',
            //'birth_date',
            //'lis_number',
            //'reference_number',
            //'accept_time',
            //'request_div',
            //'sec_user',
            //'sec_time',
            //'sec_ip',
            //'sec_script',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
