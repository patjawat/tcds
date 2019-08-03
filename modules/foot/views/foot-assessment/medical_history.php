<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\web\View;
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



<!-- Start Row -->
<div class="row">
    <!-- start col -->
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
        <div class="box-card">
            <div class="box-border">
                <div class="box-title" style="width: 13%;">1. Occupation</div>
                <?=$form->field($model, 'record_complete[occupation]')
                ->checkboxList(
                    ArrayHelper::map(ItemsOccupation::find()->all(),'id','name'),['itemOptions' => ['class' => 'occupation','id' => 'occupation']])
                ->label(false);
                ?>
                <?= $form->field($model, 'record_complete[occupation_other]')->textArea(['id' => 'occupation_other'])->label(false);?>
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
                <div class="box-title" style="width: 13%;">2. Smoking</div>
                <?= $form->field($model, 'record_complete[smoking]')->radioList(ArrayHelper::map(ItemsSmokingFoot::find()->all(),'id','name'),['itemOptions' => ['class'=> 'smoking_item']])->label(false); ?>
                <div id="how_long_ago">
                    <?= $form->field($model, 'record_complete[smoking_how_long_ago]')->radioList(ArrayHelper::map(ItemsSmokingHowLongAgo::find()->all(),'id','name'))->label('How Long Ago ?'); ?>
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
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
        <div class="box-card">
            <div class="box-border">
                <div class="box-title" style="width: 13%;">3. Activity</div>
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
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
        <div class="box-card">
            <div class="box-border">
                <div class="box-title" style="width:27%;">4. Using ambulation aid</div>
                <?= $form->field($model, 'record_complete[using_ambulation_aid]')->inline()->radioList(['No' => 'No','Yes' => 'Yes'],['itemOptions' => ['class'=> 'using_ambulation_aid']])->label(false); ?>
                <div class="specify_site">
                    <?= $form->field($model, 'record_complete[specify]')->radioList(ArrayHelper::map(ItemsSpecify::find()->all(),'id','name'),['itemOptions' => ['class'=> 'using_ambulation_aid_specify_site']])->label('Specify'); ?>
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
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
        <div class="box-card">
            <div class="box-border">

                <div class="box-title" style="width:20%;">5. Previous foot ulcer</div>
                <div class="row">
                    <h4 class="text-center">Specify site</h4>

                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <p class="text-center">Right</p>
                        <div class="item-text-center">
                            <?= $form->field($model, 'record_complete[ulcer_check_right]')->inline()->radioList(['No' => 'No','Yes' => 'Yes'],
                            ['itemOptions' => 
                            [
                                'class'=> 'ulcer_check_right',
                                'onclick' => 'return previousFootUlcer($(this).val(),".ulcer_check_items_right")'
                            ]])->label(false); ?>
                        </div>

                        <div class="ulcer_check_items_right"
                            <?=$model->record_complete['ulcer_check_right']  == 'Yes' ? '' :'hidden';?>>
                            <?= $form->field($model, 'record_complete[ulcer_right]')
                            ->radioList(ArrayHelper::map(ItemsSpecifyTypeSite::find()
                            ->all(),'id','name'),[
                                'itemOptions' => [
                                'class'=> 'ulcer_check_right',
                                'onclick' => 'return previousFootUlcerDigit($(this).val(),".ulcer_digit_right")'
                                ]])->label(false); ?>
                        </div>

                        <div class="ulcer_digit_right"
                            <?=$model->record_complete['ulcer_right']  == '4' ? '' :'hidden';?>>
                            <?= $form->field($model, 'record_complete[ulcer_digit_right]')->inline()
                        ->radioList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(),'id','name'))
                        ->label(false); ?>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <p class="text-center">Left</p>
                        <div class="item-text-center">
                            <?= $form->field($model, 'record_complete[ulcer_check_left]')->inline()->radioList(['No' => 'No','Yes' => 'Yes'],['itemOptions' => [
                                'class'=> 'ulcer_check_left',
                                'onclick' => 'return previousFootUlcer($(this).val(),".ulcer_check_items_left")'
                                ]])->label(false); ?>
                        </div>
                        <div class="ulcer_check_items_left"
                            <?=$model->record_complete['ulcer_check_left'] == 'Yes' ? '' :'hidden';?>>
                            <?= $form->field($model, 'record_complete[ulcer_left]')->radioList(ArrayHelper::map(ItemsSpecifyTypeSite::find()
                            ->all(),'id','name'),
                            [
                                'itemOptions' => [
                                'class'=> 'ulcer_check_right',
                                'onclick' => 'return previousFootUlcerDigit($(this).val(),".ulcer_digit_left")'
                                ]]
                                )->label(false); ?>
                        </div>
                        <div class="ulcer_digit_left"
                            <?=$model->record_complete['ulcer_left']  == '4' ? '' :'hidden';?>>
                            <?= $form->field($model, 'record_complete[ulcer_digit_left]')->inline()->radioList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(),'id','name'))->label(false); ?>
                        </div>
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
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
        <div class="box-card">
            <div class="box-border">

                <div class="box-title" style="width:23%;">6. Previous amputation</div>
                <h4 class="text-center">Specify type and site</h4>
                <!-- Start Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

                        <p class="text-center">Right</p>
                        <div class="item-text-center">
                            <?= $form->field($model, 'record_complete[amputation_check_right]')->inline()->radioList(['No' => 'No','Yes' => 'Yes'],
                            ['itemOptions' => 
                            [
                                'class'=> 'amputation_check_right',
                                'onclick' => 'return previousAmputation($(this).val(),".amputation_right")'
                            ]])->label(false); ?>
                        </div>

                        <div class="amputation_right"
                            <?=$model->record_complete['amputation_check_right'] == 'Yes' ? '' :'hidden';?>>
                            <?= $form->field($model, 'record_complete[amputation_right]')->radioList(ArrayHelper::map(ItemsSpecifySite::find()->all(),'id','name'),
                          [
                            'itemOptions' => [
                            'class'=> 'ulcer_check_right',
                            'onclick' => 'return previousAmputationDigit($(this).val(),".amputation_digit_right")'
                            ]]
                            )->label(false); ?>
                        </div>
                        <div class="amputation_digit_right"
                            <?=$model->record_complete['amputation_right'] == '7' ? '' :'hidden';?>>
                            <?= $form->field($model, 'record_complete[amputation_digit_right]')->inline()->radioList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(),'id','name'))->label(false); ?>
                        </div>

                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <p class="text-center">Left</p>
                        <div class="item-text-center">
                            <?= $form->field($model, 'record_complete[amputation_check_left]')->inline()->radioList(['No' => 'No','Yes' => 'Yes'],
                           ['itemOptions' => 
                           [
                               'class'=> 'amputation_check_left',
                               'onclick' => 'return previousAmputation($(this).val(),".amputation_left")'
                           ]])->label(false); ?>
                        </div>
                        <div class="amputation_left"
                            <?=$model->record_complete['amputation_check_left'] == 'Yes' ? '' :'hidden';?>>
                            <?= $form->field($model, 'record_complete[amputation_left]')->radioList(ArrayHelper::map(ItemsSpecifySite::find()->all(),'id','name'),
                         [
                            'itemOptions' => [
                            'class'=> 'ulcer_check_left',
                            'onclick' => 'return previousAmputationDigit($(this).val(),".amputation_digit_left")'
                            ]]
                            )->label(false); ?>
                        </div>

                        <div class="amputation_digit_left"
                            <?=$model->record_complete['amputation_left'] == '7' ? '' :'hidden';?>>
                            <?= $form->field($model, 'record_complete[amputation_digit_left]')->inline()->radioList(ArrayHelper::map(ItemsSpecifySiteDigit::find()->all(),'id','name'))->label(false); ?>
                        </div>

                    </div>
                </div>
                <!-- End Row -->

                <h4 class="text-center">Prosthesis</h4>
                <!-- Start Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <p class="text-center">Right</p>
                        <div class="item-text-center">
                            <?= $form->field($model, 'record_complete[prosthesis_right]')->inline()->radioList(['No' => 'No','Yes' => 'Yes'],
                            ['itemOptions' => 
                            [
                                'onclick' => '{ 
                                    if($(this).val() == "Yes"){
                                        $(".prosthesis_for_right").show(300);
                                    }else{
                                        $(".prosthesis_for_right").hide(300);
                                    }
                                }'
                            ]])->label(false); ?>
                        </div>
                        <div class="prosthesis_for_right" <?=$model->record_complete['prosthesis_right'] == 'Yes' ? '' : 'hidden';?>>
                            <?= $form->field($model, 'record_complete[prosthesis_for_right]')->radioList(ArrayHelper::map(ItemsProsthesisFor::find()->all(),'id','name'))->label(false); ?>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <p class="text-center">Left</p>
                        <div class="item-text-center">
                            <?= $form->field($model, 'record_complete[prosthesis_left]')->inline()->radioList(['No' => 'No','Yes' => 'Yes'],
                            ['itemOptions' => 
                            [
                                'onclick' => '{ 
                                    if($(this).val() == "Yes"){
                                        $(".prosthesis_for_left").show(300);
                                    }else{
                                        $(".prosthesis_for_left").hide(300);
                                    }
                                }'
                            ]])->label(false); ?>
                        </div>
                        <div class="prosthesis_for_left" <?=$model->record_complete['prosthesis_left'] == 'Yes' ? '' : 'hidden';?>>
                            <?= $form->field($model, 'record_complete[prosthesis_for_left]')->radioList(ArrayHelper::map(ItemsProsthesisFor::find()->all(),'id','name'))->label(false); ?>
                        </div>
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

                <div class="box-title" style="width:27%;">7. Previous revascularization</div>
                <?php
                //print_r($model->record_complete['right_evt'])
                ?>
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <p class="text-center">Right</p>
                        <div class="item-text-center">
                            <?php echo  $form->field($model, 'record_complete[revascularization_right]')->inline()->radioList(['No' => 'No','Yes' => 'Yes'])->label(false); ?>
                        </div>
                        <?=$form->field($model, 'record_complete[right_evt]')->checkbox()->label('EVT'); ?>
                        <?= DatePicker::widget(['model' => $model,
                                                'attribute' => 'record_complete[right_evt_date]',
                                                'template' => '{addon}{input}',
                                                'language' => 'th', // Thai B.E.
                                                    'clientOptions' => [
                                                        'autoclose' => true,
                                                        'format' => 'dd/mm/yyyy'
                                                    ]
                                            ]);?>
                        <br>
                        <?=$form->field($model, 'record_complete[right_evt_note]')->textArea()->label(false); ?>

                        <?=$form->field($model, 'record_complete[right_bypass]')->checkbox()->label('ฺBypass'); ?>
                        <?= DatePicker::widget(['model' => $model,
                                                'attribute' => 'record_complete[right_bypass_date]',
                                                'template' => '{addon}{input}',
                                                'language' => 'th', // Thai B.E.
                                                    'clientOptions' => [
                                                        'autoclose' => true,
                                                        'format' => 'dd/mm/yyyy'
                                                    ]
                                            ]);?>
                        <br>
                        <?=$form->field($model, 'record_complete[right_bypass_note]')->textArea()->label(false); ?>




                        <?=$form->field($model, 'record_complete[right_hybrid]')->checkbox()->label('ฺHybrid'); ?>
                        <?= DatePicker::widget(['model' => $model,
                                                'attribute' => 'record_complete[right_hybrid_date]',
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
                        <?=$form->field($model, 'record_complete[left_evt]')->checkbox()->label('EVT'); ?>
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

                        <?=$form->field($model, 'record_complete[left_bypass]')->checkbox()->label('ฺBypass'); ?>
                        <?= DatePicker::widget(['model' => $model,
                                                'attribute' => 'record_complete[left_bypass_date]',
                                                'template' => '{addon}{input}',
                                                'language' => 'th', // Thai B.E.
                                                    'clientOptions' => [
                                                        'autoclose' => true,
                                                        'format' => 'dd/mm/yyyy'
                                                    ]
                                            ]);?>
                        <br>
                        <?=$form->field($model, 'record_complete[left_bypass_note]')->textArea()->label(false); ?>




                        <?=$form->field($model, 'record_complete[left_hybrid]')->checkbox(['uncheck' =>null, 'checked' => '1'])->label('ฺHybrid'); ?>
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



<?php
$js = <<< JS
occupationOtherCheck()
// previousFootUlcer($(".ulcer_check_right:checked").val(),".ulcer_check_items_right")
// previousFootUlcer($(".ulcer_check_left:checked").val(),".ulcer_check_items_left")

// previousFootUlcerDigit("#footassessment-record_complete-ulcer_right > div > label > input","#footassessment-record_complete-ulcer_digit_right")
// previousFootUlcerDigit("#footassessment-record_complete-ulcer_left > div > label > input","#footassessment-record_complete-ulcer_digit_left")

// previousAmputation($(this).val(),"#footassessment-record_complete-amputation_right")
// previousAmputationDigit("#footassessment-record_complete-amputation_right  > div > label > input","#footassessment-record_complete-amputation_digit_right")

$(".occupation").click(function(e, parameters) {
var nonUI = false;
try {
    nonUI = parameters.nonUI;
} catch (e) {}
var checked = nonUI ? !this.checked : this.checked;
// alert('Checked = ' + checked);
var value = e.target.value;
if(checked == true){
    if(value == 11){
        $('#occupation_other').css("background-color",'#fff').prop('readonly', false);
    }
   console.log('checked'+value);
}else{
   console.log('Uncheck'+value);
  
    if(value == 11){
        $('#occupation_other').css("background-color",'#eee').prop('readonly', true);
        $('#occupation_other').val('');
    }
}
});

usingAmbulationAid()
smoking()

$('.using_ambulation_aid').click(function (e) { 
    // e.preventDefault();
    // console.log(e.target.value)
    usingAmbulationAid()
    
});

$('.smoking_item').click(function (e) { 
    smoking()
});

function occupationOtherCheck(){
    $('#footassessment-record_complete-occupation > div > label > input').each(function(index, e){
 // statement
    if(e.checked == true & e.value == 11){
        console.log(e.value)
        $('#occupation_other').css("background-color",'#fff').prop('readonly', false);
    }else{
        $('#occupation_other').css("background-color",'#eee').prop('readonly', true);
        $('#occupation_other').val('');
    }
});
}

function usingAmbulationAid(){
var val = $(".using_ambulation_aid:checked").val();
    if(val == 'Yes'){
        $('.specify_site').show(300)
    }else{
        $('.specify_site').hide(300);
    }
}
//2. Smoking
function smoking(){
    $('#footassessment-record_complete-smoking > div > label > input').each(function(index, e){
    if(e.checked == true & e.value == 3){
        console.log(e.value)
        $('#how_long_ago').show(300)
    }else{
        $('#how_long_ago').hide(300)
    }
   
});
}

//5. Previous foot ulcer
function previousFootUlcer(val,position){
        if(val == 'Yes'){
            $(position).show(300)
            
        }else{
            $(position).hide(300);
        }
}
// 5. Previous foot ulcer Digit
function previousFootUlcerDigit(val,position){
        if(val == 4){
            $(position).show(300)
        }else{
            $(position).hide(300)
        }
        // $('.ulcer_digit_right').show(300)
    console.log(position)
    // alert(position)
    

}

//6. Previous amputation
function previousAmputation(val,position){
    if(val == 'Yes'){
            $(position).show(300)
            // console.log(val,position)
            // previousAmputationDigit(position)
            
        }else{
            $(position).hide(300);
            // console.log(val,position)
            // previousAmputationDigit(position)


        }
}

function previousAmputationDigit(val,position){

    if(val == 7){
        console.log(position)
        $(position).show(300)
    }else{
        $(position).hide(300)
    }

}




JS;
$this->registerJS($js,View::POS_END, 'my-options');
?>