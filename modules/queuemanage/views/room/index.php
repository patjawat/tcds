<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\queuemanage\models\CDoctorRoomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายการห้องตรวจ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cdoctor-room-index">

  
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่ม', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'room_title',
            'doctor_id',
            'is_active:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
