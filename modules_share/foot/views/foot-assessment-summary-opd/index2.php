<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use phpnt\ICheck\ICheck;
use app\components\PatientHelper;
use app\components\MessageHelper;
$this->registerCss($this->render('../../dist/css/style.css'));
$hn = PatientHelper::getCurrentHn();
if (empty($hn)) {
    MessageHelper::errorNullHn();
}
$this->params['pt_title'] = PatientHelper::getPatientTitleByHn($hn);
?>
  <?php $form = ActiveForm::begin(['id' => 'form']); ?>
  <?php echo $form->field($model, 'id')->textInput()->label(false);?>
<?php
var_dump($model)
;?>
          <?php $form = ActiveForm::end(); ?>
