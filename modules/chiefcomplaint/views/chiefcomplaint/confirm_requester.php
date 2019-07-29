<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
// $this->registerJS($this->render('../../dist/js/script.js'));?>
<div class="form-group">
    <input type="password" name="requester" id="master-requester" class="form-control" placeholder="Requester" value=""
        autofocus>
    <input type="text" name="success-requester" id="success-requester" class="form-control" hidden="true">

</div>

<?php // echo Html::a('ตกลง','#',['class' => 'btn btn-success save pill-right'])?>
<?php
                                
    //  $key = 'ท25254';
    //  $url = 'http://e4d4bb07.ngrok.io/HIS/index.php/RequesterRpcS';
    //  $Client = new JsonRpc\Client($url);
    //  $success = false;
    //  $success = $Client->call('getById', [$key]);
    //  $data =  $Client->result[0];
    //  print_r($data);
    ?>
<?php
$js = <<< JS

// alert();
// $('#master-requester').focus();
$('#success-requester').hide();

$('#master-requester').keyup(function(e){
        var value = $(this).val();
        console.log(value);
            if(e.keyCode == 13){

                if($('#success-requester').val() == ""){
                    $.ajax({
                        type: "post",
                        url: "index.php?r=site/requester-check",
                        data: {keys:value},
                        dataType: "json",
                        beforeSend: function(){
                            $('.modal-title').html('<i class="fas fa-search"></i> กำลังค้นหา...');
                            $('.save').hide();
                        },
                        success: function (response) {
                            console.log(response);
                            $('.modal-title').html(response.title);
                            $('.modal-footer').html(response.footer);
                            if(response.status == true){
                                $('.save').show();
                                $('.requester').val($('#master-requester').val());
                                $('#success-requester').val($('#master-requester').val());
                                // $("#form-chiefcomplaint").submit();
                                
                            }
                            
                        }
                    });
                }else{
                    // alert('save');
                    
                    var r = confirm("ยืนยันการบันทึก!");
                        if (r == true) {
                            saveChiefcomplaint();
                        } else {
                            return false;
                        }
                }
                   
    }

    // }, 1000 );
    });


JS;
$this->registerJS($js);
?>