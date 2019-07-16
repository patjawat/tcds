<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use phpnt\ICheck\ICheck;
use app\components\PatientHelper;
use app\components\MessageHelper;
use app\components\loading\ShowLoading;
echo ShowLoading::widget();
$this->registerCss($this->render('../../dist/css/style.css'));
$this->registerJs($this->render('../../dist/js/script.js'));
$hn = PatientHelper::getCurrentHn();
$this->params['pt_title'] = PatientHelper::getPatientTitleByHn($hn);
?>


<style>
.field-sfootassessmentsummaryipd-right_claw_toe{display: inline-block;}
.field-sfootassessmentsummaryipd-right_hammer_toe{display: inline-block;}
.field-sfootassessmentsummaryipd-right_maillet_toe{display: inline-block;}
.field-sfootassessmentsummaryipd-left_claw_toe{display: inline-block;}
.field-sfootassessmentsummaryipd-left_hammer_toe{display: inline-block;}
.field-sfootassessmentsummaryipd-left_maillet_toe{display: inline-block;}
.field-sfootassessmentsummaryipd-right_callus{display: inline-block;}
.field-sfootassessmentsummaryipd-right_corn{display: inline-block;}
.field-sfootassessmentsummaryipd-left_callus{display: inline-block;}
.field-sfootassessmentsummaryipd-left_corn{display: inline-block;}
</style>
<?=$this->render('@app/modules_share/foot/views/default/panel_top',[
  'tabimage' => '',
    'tabsummary' => 'active',
    'tabcomplate' =>'',
    'tabfirst' =>'',
    'tabfu'=>'' 
    ])?>
<br>
    <?=$this->render('../default/foot-assessment-summary/summary_top',['opd'=>'','ipd' => 'active'])?>
  
    <h4 style="color:#777;text-align: center;">IPD DIABETIC FOOT ASSESSMENT RECORD : SUMMARY</h4>
        <?php $form = ActiveForm::begin([
      'id' => 'form',
      'action' => ['/foot/foot-assessment-summary-ipd'],
      ]); ?>
    <fieldset class="scheduler-border">
	<legend class="scheduler-border">Risk of foot ulceration</legend>
        <?= $form->field($model, 'risk_of_foot_ulceration')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    =>['L'=> 'Low','M' => 'Moderate','H'=> 'High'],
        'color'  => 'green',                   // цвет
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-risk_of_foot_ulceration'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-risk_of_foot_ulceration'.$index.'">'.$label.'</label>';
          }
      ]])->label(false);?>
      </fieldset>
      <div class="box">Details of foot examination</div>
          <table width="1106" border="0" class="table table-bordered">
            
            <tr>
              <td width="300" align="center">&nbsp;</td>
              <td width="360" align="center" style="font-size: 20px;">Right</td>
              <td width="360" align="center" style="font-size: 20px;">Left</td>
            </tr>
            <tr>
              <td>1.
                <strong> Neuropathy assessment</strong>
              </td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>1.1 Monofilament (10g)</td>
              <td>
        <?= $form->field($model, 'right_monofilament')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => ['0'=> 'intact','1' => 'impair'],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-right_monofilament'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-right_monofilament'.$index.'">'.$label.'</label>';
          }
      ]])->label(false);
         ?>
              </td>
              <td>
                <?= $form->field($model, 'left_monofilament')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => ['0'=> 'intact','1' => 'impair'],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-left_monofilament'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-left_monofilament'.$index.'">'.$label.'</label>';
          }
      ]])->label(false);
         ?>
              </td>
            </tr>
            <tr>
              <td>1.2 Tuning fork (128 HZ) at halux</td>
              <td>
                <?= $form->field($model, 'right_tuning_fork')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => ['0'=> 'intact ','1' => 'diminish ','2' => 'impair'],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-right_tuning_fork'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-right_tuning_fork'.$index.'">'.$label.'</label>';
          }
      ]])->label(false);
         ?>
              </td>
              <td>
                <?= $form->field($model, 'left_tuning_fork')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => ['0'=> 'intact ','1' => 'diminish ','2' => 'impair'],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-left_tuning_fork'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-left_tuning_fork'.$index.'">'.$label.'</label>';
          }
      ]])->label(false);
         ?>
              </td>
            </tr>
            <tr>
              <td><strong>2. Vascular assessment</strong></td>
              <td>
              </td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>2.1 Vessel palpation</td>
              <td>
        <?= $form->field($model, 'right_dp')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => ['0'=> '0','1' => '1','2' => '2'],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-right_dp'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-right_dp'.$index.'">'.$label.'</label>';
          }
      ]])->label(false);
         ?>
        <?= $form->field($model, 'right_pt')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => ['0'=> '0','1' => '1','2' => '2'],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-right_pt'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-right_pt'.$index.'">'.$label.'</label>';
          }]])->label(false);?>
              </td>
              <td>

                <?= $form->field($model, 'left_dp')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => ['0'=> '0','1' => '1','2' => '2'],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-left_dp'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-left_dp'.$index.'">'.$label.'</label>';
          }]])->label(false);?>
                  <?= $form->field($model, 'left_pt')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => ['0'=> '0','1' => '1','2' => '2'],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-left_pt'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-left_pt'.$index.'">'.$label.'</label>';
          }]])->label(false);?>
              </td>
            </tr>
            <tr>
              <td>2.2 Ankle/Brachial Index (ABI)</td>
              <td>
                <?= $form->field($model, 'right_abi')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => ['0'=> '0','1' => '1','2' => '2'],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-right_abi'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-right_abi'.$index.'">'.$label.'</label>';
          }]])->label(false);?>
                  <?= $form->field($model, 'right_abi_non')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_CHECBOX_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => ['Y'=> 'Non-compressible(> 1.3)'],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="checkbox" id="footassessment-right_abi_non'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-right_abi_non'.$index.'">'.$label.'</label>';
          }]])->label(false);?>
              </td>
              <td>
                <?= $form->field($model, 'left_abi')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => ['0'=> '0','1' => '1','2' => '2'],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-left_abi'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-left_abi'.$index.'">'.$label.'</label>';
          }]])->label(false);?>
                  <?= $form->field($model, 'left_abi_non')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_CHECBOX_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => ['Y'=> 'Non-compressible(> 1.3)'],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="checkbox" id="footassessment-left_abi_non'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-left_abi_non'.$index.'">'.$label.'</label>';
          }]])->label(false);?>
              </td>
            </tr>
            <tr>
              <td>
                <strong>3. Foot deformities</strong>
              </td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>3.1 Claw toe/Hammer toe/Maillet toe</td>
              <td>
                <?= $form->field($model, 'right_claw_toe')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => ['N'=> 'N / ','Y' => 'Y'],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-right_claw_toe'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-right_claw_toe'.$index.'">'.$label.'</label>';
          }
      ]])->label(false);
         ?> |
                  <?= $form->field($model, 'right_hammer_toe')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => ['N'=> 'N / ','Y' => 'Y'],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-right_hammer_toe'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-right_abi'.$index.'">'.$label.'</label>';
          }
      ]])->label(false);
         ?> |
                    <?= $form->field($model, 'right_maillet_toe')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => ['N'=> 'N / ','Y' => 'Y'],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-right_maillet_toe'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-right_maillet_toe'.$index.'">'.$label.'</label>';
          }
      ]])->label(false);
         ?>
              </td>
              <td>
                <?= $form->field($model, 'left_claw_toe')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => ['N'=> 'N / ','Y' => 'Y'],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-left_claw_toe'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-left_claw_toe'.$index.'">'.$label.'</label>';
          }
      ]])->label(false);
         ?> |
                  <?= $form->field($model, 'left_hammer_toe')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => ['N'=> 'N / ','Y' => 'Y'],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-left_hammer_toe'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-left_abi'.$index.'">'.$label.'</label>';
          }
      ]])->label(false);
         ?> |
                    <?= $form->field($model, 'left_maillet_toe')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => ['N'=> 'N / ','Y' => 'Y'],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-left_maillet_toe'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-left_maillet_toe'.$index.'">'.$label.'</label>';
          }
      ]])->label(false);
         ?>
              </td>
            </tr>
            <tr>
              <td>3.2 hallux Valgus</td>
              <td>
                <?= $form->field($model, 'right_hallux_algus')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => ['N'=> 'N / ','Y' => 'Y'],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-right_hallux_algus'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-right_hallux_algus'.$index.'">'.$label.'</label>';
          }
      ]])->label(false) ?>
              </td>
              <td>
                <?= $form->field($model, 'left_hallux_algus')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => ['N'=> 'N / ','Y' => 'Y'],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-left_hallux_algus'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-left_hallux_algus'.$index.'">'.$label.'</label>';
          }
      ]])->label(false) ?>
              </td>
            </tr>
            <tr>
              <td>3.4 flat foot</td>
              <td>
                <?= $form->field($model, 'right_flat_foot')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => ['N'=> 'N / ','Y' => 'Y'],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-right_hallux_algus'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-right_hallux_algus'.$index.'">'.$label.'</label>';
          }
      ]])->label(false) ?>
              </td>
              <td>
                <?= $form->field($model, 'left_flat_foot')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => ['N'=> 'N / ','Y' => 'Y'],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-left_hallux_algus'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-left_hallux_algus'.$index.'">'.$label.'</label>';
          }
      ]])->label(false) ?>
              </td>
            </tr>
            <tr>
              <td>3.5 charcot Foot</td>
              <td>
                <?= $form->field($model, 'right_charcot_foot')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => ['N'=> 'N / ','Y' => 'Y'],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-right_hallux_algus'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-right_hallux_algus'.$index.'">'.$label.'</label>';
          }
      ]])->label(false)?>
              </td>
              <td>
                <?= $form->field($model, 'left_charcot_foot')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => ['N'=> 'N / ','Y' => 'Y'],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-left_hallux_algus'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-left_hallux_algus'.$index.'">'.$label.'</label>';
          }
      ]])->label(false)?>
              </td>
            </tr>
            <tr>
              <td>3.6 Post surgical deformity</td>
              <td>
                <?= $form->field($model, 'right_post_surgical_deformity')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => ['N'=> 'N / ','Y' => 'Y'],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-right_hallux_algus'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-right_hallux_algus'.$index.'">'.$label.'</label>';
          }
      ]])->label(false) ?>
              </td>
              <td>
                <?= $form->field($model, 'left_post_surgical_deformity')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => ['N'=> 'N / ','Y' => 'Y'],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-left_hallux_algus'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-left_hallux_algus'.$index.'">'.$label.'</label>';
          }
      ]])->label(false) ?>
              </td>
            </tr>
            <tr>
              <td>
                <strong>4. Skin and toenails condition</strong>
              </td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>4.1 Callus/Corn/Wart</td>
              <td>
                <?= $form->field($model, 'right_callus')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => ['N'=> 'N / ','Y' => 'Y'],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-right_hallux_algus'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-right_hallux_algus'.$index.'">'.$label.'</label>';
          }
      ]])->label(false)?> :
                  <?= $form->field($model, 'right_corn')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => ['N'=> 'N / ','Y' => 'Y'],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-right_hallux_algus'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-right_hallux_algus'.$index.'">'.$label.'</label>';
          }
      ]])->label(false) ?>
              </td>
              <td>
                <?= $form->field($model, 'left_callus')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => ['N'=> 'N / ','Y' => 'Y'],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-left_hallux_algus'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-left_hallux_algus'.$index.'">'.$label.'</label>';
          }
      ]])->label(false)?> :
                  <?= $form->field($model, 'left_corn')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => ['N'=> 'N / ','Y' => 'Y'],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-left_hallux_algus'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-left_hallux_algus'.$index.'">'.$label.'</label>';
          }
      ]])->label(false) ?>
              </td>
            </tr>
            <tr>
              <td>4.2 Nails</td>
              <td>
                <?= $form->field($model, 'right_nails')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => ['N'=> 'Normal  / ','AB' => 'Abnormal',],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-right_hallux_algus'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-right_hallux_algus'.$index.'">'.$label.'</label>';
          }
      ]])->label(false); ?>
              </td>
              <td>
                <?= $form->field($model, 'left_nails')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => ['N'=> 'Normal  / ','AB' => 'Abnormal',],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-left_hallux_algus'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-left_hallux_algus'.$index.'">'.$label.'</label>';
          }
      ]])->label(false); ?>
              </td>
            </tr>
            <tr>
              <td>
                <strong>5. Previon foot ulcer</strong>
              </td>
              <td>
                <?= $form->field($model, 'right_previon_foot_ulcer')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => ['N'=> 'N / ','Y' => 'Y'],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-right_hallux_algus'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-right_hallux_algus'.$index.'">'.$label.'</label>';
          }
      ]])->label(false) ?>
              </td>
              <td>
                <?= $form->field($model, 'left_previon_foot_ulcer')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => ['N'=> 'N / ','Y' => 'Y'],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-left_hallux_algus'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-left_hallux_algus'.$index.'">'.$label.'</label>';
          }
      ]])->label(false) ?>

              </td>
            </tr>
            <tr>
              <td>
                <strong>6. Previous</strong>
              </td>
              <td>
                <?= $form->field($model, 'right_previon_amputation')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => ['N'=> 'N / ','Y' => 'Y'],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-right_hallux_algus'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-right_hallux_algus'.$index.'">'.$label.'</label>';
          }
      ]])->label(false);?>
              </td>
              <td>
                <?= $form->field($model, 'left_previon_amputation')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    => ['N'=> 'N / ','Y' => 'Y'],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-left_hallux_algus'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-left_hallux_algus'.$index.'">'.$label.'</label>';
          }]])->label(false);?>
              </td>
            </tr>
          </table>

        <fieldset class="scheduler-border">
	<legend class="scheduler-border">Suggestion fir prevention of foot ulcer and education</legend>
        <?= $form->field($model, 'suggestion_for_prevention')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_CHECBOX_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    =>[
            '1'=> 'ตรวจเท้าทุกวัน(Daily foot examination should be done)',
            '2'=> 'การใส่รองเท้าที่เหมาะสมอยู่สม่ำเสมอ ไม่เดินเท้าเปล่า (Alway wear proper shoe,do not walk with barefoot)',
            '3'=> 'ท่านมีหนังหนาควรได้รับการตัดออกอย่างสม่ำเสมอ (Regular callus removal id nececssary)',
            '4'=> 'ควรหลีกเลี่ยงเท้าไม่สัมผัสกับของร้อน(Avoid foot contact eith heat)',
            '5'=> 'หามีแผลหรือนิ้วเท้าเปลี่ยนสีควรรีบปรึกษาแพทย์(Contact you physician if ulcer or discoloration of skin appear)'
        ],
        'color'  => 'green',                   // цвет
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="checkbox" id="footassessment-contact_your'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-contact_your'.$index.'">'.$label.'</label></br>';
          }
      ]])->label(false);?>
      </fieldset>
      <div class="row">
          <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
          <?=$form->field($model,'requester')->textInput(['id' => 'requester'])->label(false);?>
          </div>
          
          <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
              <!-- <a class="btn btn-success" id="save">บันทึก</a> -->
              <?= Html::submitButton('<i class="fa fa-check-square-o" aria-hidden="true"></i> บันทึก', ['class' => 'btn btn-success']) ?>
          </div>  
      </div>
  <?php $form = ActiveForm::end(); ?>

<?=$this->render('@app/modules_share/foot/views/default/panel_foot')?>

<a href="" data-confirm="confirm"></a>