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
    color:#fff;
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
.box-border{
    background-color:#FFF;
    border-radius: 5px;
    padding: 10px;
    margin-top: 15px;
}

.control-label {
    display: inline-block;
    max-width: 100%;

    font-weight: 700;
    /* color: #039285; */
}
#footassessment-record_complete-specify_site_digit_right ,
#footassessment-record_complete-specify_site_digit_left{

    display: block;
    margin-top: -10px;
    background-color: #e2e2e2;
    padding: 6px;
    border-radius: 5px;
}
#footassessment-record_complete-using_ambulation_aid{
    display: block;
    margin-top: 10px;
    background-color: #e2e2e2;
    padding: 6px;
    border-radius: 5px;
}
</style>
<!-- <h3>Foot Assessment Record Complete</h3> -->
<?php $form = ActiveForm::begin(); ?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
    <div class="box-border">
        <?= $form->field($model, 'record_complete[occupation]')->checkboxList(ArrayHelper::map(ItemsOccupation::find()->all(),'id','name'))->label('<i class="fas fa-user-graduate" style="color:#039285"></i> Occupation'); ?>
    </div> <!--End box-border-->
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
    <div class="box-border">
        <?= $form->field($model, 'record_complete[smoking]')->radioList(ArrayHelper::map(ItemsSmokingFoot::find()->all(),'id','name'))->label('<i class="fas fa-smoking" style="color:#039285"></i> Smoking'); ?>
        <?= $form->field($model, 'record_complete[smoking_how_long_ago]')->radioList(ArrayHelper::map(ItemsSmokingHowLongAgo::find()->all(),'id','name'))->label('How Long Ago ?'); ?>
        </div> <!--End box-border-->
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
    <div class="box-border">
        <?= $form->field($model, 'record_complete[activity]')->radioList(ArrayHelper::map(ItemsActivity::find()->all(),'id','name'))->label('<i class="fas fa-user-clock" style="color:#039285"></i> Activity'); ?>
        </div> <!--End box-border-->
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
    <div class="box-border">
        <?= $form->field($model, 'record_complete[using_ambulation_aid]')->inline()->radioList(['No' => 'No','Yes' => 'Yes'])->label('<i class="fas fa-wheelchair" style="color:#039285"></i> Using ambulation aid'); ?>
        <?= $form->field($model, 'record_complete[specify]')->radioList(ArrayHelper::map(ItemsSpecify::find()->all(),'id','name'))->label('Specify'); ?>
        </div> <!--End box-border-->
    </div>

</div>
<!-- End Row 1 -->


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
    <div class="box-border">
        <?= $form->field($model, 'record_complete[specify_site_right]')->radioList(ArrayHelper::map(ItemsSpecifySite::find()->all(),'id','name'))->label('Specify type and site Right'); ?>
        <?= $form->field($model, 'record_complete[specify_site_digit_right]')->inline()->radioList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(),'id','name'))->label(false); ?>
        </div> <!--End box-border-->
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
    <div class="box-border">
        <?= $form->field($model, 'record_complete[specify_site_left]')->radioList(ArrayHelper::map(ItemsSpecifySite::find()->all(),'id','name'))->label('Specify type and site Left'); ?>
        <?= $form->field($model, 'record_complete[specify_site_digit_left]')->inline()->radioList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(),'id','name'))->label(false); ?>
        </div> <!--End box-border-->
    </div>
</div>




<?php ActiveForm::end(); ?>