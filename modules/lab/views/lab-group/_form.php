<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\web\JsExpression;
use yii\helpers\ArrayHelper;
use softark\duallistbox\DualListbox;
use app\modules\lab\models\LabResult;
?>

<div class="lab-group-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lab_name')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'lab_id')->textarea(['rows' => 6]) ?>
    <?php
//      $form->field($model, 'lab_id')->widget(Select2::classname(), [
//     'data' => ArrayHelper::map(LabResult::find()->groupby(['lis_code'])->all(),'lis_code','test'),
//     'options' => ['placeholder' => 'Select a state ...'],
//     'pluginOptions' => [
//         'allowClear' => true,
//         'multiple' => true
//     ],
// ]);
?>
<?php
    $options = [
        'multiple' => true,
        'size' => 10,
    ];
    // echo Html::activeListBox($model, $attribute, $items, $options);
    echo DualListbox::widget([
        'model' => $model,
        'attribute' => 'lab_id',
        'items' => ArrayHelper::map(LabResult::find()->groupby(['lis_code'])->all(),'lis_code','test'),
        'options' => $options,
        'clientOptions' => [
            'moveOnSelect' => false,
            'selectedListLabel' => 'Selected Items',
            'nonSelectedListLabel' => 'Available Items',
        ],
    ]);
?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
