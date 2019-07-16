<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\doctorworkbench\models\DfItems */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="df-items-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'charge_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'receipt_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'df_charge_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'df_receipt_id')->textInput(['maxlength' => true]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
