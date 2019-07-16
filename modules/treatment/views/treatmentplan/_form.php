
<?php

use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

use yii\bootstrap\Modal;

?>
<?php
$this->registerCss("
.box-shadow {
    -webkit-box-shadow: 0 0 10px 0 rgba(0,0,0,.10);
    box-shadow: 0 0 10px 0 rgba(0,0,0,.10);
    
}

.button-box-shadow {
    -webkit-box-shadow: 0 0 10px 0 rgba(0,0,0,.10);
    box-shadow: 0 0 10px 0 rgba(0,0,0,.10);
    margin:5px;
    padding: 5px;
    background: #00e676;
}
.cctext{
    font-size: 22px;
    -webkit-border-radius: 8px;
       -moz-border-radius: 8px;
            border-radius: 8px;
}

.btn-pop {
    //padding: 5px 5px;
    margin:5px;
    font-size: 16px;
    color: #ffffff;
    background: #00e676;
    width:auto;
    line-height: normal;
    -webkit-border-radius: 8px;
       -moz-border-radius: 8px;
            border-radius: 8px;
    }

.btn-pop-info {
    margin:5px;
    font-size: 16px;
    color: #ffffff;
    background: #f50057;
    width:auto;
    line-height: normal;
        -webkit-border-radius: 8px;
        -moz-border-radius: 8px;
    border-radius: 8px;
    }
");

$js=<<<JS

$('#btnsave-plan3').click(function() {
var plan3 = $('#tmp_cc3').val(); //DATA NEW TMP CC 3
var cc = $('#plan_text').val();// DATA OLD IN TEXT
    $('#plan_text').html(cc+" "+plan3);
    $('#myModal').modal('hide');
});

$('#btn-clear').click(function() {
    $('#plan_text').html("");
});

JS;
$this->registerJS($js);
?>
<!--- DIALOG 3--->
<div class="modal fade bd-popup3-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
        <h3 class="modal-title" id="popup3ModalLabel">ติดตาม
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></h3>
    </div>
    <div class="modal-body">
    <form name="form3" method="post">
        <div class="row"><div class="col-md-12">
            <input type="button"  class=" btn btn-pop " value="Treatment, Combination of" OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'Treatment, Combination of '; ">  
            <input type="button"  class=" btn btn-pop " value="Treatment, Expectant" OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'Treatment, Expectant '; ">  
            <input type="button"  class=" btn btn-pop " value="Treatment, Expectant" OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'Treatment, Expectant '; ">  
            <input type="button"  class=" btn btn-pop " value="Treatment, Supportive " OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'Treatment, Supportive '; "> 
            <input type="button"  class=" btn btn-pop " value="Tremor, Action Intention " OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'Tremor, Action Intention '; "> 
            <input type="button"  class=" btn btn-pop " value="Tremor, Physiological " OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'Tremor, Physiological '; "> 
            <input type="button"  class=" btn btn-pop " value="Treponema " OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'Treponema '; "> 
            <input type="button"  class=" btn btn-pop " value="Triangle, Dangerous " OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'Triangle, Dangerous '; "> 
            <input type="button"  class=" btn btn-pop " value="Trichinella Spiralis " OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'Trichinella Spiralis '; "> 
            <input type="button"  class=" btn btn-pop " value="Trichuris Trichiura Whipworm " OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'Trichuris Trichiura Whipworm '; "> 
            <input type="button"  class=" btn btn-pop " value="Trigeminal Neuralgia " OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'Trigeminal Neuralgia '; "> 
            <input type="button"  class=" btn btn-pop " value="Trimeresurus Monticola " OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'Trimeresurus Monticola '; "> 
            <input type="button"  class=" btn btn-pop " value="Triple Responses " OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'Triple Responses '; "> 
            <input type="button"  class=" btn btn-pop " value="Trochanter " OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'Trochanter '; "> 
            <input type="button"  class=" btn btn-pop " value="Tropocollagen " OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'Tropocollagen '; "> 
            <input type="button"  class=" btn btn-pop " value="Tryparsamide " OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'Tryparsamide '; "> 
            <input type="button"  class=" btn btn-pop " value="Tube Test " OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'Tube Test '; "> 
            <input type="button"  class=" btn btn-pop " value="Tuberculosis, Cutaneous " OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'Tuberculosis, Cutaneous '; "> 
            <input type="button"  class=" btn btn-pop " value="Tuberculous Pericarditis " OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'Tuberculous Pericarditis '; "> 
            <input type="button"  class=" btn btn-pop " value="Tubular Secretion and Reasorption " OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'Tubular Secretion and Reasorption '; "> 
            <input type="button"  class=" btn btn-pop " value="Tumors, Benign Cystic " OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'Tumors, Benign Cystic '; "> 
            <input type="button"  class=" btn btn-pop " value="Tuning Fork Tests " OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'Tuning Fork Tests '; "> 
            <input type="button"  class=" btn btn-pop " value="Twin Placentas, Monochorion Monoamnion " OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'Twin Placentas, Monochorion Monoamnion '; "> 
            <input type="button"  class=" btn btn-pop " value="Typhoid Ileitis " OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'Typhoid Ileitis '; "> 
            <input type="button"  class=" btn btn-pop " value="Ulcus Molle " OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'Ulcus Molle '; "> 
            <input type="button"  class=" btn btn-pop " value="Ultrasound " OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'Ultrasound '; "> 
            <input type="button"  class=" btn btn-pop " value="Un-Competitive Inhibitors " OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'Un-Competitive Inhibitors '; "> 
            <input type="button"  class=" btn btn-pop " value="Undercut " OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'Undercut '; "> 
            <input type="button"  class=" btn btn-pop " value="Unhydrated " OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'Unhydrated '; "> 
            <input type="button"  class=" btn btn-pop " value="Units, Energy Selected" OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'Units '; "> 
            </div></div>
            <hr>
            <div class="row"><div class="col-md-12">
                TEXT : <textarea class="form-control cctext"  id="tmp_cc3" rows="6"></textarea>
            </div></div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="button" id="btnsave-plan3" class="btn btn-primary" data-dismiss="modal" value="OK" >
    </div>
  </div>
</div>
</div>


    <!--- BUTTON LINK --->
    <div class="row"><div class="col-md-12">
    <div class="form-group button-box-shadow ">
    <b>Treatment Plan : </b> 
        <button class="btn btn-info" data-toggle="modal" data-target =".bd-popup3-modal-lg"> Template </button>
        <button class="btn btn-primary" id="btn-clear"> Clear </button>
    </div>
    </div></div>
   
<!--- BUTTON LINK --->

<div class="treatmentplan-form">

    <?php Pjax::begin(); ?>
    <?php $form = ActiveForm::begin(); 
    
    ?>
    <div class="row"> <div class="col-md-12">
        <?= $form->field($model, 'plan_text')->textarea(['id'=>'plan_text','class'=>'form-control cctext','rows' => 6]) ?>
    </div> 
    </div><!--- END ROW--->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?php Pjax::end(); ?>

</div>
