<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
// $this->registerJS($this->render('../../dist/js/script.js'));?>
<div class="form-group">
    <input type="password" name="requester" id="master-requester" class="form-control" placeholder="Requester" value="">
</div>
<div>
</div>

<?php //Html::a('ตกลง','#',['class' => 'btn btn-success save pill-right'])?>
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
// $(function(){
//     $('#master-requester').keyup(function(e){
//         var data = $('.requester').val(e.target.value)
//         // $.post("index.php?r=nursescreen/default/requester-check", data,
//         //     function (data, textStatus, jqXHR) {
                
//         //     },
//         //     "json"
//         // );
//     )};
// });

$(function(){

$('#master-requester').keyup(function(e){
        var value = $(this).val();
        console.log(value);
        $('.requester').val(value);
        // delay(function(){
            if(e.keyCode == 13){

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
                        // $("#form-chiefcomplaint").submit();
                        
                    }
                    
                }
            });
        }

    // }, 1000 );
    });

    $('.save').click(function(){
    console.log('save');
});
    
});

JS;
$this->registerJS($js);
?>