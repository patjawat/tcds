<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\doctorworkbench\models\GatewayCDrugdose */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gateway-cdrugdose-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'hospcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'drugcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'doseno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dosedescription')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'doseprefix')->textInput(['maxlength' => true]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
