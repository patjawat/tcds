<?php
use app\components\PatientHelper;
use yii\helpers\Html;

$hn = PatientHelper::getCurrentHn();
$vn = PatientHelper::getCurrentVn();
$this->params['pt_title'] = PatientHelper::getPatientTitleByHn($hn);
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
    <li class="active"><a data-toggle="tab" href="#tabs1">คีย์ยา</a></li>
    <li><a data-toggle="tab" href="#tabs2">จัดยา</a></li>
    <li><a data-toggle="tab" href="#tabs3">ตรวจสอบยา</a></li>
    <li><a data-toggle="tab" href="#tabs4">จ่ายยา</a></li>
    <li><a data-toggle="tab" href="#tabs4">รายงานการจ่ายยา</a></li>
  </ul>

  <div class="tab-content">
    <div id="tabs1" class="tab-pane fade in active">
    <div id="medOrder"></div>
   
    </div>
    <!-- End Tabs1 -->
    <div id="tabs2" class="tab-pane fade">
    <div id="medAccept"></div>
    </div>
    <!-- End Tabs2 -->
    <div id="tabs3" class="tab-pane fade">
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    <!-- End Tabs3 -->
    <div id="tabs4" class="tab-pane fade">
      <h3>Menu 3</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
    <!-- End Tabs4 -->
    <div id="tabs5" class="tab-pane fade">
      <h3>Menu 3</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
    <!-- End Tabs5 -->
  </div>
  <!-- End Tabs Contents -->

<?php
$js  = <<< JS

loadMedOrder()
loadMedAccept()

function loadMedOrder(){
    $.ajax({
        type: "get",
        url: "index.php?r=med/default/order",
        dataType: "json",
        success: function (response) {
            $('#medOrder').html(response)
        }
    });
}

function loadMedAccept(){
    $.ajax({
        type: "get",
        url: "index.php?r=med/default/accept",
        dataType: "json",
        success: function (response) {
            $('#medAccept').html(response)
        }
    });
}

function loadMedArrange(){
  $.ajax({
        type: "get",
        url: "index.php?r=med/default/arrange",
        dataType: "json",
        success: function (response) {
            $('#medArrange').html(response)
        }
    });
}

function loadMedCheck(){

}

function loadMedSuccess(){

}



JS;
$this->registerJS($js);
?>