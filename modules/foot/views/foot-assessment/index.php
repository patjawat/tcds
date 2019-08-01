<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
// use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use karatae99\datepicker\DatePicker;
use app\modules\foot\models\ItemsOccupation;
use app\modules\foot\models\ItemsSmokingFoot;
use app\modules\foot\models\ItemsSmokingHowLongAgo;
use app\modules\foot\models\ItemsActivity;
use app\modules\foot\models\ItemsSpecify;
use app\modules\foot\models\ItemsSpecifySiteDigit;
use app\modules\foot\models\ItemsSpecifyTypeSite;
use app\modules\foot\models\ItemsSpecifySite;
use app\modules\foot\models\ItemsProsthesisFor;
use app\modules\foot\models\ItemsSpecifyProcedureDate;
?>
<?php $form = ActiveForm::begin([
    'id' => 'formFootComplate',
    'fieldConfig' => [
        'horizontalCssClasses' => [
            'label' => 'col-lg-4 col-md-4 col-sm-4',
            'wrapper' => 'col-lg-8 col-md-8 col-sm-8',
        ],
    ],
    // 'layout' => 'horizontal',
]);?>


<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#menu1"><i class="fas fa-print"></i> Personal and Past Medical History</a></li>
    <li><a data-toggle="tab" href="#menu2"><i class="fas fa-clipboard-check"></i> Current foot problem and Examination</a></li>
    <li><a data-toggle="tab" href="#menu3"><i class="fas fa-clipboard-check"></i> Footwear assessment</a></li>
    <li><a data-toggle="tab" href="#menu4"><i class="fas fa-clipboard-check"></i> Education foot care assessment</a></li>
  </ul>

  <div class="tab-content">
    <div id="menu1" class="tab-pane fade in active">
   <?=$this->render('medical_history', ['form' => $form,'model' => $model]);?>
    </div>
    <div id="menu2" class="tab-pane fade">
    <?=$this->render('problem_examination', ['form' => $form,'model' => $model]);?>
    </div>
    <div id="menu3" class="tab-pane fade">
    
     3
    </div>
    <div id="menu4" class="tab-pane fade">
   
     4
    </div>
  </div>

  <br>
<!-- Start Row -->
<div class="row">
    <!-- start col -->
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6 col-md-offset-2 col-lg-offset-3">
        <?=Html::submitButton('<i class="fas fa-check"></i> บันทึก', ['class' => "btn btn-success"]); ?>
    </div>
</div>
<!-- End Col -->


<?php ActiveForm::end(); ?>


<?php
$js = <<< JS

$("#formFootComplate").on('beforeSubmit', function (e) {
  e.preventDefault(); // stopping submitting
  var form = $(this);
  if (form.find('.has-error').length) {
    return false;
    console.log(form.find('.has-error').length)
  } else {
   $.ajax({
       type: form.attr('method'),
       url: form.attr('action'),
       data: form.serialize(),
       dataType: "json",
       success: function (response) {
           console.log(response)
       }
   });
   return false;
  }
  return false;
});

JS;
$this->registerJS($js);
?>