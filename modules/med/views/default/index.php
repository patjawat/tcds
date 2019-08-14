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
    <li class="<?=$tab == 'tab1' ? 'active' : ''?>"><a data-toggle="tab" href="#tabs1">คีย์ยา</a></li>
    <li class="<?=$tab == 'tab2' ? 'active' : ''?>"><a data-toggle="tab" href="#tabs2">จัดยา</a></li>
    <li class="<?=$tab == 'tab3' ? 'active' : ''?>"><a data-toggle="tab" href="#tabs3">ตรวจสอบยา</a></li>
    <li class="<?=$tab == 'tab4' ? 'active' : ''?>"><a data-toggle="tab" href="#tabs4">จ่ายยา</a></li>
    <li class="<?=$tab == 'tab5' ? 'active' : ''?>"><a data-toggle="tab" href="#tabs5">รายงานการจ่ายยา</a></li>
  </ul>

  <div class="tab-content">
    <div id="tabs1" class="<?=$tab == 'tab1' ? 'tab-pane fade in active' : 'tab-pane fade'?>">
    <div id="medOrder"></div>
   
    </div>
    <!-- End Tabs1 -->
    <div id="tabs2" class="<?=$tab == 'tab2' ? 'tab-pane fade in active' : 'tab-pane fade'?>">
    <div id="medArrange"></div>
    <!-- <div id="medAccept"></div> -->
    </div>
    <!-- End Tabs2 -->
    <div id="tabs3" class="<?=$tab == 'tab3' ? 'tab-pane fade in active' : 'tab-pane fade'?>">
    <div id="medCheck"></div>
    </div>
    <!-- End Tabs3 -->
    <div id="tabs4" class="<?=$tab == 'tab4' ? 'tab-pane fade in active' : 'tab-pane fade'?>">
    <div id="medSuccess"></div>
    </div>
    <!-- End Tabs4 -->
    <div id="tabs5" class="<?=$tab == 'tab5' ? 'tab-pane fade in active' : 'tab-pane fade'?>">
      <h3>Menu 3</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
    <!-- End Tabs5 -->
  </div>
  <!-- End Tabs Contents -->

<?php
$js  = <<< JS

loadMedOrder()
loadMedSuccess()
loadMedArrange()
loadMedCheck()

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
  $.ajax({
        type: "get",
        url: "index.php?r=med/default/check",
        dataType: "json",
        success: function (response) {
            $('#medCheck').html(response)
        }
    });
}


function loadMedSuccess(){
  $.ajax({
        type: "get",
        url: "index.php?r=med/default/success",
        dataType: "json",
        success: function (response) {
            $('#medSuccess').html(response)
        }
    });
}

JS;
$this->registerJS($js);
?>