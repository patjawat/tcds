<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\lab\models\HoslabSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hoslab-search">

 <?php
    $form = ActiveForm::begin([
                                'action' => ['index'],
                                'method' => 'get',
                                'options' => [
                                    'data-pjax' => 1,
                                ],
                                'type'=>ActiveForm::TYPE_HORIZONTAL
                            ]);
?>
<div class="form-group">
<?= $form->field($model, 'cid')
        ->textInput(['placeholder'=>'HN/CID/ชื่อ'])->label(false) ?>
<?php //Html::submitButton('<i class="glyphicon glyphicon-search"></i>', ['class' => 'btn btn-default'])?>
</div>
<?php ActiveForm::end() ?>

</div>
