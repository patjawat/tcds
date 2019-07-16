
<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use phpnt\ICheck\ICheck;
use app\components\PatientHelper;
use kartik\datecontrol\DateControl;
$hn = PatientHelper::getCurrentHn();
$this->params['pt_title'] = PatientHelper::getPatientTitleByHn($hn);
$this->registerCss($this->render('../../dist/css/style.css'));
$this->registerJs($this->render('../../dist/js/script.js'));

use app\components\loading\ShowLoading;
echo ShowLoading::widget();

?>
<style>
.field-sfootulcerfuipd-first_visit{margin-top: 8px;}

.field-sfootulcerfuipd-abi1_right{display: inline-block;}
.field-sfootulcerfuipd-abi2_right{display: inline-block;}
.field-sfootulcerfuipd-abi3_right{display: inline-block;}
.field-sfootulcerfuipd-abi1_left{display: inline-block;}
.field-sfootulcerfuipd-abi2_left{display: inline-block;}
.field-sfootulcerfuipd-abi3_left{display: inline-block;}


.field-sfootulcerfuipd-tbi1_right{display: inline-block;}
.field-sfootulcerfuipd-tbi2_right{display: inline-block;}
.field-sfootulcerfuipd-tbi3_right{display: inline-block;}
.field-sfootulcerfuipd-tbi1_left{display: inline-block;}
.field-sfootulcerfuipd-tbi2_left{display: inline-block;}
.field-sfootulcerfuipd-tbi3_left{display: inline-block;}


.field-sfootulcerfuipd-tbi1_right{display: inline-block;}
.field-sfootulcerfuipd-tbi2_right{display: inline-block;}
.field-sfootulcerfuipd-tbi3_right{display: inline-block;}
.field-sfootulcerfuipd-tbi1_left{display: inline-block;}
.field-sfootulcerfuipd-tbi2_left{display: inline-block;}
.field-sfootulcerfuipd-tbi3_left{display: inline-block;}

.field-sfootulcerfuipd-post_amputation_type{display: inline-block;}
.field-sfootulcerfuipd-post_amputation_duration{display: inline-block;}
.field-sfootulcerfuipd-post_amputation_months{display: inline-block;}
.field-sfootulcerfuipd-post_amputation_year{display: inline-block;}

.field-sfootulcerfuipd-post_revascularization_type{display: inline-block;}
.field-sfootulcerfuipd-post_revascularization_duration{display: inline-block;}
.field-sfootulcerfuipd-post_revascularization_months{display: inline-block;}
.field-sfootulcerfuipd-post_revascularization_year{display: inline-block;}
</style>
<?=$this->render('@app/modules_share/foot/views/default/panel_top',[
    'tabimage' => '',
    'tabsummary' => '',
    'tabcomplate' =>'',
    'tabfirst' =>'',
    'tabfu'=>'active' 
    ])?>
    <br>
    <?=$this->render('../default/foot-ulcer-fu/top',['opd'=>'','ipd' => 'active'])?>

<h4 style="text-align: center;color:#777;">IPD DIABETIC FOOT ULCER VISIT RECORD : ipd DFU FIRST VISIT</h4>
<br>
<?php $form = ActiveForm::begin([
    'id' => 'form',
    'action' => ['/foot/foot-ulcer-fu-ipd'],
    ]); ?>

<div class="row">
    <div class="col-xs-1 col-sm-1 col-md-2 col-lg-1">
    <?= $form->field($model, 'first_visit')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_CHECBOX_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => [
            1 => 'First visit',
        ],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="checkbox" id="first_visit'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="first_visit'.$index.'">'.$label.'</label>';
          }
      ]])->label(false);?>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <?=$form->field($model, 'visit_date')->widget(DateControl::classname(), [
    'type'=>DateControl::FORMAT_DATE,
    'ajaxConversion'=>false,
    'widgetOptions' => [
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]
])->label(false);?>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
<?= $form->field($model, 'visit_recorder')->textInput(['placeholder' =>'recorder ... '])->label(false);?>
        
        </div>
</div>
<br>
<div class="box">Details    of DFU and Brief foot examination assessment</div>
          <table width="100%" class="table table-bordered">
  <tr>
    <td width="20%"  valign="top"><p align="center"><strong>DFU    characteristics</strong></p></td>
    <td width="40%"  valign="top"><p align="center"><strong>Right</strong></p></td>
    <td width="40%"  valign="top"><p align="center"><strong>Left</strong></p></td>
  </tr>
  <tr>
    <td width="20%"  valign="top"><p>1. Location of ulcer</p></td>
    <td width="40%"  valign="top">
   
   <div class="row">
       <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
    <?= $form->field($model, 'location_of_ulcer_right')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => [
            '1' => 'Hallux',
            '2' => 'Digits',
            '3' => 'Heel',
            '4' => 'Forefoot (plantar) ',
            '5' => 'Forefoot (dorsum)',
            '6' => 'Midfoot (dorsum)',
            '7' => 'Ankle ',
            '8' => 'Whole foot ',
            '9' => 'Other...',
        ],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="location_of_ulcer_right '.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="location_of_ulcer_right '.$index.'">'.$label.'</label></br>';
          } ]])->label(false);?>
       </div>

       <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
          <?= $form->field($model, 'location_of_ulcer_other_right')->textArea(['placeholder' => "Cause of DFU Other...",'cols' => 5,'rows' => 10])->label(false);?>           
           </div>
   </div>
   
       

 </td>
    <td width="40%"  valign="top">
    <div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
    <?= $form->field($model, 'location_of_ulcer_left')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => [
            '1' => 'Hallux',
            '2' => 'Digits',
            '3' => 'Heel',
            '4' => 'Forefoot (plantar) ',
            '5' => 'Forefoot (dorsum)',
            '6' => 'Midfoot (dorsum)',
            '7' => 'Ankle ',
            '8' => 'Whole foot ',
            '9' => 'Other..',
        ],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="location_of_ulcer_left'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="location_of_ulcer_left'.$index.'">'.$label.'</label></br>';
          } ]])->label(false);?>
                 </div>
                 <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
   <?= $form->field($model, 'location_of_ulcer_other_left')->textArea(['placeholder' => "Cause of DFU Other...",'cols' => 5,'rows' => 10])->label(false);?>           
    </div>
</div>

    </td>
  </tr>
  <tr>
    <td width="20%"  valign="top"><p>2. Size of ulcer (cm)</p></td>
    <td>
    <div style="display: inline-block;vertical-align: top;">
  
    <?= $form->field($model, 'ulcer_width_right')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_CHECBOX_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => [
            '1' => '<span style="">Width</span>',
            '2' => '<span style="">Length</span>',
            '3' => 'Depth',
        ],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="checkbox" id="size_of_ulcer_right '.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="size_of_ulcer_right '.$index.'">'.$label.'</label></br>';
          } ]])->label(false);?>
            </div>
    <div style="display: inline-block;margin-top: -5px;">
          <?= $form->field($model, 'size_of_ulcer_width_right')->textInput(['style'=>'width:65px;height:25px;margin-bottom:-14px;'])->label(false);?>
          <?= $form->field($model, 'size_of_ulcer_length_right')->textInput(['style'=>'width:65px;height:25px;margin-bottom:-14px;'])->label(false);?>
          <?= $form->field($model, 'size_of_ulcer_depth_right')->textInput(['style'=>'width:65px;height:25px;margin-bottom:-14px;'])->label(false);?>
          </div>
 </td>
    <td width="40%"  valign="top">
    <div style="display: inline-block;vertical-align: top;">
    <?= $form->field($model, 'ulcer_width_left')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_CHECBOX_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => [
            '1' => '<span style="">Width</span>',
            '2' => '<span style="">Length</span>',
            '3' => 'Depth',
        ],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="checkbox" id="size_of_ulcer_right '.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="size_of_ulcer_right '.$index.'">'.$label.'</label></br>';
          } ]])->label(false);?>
          </div>
<div style="display: inline-block;margin-top: -5px;">
<?= $form->field($model, 'size_of_ulcer_width_left')->textInput(['style'=>'width:65px;height:25px;margin-bottom:-14px;'])->label(false);?>
          <?= $form->field($model, 'size_of_ulcer_length_left')->textInput(['style'=>'width:65px;height:25px;margin-bottom:-14px;'])->label(false);?>
          <?= $form->field($model, 'size_of_ulcer_depth_left')->textInput(['style'=>'width:65px;height:25px;margin-bottom:-14px;'])->label(false);?>
          </div>
    </td>
  </tr>
  <tr>
    <td width="20%"  valign="top"><p>3. Probe to bone test</p></td>
    <td>
    <?= $form->field($model, 'bone_test_right')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => [
            '1' => 'Negative',
            '2' => 'Positive',
        ],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="bone_test_right '.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="bone_test_right '.$index.'">'.$label.'</label>';
          } ]])->label(false);?>
 </td>
    <td width="40%"  valign="top">
    <?= $form->field($model, 'bone_test_left')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => [
             '1' => 'Negative',
            '2' => 'Positive',
        ],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="bone_test_left'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="bone_test_left'.$index.'">'.$label.'</label>';
          } ]])->label(false);?>
    </td>
  </tr>
  <tr>
    <td width="20%"  valign="top"><p>4. Characteristics of ulcer<strong></strong></p></td>
    <td>
    <?= $form->field($model, 'characteristics_of_ulcer_right')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => [
            '1' => 'Granulating',
            '2' => 'Necrotic',
            '3' => 'Callused',
            '4' => 'Undermining',
        ],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="characteristics_of_ulcer_right '.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="characteristics_of_ulcer_right '.$index.'">'.$label.'</label>';
          } ]])->label(false);?>
 </td>
    <td width="40%"  valign="top">
    <?= $form->field($model, 'characteristics_of_ulcer_left')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => [
            '1' => 'Granulating',
            '2' => 'Necrotic',
            '3' => 'Callused',
            '4' => 'Undermining',
        ],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="characteristics_of_ulcer_left'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="characteristics_of_ulcer_left'.$index.'">'.$label.'</label>';
          } ]])->label(false);?>
    </td>
  </tr>
  <tr>
    <td width="20%"  valign="top"><p>5. Drainage     5.1 Amount</p></td>
    <td>
    <?= $form->field($model, 'drainage_amount_right')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => [
            '1' => 'None',
            '2' => 'Low',
            '3' => 'Moderate',
            '4' => 'High',
        ],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="drainage_amount_right '.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="drainage_amount_right '.$index.'">'.$label.'</label>';
          } ]])->label(false);?>
 </td>
    <td width="40%"  valign="top">
    <?= $form->field($model, 'drainage_amount_left')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => [
             '1' => 'None',
            '2' => 'Low',
            '3' => 'Moderate',
            '4' => 'High',
        ],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="drainage_amount_left'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="drainage_amount_left'.$index.'">'.$label.'</label>';
          } ]])->label(false);?>
    </td>
  </tr>
  <tr>
    <td width="20%"  valign="top">5.2 Type</td>
    <td>
    <div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
    <?= $form->field($model, 'drainage_type_right')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => [
            '1' => 'Serous',
            '2' => 'Hemoserous',
            '3' => 'Purulent',
            '4' => 'Other...',
        ],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="drainage_type_right '.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="drainage_type_right '.$index.'">'.$label.'</label></br>';
          } ]])->label(false);?>
          </div>
        
          <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
           <?= $form->field($model, 'drainage_type_right')->textArea(['placeholder' => "Type Other...",'rows' => 4])->label(false);?>
           </div>
           </div>
 </td>
    <td width="40%"  valign="top">
    <div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
    <?= $form->field($model, 'drainage_type_left')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => [
            '1' => 'Serous',
            '2' => 'Hemoserous',
            '3' => 'Purulent',
            '4' => 'Other...',
        ],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="drainage_type_left'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="drainage_type_left'.$index.'">'.$label.'</label></br>';
          } ]])->label(false);?>
          </div>
        
          <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
           <?= $form->field($model, 'drainage_type_left')->textArea(['placeholder' => "Type Other...",'rows' => 4])->label(false);?>
           </div>
           </div>
    </td>
  </tr>
  <tr>
    <td width="20%"  valign="top">5.3 Odor</td>
    <td>
    <?= $form->field($model, 'drainage_odor_right')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => [
            'N' => 'N',
            'Y' => 'Y',
        ],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="drainage_odor_right '.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="drainage_odor_right '.$index.'">'.$label.'</label>';
          } ]])->label(false);?>
 </td>
    <td width="40%"  valign="top">
    <?= $form->field($model, 'drainage_odor_left')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => [
            'N' => 'N',
            'Y' => 'Y',
        ],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="drainage_odor_left'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="drainage_odor_left'.$index.'">'.$label.'</label>';
          } ]])->label(false);?>
    </td>
  </tr>
  <tr>
    <td width="20%"  valign="top"> 6.Infection</td>
    <td>
    <?= $form->field($model, 'infection_right')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => [
            'N' => 'N',
            'Y' => 'Y , PEDIS grading',
        ],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="infection_right '.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="infection_right '.$index.'">'.$label.'</label>';
          } ]])->label(false);?>
              <?= $form->field($model, 'infection_y_right')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => [
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5',
        ],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="infection_y_right '.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="infection_y_right '.$index.'">'.$label.'</label>';
          } ]])->label(false);?>
 </td>
    <td width="40%"  valign="top">
    <?= $form->field($model, 'infection_left')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => [
            'N' => 'N',
            'Y' => 'Y , PEDIS grading',
        ],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="infection_left'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="infection_left'.$index.'">'.$label.'</label>';
          } ]])->label(false);?>
              <?= $form->field($model, 'infection_y_left')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => [
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5',
        ],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="infection_y_left'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="infection_y_left'.$index.'">'.$label.'</label>';
          } ]])->label(false);?>
    </td>
  </tr>
  <tr>
    <td width="20%"  valign="top"><p><strong>Neuropathy assessment</strong></p></td>
    <td width="40%"  valign="top" style="background-color: #ddd;">&nbsp;</td>
    <td width="40%"  valign="top" style="background-color: #ddd;">&nbsp;</td>
  </tr>
  <tr>
    <td width="20%"  valign="top">1. Monofilament (10g)</td>
    <td>
    <?= $form->field($model, 'monofilament_right')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => [
            '1' => 'Intact',
            '2' => 'Impair',
        ],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="monofilament_right '.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="monofilament_right '.$index.'">'.$label.'</label>';
          } ]])->label(false);?>
 </td>
    <td width="40%"  valign="top">
    <?= $form->field($model, 'monofilament_left')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => [
           '1' => 'Intact',
            '2' => 'Impair',
        ],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="monofilament_left'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="monofilament_left'.$index.'">'.$label.'</label>';
          } ]])->label(false);?>
    </td>
  </tr>
  <tr>
    <td width="20%"  valign="top"><p>2. Tuning fork (128 Hz) at hallux</p></td>
    <td>
    <?= $form->field($model, 'tuning_fork_right')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => [
            '1' => 'Intact',
            '2' => 'Diminish',
            '3' => 'Impair',
        ],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="tuning_fork_right '.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="tuning_fork_right '.$index.'">'.$label.'</label>';
          } ]])->label(false);?>
 </td>
    <td width="40%"  valign="top">
    <?= $form->field($model, 'tuning_fork_left')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => [
            '1' => 'Intact',
            '2' => 'Diminish',
            '3' => 'Impair',
        ],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="tuning_fork_left'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="tuning_fork_left'.$index.'">'.$label.'</label>';
          } ]])->label(false);?>
    </td>
  </tr>
  <tr>
    <td width="20%"  valign="top"><p><strong>Vascular assessment</strong></p></td>
    <td width="40%"  valign="top" style="background-color: #ddd;">&nbsp;</td>
    <td width="40%"  valign="top" style="background-color: #ddd;">&nbsp;</td>
  </tr>
  <tr>
    <td width="20%"  valign="top"><p>1. Vessel palpation</p></td>
    <td>
    <?= $form->field($model, 'vessel_palpation_dp_right')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => [
            '0' => '0',
            '1' => '1',
            '2' => '2',
        ],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="vessel_palpation_dp_right '.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="vessel_palpation_dp_right '.$index.'">'.$label.'</label>';
          } ]])->label('DP');?>
          <?= $form->field($model, 'vessel_palpation_pt_right')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => [
            '0' => '0',
            '1' => '1',
            '2' => '2',
        ],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="vessel_palpation_pt_right '.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="vessel_palpation_pt_right '.$index.'">'.$label.'</label>';
          } ]])->label('TP');?>
 </td>
    <td width="40%"  valign="top">
    <?= $form->field($model, 'vessel_palpation_dp_left')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => [
            '0' => '0',
            '1' => '1',
            '2' => '2',
        ],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="vessel_palpation_dp_left'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="vessel_palpation_dp_left'.$index.'">'.$label.'</label>';
          } ]])->label('DP');?>
              <?= $form->field($model, 'vessel_palpation_pt_left')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => [
           '0' => '0',
            '1' => '1',
            '2' => '2',
        ],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="vessel_palpation_pt_left'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="vessel_palpation_pt_left'.$index.'">'.$label.'</label>';
          } ]])->label('PT');?>
    </td>
  </tr>
  <tr>
    <td width="20%"  valign="top"><p>2. Doppler</p></td>
    <td>
    <?= $form->field($model, 'doppler_right')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => [
            '1' => 'Non-audible',
            '2' => 'Monophasic',
            '3' => 'Biphasic',
            '4' => 'Triphasic',
        ],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="doppler_right '.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="doppler_right '.$index.'">'.$label.'</label>';
          } ]])->label(false);?>
 </td>
    <td width="40%"  valign="top">
    <?= $form->field($model, 'doppler_left')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => [
           '1' => 'Non-audible',
            '2' => 'Monophasic',
            '3' => 'Biphasic',
            '4' => 'Triphasic',
        ],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="doppler_left'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="doppler_left'.$index.'">'.$label.'</label>';
          } ]])->label(false);?>
    </td>
  </tr>
  <tr>
    <td width="20%"  valign="top"><p>3. Ankle/Brachial Index (ABI)</p></td>
    <td width="40%"  valign="top">
    <?= $form->field($model, 'abi1_right')->textInput(['style' => 'width: 80px;'])->label(false);?>&nbsp/
    <?= $form->field($model, 'abi2_right')->textInput(['style' => 'width: 80px;'])->label(false);?>&nbsp=
    <?= $form->field($model, 'abi3_right')->textInput(['style' => 'width: 80px;'])->label(false);?>
    </td>
    <td width="40%"  valign="top">
    <?= $form->field($model, 'abi1_left')->textInput(['style' => 'width: 80px;'])->label(false);?>&nbsp/
    <?= $form->field($model, 'abi2_left')->textInput(['style' => 'width: 80px;'])->label(false);?>&nbsp=
    <?= $form->field($model, 'abi3_left')->textInput(['style' => 'width: 80px;'])->label(false);?>
    </td>
  </tr>
  <tr>
    <td width="20%"  valign="top"><p><strong>&nbsp;</strong></p></td>
    <td width="40%"  valign="top">
    <?= $form->field($model, 'abi_right_non_compressible')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_CHECBOX_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => [
            '1' => 'Non-compressible (>1.3)',
        ],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="checkbox" id="abi_right_non-compressible'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="abi_right_non-compressible'.$index.'">'.$label.'</label>';
          }
      ]])->label(false);?>
    </td>
    <td width="40%"  valign="top"> 
    <?= $form->field($model, 'abi_left_non_compressible')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_CHECBOX_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => [
            '1' => 'Non-compressible (>1.3)',
        ],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="checkbox" id="abi_right_non-compressible'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="abi_right_non-compressible'.$index.'">'.$label.'</label>';
          }
      ]])->label(false);?>
    </td>
  </tr>
  <tr>
    <td width="20%"  valign="top"><p>4. Toe pressure (mmHg)           </p></td>
    <td width="40%"  valign="top">
    <?= $form->field($model, 'toe_pressure_right')->textInput()->label(false);?>
    </td>
    <td width="40%"  valign="top">
    <?= $form->field($model, 'toe_pressure_left')->textInput()->label(false);?>
    </td>
  </tr>
  <tr>
    <td width="20%"  valign="top"><p>5. Toe/Brachial Index (TBI)</p></td>
    <td width="40%"  valign="top">
    <?= $form->field($model, 'tbi_right')->textInput()->label(false);?>
    </td>
    <td width="40%"  valign="top">
    <?= $form->field($model, 'tbi_left')->textInput()->label(false);?>
    </td>
  </tr>
</table>
<?= $form->field($model, 'progress_note')->textArea(['rows' => 5])->label('Progress note');?>


<div class="box">Current and Post Interventions</div>

<div class="row">
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        
<fieldset class="scheduler-border">
	<legend class="scheduler-border">1.Off Loading Technique</legend>
    <?= $form->field($model, 'off_loading_technique')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => [
           'N' => 'N',
           'Y' => 'Yes , specify',
        ],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="off_loading_technique'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="off_loading_technique'.$index.'">'.$label.'</label>';
          } ]])->label(false);?>

     <?= $form->field($model, 'off_loading_technique_y')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => [
           '1' => 'Total contact cast',
           '2' => 'Short Leg cast',
           '3' => 'Posterior slab',
           '4' => 'Felted Foam Dressing',
           '5' => 'Adhesive Felted',
           '6' => 'Shoe with double rockers',
           '7' => 'Half shoes',
           '8' => 'Shoe with negative heel',
           '9' => 'Shoe with forefoot rocker',
           '10' => 'Wheelchair',
           '11' => 'Walker',
           '12' => 'Crutches',
           '13' => 'Cane',
        ],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="off_loading_technique_y'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="off_loading_technique_y'.$index.'">'.$label.'</label></br>';
          } ]])->label(false);?>
</fieldset>


<fieldset class="scheduler-border">
	<legend class="scheduler-border">2.Local procedure performed</legend>
      <?= $form->field($model, 'local_procedure_performed')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => [
           '1' => 'Debridement',
           '2' => 'Tenotomy',
           '3' => 'Osteotomy',
        ],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="local_procedure_performed'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="local_procedure_performed'.$index.'">'.$label.'</label>';
          } ]])->label(false);?>
</fieldset>

<fieldset class="scheduler-border">
	<legend class="scheduler-border">3.Local dressing performed</legend>
        <?= $form->field($model, 'local_dressing_performed')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => [
           '1' => 'Maggot',
           '2' => 'Topical agents',
           '3' => 'Other...',
        ],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="local_dressing_performed'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="local_dressing_performed'.$index.'">'.$label.'</label>';
          } ]])->label(false);?>

</fieldset>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

<fieldset class="scheduler-border">
	<legend class="scheduler-border">4.Post Revascularization</legend>
        <?= $form->field($model, 'post_revascularization')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => [
           'N' => 'N',
           'Y' => 'Y',
        ],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="post_revascularization'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="post_revascularization'.$index.'">'.$label.'</label>';
          } ]])->label(false);?>
                     <br>       

Type
<?= $form->field($model, 'post_revascularization_type')->textInput(['style'=>'width:62px;'])->label(false);?>
duration
<?= $form->field($model, 'post_revascularization_duration')->textInput(['style'=>'width:62px;'])->label(false);?>
days
<?= $form->field($model, 'post_revascularization_months')->textInput(['style'=>'width:62px;'])->label(false);?>
month
<?= $form->field($model, 'post_revascularization_year')->textInput(['style'=>'width:62px;'])->label(false);?>
year

    </fieldset>
    <fieldset class="scheduler-border">
	<legend class="scheduler-border">5.Post HBOT</legend>
<div style="display: inline-block;padding-right: 20px;">
<?= $form->field($model, 'post_hbot')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => [
           'N' => 'N',
           'Y' => 'Y',
        ],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="post_hbot'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="post_hbot'.$index.'">'.$label.'</label>';
          } ]])->label();?>
</div>
<div style="display: inline-block;">
<?= $form->field($model, 'period_number')->textInput(['placeholder' => "................"])->label('period number');?>
</div>
</fieldset>

</fieldset>
<fieldset class="scheduler-border">
	<legend class="scheduler-border">6.Post amputation</legend>


<?= $form->field($model, 'post_amputation')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => [
           'N' => 'N',
           'Y' => 'Y',
        ],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="post_amputation'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="post_amputation'.$index.'">'.$label.'</label>';
          } ]])->label(false);?>
           <br>       

    Type
    <?= $form->field($model, 'post_amputation_type')->textInput(['style'=>'width:62px;'])->label(false);?>
    duration
    <?= $form->field($model, 'post_amputation_duration')->textInput(['style'=>'width:62px;'])->label(false);?>
    days
    <?= $form->field($model, 'post_amputation_months')->textInput(['style'=>'width:62px;'])->label(false);?>
    month
    <?= $form->field($model, 'post_amputation_year')->textInput(['style'=>'width:62px;'])->label(false);?>
    year

          </fieldset>

          <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
          <?=$form->field($model,'requester')->textInput(['id' => 'requester'])->label(false);?>
          </div>
          
          <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
              <!-- <a class="btn btn-success" id="save">บันทึก</a> -->
              <?= Html::submitButton('<i class="fa fa-check-square-o" aria-hidden="true"></i> บันทึก', ['class' => 'btn btn-success']) ?>
          </div>    
      </div>
          </div>
</div>
<?php $form = ActiveForm::end(); ?> 
<?=$this->render('../default/foot-ulcer-fu/footer');?>
<?=$this->render('@app/modules_share/foot/views/default/panel_foot')?>
