<?php

use app\components\PatientHelper;
use yii\helpers\Html;

$hn = PatientHelper::getCurrentHn();
$vn = PatientHelper::getCurrentVn();
$this->params['pt_title'] = PatientHelper::getPatientTitleByHn($hn);
$tab = Yii::$app->request->get('active') ?  Yii::$app->request->get('active') : 'tab1';

?>
<style>
    .panel-default>.panel-heading {
        color: #05867a !important;
        background-color: #fff !important;
        border-color: #ddd !important;
        text-shadow: -1px 0px white, 0 1px white, 1px 0 white, 0 -1px white;
    }
</style>
<ul class="nav nav-tabs">
    <li class="<?= $tab == 'tab1' ? 'active' : '' ?>"><a data-toggle="tab" href="#tabs1" id="t_tabs1">คีย์ยา</a></li>
    <li class="<?= $tab == 'tab2' ? 'active' : '' ?>"><a data-toggle="tab" href="#tabs2" id="t_tabs2">จัดยา</a></li>
    <li class="<?= $tab == 'tab3' ? 'active' : '' ?>"><a data-toggle="tab" href="#tabs3" id="t_tabs3">ตรวจสอบยา</a></li>
    <li class="<?= $tab == 'tab4' ? 'active' : '' ?>"><a data-toggle="tab" href="#tabs4" id="t_tabs4">จ่ายยา</a></li>
    <li class="<?= $tab == 'tab5' ? 'active' : '' ?>"><a data-toggle="tab" href="#tabs5" id="t_tabs5">รายงานการจ่ายยา</a></li>
</ul>

<div class="tab-content">
    <div id="tabs1" class="<?= $tab == 'tab1' ? 'tab-pane fade in active' : 'tab-pane fade' ?>">
        <div id="medOrder"></div>

    </div>
    <!-- End Tabs1 -->
    <div id="tabs2" class="<?= $tab == 'tab2' ? 'tab-pane fade in active' : 'tab-pane fade' ?>">
        <div id="medArrange"></div>
        <!-- <div id="medAccept"></div> -->
    </div>
    <!-- End Tabs2 -->
    <div id="tabs3" class="<?= $tab == 'tab3' ? 'tab-pane fade in active' : 'tab-pane fade' ?>">
        <div id="medCheck"></div>
    </div>
    <!-- End Tabs3 -->
    <div id="tabs4" class="<?= $tab == 'tab4' ? 'tab-pane fade in active' : 'tab-pane fade' ?>">
        <div id="medSuccess"></div>
    </div>
    <!-- End Tabs4 -->
    <div id="tabs5" class="<?= $tab == 'tab5' ? 'tab-pane fade in active' : 'tab-pane fade' ?>">
        <div id="medReport"></div>
    </div>
    <!-- End Tabs5 -->
</div>
<!-- End Tabs Contents -->

<?php

$loadImg = Html::img('@web/img/loading.gif', ['style' => 'margin-left: 600px;margin-top: 50px;padding-bottom: 18px;']);
$js  = <<< JS

loadMedOrder() // ใบสั้งยา
loadMedArrange() // จัดยา
loadMedCheck() // ตรวจสอบยา
loadMedSuccess() // จ่ายยา
loadMedReport() // รายงาน

function loadMedOrder(){
    var div =  $('#medOrder');
    var label_tabs = $('#t_tabs1');
    $.ajax({
        type: "get",
        beforeSend: function () {
        div.html('$loadImg');
        label_tabs.html('Loading...');
    },
        url: "index.php?r=med/default/order",
        dataType: "json",
        success: function (response) {
            div.html(response)
            label_tabs.html('คีย์ยา');
        }
    });
}

// function loadMedAccept(){
//     var div =  $('#medAccept');
//     var label_tabs = $('#t_tabs1');
//     $.ajax({
//         type: "get",
//                beforeSend: function () {
//         div.html('$loadImg');
//         label_tabs.html('Loading...');
//     },
//         url: "index.php?r=med/default/accept",
//         dataType: "json",
//         success: function (response) {
//             $('#medAccept').html(response)
//             label_tabs.html('คีย์ยา');
//         }
//     });
// }

function loadMedArrange(){
    var div =  $('#medArrange');
    var label_tabs = $('#t_tabs2');
  $.ajax({
        type: "get",
        beforeSend: function () {
        div.html('$loadImg');
        label_tabs.html('Loading...');
    },
        url: "index.php?r=med/default/arrange",
        dataType: "json",
        success: function (response) {
            div.html(response)
            label_tabs.html('จัดยา');
        }
    });
}

function loadMedCheck(){
    var div =  $('#medCheck');
    var label_tabs = $('#t_tabs3');
  $.ajax({
        type: "get",
        beforeSend: function () {
        div.html('$loadImg');
        label_tabs.html('Loading...');
    },
        url: "index.php?r=med/default/check",
        dataType: "json",
        success: function (response) {
            div.html(response);
            label_tabs.html('ตรวจสอบยา');
        }
    });
}


function loadMedSuccess(){
    var div =  $('#medSuccess');
    var label_tabs = $('#t_tabs4');
  $.ajax({
        type: "get",
        beforeSend: function () {
        div.html('$loadImg');
        label_tabs.html('Loading...');
    },
        url: "index.php?r=med/default/success",
        dataType: "json",
        success: function (response) {
            div.html(response)
            label_tabs.html('จ่ายยา');
        }
    });
}

function loadMedReport(){
    var div =  $('#medReport');
    var label_tabs = $('#t_tabs5');
  $.ajax({
        type: "get",
        beforeSend: function () {
        div.html('$loadImg');
        label_tabs.html('Loading...');
    },
        url: "index.php?r=med/default/report",
        dataType: "json",
        success: function (response) {
            div.html(response)
            label_tabs.html('รายงาน');
        }
    });
}

JS;
$this->registerJS($js);
?>