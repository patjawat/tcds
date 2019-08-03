<?php

use yii\helpers\ArrayHelper;
use app\modules\foot\models\ItemsColorChange;
use app\modules\foot\models\ItemsSkinCondition;
use app\modules\foot\models\ItemsInterspace;
use app\modules\foot\models\ItemsSpecifySiteDigit;
use app\modules\foot\models\ItemsTemperatureChange;
use app\modules\foot\models\ItemsFootType;
use app\modules\foot\models\ItemsSilfverskioldTest;
use app\modules\foot\models\ItemsNeuropathicSymptom;
use app\modules\foot\models\ItemsMonofilament;
use app\modules\foot\models\ItemsTuningFork;
use app\modules\foot\models\ItemsPittingEdema;
use app\modules\foot\models\ItemsVesselPalpation;
use app\modules\foot\models\ItemsDoppler;

?>
<!-- Start Row -->
<div class="row">
    <!-- start col -->
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
        <div class="box-card">
            <div class="box-border">
                <div class="box-title">1. Chief complaint</div>
                <?= $form->field($model, 'record_complete[chief_complaint]')->textInput()->label(false); ?>
            </div>
        </div>
        <!-- End Col -->
    </div>
</div>
<!-- End Row -->


<div class="row">
    <!-- start col -->
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
        <div class="box-card">
            <div class="box-border">
                <div class="box-title">2. Dermatologic examination</div>
                <?= $form->field($model, 'record_complete[dermatologic_examination]')->inline()->radioList(['No' => 'No', 'Yes' => 'Yes'])->label(false); ?>
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
                        <?= $form->field($model, 'record_complete[hair_loss_right]')->inline()->radioList(['No' => 'No', 'Yes' => 'Yes'])->label(false); ?>

                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[hair_loss_left]')->inline()->radioList(['No' => 'No', 'Yes' => 'Yes'])->label(false); ?>

                    </div>
                </div>
                <!-- End Row -->

                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        2.2 Fungal infection
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[fungal_infection_right]')->inline()->radioList(['No' => 'No', 'Yes' => 'Yes'])->label(false); ?>

                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[fungal_infection_left]')->inline()->radioList(['No' => 'No', 'Yes' => 'Yes'])->label(false); ?>

                    </div>
                </div>
                <!-- End Row -->

                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        2.3 Color change
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[color_change_right]')->radioList(ArrayHelper::map(ItemsColorChange::find()->all(), 'id', 'name'))->label(false); ?>

                    </div>
                    <!-- End Col -->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[color_change_left]')->radioList(ArrayHelper::map(ItemsColorChange::find()->all(), 'id', 'name'))->label(false); ?>

                    </div>
                </div>
                <!-- End Row -->

                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        2.4 Skin condition
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[skin_condition_right]')->radioList(ArrayHelper::map(ItemsSkinCondition::find()->all(), 'id', 'name'))->label(false); ?>

                    </div>
                    <!-- End Col -->
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[skin_condition_left]')->radioList(ArrayHelper::map(ItemsSkinCondition::find()->all(), 'id', 'name'))->label(false); ?>

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
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
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
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        <!-- Interspace -->
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[interspace_right]')->radioList(ArrayHelper::map(ItemsInterspace::find()->all(), 'id', 'name'))->label(false); ?>
                        <?= $form->field($model, 'record_complete[callus_right]')->checkbox()->label('Callus'); ?>
                        <?= $form->field($model, 'record_complete[callus_select_right]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->where('id < 5')->all(), 'id', 'name'))->label(false); ?>


                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[interspace_left]')->radioList(ArrayHelper::map(ItemsInterspace::find()->all(), 'id', 'name'))->label(false); ?>
                        <?= $form->field($model, 'record_complete[callus_left]')->checkbox()->label('Callus'); ?>
                        <?= $form->field($model, 'record_complete[callus_select_left]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->where('id < 5')->all(), 'id', 'name'))->label(false); ?>

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
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
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
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        <!-- Temperature change -->
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[temperature_change_right]')->radioList(ArrayHelper::map(ItemsTemperatureChange::find()->all(), 'id', 'name'))->label(false); ?>
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[temperature_change_left]')->radioList(ArrayHelper::map(ItemsTemperatureChange::find()->all(), 'id', 'name'))->label(false); ?>
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
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-23">
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
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        <!-- Temperature change -->
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[toenail_problem_right]')->inline()->radioList(['No' => 'No', 'Yes' => 'Yes'])->label(false); ?>
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[toenail_problem_left]')->inline()->radioList(['No' => 'No', 'Yes' => 'Yes'])->label(false); ?>
                    </div>
                </div>
                <!-- End Row -->


                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        Fungal nail
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[fungal_nail_right]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(), 'id', 'name'))->label(false); ?>
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[fungal_nail_left]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(), 'id', 'name'))->label(false); ?>

                    </div>
                </div>
                <!-- End Row -->

                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        Hypertrophic
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[hypertrophic_right]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(), 'id', 'name'))->label(false); ?>
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[hypertrophic_left]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(), 'id', 'name'))->label(false); ?>
                    </div>
                </div>
                <!-- End Row -->

                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        Distrophic
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[distrophic_right]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(), 'id', 'name'))->label(false); ?>
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[distrophic_left]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(), 'id', 'name'))->label(false); ?>
                    </div>
                </div>
                <!-- End Row -->

                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        Discolored
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[discolored_right]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(), 'id', 'name'))->label(false); ?>
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[discolored_left]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(), 'id', 'name'))->label(false); ?>
                    </div>
                </div>
                <!-- End Row -->

                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        Elongated
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[elongated_right]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(), 'id', 'name'))->label(false); ?>
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[elongated_left]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(), 'id', 'name'))->label(false); ?>
                    </div>
                </div>
                <!-- End Row -->

                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        Ingrown
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[ingrown_right]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(), 'id', 'name'))->label(false); ?>
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[ingrown_left]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(), 'id', 'name'))->label(false); ?>
                    </div>
                </div>
                <!-- End Row -->

                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        Involuted
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[involuted_right]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(), 'id', 'name'))->label(false); ?>
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[involuted_left]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(), 'id', 'name'))->label(false); ?>
                    </div>
                </div>
                <!-- End Row -->

                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        Splitting
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[splitting_right]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(), 'id', 'name'))->label(false); ?>
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[splitting_left]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(), 'id', 'name'))->label(false); ?>
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
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
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
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        specify type and site on figure
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[skin_sesion_right]')->inline()->radioList(['No' => 'No', 'Yes' => 'Yes'])->label(false); ?>
                        <?= $form->field($model, 'record_complete[skin_sesion_callus_right]')->checkBox()->label('Callus'); ?>
                        <?= $form->field($model, 'record_complete[skin_sesion_callus_number_right]')->textInput()->label(false); ?>

                        <?= $form->field($model, 'record_complete[skin_sesion_corn_right]')->checkBox()->label('Corn'); ?>
                        <?= $form->field($model, 'record_complete[skin_sesion_corn_number_right]')->textInput()->label(false); ?>

                        <?= $form->field($model, 'record_complete[skin_sesion_wart_right]')->checkBox()->label('Wart'); ?>
                        <?= $form->field($model, 'record_complete[skin_sesion_wart_number_right]')->textInput()->label(false); ?>


                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[skin_sesion_left]')->inline()->radioList(['No' => 'No', 'Yes' => 'Yes'])->label(false); ?>
                        <?= $form->field($model, 'record_complete[skin_sesion_callus_left]')->checkBox()->label('Callus'); ?>
                        <?= $form->field($model, 'record_complete[skin_sesion_callus_number_left]')->textInput()->label(false); ?>

                        <?= $form->field($model, 'record_complete[skin_sesion_corn_left]')->checkBox()->label('Corn'); ?>
                        <?= $form->field($model, 'record_complete[skin_sesion_corn_number_left]')->textInput()->label(false); ?>

                        <?= $form->field($model, 'record_complete[skin_sesion_wart_left]')->checkBox()->label('Wart'); ?>
                        <?= $form->field($model, 'record_complete[skin_sesion_wart_number_left]')->textInput()->label(false); ?>


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
    <!-- <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2"> -->
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
        <div class="box-card">
            <div class="box-border">
                <div class="box-title">3. Musculoskeletal examination</div>
                <h5 class="text-center">3.1 Foot type</h5>
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
                        specify type and site on figure
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[ingrown_right]')->radioList(ArrayHelper::map(ItemsFootType::find()->all(), 'id', 'name'))->label(false); ?>

                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[ingrown_left]')->radioList(ArrayHelper::map(ItemsFootType::find()->all(), 'id', 'name'))->label(false); ?>
                    </div>
                </div>
                <!-- End Row -->


                <!-- Start Row -->
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


                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        3.2 Silfverskiold test
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[silfverskiold_test_right]')->radioList(ArrayHelper::map(ItemsSilfverskioldTest::find()->all(), 'id', 'name'))->label(false); ?>

                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[silfverskiold_test_left]')->radioList(ArrayHelper::map(ItemsSilfverskioldTest::find()->all(), 'id', 'name'))->label(false); ?>
                    </div>
                </div>
                <!-- End Row -->

                <!-- Start Row -->
                <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4 col-md-offset-3">
                        <p>Right</p>
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <p>Left</p>
                    </div>
                    <!-- End Row -->
                </div>

                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        3.3 Deformities
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[deformities_right]')->inline()->radioList(['No' => 'No', 'Yes' => 'Yes'])->label(false); ?>
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[deformities_left]')->inline()->radioList(['No' => 'No', 'Yes' => 'Yes'])->label(false); ?>
                    </div>
                </div>
                <!-- End Row -->

                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        3.3.1 Claw toe
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[claw_toe_right]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(), 'id', 'name'))->label(false); ?>
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[claw_toe_left]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(), 'id', 'name'))->label(false); ?>
                    </div>
                </div>
                <!-- End Row -->

                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        3.3.2 Hammer toe
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[hammer_toe_right]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(), 'id', 'name'))->label(false); ?>
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[hammer_toe_left]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(), 'id', 'name'))->label(false); ?>
                    </div>
                </div>
                <!-- End Row -->

                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        3.3.3 Mallet toe
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[mallet_toe_right]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(), 'id', 'name'))->label(false); ?>
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[mallet_toe_left]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(), 'id', 'name'))->label(false); ?>
                    </div>
                </div>
                <!-- End Row -->

                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        3.3.4 Hallux Valgus
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[hallux_valgus_right]')->inline()->radioList(['No' => 'No', 'Yes' => 'Yes'])->label(false); ?>
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[hallux_valgus_left]')->inline()->radioList(['No' => 'No', 'Yes' => 'Yes'])->label(false); ?>
                    </div>
                </div>
                <!-- End Row -->

                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        3.3.5 Hallux Varus
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[hallux_varus_right]')->inline()->radioList(['No' => 'No', 'Yes' => 'Yes'])->label(false); ?>
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[hallux_varus_left]')->inline()->radioList(['No' => 'No', 'Yes' => 'Yes'])->label(false); ?>
                    </div>
                </div>
                <!-- End Row -->

                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        3.3.6 Hallux Rigidus/Limitus
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[hallux_igidus_right]')->inline()->radioList(['No' => 'No', 'Yes' => 'Yes'])->label(false); ?>
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[hallux_igidus_left]')->inline()->radioList(['No' => 'No', 'Yes' => 'Yes'])->label(false); ?>
                    </div>
                </div>
                <!-- End Row -->

                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        3.3.7 Bunion
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[bunion_right]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(), 'id', 'name'))->label(false); ?>
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[bunion_left]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(), 'id', 'name'))->label(false); ?>
                    </div>
                </div>
                <!-- End Row -->

                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        3.3.8 Bunionette
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[bunionette_right]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(), 'id', 'name'))->label(false); ?>
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[bunionette_left]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(), 'id', 'name'))->label(false); ?>
                    </div>
                </div>
                <!-- End Row -->


                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        3.3.9 Charcot Foot
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[charcot_foot_right]')->inline()->radioList(['No' => 'No', 'Yes' => 'Yes'])->label(false); ?>
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[charcot_foot_left]')->inline()->radioList(['No' => 'No', 'Yes' => 'Yes'])->label(false); ?>
                    </div>
                </div>
                <!-- End Row -->

                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        3.3.10 Post surgical deformity
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[post_surgical_deformity_right]')->inline()->radioList(['No' => 'No', 'Yes' => 'Yes'])->label(false); ?>
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[post_surgical_deformity_left]')->inline()->radioList(['No' => 'No', 'Yes' => 'Yes'])->label(false); ?>
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
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
        <div class="box-card">
            <div class="box-border">
                <div class="box-title">4. Neuropathy assessment</div>
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
                        4.1 Neuropathic symptom
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[neuropathic_symptom_right]')->inline()->radioList(['No' => 'No', 'Yes' => 'Yes'])->label(false); ?>

                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[neuropathic_symptom_left]')->inline()->radioList(['No' => 'No', 'Yes' => 'Yes'])->label(false); ?>

                    </div>
                </div>
                <!-- End Row -->

                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        specify type and site
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[neuropathic_symptom_specify_right]')->checkboxList(ArrayHelper::map(ItemsNeuropathicSymptom::find()->all(), 'id', 'name'))->label(false); ?>


                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[neuropathic_symptom_specify_left]')->checkboxList(ArrayHelper::map(ItemsNeuropathicSymptom::find()->all(), 'id', 'name'))->label(false); ?>

                    </div>
                </div>
                <!-- End Row -->

                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        4.2 Monofilament (10g)
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[neuropathic_symptom_specify_right]')->checkboxList(ArrayHelper::map(ItemsMonofilament::find()->all(), 'id', 'name'))->label(false); ?>


                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[neuropathic_symptom_specify_left]')->checkboxList(ArrayHelper::map(ItemsMonofilament::find()->all(), 'id', 'name'))->label(false); ?>

                    </div>
                </div>
                <!-- End Row -->


                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        4.3 Tuning fork (128 Hz) at hallux
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[tuning_fork_right]')->checkboxList(ArrayHelper::map(ItemsTuningFork::find()->all(), 'id', 'name'))->label(false); ?>


                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[tuning_fork_left]')->checkboxList(ArrayHelper::map(ItemsTuningFork::find()->all(), 'id', 'name'))->label(false); ?>

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
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
        <div class="box-card">
            <div class="box-border">
                <div class="box-title">5. Vascular assessment</div>
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
                        5.1 Vascular symptom
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[vascular_symptom_right]')->inline()->radioList(['No' => 'No', 'Yes' => 'Yes'])->label(false); ?>

                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[vascular_symptom_left]')->inline()->radioList(['No' => 'No', 'Yes' => 'Yes'])->label(false); ?>

                    </div>
                </div>
                <!-- End Row -->

                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        5.1.1 Intermittent claudication
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[intermittent_claudication_right]')->inline()->radioList(['No' => 'No', 'Yes' => 'Yes'])->label(false); ?>
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[intermittent_claudication_left]')->inline()->radioList(['No' => 'No', 'Yes' => 'Yes'])->label(false); ?>
                    </div>
                </div>
                <!-- End Row -->

                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        5.1.2 Rest pain
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[rest_pain_right]')->inline()->radioList(['No' => 'No', 'Yes' => 'Yes'])->label(false); ?>
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[rest_pain_left]')->inline()->radioList(['No' => 'No', 'Yes' => 'Yes'])->label(false); ?>
                    </div>
                </div>
                <!-- End Row -->

                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        5.1.3 Gangrene
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[gangrene_right]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(), 'id', 'name'))->label(false); ?>
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[gangrene_left]')->inline()->checkboxList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(), 'id', 'name'))->label(false); ?>
                    </div>
                </div>
                <!-- End Row -->

                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        5.1.4 Edema , specfify type
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                    </div>
                </div>
                <!-- End Row -->


                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        pitting edema
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[pitting_edema_right]')->inline()->checkboxList(ArrayHelper::map(ItemsPittingEdema::find()->all(), 'id', 'name'))->label(false); ?>
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[pitting_edema_left]')->inline()->checkboxList(ArrayHelper::map(ItemsPittingEdema::find()->all(), 'id', 'name'))->label(false); ?>
                    </div>
                </div>
                <!-- End Row -->


                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        non-pitting edema
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[non_pitting_edema_right]')->inline()->radioList(['No' => 'No', 'Yes' => 'Yes'])->label(false); ?>
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[non_pitting_edema_left]')->inline()->radioList(['No' => 'No', 'Yes' => 'Yes'])->label(false); ?>
                    </div>
                </div>
                <!-- End Row -->


   <!-- start box-sub-border -->
   <div class="box-sub-border">
                    <div class="box-sub-title"> 5.2 Vessel palpation</div>
                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                       
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                    </div>
                </div>
                <!-- End Row -->


                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        DP
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[dp_right]')->inline()->radioList(ArrayHelper::map(ItemsVesselPalpation::find()->where('id < 3')->all(), 'id', 'name'))->label(false); ?>
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[dp_left]')->inline()->radioList(ArrayHelper::map(ItemsVesselPalpation::find()->where('id < 3')->all(), 'id', 'name'))->label(false); ?>
                    </div>
                </div>
                <!-- End Row -->

                <!-- End Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        PT
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[tp_right]')->inline()->radioList(ArrayHelper::map(ItemsVesselPalpation::find()->where('id < 3')->all(), 'id', 'name'))->label(false); ?>
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                        <?= $form->field($model, 'record_complete[pt_left]')->inline()->radioList(ArrayHelper::map(ItemsVesselPalpation::find()->where('id < 3')->all(), 'id', 'name'))->label(false); ?>
                    </div>
                </div>
                <!-- End Row -->
</div>
   <!-- End box-sub-border -->

                <!-- start box-sub-border -->
                <div class="box-sub-border">
                    <div class="box-sub-title">5.3 Doppler</div>

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

                    <!-- End Row -->
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                            
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                            <?= $form->field($model, 'record_complete[doppler_right]')->radioList(ArrayHelper::map(ItemsDoppler::find()->all(), 'id', 'name'))->label(false); ?>
                        </div>
                        <!-- End Col -->
                        <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                            <?= $form->field($model, 'record_complete[doppler_left]')->radioList(ArrayHelper::map(ItemsDoppler::find()->all(), 'id', 'name'))->label(false); ?>
                        </div>
                    </div>
                    <!-- End Row -->

                </div>
                <!-- End box-sub-border -->

                <!-- start box-sub-border -->
                <div class="box-sub-border">
                    <div class="box-sub-title">5.4 Ankle/Brachial Index (ABI)</div>
                    <!-- End Row -->
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                            <!-- 5.4 Ankle/Brachial Index (ABI) -->
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                            <?= $form->field($model, 'record_complete[abi1_right]')->textInput()->label(false); ?>
                            <?= $form->field($model, 'record_complete[abi2_right]')->textInput()->label(false); ?>
                            <span class="label label-primary">00.00</span>
                            <?= $form->field($model, 'record_complete[abi_compressible_right]')->checkbox()->label('Non-compressible (>1.3)'); ?>
                        </div>
                        <!-- End Col -->
                        <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                            <?= $form->field($model, 'record_complete[abi1_left]')->textInput()->label(false); ?>
                            <?= $form->field($model, 'record_complete[abi2_left]')->textInput()->label(false); ?>
                            <span class="label label-primary">00.00</span>
                            <?= $form->field($model, 'record_complete[abi_compressible_left]')->checkbox()->label('Non-compressible (>1.3)'); ?>
                        </div>
                    </div>
                    <!-- End Row -->

                </div>
              <!-- End box-sub-border -->

               <!-- start box-sub-border -->
               <div class="box-sub-border">
                    <div class="box-sub-title">5.5 Toe pressure (mmHg)</div>
                    <!-- End Row -->
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                            <!-- 5.4 Ankle/Brachial Index (ABI) -->
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                            <?= $form->field($model, 'record_complete[toe_pressure_right]')->textInput()->label(false); ?>
                        </div>
                        <!-- End Col -->
                        <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                            <?= $form->field($model, 'record_complete[toe_pressure_left]')->textInput()->label(false); ?>
                        </div>
                    </div>
                    <!-- End Row -->

                </div>
              <!-- End box-sub-border -->


          <!-- start box-sub-border -->
          <div class="box-sub-border">
                    <div class="box-sub-title">Toe/Brachial Index (TBI)</div>
                    <!-- End Row -->
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                            <!-- 5.4 Ankle/Brachial Index (ABI) -->
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                            <?= $form->field($model, 'record_complete[tbi1_right]')->textInput()->label(false); ?>
                            <?= $form->field($model, 'record_complete[tbi2_right]')->textInput()->label(false); ?>
                            <span class="label label-primary">00.00</span>
                        </div>
                        <!-- End Col -->
                        <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                            <?= $form->field($model, 'record_complete[tbi1_left]')->textInput()->label(false); ?>
                            <?= $form->field($model, 'record_complete[tbi2_left]')->textInput()->label(false); ?>
                            <span class="label label-primary">00.00</span>
                        </div>
                    </div>
                    <!-- End Row -->

                </div>
              <!-- End box-sub-border -->

            </div>
            <!-- End Col -->
        </div>
        <!-- End box-border -->



       
    </div>
</div>
<!-- End Row -->