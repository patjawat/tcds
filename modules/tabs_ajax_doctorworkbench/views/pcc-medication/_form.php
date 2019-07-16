<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use app\modules\doctorworkbench\models\CDrugitems;
use app\modules\doctorworkbench\models\CDrugusage;
$this->registerJS($this->render('../../dist/js/script.js'));

?>

<style>
.total-price{
    border-top: 3px solid #9b25af;
    box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
    height: 56px;
    width: 158%;
    margin-top: 9px;
    background-color: #eee;
    color: #9b25af; 
}
.total-price > p{
    font-size: 36px;
    margin-left: 6px;
}

</style>
<div class="pcc-medication-form">
    <?php
    $form = ActiveForm::begin([
                'id' => 'form',
                'action' => ['create'],
                'options' => [
                    'data-pjax' => 1
                ],
    ]);
    ?>
<?= $form->field($model, 'hn')->hiddenInput(['value' => '0000001','id'=>'hn' ])->label(false); ?>
<?= $form->field($model, 'vn')->hiddenInput(['value' => '8888444', 'id' => 'vn'])->label(false); ?>

    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <?php
            echo $form->field($model, 'icode')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(CDrugitems::find()->all(), 'icode', function($model, $defaultValue) {
                            return $model->name. ' ' .$model->strength. ' ' .$model->units;
                        }),
                    'options' => ['id' => 'icode', 'placeholder' => 'รายการยา ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                ],
            ])->label('รายการยา');
            ?>
        </div>

        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
<?= $form->field($model, 'druguse')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(CDrugusage::find()->all(), 'drugusage', function($model, $defaultValue) {
                            return $model->code;
                        }),
                    'options' => ['id' => 'druguse', 'placeholder' => 'วิธีใช้ ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                ],
            ]);
            ?> 
        </div>

        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
<?= $form->field($model, 'qty')->textInput(['id' => 'qty']) ?>  
        </div>
        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
            <?php echo Html::submitButton('<i class="fa fa-plus"></i>', ['class' => 'btn btn-success','style' => 'margin-top:25px;']) ?>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
     <div class="total-price">
     <p id="totalprice"></p>
     </div>
            </div>
        </div>
    </div>
<?php ActiveForm::end(); ?>
</div>

<?php
$js = <<< JS
$(function(){
totalPrice($('#hn').val(),$('#vn').val());

});

JS;
$this->registerJS($js);
?>
