<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use \app\components\PatientHelper;

/* @var $this yii\web\View */
/* @var $model app\modules_share\newpatient\models\mPatient */

$this->title = $model->hn;
$this->params['breadcrumbs'][] = ['label' => 'รายชื่อ', 'url' => ['index']];
$this->params['breadcrumbs'][] = "HN: ".$this->title;

?>
<div class="m-patient-view">

    
    <p>
        <?= Html::a('แก้ไข', ['update', 'hn' => $model->hn], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'hn' => $model->hn], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        
        <?= Html::a(' ส่งตรวจ ', ['open-visit','hn'=>$model->hn], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'hn',            
            'pid',
            'prename',
            'fname',
            'mname',
            'lname',
            'sex',
            'birth',
            'agey',
            'agem',
            'aged',
        ],
    ]) ?>

</div>
