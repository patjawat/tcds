<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use yii\web\JsExpression;
use app\modules\doctorworkbench\models\CDrugitems;
use app\modules\doctorworkbench\models\CDrugusage;
use app\modules\doctorworkbench\models\GatewayCDrugItems;
use app\modules\doctorworkbench\models\GatewayCDrugdose;
use app\modules\doctorworkbench\models\GatewayCDruguage;
// $this->registerJS($this->render('../../dist/js/script.js'));


?>

<style>
/* .total-price{
    border-top: 3px solid #9b25af;
    box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
    height: 33px;
    width: 158%;
    margin-top: 24px;
    background-color: #eee;
    color: #9b25af; 
    margin-left: -24px;
}
.total-price > p{
    font-size: 25px;
    margin-left: 6px; */
}
</style>

    <?php $form = ActiveForm::begin([ 
      'id' => 'formMed',
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-lg-3 col-md-3 col-sm-3',
                'wrapper' => 'col-lg-8 col-md-8 col-sm-8',
            ]
          ],
            'layout' => 'horizontal'
          ]); ?>
    <?= $form->field($model, 'hn')->hiddenInput()->label(false);?>
    <?= $form->field($model, 'vn')->hiddenInput()->label(false);?>
    <?= $form->field($model, 'pcc_vn')->hiddenInput()->label(false);?>
    <?= $form->field($model, 'cid')->hiddenInput(['id' => 'cid'])->label(false);?>


            <?=$form->field($model, 'icode')->widget(Select2::classname(), [
                // 'data' => ArrayHelper::map(GatewayCDrugItems::find()->all(), 'icode', function($model, $defaultValue) {
                //             return $model->drug_name.' '.$model->unit;
                //         }),
                        'data' => ArrayHelper::map(GatewayCDrugItems::find()->all(), 'icode','icode'),
                    'options' => [
                        // 'id' => 'icode',
                         'placeholder' => 'รายการยา ...',
                         'class' => 'fires clear'
                        // 'onchange' => 'alert (this.value)'                         
                        ],
                    'pluginOptions' => [
                        'allowClear' => true,
                ],
                'pluginEvents' => [
                    "select2:select" => "function() { $('#druguse').select2('open'); }",
                 ]
            ]);
            ?>

<?=$form->field($model, 'druguse')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(GatewayCDruguage::find()->all(), 'drugusage', function($model, $defaultValue) {
                            return $model->shortlist;
                        }),
                    'options' => [
                        'id' => 'druguse', 
                        'placeholder' => 'วิธีใช้ ...',
                        // 'multiple' => true,
                        'class' => ''
                    ],
                    'pluginOptions' => ['allowClear' => true,'maximumSelectionLength'=> 2,'tags' => true,],
                'pluginEvents' => [
                    "select2:select" => "function() { $('#qty').focus(); }",
                 ]
            ])->label(false);
            ?> 
           

<?= $form->field($model, 'qty',[
        'horizontalCssClasses' => [
            'wrapper' => 'col-sm-4',
        ]
    ])->textInput(['id' => 'qty','placeholder' => 'จำนวน ...',]); ?>  

<?php ActiveForm::end(); ?>


<?php
$js = <<< JS

$(function(){

    // $("#btn-save").click(function(event) {
    // // alert('cc');
    //         // event.preventDefault(); // stopping submitting
    //         var data = $('#formMed').serialize();
    //         // var data = $('#pe_text').val();
    //         var url = $('#formMed').attr('action');
    //             $.ajax({
    //             url: url,
    //             type: 'post',
    //             dataType: 'json',
    //             data: data,
    //             success : function(response){
    //                 $.pjax.reload({
    //                 container:response.forceReload,
    //                 history:false,
    //                 replace: false,
    //                 url:response.url

    //             });
    //             document.getElementById("formMed").reset();
    //             // $("form")[0].reset();
    //             $("#formMed").attr('action','index.php?r=doctorworkbench/pcc-medication/create');
    //             }
    //         }).fail(function() {
    //             console.log("error");
    //         });

    //         console.log(url);
        
    //             });



// totalPrice($('#cid').val());
// $('#crud-medication-pjax').on('pjax:complete', function() {
//     $.pjax.reload({container: '#druguse-pjax'});
//              })
// $('#druguse').keypress(function(){
//     alert();
// });

// $('#druguse').on('keypress', '.select2', function (e) {
// //   if (e.originalEvent) {
// //     $(this).siblings('select').select2('open');    
//    } 

// });

// $('#druguse').select2({
//     noResults: function(query) {
//       return 'No results matching: ' + query;
//     }
//     });

// $('#druguse').addClass('select2 select2-container select2-container--krajee select2-container--focus');
    
// $('#druguse').select2({
//     tags: true,
//     insertTag: function(data, tag){
//         tag.text = "create: " + tag.text;
//         data.push(tag);
//     }	
// }).on('select2:select', function(){
//     if($(this).find("option:selected").data("select2-tag")==true) {
//         // some more stuff...
//     }
// });


// $("#druguse").on("change", function () { 
	
//     console.log($(this).val());
//     $.ajax({
//         type: "method",
//         url: "index.php?r=doctorworkbench%2Fpcc-medication/create-drugusage",
//         data:{data:$(this).val()},
//         dataType: "json",
//         success: function (response) {
            
//         }
//     });
//      });

// $('#druguse').select2({
//     placeholder: "Select or add tags",
//     tags: true,
//     tokenSeparators: [",", " "],
//     createTag: function(newTag) {
//         return {
//             id: 'new:' + newTag.term,
//             text: newTag.term + ' (new)'
//         };
//     }
// });

});
JS;
$this->registerJS($js);
?>
