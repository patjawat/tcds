<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>


<style>
.form-horizontal .control-label {
    padding-top: 7px;
    margin-bottom: 0;
    text-align: right;
}
.help-block {
    display: block;
    margin-top: 0px;
    margin-bottom: 0px;
    color: #737373;
}
.form-group {
    margin-bottom: 5px;
}

.card-top {
    width: 100%;
    display: inline-block;
    border-radius: 5px;
    padding: 10px 30px;
    border-top: 2px solid var(--color-blue-d);
    box-shadow: 0px 6px 6px 0px rgba(0, 0, 0, 0.15);
    text-align: left;
    color: var(--color-gray-xd);
    text-decoration: none;
    margin-bottom: 1rem;
}

</style>
<?php $form = ActiveForm::begin([
    'id' => 'form-chiefcomplaint',
    'fieldConfig' => [
        'horizontalCssClasses' => [
            'label' => 'col-lg-4 col-md-4 col-sm-4',
            'wrapper' => 'col-lg-8 col-md-8 col-sm-8',
        ],
    ],
    'layout' => 'horizontal',
]);?>


<div class="row" class="shadow">
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'confirm_password')->passwordInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'roles')->checkboxList($model->getAllRoles()) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    
    </div>
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
  <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>
  <?= $form->field($model, 'doctor_id')->textInput(['maxlength' => true]) ?>
  <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
  <?= $form->field($model, 'status')->inline()->radioList($model->getItemStatus()) ?>

    
    </div>
</div>



    <?php ActiveForm::end(); ?>

