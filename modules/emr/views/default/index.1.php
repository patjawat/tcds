<?php
use app\components\PatientHelper;
use app\components\DbHelper;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use lo\widgets\modal\ModalAjax;
use kartik\tabs\TabsX;

$hn = PatientHelper::getCurrentHn() ? PatientHelper::getCurrentHn()  : "";
$hnEmr = PatientHelper::getCurrentHnEmr();
// PatientHelper::DrugAlert();

$this->params['pt_title'] = PatientHelper::getPatientTitleByHn($hn);
?>
<style>
.navbar-default .navbar-nav>li.dropdown:hover>a,
.navbar-default .navbar-nav>li.dropdown:hover>a:hover,
.navbar-default .navbar-nav>li.dropdown:hover>a:focus {
    background-color: rgb(231, 231, 231);
    color: rgb(85, 85, 85);
}

li.dropdown:hover>.dropdown-menu {
    display: block;
    background-color: #eee;
}

.nav-tabs>li {
    background-color: #eee;
}

.nav-tabs>li>a {
    color: #353535;
    margin-right: -1px;
}

.text-right {
    text-align: right;
}

.text-center {
    text-align: center;
}


.sidebar {
    border-color: #9e9e9e3b;
    ;
    box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, .15);

}

.sidebar-header {
    height: 40px;
    border-top-left-radius: 7px;
    border-top-right-radius: 7px;
    color: #fff;
    background-color: #017bfe;
    border-color: #017bfd;
    padding: 10px;
}

.sidebar-title {
    color: #fff;
    background-color: #ccc;
    border-color: #017bfd;
}

.sidebar-body {
    color: #808080;
    border-color: #017bfd;
    height: 500px;
}

.body-header {
    background-color: #ccc;
    height: 57px;
    width: 110%;
    margin-left: -5%;
    margin-top: -30px;
}

.title {
    height: 40px;
    width: 100%;
    background-color: #ccc;
    margin-bottom: 6px;
}
</style>
<!-- เอาไว้ check ค่า hn ห้ามลบ -->
<div id="hn" hidden><?=$hn;?></div>

<div id="loader" style="margin-top:10%;width:80%;margin-left:10%" hidden>
    <h2>กำลังโหลดข้อมูล...</h2>
    <div class="progress">
        <div id="dynamic" class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar"
            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
            <span id="current-progress"></span>
        </div>
    </div>
</div>

<!-- Start Content -->
<div id="emr-content">


    <div class="row emr-content">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <h2 style="margin-top: -7px;">Patient EMR (การดูประวัติผู้ป่วยย้อนหลัง)</h2>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">

            <?= PatientHelper::getCurrentHn() ? '' : Html::textInput('emr_hn',$hnEmr,['class' => 'form-control pull-right','id'=> 'search-hn-emr','style' => 'width:300px;']); ?>
        </div>

        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
            <?= Html::resetButton('Clear', ['class' => 'btn btn-default','id' => 'btn-clear']) ?>
        </div>

    </div>

    <br>
    <div class="row">


        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"
            style="border-color: #9e9e9e3b;box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, .15);">
            <br>

            <div class="pull-right">
                <button type="button" class="btn"><i class="fas fa-print"></i> Print1</button>
                <button type="button" class="btn btn-primary"><i class="fas fa-print"></i> Print2</button>
                <button type="button" class="btn btn-success"><i class="fas fa-print"></i> Print3</button>

            </div>
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home"><i class="fas fa-user-tag"></i> เวชระเบียน</a></li>
                <li><a data-toggle="tab" href="#diagnosis"><i class="fas fa-user-md"></i> Diagnosis</a></li>
                <li><a data-toggle="tab" href="#medication"><i class="fas fa-pills"></i> Medecation</a></li>
                <li><a data-toggle="tab" href="#document"><i class="fas fa-folder-open"></i> Document</a></li>
            </ul>

            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">



                    <!-- ##################### -->
                    <br>
                    <div class="container">
                        <div class="row" style="height: 450px;">
                            <div class="col-sm-6" style="padding-left: 0px;">
                                <div class="input-group">
                                    <!-- <input type="text" class="form-control"
                                    aria-label="Amount (rounded to the nearest dollar)">
                                <span class="input-group-addon"><i class="fas fa-search"></i></span> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ##################/ -->



                </div>
                <div id="diagnosis" class="tab-pane fade">
                    <br>
                    <div id="view-diagnosis"></div>
                </div>
                <div id="medication" class="tab-pane fade">
                    <br>
                    <div id="view-medication"></div>

                </div>
                <div id="document" class="tab-pane fade">
                    <br>
                    <div id="view-document"></div>
                </div>
            </div>

        </div>

    </div>


</div>
<!-- End Content -->


<?php

$js = <<< JS

var document_him = localStorage.getItem("document_him");
var hn  = $('#hn').text()
// console.log(document_him);
    $("#loader").hide();
    loadEmrDocument();
    loadEmrMedication();
    loadEmrDiagnosis();

// ตรวจสอบการโอเอกสารจาก him
// if(hn == document_him ){
//     // ไม่ต้องทำไร
// }else if(hn == ""){
//     localStorage.setItem("document_him","")
// }else{
//     convertFile($hn);
// }
//จบ



// ค้นหา HN เพื่อ set sesssion
$('#search-hn-emr').keypress(function (e) { 
    // e.preventDefault();
    var val = $(this).val()
    if(e.keyCode == 13){
        if(val !== ''){
        $.ajax({
            type: "post",
            url: "index.php?r=emr/default/hn-emr",
            data:{hn:val},
            dataType: "json",
            success: function (response) {
                if(response.status == false){
                    alert('ไม่พบ HN : '+response.hn)
                }else{
                    // location.reload();
                }
            }
        });
    }else{
        alert('รบะุ HN');
        $(this).select();
        return false;
    }
    }  
});

$('#btn-clear').click(function (e) { 
    // e.preventDefault();
    $.ajax({
            type: "get",
            url: "index.php?r=emr/default/hn-emr-clear",
            dataType: "json",
            success: function (response) {
                
            }
        });
    
});

function convertFile(hn){
    $.ajax({
        type: "post",
        beforeSend: function () {
            $("#loader").show();
            $('#emr-content').hide()
            // $('body').html('Loadding...');
            // $('.show-drugitems-data').html('<img src="img/loading2.gif" style="]margin-left: 40%;margin-top: 2%;padding-bottom: 6%;width: 20%;" />');
        },
        url: "http://10.1.88.4:8080/predict",
        data: {hn:hn},
        // dataType: "่json",
        success: function (response) {
            if(response.prediction !==""){
                $("#loader").hide();
                $('#emr-content').show()
                localStorage.setItem("document_him",hn)
            }
            // console.log(response)
            // console.log('xx')
            // alert();
        
        }
    });
}



function loadEmrDocument(){
    $.ajax({
        type: "get",
        url: "index.php?r=emr/default/document",
        dataType: "json",
        success: function (response) {
            $('#view-document').html(response);
        }
    });
}

function loadEmrMedication(){
    $.ajax({
        type: "get",
        url: "index.php?r=emr/default/medication",
        dataType: "json",
        success: function (response) {
            $('#view-medication').html(response);
        }
    });
}

function loadEmrDiagnosis(){
    $.ajax({
        type: "get",
        url: "index.php?r=emr/default/diagnosis",
        dataType: "json",
        success: function (response) {
            $('#view-diagnosis').html(response);
        }
    });
}

JS;
$this->registerJS($js);
?>