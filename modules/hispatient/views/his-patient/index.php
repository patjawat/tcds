<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\hispatient\models\HisPatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'His Patients';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="his-patient-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php Pjax::begin(); ?>

    <p>
        <?= Html::a('Create His Patient', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'hn',
            'prefix',
            'fname',
            'lname',
            'sex',
            //'birthday_date',
            //'idcard',
            //'UPDATE_TIME',
            //'doctor_id',
            //'doctor_history:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
