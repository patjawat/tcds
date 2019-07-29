<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
// use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\foot\models\ItemsOccupation;
use app\modules\foot\models\ItemsSmokingFoot;
use app\modules\foot\models\ItemsSmokingHowLongAgo;
use app\modules\foot\models\ItemsActivity;
use app\modules\foot\models\ItemsSpecify;
use app\modules\foot\models\ItemsSpecifySiteDigit;
use app\modules\foot\models\ItemsSpecifySite;
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
    background-color: #039285;
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
    border-radius: 5px;
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
    /* width: 17%; */
    text-align: -webkit-center;
    padding: 2px;
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
<?php $form = ActiveForm::begin(); ?>

<div class="box-card">


    <!-- Start Row -->
    <div class="row">
        <!-- start col -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
            <div class="box-border">
                <div class="box-title">1. Occupation</div>
                <?= $form->field($model, 'record_complete[occupation]')->checkboxList(ArrayHelper::map(ItemsOccupation::find()->all(),'id','name'))->label(false); ?>
            </div>
        </div>
        <!-- End Col -->
        <!-- start col -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
            <div class="box-border">
                <div class="box-title">2. Smoking</div>
                <?= $form->field($model, 'record_complete[smoking]')->radioList(ArrayHelper::map(ItemsSmokingFoot::find()->all(),'id','name'))->label(false); ?>
                <?= $form->field($model, 'record_complete[smoking_how_long_ago]')->radioList(ArrayHelper::map(ItemsSmokingHowLongAgo::find()->all(),'id','name'))->label('How Long Ago ?'); ?>
            </div>
        </div>
        <!-- End Col -->
        <!-- start col -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
            <div class="box-border">
                <div class="box-title">3. Activity</div>
                <?= $form->field($model, 'record_complete[activity]')->radioList(ArrayHelper::map(ItemsActivity::find()->all(),'id','name'))->label(false); ?>
            </div>
            <!-- end 3. Activity -->

            <div class="box-border">
                <div class="box-title">4. Using ambulation aid</div>
                <?= $form->field($model, 'record_complete[using_ambulation_aid]')->inline()->radioList(['No' => 'No','Yes' => 'Yes'])->label(false); ?>
                <?= $form->field($model, 'record_complete[specify]')->radioList(ArrayHelper::map(ItemsSpecify::find()->all(),'id','name'))->label('Specify'); ?>

            </div>
            <!-- End 4. Using ambulation aid -->

        </div>
        <!-- End Col -->

       
    </div>
    <!-- End Row -->

    <!-- start Row 2 -->
    
    <div class="row">
          <!-- start col -->
          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
            <div class="box-border">
                <div class="box-title">5. Specify type and site</div>

                
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    Right
                    <?= $form->field($model, 'record_complete[specify_site_right]')->radioList(ArrayHelper::map(ItemsSpecifySite::find()->all(),'id','name'))->label(false); ?>
        <?= $form->field($model, 'record_complete[specify_site_digit_right]')->inline()->radioList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(),'id','name'))->label(false); ?>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    Left
                    <?= $form->field($model, 'record_complete[specify_site_right]')->radioList(ArrayHelper::map(ItemsSpecifySite::find()->all(),'id','name'))->label(false); ?>
        <?= $form->field($model, 'record_complete[specify_site_digit_right]')->inline()->radioList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(),'id','name'))->label(false); ?>
                        </div>
                </div>
                
               
            </div>
        </div>
        <!-- End Col -->

    </div>
    <!-- End Row2 -->
    

</div>
<!-- End box-borderbox-border -->

<br><br>
<!-- ============ step 1. Occupation =========== -->
<div class="process-box" data-aos="fade-right" data-aos-duration="1000">
    <div class="row">
        <div class="col-md-5">
            <div class="process-step">
                <p class="m-0 p-0">1. Occupation</p>
                <h2 class="m-0 p-0"><i class="fas fa-user-graduate" style="color:#fff;"></i></h2>
            </div>
        </div>
        <div class="col-md-7">
            <h5>ข้อมูลการประกอบอาชีพ</h5>
        </div>
    </div>


</div>

<?php ActiveForm::end(); ?>


<?php
$js = <<< JS
AOS.init();
JS;
$this->registerJS($js);
?>