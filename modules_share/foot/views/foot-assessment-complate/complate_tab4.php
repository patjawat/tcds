<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use phpnt\ICheck\ICheck;

?>

<div class="box">
(4) Education foot care assessment
</div>
<hr>


<div class="row">
    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
        


<fieldset class="scheduler-border"> 	
<legend class="scheduler-border">
1. Does the patient know about how to take care for diabetic feet? 
</legend>
    <?= $form->field($model, 'foot_take_care')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    =>['Y'=> 'Y','N' => 'N',],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-foot_take_care'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-foot_take_care'.$index.'">'.$label.'</label>';
          }
      ]])->label(false);?>
      </fieldset>
<fieldset class="scheduler-border"> 	
<legend class="scheduler-border"> 2. Can the patient do general footcare by himself/herself? </legend>  
<?= $form->field($model, 'foot_general_footcare')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    =>['Y'=> 'Y','N' => 'N , specify reason',],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-foot_general_footcare'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-foot_general_footcare'.$index.'">'.$label.'</label>';
          }
      ]])->label(false);?>
</fieldset>

    <fieldset class="scheduler-border">
    <legend class="scheduler-border">(5) Risk Categorization of Diabetic Foot Ulcer </legend> 

<?= $form->field($model, 'risk_categorization_diabetic')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    =>['L'=> 'Low ','M' => 'Moderate','H' => 'High '],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-risk_categorization_diabetic'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-risk_categorization_diabetic'.$index.'">'.$label.'</label>';
          }
      ]])->label(false);?> 
</fieldset>
<div class="row">
          <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
          <?=$form->field($model,'requester')->textInput(['id' => 'requester'])->label(false);?>
          </div>
          
          <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
          <?php echo Html::submitButton('<i class="fa fa-check-square-o" aria-hidden="true"></i> บันทึก', ['class' => 'btn btn-success']) ?>              
          </div>    
      </div>
 	
</div>
    <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
    <fieldset class="scheduler-border"> 	
<legend class="scheduler-border">3. Does the patient usually take care his/her feet?   </legend> 
<?= $form->field($model, 'foot_take_care_his')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    =>['Y'=> 'Y','N' => 'N',],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-foot_take_care_his'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-foot_take_care_his'.$index.'">'.$label.'</label>';
          }
      ]])->label(false);?>

</fieldset>

    <fieldset class="scheduler-border">
    <legend class="scheduler-border">4. How often does the patient check his/her feet? </legend>    
<?= $form->field($model, 'foot_take_check_his')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    =>['Y'=> 'Y','N' => 'N',],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-take_check_his'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-take_check_his'.$index.'">'.$label.'</label>';
          }
      ]])->label(false);?> 
</fieldset>

    <fieldset class="scheduler-border">
    <legend class="scheduler-border">(6) Suggestion for prevention of foot ulcer and education </legend> 

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

        </div>
</div>
