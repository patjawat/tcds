<?php

use app\components\PatientHelper;
use app\components\DateTimeHelper;
use app\modules\doctorworkbench\models\HisPatient;
use cenotia\components\modal\RemoteModal;
use kartik\widgets\FileInput;
use lo\widgets\modal\ModalAjax;
use yii\db\Expression;
$hn = PatientHelper::getCurrentHn();
$vn = PatientHelper::getCurrentVn();
$prefix = PatientHelper::getCurrentVn();
$fname = PatientHelper::getCurrentFname();
$lname = PatientHelper::getCurrentLname();
$cid = PatientHelper::getCurrentCid();

$patient = HisPatient::findOne(['hn' => $hn]);

if ($patient) {
    $sex = $patient->sex == 'M' ? 'ชาย' : 'หญิง';
} else {
    $sex = '';
}

use yii\helpers\Html;
// PatientHelper::DrugAlert();
use yii\helpers\Url;

$this->title = '<i class="fas fa-user-md pull-left"></i> ห้องตรวจแพทย์';
$this->params['pt_title'] = PatientHelper::getPatientTitleByHn($hn);
$this->registerCss($this->render('../../dist/css/style.css'));

$url = \yii\helpers\Url::to(['order/icd10-list']); //กำหนด URL ที่จะไปโหลดข้อมูล
?>


<style>
.btn-patient-alert {
    display: none;
}

.kv-editable-link {
    color: #017bfe;
}
</style>



<?php
RemoteModal::begin([
    "id" => "remoteModal-ajax",
    "options" => ["class" => "fade slide-right"],
    "footer" => "", // always need it for jquery plugin
])
?>
<?php RemoteModal::end();?>

<style>
#remoteModal-ajax>.modal-dialog {
    width: 60%;
}

.navbar-default .navbar-nav>li.dropdown:hover>a,
.navbar-default .navbar-nav>li.dropdown:hover>a:hover,
.navbar-default .navbar-nav>li.dropdown:hover>a:focus {
    background-color: rgb(231, 231, 231);
    color: rgb(85, 85, 85);
}

li.dropdown:hover>.dropdown-menu {
    display: block;
    background-color: #d6d6d6;
    ;
}

.text-right {
    text-align: right;
}

.text-center {
    text-align: center;
}

.help-block {
    display: block;
    margin-top: 0px;
    margin-bottom: 0px;
    color: #737373;
}

.form-group {
    margin-bottom: 5px;
}
</style>

<div class="view-process">
    <div class="row">
        <div
            class="col-xs-6 col-xs-offset-3 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
            <h3>บันทึกข้อมูล กรุณารอสักครู่ ...</h3>
            <div class="progress progress-striped active">
                <div class="progress-bar" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"
                    style="width: 100%">
                    <span class="sr-only">45% Complete</span>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- new Row -->
<div class="row view-container" style="margin-top: -27px;">
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <h3 class=""><i class="fas fa-user-md pull-left"></i> ห้องตรวจแพทย์
            <!-- <span class="doctor_of"><i class="fas fa-edit"></i></span> -->
            <?=Html::a('<i class="fas fa-edit"></i>', '#', ['class' => 'doctor_of', 'onClick' => 'doctorOf()'])?>
        </h3>
        <br>
    </div>

    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
        <?php if ($hn): ?>
        <div class="pull-right" style="padding-top:14px;">
            <?=Html::a('<i class="fas fa-external-link-alt"></i> cv risk (thai)', 'http://10.1.99.6/Thai-CV-Risk-Score/index.php?hn="' . $hn . '"&prefix="' . $patient->prefix . '"&fname="' . $patient->fname . '"&lname="' . $patient->lname . '"sex="' . $sex . '"&birthday_date="' . $patient->birthday_date . '"', ['class' => 'btn btn-primary', 'target' => '_blank'])?>
            <?=Html::a('<i class="fas fa-external-link-alt"></i> cv risk (acc)', null, ['class' => 'btn btn-primary'])?>
            <?=Html::a('<i class="fas fa-external-link-alt"></i> dm risk', 'http://10.1.99.6/diabetes_risk_score/?hn="' . $hn . '"&prefix="' . $patient->prefix . '"&fname="' . $patient->fname . '"&lname="' . $patient->lname . '"sex="' . $sex . '"&birthday_date="' . $patient->birthday_date . '"', ['class' => 'btn btn-primary', 'target' => '_blank'])?>
            <?php Html::a('แบบฟอร์ม OPD DOCTOR RECORD', ['/chiefcomplaint/report/opd-doctor-record', 'report_name' => 'opd-doctor-record', 'hn' => $hn, 'vn' => $vn], ['class' => 'btn btn-danger print', 'target' => '_blank'])?>
            <?=Html::a('<i class="fas fa-vial"></i> LAB', ['/lab/default/lab-result/'], ['target' => '_blank', 'class' => 'btn btn-warning']);?>
            <?=Html::a('<i class="fas fa-expand"></i> PACS', ['/doctorworkbench/default/pacs'], ['target' => '_blank', 'class' => 'btn btn-info']);?>
            <!-- <button type="button" class="btn btn-info" role="modal-remote1" value="<?=Url::to(['/drug/drugitems/show-drugitems'])?>"><i class="fas fa-expand"></i> PACS</button> -->
        </div>
        <?php endif;?>
    </div>
</div> <!-- End Row-->

<div class="row">
    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
        <div class="tabbable-panel" style="margin-top: -12px;margin-left: -7px;">
            <div class="tabbable-line">
                <ul class="nav nav-tabs ">
                    <li class="active">
                        <a href="#tab_1" class="loadPage" data-toggle="tab" url="index.php?r=lab/pcclab">
                            <i class="fas fa-stethoscope"></i> OPD DOCTOR RECORD TODAY
                        </a>
                    </li>
                    <li>
                        <a href="#tab_7" class="loadPage" data-toggle="tab" id="tab_medication"
                            url="index.php?r=doctorworkbench/pcc-medication">
                            <i class="fas fa-pills"></i> Medication
                        </a>
                    </li>
                    <li>
                        <a href="#doctor_free" class="loadPage" data-toggle="tab">
                            <i class="fas fa-hand-holding-usd"></i> Doctor Fee
                        </a>
                    </li>
                    <li>
                        <a href="#record_today" class="loadPage" data-toggle="tab">
                            <i class="fas fa-calendar-week"></i> RECORD TODAY
                        </a>
                    </li>

                    <li>
                        <a href="#eye_exam_today" class="loadPage" data-toggle="tab">
                            <i class="fas fa-hand-holding-usd"></i> Eye Exam Today
                        </a>
                    </li>
                </ul>
                <div class="tab-content" style="margin-top:15px;">
                    <div class="tab-pane active" id="tab_1">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="">
                                <h3 class="panel-title"><i class="fas fa-edit"></i>
                                    History & Physicial Exam
                                </h3>
                            </div>
                            <div class="panel-body">

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div id="diagenosisForm"> </div>
                                    </div>
                                    <!-- <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                        <div id="tab_diagnosis"></div>
                                    </div> -->
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane" id="tab_7">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fas fa-edit"></i> จ่ายยาและเวชภัณฑ์</h3>
                            </div>
                            <div class="row"
                                style="padding-top: 25px;padding-bottom: 25px;widyh: 90%;width: 100%;margin: auto;">
                                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">

                                    <div id="medication-form"></div>
                                </div>
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <?php
                                    echo ModalAjax::widget([
                                        'id' => 'createCompany',
                                        'header' => '<i class="fas fa-history"></i> ประวัติการจ่ายยา',
                                        'toggleButton' => [
                                            'label' => '<i class="fas fa-history"></i> ประวัติการจ่ายยา',
                                            'class' => 'btn btn-danger pull-left',
                                        ],
                                        'url' => Url::to(['/doctorworkbench/medication/drug-history']), // Ajax view with form to load
                                        'ajaxSubmit' => true, // Submit the contained form as ajax, true by default
                                        'size' => ModalAjax::SIZE_LARGE,
                                        'options' => ['class' => 'header-primary'],
                                        'autoClose' => true,
                                        'pjaxContainer' => '#grid-company-pjax',
                                    ])
                                    ?>

                                </div>
                            </div>

                            <div class="panel-body">
                                <div id="view_medication"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="doctor_free">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">ค่าแพทย์</h3>
                            </div>
                            <div class="panel-body">

                                <div class="row">
                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                        <div id="form_df"></div>
                                        <div id="view_df"></div>
                                    </div>

                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <div class="card bg-primary text-white shadow" style="height: 161px;">
                                            <h1 class="text-center" style="color:#000;margin-top: 57px;" id="sum_df">
                                                00.00</h1>
                                        </div>
                                    </div>

                                </div> <!-- End Body panel -->
                            </div> <!-- End panel -->

                        </div>
                    </div>
                    <!--End doctor_free-->
                    <div class="tab-pane" id="record_today">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fas fa-qrcode"></i> RECORD TODAY</h3>
                            </div>
                            <div class="panel-body shadow">

                                <?php
                                echo FileInput::widget([
                                    'name' => 'attachment_48[]',
                                    'options' => [
                                        'multiple' => true,
                                    ],
                                    'pluginOptions' => [
                                        'uploadUrl' => Url::to(['/site/file-upload']),
                                        'uploadExtraData' => [
                                            'album_id' => 20,
                                            'cat_id' => 'Nature',
                                        ],
                                        'maxFileCount' => 10,
                                    ],
                                ]);
                                ?>

                            </div>
                        </div> <!-- End panel-->
                    </div>
                    <div class="tab-pane" id="eye_exam_today">
                        <div id="form_eye-exam-today"></div>
                    </div>
                </div>
            </div>
        </div>

        <?php if ($hn): ?>
        <div class="form-group pull-right">
            <?=Html::a('<i class="fas fa-sign-out-alt"></i> Check Out', ['/doctorworkbench/default/check-out-confirm'], [
                    'class' => 'btn btn-danger',
                    'id' => 'checkout',
                ])
                ?>
            <?php // Html::submitButton('<i class="fas fa-sign-out-alt"></i> Check Out', ['class' => 'btn btn-danger','id' => 'check-out',])  ?>
            <?=Html::submitButton('<i class="far fa-save"></i> บันทึก', ['class' => 'btn btn-success', 'id' => 'diag-save'])?>
            <?=Html::a('<i class="fas fa-power-off"></i> ยกเลิก', ['/doctorworkbench/default/clear-helper'], ['class' => 'btn btn-default', 'id' => 'cancel'])?>
        </div>
        <?php endif;?>
    </div><!-- End col-8-->
    <!-- start col-4 -->
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <div id="chiefcomplaint" style="margin-top: 28px;"></div>

    </div> <!-- End col-4-->
</div>
<!-- End New Row -->

<?php
$js = <<< JS

$(".view-process").hide();
    loadDiagnosisForm()
    loadDiagnosis();
    loadChiefcomplaint();
    loadMedication();
    loadMedicationForm();
    loadDrugAllergy();
    loadDf();
    loadFormDf();
    loadFormEyeExamToday();


    
function loadDrugHistory(){
    $.ajax({
        type: "get",
        url: "index.php?r=lab/pcclab",
        success: function (response) {
            $('#tab_1show').html(response);
        }
    });
}

function changeUnit(unit,temperature){
    localStorage.setItem("unit",unit);
    localStorage.setItem("temperature",temperature);

}

function loadProcedure(){
    $.ajax({
        type: "get",
        url: "index.php?r=doctorworkbench/pcc-procedure",
        success: function (response) {
            $('#tab_8show').html(response);
        }
    });
}
function loadPreorderlab(){
    $.ajax({
        type: "get",
        url: "index.php?r=lab/preorderlab",
        success: function (response) {
            $('#tab_9show').html(response);
        }
    });
}
function loadAppointment(){
    $.ajax({
        type: "get",
        url: "index.php?r=appointment",
        success: function (response) {
            $('#tab_10show').html(response);
        }
    });
}

function loadTreatmentplan(){
    $.ajax({
        type: "get",
        url: "index.php?r=treatment/treatmentplan/create",
        success: function (response) {
            $('#tab_11show').html(response);
        }
    });
}


function loadNc(){
    $.ajax({
        type: "get",
        url: "index.php?r=nursescreen/nurse-screening/update-vn",
        dataType: "json",
        success: function (response) {
            $('#nc').html(response)
            $('.form-group-nc').hide();

        }
    });
}

function loadDiagnosisForm(){
    $.ajax({
        type: "get",
        url: "index.php?r=doctorworkbench/diagnosis/create",
        dataType: "json",
        success: function (response) {
            $('#diagenosisForm').html(response.content);
        }
    });
}



    // loadEyeExamToday();
    // ตรวจสอบเจ้าของไข้
    // doctorOf();


    $('#checkout').click(function (e) {
        e.preventDefault();
        // ตรวจสอบว่ามีการยืนยันว่าไม่มีการจ่ายยา
        $.ajax({
            type: "get",
            url: $(this).attr('href'),
            dataType: "json",
            success: function (response) {
                if(response.status == false){
                    $.alert({
                    theme:'modern',
                    title: 'แจ้งเตือน!',
                    content: response.msg,
                    backgroundDismiss: false,
                    backgroundDismissAnimation: 'glow',
                    animation: 'zoom',
                    closeAnimation: 'scale'
                    // animationSpeed: 900,
                });

                }else{
                    $.confirm({
                        title: 'ยืนยันกร Ckeckout!',
                        content: 'บันทึกเพื่อจบการรักษา',
                        type: 'red',
                        typeAnimated: true,
                        buttons: {
                            tryAgain: {
                                text: 'บันทึก',
                                btnClass: 'btn-red',
                                action: function(){
                                    // console.log('xx');
                                    $.ajax({
                                        type: "get",
                                        url: 'index.php?r=doctorworkbench/default/check-out',
                                        dataType: "json",
                                        success: function (response) {

                                        }

                                    });
                                }
                            },
                            close: function () {
                            }
                        }
                    });
                }

            }
        });



    });

//     $('.patient-alert').click(function(){
//     $('#patient-alert').modal('show');
// });


// $('[role="modal-remotexxx"]').click(function(e){
//     var url = $(this).attr('value');
//     $('#doctorworkbench-modal').modal('show');
//     $.ajax({
//         type: "get",
//         url: url,
//         success: function (response) {
//             $('.modal-title').html(response.title);
//             $('.modal-body').html(response.content);
//             $('.modal-footer').html(response.footer);

//         }
//     });

// });

// $('#drugitems-pjax').on('pjax:success', function(event, data, status, xhr, options) {
//         // loadForm();
//         console.log('reload');
//         // $.pjax.reload({container:'#drugitems-pjax'});
//     });



// $('#hisCheck').click(function(){
//     $.ajax({
//         type: "get",
//         url: "index.php?r=doctorworkbench/doctor-free/his-check",
//         // data: "data",
//         dataType: "json",
//         success: function (response) {
//             console.log(response);
//         }
//     });
// });
// // ยกเลิกการทำงาน
// $('#cancel').click(function (e) {
//     // e.preventDefault();
//     $('.view-container').hide();
//     $(".view-process").show();

// });

// บันทึกการทำงาน
$('#diag-save').click(function(){
    // alert('Diag Save');
    // $('#form-diagnosis').submit();
    // krajeeDialog.alert('An alert');
    // // or show a confirm
//     if($('#diagnosis-bp1_confirm').val()==''){
//         alert('confirm BP ต้องใส่ค่า');
//         $('#diagnosis-bp1_confirm').select();
//         return false;

//     }else if($('#diagnosis-bp2_confirm').val()==''){
//         alert('onfirm BP ต้องใส่ค่า');
//         $('#diagnosis-bp2_confirm').select();
//         return false;
//     }else{

//     krajeeDialog.confirm('Are you sure', function(out){
//         if(out) {
//             // alert('Yes'); // or do something on confirmation
//             $('#form-diagnosis').submit();
//         }
//     });

// }


$.confirm({
    title: 'ยืนยัน!',
    content: 'บันทึกข้อมูล!',
    theme:'modern',
    buttons: {
        confirm: function () {
            $('#form-diagnosis').submit();
        },
        cancel: function () {
            $.alert('Canceled!');
        },
    }
});


});

JS;
$this->registerJS($js);
?>