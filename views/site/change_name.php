<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;
use app\modules\settings\models\CDepartment;

$model = new CDepartment();

$data =  ArrayHelper::map(CDepartment::find()->all(),'code','name');

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php Modal::begin([
        'id' => 'activity-modal',
        'header' => '<h4 class="modal-title">เลือกแผนก/คลินิก</h4>',
        'size'=>'modal-sx',
        // 'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal"></a>',
        'footer' => '<a href="#" class="btn btn-primary" id="save-department">บันทึก</a>',
        ]);?>


        <div class="row">
            
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?php
                echo $form->field($model, 'id')->widget(Select2::className(), [
                    'data' => $data,
                    // 'id' => 'department',
                    'options'=>['id' => 'department','placeholder'=>'เลือกแผนก/คลินิก...','class' => 'fires'],

                    'pluginEvents' => [
                        "select2:select" => "function() { 
                            $('#btn-save').focus(); 
                        }",
                     ]
                ])->label(false);
                ?>

                    <div class="form-group">
                        <?php // Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

        <?php 
        Modal::end();
        ?>


<?php
$js = <<< JS
$(document).ready(function(){

    if(localStorage.getItem("department") == null){
        $("#activity-modal").modal("show");

                    // $.get(
                    //     "index.php?r=queuemanage%2Fdefault/save",
                    //     function (data)
                    //     {
                    //         $("#activity-modal").find(".modal-body").html(data);
                    //         $(".modal-body").html(data);
                    //         $(".modal-title").html("เพิ่มข้อมูลสมาชิก");
                    //         $("#activity-modal").modal("show");
                    //     }
                    // );
                    // $(".modal-title").html('<i class="fa fa-user-md" aria-hidden="true"></i> ส่งเข้าห้องตวจแพทย์');
                    // $("#activity-modal").modal("show");
                }

        $('#save-department').click(function(){
            var val = $('#department').val();
            // console.log(val);
            localStorage.setItem("department",val);
            $.ajax({
                type: "get",
                url: "index.php?r=site/set-department",
                data:{
                    department:val
                },
                dataType: "json",
                success: function (response) {
                $("#activity-modal").modal("hide");
                location.reload();
                    
                }
            });
        });
            });

JS;
$this->registerJS($js);

?>