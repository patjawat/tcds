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
<style>
.radio,
.checkbox {
    position: relative;
    display: block;
    margin-top: 10px;
    margin-bottom: 10px;
    background-color: #e2e2e2;
    padding: 6px;
    /* width: 216px; */
    border-radius: 5px;
}

.checkbox:hover {
    background-color: #c5c5c5;
}

.field-footassessment-record_complete-smoking_how_long_ago>.control-label {
    background-color: #999;
    color: #fff;
    height: 33px;
    padding: 6px;
    margin-top: -5px;
    margin-bottom: -5px;
    border-radius: 5px;
    width: 100%;
}

.field-footassessment-record_complete-smoking_how_long_ago {
    margin-top: -5px;
}

.box-border {
    background-color: #FFF;
    border-radius: 5px;
    padding: 10px;
    margin-top: 15px;
}

.box-card {
    background-color: #FFF;
    border-radius: 8px;
    padding: 10px;
    margin-top: 15px;
}

.box-container {
    width: 50%;
    margin: auto;
}

.box-border {
    border-radius: 15px;
    padding: 20px;
    border: 1.5px #ddd solid;
    border-style: dashed;
}

.box-title {
    color: #999;
    margin-top: -32px;
    background-color: #fff;
    width: 35%;
    text-align: -webkit-center;
    padding: 2px;
}

.item-text-center {
    text-align: -webkit-center;
}

.control {
    display: inline-block;
    max-width: 100%;

    font-weight: 700;
    /* color: #039285; */
}

#footassessment-record_complete-specify_site_digit_right,
#footassessment-record_complete-specify_site_digit_left {

    display: block;
    margin-top: -10px;
    background-color: #e2e2e2;
    padding: 6px;
    border-radius: 5px;
}

#footassessment-record_complete-using_ambulation_aid {
    display: block;
    margin-top: 10px;
    background-color: #e2e2e2;
    padding: 6px;
    border-radius: 5px;
}
</style>

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


<!-- Start Row -->
<div class="row">
    <!-- start col -->
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6 col-md-offset-2 col-lg-offset-3">
        <div class="box-card">
            <div class="box-border">
                <div class="box-title">1. Occupation</div>
                <?= $form->field($model, 'record_complete[occupation]')->checkboxList(ArrayHelper::map(ItemsOccupation::find()->all(),'id','name'))->label(false); ?>
                <?= $form->field($model, 'record_complete[occupation_other]')->textArea()->label(false);?>
            </div>
        </div>
        <!-- End Col -->
    </div>
</div>
<!-- End Row -->


<!-- Start Row -->
<div class="row">
    <!-- start col -->
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6 col-md-offset-2 col-lg-offset-3">
        <div class="box-card">
            <div class="box-border">
                <div class="box-title">2. Smoking</div>
                <?= $form->field($model, 'record_complete[smoking]')->radioList(ArrayHelper::map(ItemsSmokingFoot::find()->all(),'id','name'))->label(false); ?>
                <?= $form->field($model, 'record_complete[smoking_how_long_ago]')->radioList(ArrayHelper::map(ItemsSmokingHowLongAgo::find()->all(),'id','name'))->label('How Long Ago ?'); ?>
            </div>
        </div>
        <!-- End Col -->
    </div>
</div>
<!-- End Row -->



<!-- Start Row -->
<div class="row">
    <!-- start col -->
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6 col-md-offset-2 col-lg-offset-3">
        <div class="box-card">
            <div class="box-border">
                <div class="box-title">3. Activity</div>
                <?= $form->field($model, 'record_complete[activity]')->radioList(ArrayHelper::map(ItemsActivity::find()->all(),'id','name'))->label(false); ?>
            </div>
        </div>
        <!-- End Col -->
    </div>
</div>
<!-- End Row -->



<!-- Start Row -->
<div class="row">
    <!-- start col -->
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6 col-md-offset-2 col-lg-offset-3">
        <div class="box-card">
            <div class="box-border">
                <div class="box-title">4. Using ambulation aid</div>
                <?= $form->field($model, 'record_complete[using_ambulation_aid]')->inline()->radioList(['No' => 'No','Yes' => 'Yes'])->label(false); ?>
                <?= $form->field($model, 'record_complete[specify]')->radioList(ArrayHelper::map(ItemsSpecify::find()->all(),'id','name'))->label('Specify'); ?>
            </div>
        </div>
        <!-- End Col -->
    </div>
</div>
<!-- End Row -->


<!-- Start Row -->
<div class="row">
    <!-- start col -->
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6 col-md-offset-2 col-lg-offset-3">
        <div class="box-card">
            <div class="box-border">

                <div class="box-title">5. Previous foot ulcer</div>
                <h4 class="text-center">Specify site</h4>
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <p class="text-center">Right</p>
                        <div class="item-text-center">
                            <?= $form->field($model, 'record_complete[ulcer_check_right]')->inline()->radioList(['No' => 'No','Yes' => 'Yes'])->label(false); ?>
                        </div>
                        <?= $form->field($model, 'record_complete[ulcer_right]')->radioList(ArrayHelper::map(ItemsSpecifyTypeSite::find()->all(),'id','name'))->label(false); ?>
                        <?= $form->field($model, 'record_complete[ulcer_digit_right]')->inline()->radioList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(),'id','name'))->label(false); ?>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <p class="text-center">Left</p>
                        <div class="item-text-center">
                            <?= $form->field($model, 'record_complete[ulcer_check_left]')->inline()->radioList(['No' => 'No','Yes' => 'Yes'])->label(false); ?>
                        </div>
                        <?= $form->field($model, 'record_complete[ulcer_left]')->radioList(ArrayHelper::map(ItemsSpecifyTypeSite::find()->all(),'id','name'))->label(false); ?>
                        <?= $form->field($model, 'record_complete[ulcer_digit_left]')->inline()->radioList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(),'id','name'))->label(false); ?>
                    </div>
                </div>

            </div>
        </div>
        <!-- End Col -->
    </div>
</div>
<!-- End Row -->




<!-- Start Row -->
<div class="row">
    <!-- start col -->
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6 col-md-offset-2 col-lg-offset-3">
        <div class="box-card">
            <div class="box-border">

                <div class="box-title">6. Previous amputation</div>
                <h4 class="text-center">Specify type and site</h4>
                <!-- Start Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

                        <p class="text-center">Right</p>
                        <div class="item-text-center">
                            <?= $form->field($model, 'record_complete[amputation_check_right]')->inline()->radioList(['No' => 'No','Yes' => 'Yes'])->label(false); ?>
                        </div>
                        <?= $form->field($model, 'record_complete[amputation_right]')->radioList(ArrayHelper::map(ItemsSpecifySite::find()->all(),'id','name'))->label(false); ?>
                        <?= $form->field($model, 'record_complete[amputation_digit_right]')->inline()->radioList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(),'id','name'))->label(false); ?>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <p class="text-center">Left</p>
                        <div class="item-text-center">
                            <?= $form->field($model, 'record_complete[amputation_check_left]')->inline()->radioList(['No' => 'No','Yes' => 'Yes'])->label(false); ?>
                        </div>
                        <?= $form->field($model, 'record_complete[amputation_left]')->radioList(ArrayHelper::map(ItemsSpecifySite::find()->all(),'id','name'))->label(false); ?>
                        <?= $form->field($model, 'record_complete[amputation_digit_left]')->inline()->radioList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(),'id','name'))->label(false); ?>
                    </div>
                </div>
                <!-- End Row -->

                <h4 class="text-center">Prosthesis</h4>
                <!-- Start Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <p class="text-center">Right</p>
                        <div class="item-text-center">
                            <?= $form->field($model, 'record_complete[prosthesis_right]')->inline()->radioList(['No' => 'No','Yes' => 'Yes'])->label(false); ?>
                        </div>
                        <?= $form->field($model, 'record_complete[prosthesis_for_right]')->radioList(ArrayHelper::map(ItemsProsthesisFor::find()->all(),'id','name'))->label(false); ?>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <p class="text-center">Left</p>
                        <div class="item-text-center">
                            <?= $form->field($model, 'record_complete[prosthesis_left]')->inline()->radioList(['No' => 'No','Yes' => 'Yes'])->label(false); ?>
                        </div>
                        <?= $form->field($model, 'record_complete[prosthesis_for_left]')->radioList(ArrayHelper::map(ItemsProsthesisFor::find()->all(),'id','name'))->label(false); ?>
                    </div>
                </div>
                <!-- End Row -->



            </div>
        </div>
        <!-- End Col -->
    </div>
</div>
<!-- End Row -->


<!-- Start Row -->
<div class="row">
    <!-- start col -->
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6 col-md-offset-2 col-lg-offset-3">
        <div class="box-card">
            <div class="box-border">

                <div class="box-title">7. Previous revascularization</div>
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <p class="text-center">Right</p>
                        <div class="item-text-center">
                            <?php echo  $form->field($model, 'record_complete[revascularization_right]')->inline()->radioList(['No' => 'No','Yes' => 'Yes'])->label(false); ?>
                        </div>
                        <?php //$form->field($model, 'record_complete[specify_site_right]')->checkboxList(ArrayHelper::map(ItemsSpecifyProcedureDate::find()->all(),'id','name'))->label(false); ?>

                        <?=$form->field($model, 'record_complete_right_evt')->checkbox(['uncheck' => '0', 'checked' => '1'])->label('EVT'); ?>
                        <?= DatePicker::widget(['model' => $model,
                                                'attribute' => 'record_complete_right_evt_date',
                                                'template' => '{addon}{input}',
                                                'language' => 'th', // Thai B.E.
                                                    'clientOptions' => [
                                                        'autoclose' => true,
                                                        'format' => 'dd/mm/yyyy'
                                                    ]
                                            ]);?>
                        <br>
                        <?=$form->field($model, 'record_complete[right_evt_note]')->textArea()->label(false); ?>

                        <?=$form->field($model, 'record_complete[right_bypass]')->checkbox(['uncheck' => '0', 'checked' => '1'])->label('ฺBypass'); ?>
                        <?= DatePicker::widget(['model' => $model,
                                                'attribute' => 'record_complete_right_bypass_date',
                                                'template' => '{addon}{input}',
                                                'language' => 'th', // Thai B.E.
                                                    'clientOptions' => [
                                                        'autoclose' => true,
                                                        'format' => 'dd/mm/yyyy'
                                                    ]
                                            ]);?>
                        <br>
                        <?=$form->field($model, 'record_complete[right_bypass_note]')->textArea()->label(false); ?>




                        <?=$form->field($model, 'record_complete[right_hybrid]')->checkbox(['uncheck' => '0', 'checked' => '1'])->label('ฺHybrid'); ?>
                        <?= DatePicker::widget(['model' => $model,
                                                'attribute' => 'record_complete_right_hybrid_date',
                                                'template' => '{addon}{input}',
                                                'language' => 'th', // Thai B.E.
                                                    'clientOptions' => [
                                                        'autoclose' => true,
                                                        'format' => 'dd/mm/yyyy'
                                                    ]
                                            ]);?>
                        <br>
                        <?=$form->field($model, 'record_complete[right_hybrid_note]')->textArea()->label(false); ?>



                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <p class="text-center">Left</p>
                        <div class="item-text-center">
                            <?php echo $form->field($model, 'record_complete[revascularization_left]')->inline()->radioList(['No' => 'No','Yes' => 'Yes'])->label(false); ?>
                        </div>
                        <?=$form->field($model, 'record_complete[left_evt]')->checkbox(['uncheck' => '0', 'checked' => '1'])->label('EVT'); ?>
                        <?= DatePicker::widget(['model' => $model,
                                                'attribute' => 'record_complete[left_evt_date]',
                                                'template' => '{addon}{input}',
                                                'language' => 'th', // Thai B.E.
                                                    'clientOptions' => [
                                                        'autoclose' => true,
                                                        'format' => 'dd/mm/yyyy'
                                                    ]
                                            ]);?>
                        <br>
                        <?=$form->field($model, 'record_complete[left_evt_note]')->textArea()->label(false); ?>

                        <?=$form->field($model, 'record_complete[left_bypass]')->checkbox(['uncheck' => '0', 'checked' => '1'])->label('ฺBypass'); ?>
                        <?= DatePicker::widget(['model' => $model,
                                                'attribute' => 'record_complete_left_bypass_date',
                                                'template' => '{addon}{input}',
                                                'language' => 'th', // Thai B.E.
                                                    'clientOptions' => [
                                                        'autoclose' => true,
                                                        'format' => 'dd/mm/yyyy'
                                                    ]
                                            ]);?>
                        <br>
                        <?=$form->field($model, 'record_complete[left_bypass_note]')->textArea()->label(false); ?>




                        <?=$form->field($model, 'record_complete[left_hybrid]')->checkbox(['uncheck' => '0', 'checked' => '1'])->label('ฺHybrid'); ?>
                        <?= DatePicker::widget(['model' => $model,
                                                'attribute' => 'record_complete[left_hybrid_date]',
                                                'template' => '{addon}{input}',
                                                'language' => 'th', // Thai B.E.
                                                    'clientOptions' => [
                                                        'autoclose' => true,
                                                        'format' => 'dd/mm/yyyy'
                                                    ]
                                            ]);?>
                        <br>
                        <?=$form->field($model, 'record_complete[left_hybrid_note]')->textArea()->label(false); ?>

                    </div>
                </div>

            </div>
        </div>
        <!-- End Col -->
    </div>
</div>
<!-- End Row -->
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