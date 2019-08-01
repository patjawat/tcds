<?php
use yii\helpers\ArrayHelper;
use app\modules\foot\models\ItemsColorChange;
use app\modules\foot\models\ItemsSkinCondition;
use app\modules\foot\models\ItemsInterspace;
use app\modules\foot\models\ItemsSpecifySiteDigit;
use app\modules\foot\models\ItemsTemperatureChange;

?>
<!-- Start Row -->
<div class="row">
    <!-- start col -->
    <div
        class="col-xs-12 col-sm-12 col-md-9 col-lg-8 col-md-offset-2 col-lg-offset-3col-xs-12 col-sm-12 col-md-8 col-lg-6 col-md-offset-2 col-lg-offset-3">
        <div class="box-card">
            <div class="box-border">
                <div class="box-title">1. Chief complaint</div>
                <?= $form->field($model, 'record_complete[chief_complaint]')->textInput()->label(false);?>
            </div>
        </div>
        <!-- End Col -->
    </div>
</div>
<!-- End Row -->


<div class="row">
    <!-- start col -->
    <div
        class="col-xs-12 col-sm-12 col-md-9 col-lg-8 col-md-offset-2 col-lg-offset-3col-xs-12 col-sm-12 col-md-8 col-lg-6 col-md-offset-2 col-lg-offset-3">
        <div class="box-card">
            <div class="box-border">
                <div class="box-title">2. Dermatologic examination</div>
                <?= $form->field($model, 'record_complete[dermatologic_examination]')->inline()->radioList(['No' => 'No','Yes' => 'Yes'])->label(false); ?>
                <div class="row">

                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4 col-md-offset-3">
                        <p>Right</p>
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <p>Left</p>
                    </div>
                </div>
                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        2.1 Hair loss
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[hair_loss_right]')->inline()->radioList(['No' => 'No','Yes' => 'Yes'])->label(false); ?>

                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[hair_loss_left]')->inline()->radioList(['No' => 'No','Yes' => 'Yes'])->label(false); ?>

                    </div>
                </div>
                <!-- End Row -->

                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        2.2 Fungal infection
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[fungal_infection_right]')->inline()->radioList(['No' => 'No','Yes' => 'Yes'])->label(false); ?>

                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[fungal_infection_left]')->inline()->radioList(['No' => 'No','Yes' => 'Yes'])->label(false); ?>

                    </div>
                </div>
                <!-- End Row -->

                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        2.3 Color change
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[color_change_right]')->radioList(ArrayHelper::map(ItemsColorChange::find()->all(),'id','name'))->label(false); ?>

                    </div>
                    <!-- End Col -->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[color_change_left]')->radioList(ArrayHelper::map(ItemsColorChange::find()->all(),'id','name'))->label(false); ?>

                    </div>
                </div>
                <!-- End Row -->

                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        2.4 Skin condition
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[skin_condition_right]')->radioList(ArrayHelper::map(ItemsSkinCondition::find()->all(),'id','name'))->label(false); ?>

                    </div>
                    <!-- End Col -->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[skin_condition_left]')->radioList(ArrayHelper::map(ItemsSkinCondition::find()->all(),'id','name'))->label(false); ?>

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
    <div
        class="col-xs-12 col-sm-12 col-md-9 col-lg-8 col-md-offset-2 col-lg-offset-3col-xs-12 col-sm-12 col-md-8 col-lg-6 col-md-offset-2 col-lg-offset-3">
        <div class="box-card">
            <div class="box-border">
                <div class="box-title">2.5 Interspace</div>

                <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4 col-md-offset-3">
                    <p>Right</p>
                </div>
                <!-- End Col -->
                <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                    <p>Left</p>
                </div>


                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
                        <!-- Interspace -->
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-5 col-lg-5">
                        <?= $form->field($model, 'record_complete[interspace_right]')->radioList(ArrayHelper::map(ItemsInterspace::find()->all(),'id','name'))->label(false); ?>
                        <?=$form->field($model, 'record_complete[callus_right]')->checkbox()->label('Callus'); ?>
                        <?= $form->field($model, 'record_complete[callus_select_right]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->where('id < 5')->all(),'id','name'))->label(false); ?>


                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-5 col-lg-5">
                        <?= $form->field($model, 'record_complete[interspace_left]')->radioList(ArrayHelper::map(ItemsInterspace::find()->all(),'id','name'))->label(false); ?>
                        <?=$form->field($model, 'record_complete[callus_left]')->checkbox()->label('Callus'); ?>
                        <?= $form->field($model, 'record_complete[callus_select_left]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->where('id < 5')->all(),'id','name'))->label(false); ?>

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
    <div
        class="col-xs-12 col-sm-12 col-md-9 col-lg-8 col-md-offset-2 col-lg-offset-3col-xs-12 col-sm-12 col-md-8 col-lg-6 col-md-offset-2 col-lg-offset-3">
        <div class="box-card">
            <div class="box-border">
                <div class="box-title">2.6 Temperature change</div>

                <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4 col-md-offset-3">
                    <p>Right</p>
                </div>
                <!-- End Col -->
                <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                    <p>Left</p>
                </div>


                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
                        <!-- Temperature change -->
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-5 col-lg-5">
                        <?= $form->field($model, 'record_complete[temperature_change_right]')->radioList(ArrayHelper::map(ItemsTemperatureChange::find()->all(),'id','name'))->label(false); ?>
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-5 col-lg-5">
                        <?= $form->field($model, 'record_complete[temperature_change_left]')->radioList(ArrayHelper::map(ItemsTemperatureChange::find()->all(),'id','name'))->label(false); ?>
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
    <div
        class="col-xs-12 col-sm-12 col-md-9 col-lg-8 col-md-offset-2 col-lg-offset-3col-xs-12 col-sm-12 col-md-8 col-lg-6 col-md-offset-2 col-lg-offset-3">
        <div class="box-card">
            <div class="box-border">
                <div class="box-title">2.7 Toenail problem</div>

                <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4 col-md-offset-3">
                    <p>Right</p>
                </div>
                <!-- End Col -->
                <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                    <p>Left</p>
                </div>


                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
                        <!-- Temperature change -->
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-5 col-lg-5">
                        <?= $form->field($model, 'record_complete[toenail_problem_right]')->inline()->radioList(['No' => 'No','Yes' => 'Yes'])->label(false); ?>
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-5 col-lg-5">
                        <?= $form->field($model, 'record_complete[toenail_problem_left]')->inline()->radioList(['No' => 'No','Yes' => 'Yes'])->label(false); ?>
                    </div>
                </div>
                <!-- End Row -->


                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
                        Fungal nail
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-5 col-lg-5">
                        <?= $form->field($model, 'record_complete[fungal_nail_right]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(),'id','name'))->label(false); ?>
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-5 col-lg-5">
                        <?= $form->field($model, 'record_complete[fungal_nail_left]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(),'id','name'))->label(false); ?>

                    </div>
                </div>
                <!-- End Row -->

                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
                        Hypertrophic
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-5 col-lg-5">
                        <?= $form->field($model, 'record_complete[hypertrophic_right]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(),'id','name'))->label(false); ?>
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-5 col-lg-5">
                        <?= $form->field($model, 'record_complete[hypertrophic_left]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(),'id','name'))->label(false); ?>
                    </div>
                </div>
                <!-- End Row -->

                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
                        Distrophic
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-5 col-lg-5">
                        <?= $form->field($model, 'record_complete[distrophic_right]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(),'id','name'))->label(false); ?>
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-5 col-lg-5">
                        <?= $form->field($model, 'record_complete[distrophic_left]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(),'id','name'))->label(false); ?>
                    </div>
                </div>
                <!-- End Row -->

                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
                        Discolored
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-5 col-lg-5">
                        <?= $form->field($model, 'record_complete[discolored_right]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(),'id','name'))->label(false); ?>
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-5 col-lg-5">
                        <?= $form->field($model, 'record_complete[discolored_left]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(),'id','name'))->label(false); ?>
                    </div>
                </div>
                <!-- End Row -->

                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
                        Elongated
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-5 col-lg-5">
                        <?= $form->field($model, 'record_complete[elongated_right]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(),'id','name'))->label(false); ?>
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-5 col-lg-5">
                        <?= $form->field($model, 'record_complete[elongated_left]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(),'id','name'))->label(false); ?>
                    </div>
                </div>
                <!-- End Row -->

                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
                        Ingrown
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-5 col-lg-5">
                        <?= $form->field($model, 'record_complete[ingrown_right]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(),'id','name'))->label(false); ?>
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-5 col-lg-5">
                        <?= $form->field($model, 'record_complete[ingrown_left]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(),'id','name'))->label(false); ?>
                    </div>
                </div>
                <!-- End Row -->

                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
                        Involuted
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-5 col-lg-5">
                        <?= $form->field($model, 'record_complete[involuted_right]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(),'id','name'))->label(false); ?>
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-5 col-lg-5">
                        <?= $form->field($model, 'record_complete[involuted_left]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(),'id','name'))->label(false); ?>
                    </div>
                </div>
                <!-- End Row -->

                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
                        Splitting
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-5 col-lg-5">
                        <?= $form->field($model, 'record_complete[splitting_right]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(),'id','name'))->label(false); ?>
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-5 col-lg-5">
                        <?= $form->field($model, 'record_complete[splitting_left]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(),'id','name'))->label(false); ?>
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
    <div
        class="col-xs-12 col-sm-12 col-md-9 col-lg-8 col-md-offset-2 col-lg-offset-3col-xs-12 col-sm-12 col-md-8 col-lg-6 col-md-offset-2 col-lg-offset-3">
        <div class="box-card">
            <div class="box-border">
                <div class="box-title">2.8 Skin Lesion</div>

                <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4 col-md-offset-3">
                    <p>Right</p>
                </div>
                <!-- End Col -->
                <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                    <p>Left</p>
                </div>


                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
                        <!-- Temperature change -->
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-5 col-lg-5">
                    <?= $form->field($model, 'record_complete[toenail_problem_right]')->inline()->radioList(['No' => 'No','Yes' => 'Yes'])->label(false); ?>
                        
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-5 col-lg-5">
                    <?= $form->field($model, 'record_complete[toenail_problem_left]')->inline()->radioList(['No' => 'No','Yes' => 'Yes'])->label(false); ?>


                    </div>
                </div>
                <!-- End Row -->


            </div>
        </div>
        <!-- End Col -->
    </div>
</div>
<!-- End Row -->