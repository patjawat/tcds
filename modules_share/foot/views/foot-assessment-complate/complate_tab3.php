<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use phpnt\ICheck\ICheck;

?>
<?php echo Html::img('../modules_share/foot/dist/img/foot_right_left.png',['style' =>'width:490px;margin-left: 30%;']);?>
<div class="box">
(3)    Footwear assessment
</div>
<table width="100%" class="table table-bordered">
<thead>
  <tr>
    <th valign="top"><p align="center">&nbsp;</p></th>
    <th valign="top"><p class="table-right" align="center"><strong>Right  </strong></p></th>
    <th valign="top"><p class="table-left"align="center"><strong>Left</strong></p></th>
    <th valign="top"><p align="center"><strong>&nbsp;</strong></p></th>
  </tr>
  </thead>
  <tbody>
  <tr>
    <td valign="top"><strong>3.1    Foot size  </strong></td>
    <td valign="top"><strong>
    <?= $form->field($model, 'foot_size_right')->textInput()->label(false);?>
    </strong></td>
    <td valign="top"><strong>
    <?= $form->field($model, 'foot_size_left')->textInput()->label(false);?>
    </strong></td>
    <td valign="top"><strong>&nbsp;</strong></td>
  </tr>
  <tr>
    <td valign="top"><strong>3.2    Type of footwear(indoor)</strong></td>
    <td valign="top"><strong>3.3 Type of footwear (outdoor) </strong></td>
    <td valign="top"><strong>3.4 Type of footwear(exercise) </strong></td>
    <td valign="top"><strong>3.5 Sock </strong></td>
  </tr>
  <tr>
    <td valign="top">
    <td valign="top">
  
    
    <?= $form->field($model, 'type_of_footwear_indoor')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    =>[
             '1'=> 'Barefoot',
            '2' => 'Socks only',
            '3' => 'Sandal',
            '4' => 'Sandal with back strap',
            '5' => 'Customized Shoes',
            '6' => 'Sneaker',
            '7' => 'Sport shoes',
            '8' => 'Other',
        ],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-type_of_footwear_indoor'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-type_of_footwear_indoor'.$index.'">'.$label.'</label></br>';
          }
      ]])->label(false);?>
         <?= $form->field($model, 'type_of_footwear_indoor_other')->textArea(['rows'=>2,'placeholder' => 'Other ...'])->label(false);?>

    </td>
    </td>
    <td valign="top">
    <?= $form->field($model, 'type_of_footwear_outdoor')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    =>[
             '1'=> 'Barefoot',
            '2' => 'Socks only',
            '3' => 'Sandal',
            '4' => 'Sandal with back strap',
            '5' => 'Customized Shoes',
            '6' => 'Sneaker',
            '7' => 'Sport shoes',
            '8' => 'Other',
        ],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-type_of_footwear_outdoor'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-type_of_footwear_outdoor'.$index.'">'.$label.'</label></br>';
          }
      ]])->label(false);?>
         <?= $form->field($model, 'type_of_footwear_outdoor_other')->textArea(['rows'=>2,'placeholder' => 'Other ...'])->label(false);?>

    </td>
    <td valign="top">
    <?= $form->field($model, 'type_of_footwear_exercise')->widget(ICheck::className(), [
        'type'  => ICheck::TYPE_RADIO_LIST,
        'style'  => ICheck::STYLE_FLAT,
        'items'    =>[
             '1'=> 'Barefoot',
            '2' => 'Socks only',
            '3' => 'Sandal',
            '4' => 'Sandal with back strap',
            '5' => 'Customized Shoes',
            '6' => 'Sneaker',
            '7' => 'Sport shoes',
            '8' => 'Other',
        ],
        'color'  => 'green',
        'options' => [
          'item' => function ($index, $label, $name, $checked, $value){
              return '<input type="radio" id="footassessment-type_of_footwear_exercise'.$index.'" name="'.$name.'" value="'.$value.'" '.($checked ? 'checked' : false).'> <label for="footassessment-type_of_footwear_exercise'.$index.'">'.$label.'</label></br>';
          }
      ]])->label(false);?>
         <?= $form->field($model, 'type_of_footwear_exercise_other')->textArea(['rows'=>2,'placeholder' => 'Other ...'])->label(false);?>

    </td>

  </tr>
  </tbody>
</table>