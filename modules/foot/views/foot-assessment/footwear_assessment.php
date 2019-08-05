<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use karatae99\datepicker\DatePicker;
use app\modules\foot\models\ItemsTypeOfFootwear;
use app\modules\foot\models\ItemsStock;
use app\modules\foot\models\ItemsStockSometimes;
?>
<!-- Start Row -->
<div class="row">
    <!-- start col -->
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
        <div class="box-card">
            <div class="box-border">
                <div class="box-title">3.1 Foot size</div>
                <?= $form->field($model, 'record_complete[foot_size]')->textInput()->label(false); ?>
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
                <div class="box-title">3.2 Type of footwear (indoor)</div>
                <?= $form->field($model, 'record_complete[footwear_indoor]')->radioList(ArrayHelper::map(ItemsTypeOfFootwear::find()->all(), 'id', 'name'))->label(false); ?>                
                <?= $form->field($model, 'record_complete[footwear_indoor_other]')->textInput()->label(false); ?>

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
                <div class="box-title">3.3 Type of footwear (outdoor)</div>
                <?= $form->field($model, 'record_complete[footwear_outdoor]')->radioList(ArrayHelper::map(ItemsTypeOfFootwear::find()->all(), 'id', 'name'))->label(false); ?>                
                <?= $form->field($model, 'record_complete[footwear_outdoor_other]')->textInput()->label(false); ?>

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
                <div class="box-title">3.4 Type of footwear (exercise)</div>
                <?= $form->field($model, 'record_complete[footwear_exercise]')->radioList(ArrayHelper::map(ItemsTypeOfFootwear::find()->all(), 'id', 'name'))->label(false); ?>                
                <?= $form->field($model, 'record_complete[footwear_exercise_other]')->textInput()->label(false); ?>

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
                <div class="box-title">3.5 Sock</div>

                  <!-- End Row -->
                  <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        <!-- Interspace -->
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                    <?= $form->field($model, 'record_complete[stock]')->radioList(ArrayHelper::map(ItemsStock::find()->all(), 'id', 'name'))->label(false); ?>                
                    </div>
                    <!-- End Col -->
                    <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4">
                    <?= $form->field($model, 'record_complete[stock_use]')->radioList(ArrayHelper::map(ItemsStockSometimes::find()->all(), 'id', 'name'))->label(false); ?>                
                    </div>
                </div>
                <!-- End Row -->

            </div>
        </div>
        <!-- End Col -->
    </div>
</div>
<!-- End Row -->





