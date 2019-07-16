<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use mihaildev\ckeditor\CKEditor;
// use dosamigos\ckeditor\CKEditor;
use app\components\PatientHelper;
use app\modules\chiefcomplaint\models\Chiefcomplaint;
$hn = PatientHelper::getCurrentHn();
?>

<div class="diagnosis-form" style="margin-top: -7px;">
    <?php $form = ActiveForm::begin([
    'id' => 'form-diagnosis',
]);?>
    confirm BP
    <div class="row">
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
            <?=$form->field($model, 'bp1_confirm')->textInput(['style' => '','disabled' => $hn ? false : true])->label(false)?>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
            <span style="left: 0;position: absolute;margin-top: -3px;font-size: 24px;">/</span>
            <?=$form->field($model, 'bp2_confirm')->textInput(['style' => '','disabled' => $hn ? false : true])->label(false)?>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <?=$form->field($model, 'bp_confirm')->checkbox(['disabled' => $hn ? false : true])->label(false)?>
            <label for="">Same</label>
        </div>
    </div>


    <?php echo $form->field($model, 'diag_text')->textarea(['rows' => 8,'disabled' => $hn ? false : true])->label(false); ?>
<?php
// echo $form->field($model, 'diag_text')->widget(CKEditor::className(),[
//   'editorOptions' => [
//       'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
//       // 'inline' => false, //по умолчанию false
//   ],
// ]);
?>
    <div class="form-group">
        <?php // Html::submitButton('บันทึก', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$redirec_url = Url::base('http').'/index.php?r=site';
$js  = <<< JS


 $('#diagnosis-bp_confirm').on('click',function () {
   var ckbox = $('#diagnosis-bp_confirm');

     if (ckbox.is(':checked')) {
         $('#diagnosis-bp1_confirm').val($('#chiefcomplaint-bp1-targ').text())
         $('#diagnosis-bp2_confirm').val($('#chiefcomplaint-bp2-targ').text())
         $('#confirm_bp_label').hide();

     } else {
       $('#diagnosis-bp1_confirm').val('');
       $('#diagnosis-bp2_confirm').val('');
       $('#confirm_bp_label').show();

     }
 });


$('#form-diagnosis').on('beforeSubmit', function (e) {
    e.preventDefault();
    
    $.ajax({
      url: $(this).attr('action'),
      type:$(this).attr('method'),
      beforeSend:function(){
        $(".view-container").hide();
        $(".view-process").show();
        
                // $('#main-modal').modal('show');
                // $('.modal-title').html('Loadding...');
                // $('.show-drugitems-data').html('<img src="img/loading2.gif" style="]margin-left: 40%;margin-top: 2%;padding-bottom: 6%;width: 20%;" />');
            },
      dataType: 'json',
      data: $(this).serialize(),
      success : function(response){
        if(response == true){
        // window.location.replace("$redirec_url");
        location.reload();

        }
        // console.log(response);

      }
    })
    .done(function() {
      console.log("success");
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });

    return false;
});





JS;
$this->registerJS($js);
?>