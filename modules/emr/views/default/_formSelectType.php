<?php
use app\components\PatientHelper;
use app\components\DateTimeHelper;
use app\modules\document\models\Documentqr;
use app\modules\document\models\Document;
use app\modules\document\models\DocumentQrType;
use app\modules\systems\models\SystemData;
use kartik\select2\Select2;
use kartik\widgets\ActiveForm;
use yii\bootstrap\Modal;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\View;
$model = new Documentqr;
?>
 <?php
$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'id' => 'upload-form1']);

echo $form->field($model, 'type_id')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(DocumentQrType::find()->all(), 'id', 'name'),
    'options' => ['id' => 'type_id', 'placeholder' => 'ประเภทเอกสาร ...'],
    'pluginOptions' => [
        'allowClear' => true,
        // 'dropdownParent' => new yii\web\JsExpression('$("#upload-modal")'),
    ],
    'pluginEvents' => [
        "change" => "function() {
            $('#form-select-type').hide();
            $('#upload-form').show();
            var data = $(this).text
            var data = $(this).select2('data')
            $('#qr-type-text').html(' ประเภท '+ data[0].text);
            // $('#type_id').text(data[0].text);
            // $('#type_id').html(data[0].text)

            $.ajax({
                type: 'get',
                url: 'index.php?r=document/documentqr/form-upload',
                data: {id:$(this).val()},
                dataType: 'json',
                success: function (data) {
                    $('.modal-dialog').addClass('modal-lg').removeClass('modal-md');
                    $('.modal-title').html('อัพโหลดเอกสาร');
                    $('.modal-body').html(data)


                }
            });
         }",
    ],
])->label(false);
ActiveForm::end();

// $js = <<< JS
// // $.fn.modal.Constructor.prototype.enforceFocus = $.noop;
// // $.fn.modal.Constructor.prototype.enforceFocus = function() {};
// JS;
// $this->registerJS($js,View::POS_READY,'my-button-handler');
?>
