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

$this->title = 'Documents';
$hn = PatientHelper::getCurrentHn();
$this->params['pt_title'] = PatientHelper::getPatientTitleByHn($hn);
// $this->registerCss($÷this->render(''));
$this->registerCssFile('@web/viewer/viewer.min.css');
$this->registerJsFile('@web/viewer/viewer.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

$model = new Documentqr;
$data= Json::decode(SystemData::findOne(['id' => 'system'])->data);
$barcode_api = $data['barcode_api'];
// ตรวจสอบการ Updaet Document Him
$checkUpdate = Document::find(['hn' => $hn,'updated_at' => DateTimeHelper::getDbDate()])->count();

?>

<style>
.navbar-inverse {
    color: #777777 !important;
    background-color: #039285 !important;
    box-shadow: 0px 2px 35px 0 rgba(154, 161, 171, 0.28) !important;
    border-color: #08080800 !important;
}

.modal.in>.modal-dialog {
    width: 70%;
}

.container_loadding {
    /* position: absolute; */
    /* top: 99%; */
    /* left: 61%; */
    transform: translate(-50%, -50%);
    width: 350px;
    height: 100px;
    margin-left: 50%;
    margin-top: 10%;
}

.container_loadding h3 {
    color: rgba(100, 100, 100, 0.9);
}

.container_loadding .progress-bar {
    width: 0%;
    height: 5px;
    background: linear-gradient(to right, rgb(76, 217, 105), rgb(90, 200, 250), rgb(0, 132, 255), rgb(52, 170, 220), rgb(88, 86, 217), rgb(255, 45, 83));
    margin-top: 10px;
    background-size: 350px 5px;
    border-radius: 10px;
    animation: loading 6s ease-in-out forwards;
}

.container_loadding .shadow {
    width: 100%;
    height: 40px;
    background: linear-gradient(to bottom, rgba(100, 100, 100, 0.17), rgba(100, 100, 100, 0.1), transparent);
    transform: skew(45deg) translate(15px, 5px);
}

@keyframes loading {
    to {
        width: 100%;
    }
}
</style>

<button id="api">Click</button>

<ul class="nav nav-tabs" style="width:100%;height: 44px;">
    <li class="active"><a data-toggle="tab" href="#home-document"><i class="fas fa-barcode"></i> Document BarCode</a>
    </li>
    <li><a data-toggle="tab" href="#menu1"><i class="fas fa-qrcode"></i> Document QRCode</a></li>
</ul>

<div class="tab-content" style="margin-left:0px;padding-top: 0px;">
    <!-- Home Content -->
    <div id="home-document" class="tab-pane fade in active">
        <br>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fas fa-barcode"></i> Document BarCode</h3>
            </div>
            <div class="panel-body shadow">

                <div class="container_loadding">
                    <h3>Loading, please wait.</h3>
                    <div class="progress-bar">
                        <div class="shadow"></div>
                    </div>
                </div>
                <div id="view-document"></div>
            </div>
        </div>

    </div>
    <!-- End Home content -->

    <!-- Menu1 Content -->
    <div id="menu1" class="tab-pane fade">

        <br>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fas fa-qrcode"></i> Document QRCode</h3>
            </div>
            <div class="panel-body shadow">
                <button id="test" class="btn btn-success"><i class="fas fa-upload"></i> อัพโหลดเอกสารอื่นๆ</button>
                <hr>
                <div id="view-document-qr"></div>
            </div>
            <!--- End Upload Form-->


            <?php
$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'id' => 'upload-form']);

echo $form->field($model, 'type_id')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(DocumentQrType::find()->all(), 'id', 'name'),
    'options' => ['id' => 'type_id', 'placeholder' => 'ประเภทเอกสาร ...'],
    'pluginOptions' => [
        'allowClear' => true,
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
                    // $('#modal-qr').modal('show');
                    $('#upload-modal').modal('show');
                    $('#upload-modal').find('.modal-title').html('อัพโหลดเอกสาร');
                    $('#upload-modal').find('.modal-body').html(data)


                }
            });
         }",
    ],
])->label('ประเภทเอกสาร');
ActiveForm::end();

?>

        </div>
    </div>

</div>
</div>


<?php Modal::begin([
    'id' => 'upload-modal',
    'header' => '<h4 class="modal-title"></h4>',
    'size' => 'modal-lg',
]);
?>

<?php Modal::end();?>
<div id="hn" hidden><?=$hn;?></div>
<?php
$get_url_insert = Url::base(true).'/index.php?r=api/add-barcode'; 

$js = <<< JS
var document_him = localStorage.getItem("document_him");
var hn  = $('#hn').text()
// var url_convert_him = 'http://127.0.0.1:5000/barcode-him'
var url_convert_him = '$barcode_api';
var url_insert = '$get_url_insert';
var checkUpdate = '$checkUpdate';
// $('.container_loadding').hide();

// ตรวจสอบการโอเอกสารจาก him
// if(hn == document_him ){
//     // ไม่ต้องทำไร
//     $('.container_loadding').hide();
//     loadEmrDocument()
// }else if(hn == ""){
//     localStorage.setItem("document_him","")
// }else{
//     convertFile($hn,url_convert_him,url_insert);
// }
// จบ

// ตรวจสอบการ แปลง file
// ถ้าวันนี้ยังไม่มีการแปลงไฟล์ให้ cpnvert
if(checkUpdate < 1){ 
    convertFile($hn,url_convert_him,url_insert);
}else{ 
    $('.container_loadding').hide();
    loadEmrDocument()
}

$('#api').click(function (e) { 
    e.preventDefault();
    convertFile($hn,url_convert_him,url_insert);

  
});


$('#python-load').click(function (e) { 
    e.preventDefault();
    $.ajax({
    type: "get",
    url: "index.php?r=emr/default/test",
    data: {hn : $hn},
    dataType: "json",
    success: function (response) {
        $('#show-py').html(response)
        console.log(response);
    }
});
});


// loadEmrDocumentQR();

$('#upload-form').hide();


$('#test').click(function (e) {
    // e.preventDefault();
    $('#upload-form').show();
    $("#upload-modal").modal("show");
    $("#upload-modal").find(".modal-title").html("<i class='fas fa-file-alt'></i> เลือกประเภทเอกสาร");
    $("#upload-modal").find(".modal-body").html($('#upload-form'))

});

function loadEmrDocument(){
    $.ajax({
        type: "get",
        beforeSend:function(){
            $('#view-document').html('<img src="img/loading.gif" style="margin-left: 400px;margin-top: 50px;padding-bottom: 18px;" />');
        },
        url: "index.php?r=document/default/index",
        dataType: "json",
        success: function (response) {
            $('#view-document').html(response);
        }
    });
}
function loadEmrDocumentQR(){
    $.ajax({
        type: "get",
        url: "index.php?r=document/documentqr/view-emr",
        dataType: "json",
        success: function (response) {
            $('#view-document-qr').html(response);
        }
    });
}

JS;
$this->registerJS($js);
?>