<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules_share\newpatient\models\mPatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายชื่อ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="m-patient-index">


    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <div style="padding-bottom: 5px">
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> เพิ่มรายใหม่', ['create'], ['class' => 'btn btn-success']) ?>
    </div>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => '{pager}{items}',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'hn',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::a(' <i class="glyphicon glyphicon-search"></i> ' . $model->hn, ['view', 'hn' => $model->hn], ['class' => 'btn btn-info']);
                }
            ],
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',
            //'requester',
            //'data_json',
            'pid',
            [
                'attribute' => 'prename',
                'value' => 'c_prename.title_th',
            ],
            'fname',
            'mname',
            'lname',
            [
                'attribute' => 'sex',
                'value' => 'c_sex.title'
            ],
            //'birth',
            'agey',
        //'agem',
        //'aged',
        //['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
