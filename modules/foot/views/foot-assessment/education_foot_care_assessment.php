<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use karatae99\datepicker\DatePicker;
use app\modules\foot\models\ItemsFootcare;
use app\modules\foot\models\ItemsPatientCheckFeet;
use app\modules\foot\models\ItemsRiskCategorization;
use app\modules\foot\models\ItemsUlcerAndEducation;


?>
<!-- Start Row -->
<div class="row">
    <!-- start col -->
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
        <div class="box-card">
            <div class="box-border">
                <div class="box-title" style="width: 60%;">4.1. Does the patient know about how to take care for diabetic feet?</div>
                <?= $form->field($model, 'record_complete[patient_care]')->inline()->radioList(['No' => 'No', 'Yes' => 'Yes'])->label(false); ?>
            </div>
        </div>
        <!-- End Col -->
    </div>
</div>
<!-- End Row -->

<!-- Start Row -->
<div class="row">
    <!-- start col -->
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
        <div class="box-card">
            <div class="box-border">
                <div class="box-title" style="width: 53%;">4.2. Can the patient do general footcare by himself/herself?</div>
                <?= $form->field($model, 'record_complete[general_footcare_check]')->inline()->radioList(['No' => 'No', 'Yes' => 'Yes'])->label(false); ?>
                <?= $form->field($model, 'record_complete[general_footcare_item]')->radioList(ArrayHelper::map(ItemsFootcare::find()->all(), 'id', 'name'))->label(false); ?>

            </div>
        </div>
        <!-- End Col -->
    </div>
</div>
<!-- End Row -->

<!-- Start Row -->
<div class="row">
    <!-- start col -->
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
        <div class="box-card">
            <div class="box-border">
                <div class="box-title" style="width: 53%;">4.3. Does the patient usually take care his/her feet?</div>
                <?= $form->field($model, 'record_complete[foot_take_care]')->inline()->radioList(['No' => 'No', 'Yes' => 'Yes'])->label(false); ?>

            </div>
        </div>
        <!-- End Col -->
    </div>
</div>
<!-- End Row -->

<!-- Start Row -->
<div class="row">
    <!-- start col -->
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
        <div class="box-card">
            <div class="box-border">
                <div class="box-title" style="width: 53%;">4.4. How often does the patient check his/her feet?</div>
                <?= $form->field($model, 'record_complete[foot_patient_check]')->radioList(ArrayHelper::map(ItemsPatientCheckFeet::find()->all(), 'id', 'name'))->label(false); ?>

            </div>
        </div>
        <!-- End Col -->
    </div>
</div>
<!-- End Row -->

<!-- Start Row -->
<div class="row">
    <!-- start col -->
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
        <div class="box-card">
            <div class="box-border">
                <div class="box-title" style="width: 53%;">(5) Risk Categorization of Diabetic Foot Ulcer</div>
                <?= $form->field($model, 'record_complete[foot_categorization]')->radioList(ArrayHelper::map(ItemsRiskCategorization::find()->all(), 'id', 'name'))->label(false); ?>

            </div>
        </div>
        <!-- End Col -->
    </div>
</div>
<!-- End Row -->

<!-- Start Row -->
<div class="row">
    <!-- start col -->
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
        <div class="box-card">
            <div class="box-border">
                <div class="box-title" style="width: 53%;">(6) Suggestion for prevention of foot ulcer and education</div>
                <?= $form->field($model, 'record_complete[foot_suggestion]')->checkboxList(ArrayHelper::map(ItemsUlcerAndEducation::find()->all(), 'id', 'name'))->label(false); ?>

            </div>
        </div>
        <!-- End Col -->
    </div>
</div>
<!-- End Row -->