<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\appointment\models\PccAppointmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pcc Appointments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pcc-appointment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pcc Appointment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'hn',
            'vn',
            'provider_code',
            'provider_name',
            //'date_service',
            //'time_service',
            //'clinic',
            //'appoint_date',
            //'appoint_time',
            //'detail',
            //'data_json',
            //'last_update',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
