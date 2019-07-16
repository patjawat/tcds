<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\doctorworkbench\models\EyeExamTodaySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Eye Exam Todays';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eye-exam-today-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Eye Exam Today', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'hn',
            'vn',
            'last_update',
            'pcc_vn',
            //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',
            //'data_json:ntext',
            //'form_service:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
