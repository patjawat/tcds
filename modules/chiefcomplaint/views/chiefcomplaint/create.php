<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\chiefcomplaint\models\Chiefcomplaint */

$this->title = 'Create Chiefcomplaint';
// $this->params['breadcrumbs'][] = ['label' => 'Chiefcomplaints', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="chiefcomplaint-create">
    <?= $this->render('_form', [
        'model' => $model,
        'requester' => $requester
    ]) ?>

</div>
