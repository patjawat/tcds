<?php

use app\components\UnitHelper;
use kartik\editable\Editable;

/* @var $this yii\web\View */
/* @var $model app\modules\chiefcomplaint\models\Pccservicepi */

$this->params['breadcrumbs'][] = ['label' => 'Pccservicepis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
.border-left-primary {
    border-left: .25rem solid #4e73df !important;
}

.border-left-success {
    border-left: .25rem solid #1cc88a !important;
}

.border-left-info {
    border-left: .25rem solid #36b9cc !important;
}

.border-left-warning {
    border-left: .25rem solid #f6c23e !important;
}

.mb-4,
.my-4 {
    margin-bottom: 1.5rem !important;
}

.pb-2,
.py-2 {
    padding-bottom: .5rem !important;
}

.pt-2,
.py-2 {
    padding-top: .5rem !important;
}

.h-100 {
    height: 100% !important;
}

.shadow {
    -webkit-box-shadow: 0 .15rem 1.75rem 0 rgba(58, 59, 69, .15) !important;
    box-shadow: 0 .15rem 1.75rem 0 rgba(58, 59, 69, .15) !important;
}

.card {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid #e3e6f0;
    border-radius: .35rem;
}

.card-body {
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.25rem;
}

.align-items-center {
    -webkit-box-align: center !important;
    -ms-flex-align: center !important;
    align-items: center !important;
}

.no-gutters {
    margin-right: 0;
    margin-left: 0;
}

.no-gutters>.col,
.no-gutters>[class*=col-] {
    padding-right: 0;
    padding-left: 0;
}

.mr-2,
.mx-2 {
    margin-right: .5rem !important;
}

.text-xs {
    font-size: 1.4rem;
}

.text-primary {
    color: #4e73df !important;
}

.font-weight-bold {
    font-weight: 700 !important;
}

.dropdown .dropdown-menu .dropdown-header,
.sidebar .sidebar-heading,
.text-uppercase {
    text-transform: uppercase !important;
}

.mb-1,
.my-1 {
    margin-bottom: .25rem !important;
}

.text-gray-800 {
    color: #5a5c69 !important;
}

.font-weight-bold {
    font-weight: 700 !important;
}

.mb-0,
.my-0 {
    margin-bottom: 0 !important;
}

.align-items-center {
    -webkit-box-align: center !important;
    -ms-flex-align: center !important;
    align-items: center !important;
}

.no-gutters {
    margin-right: 0;
    margin-left: 0;
}

.no-gutters>.col,
.no-gutters>[class*=col-] {
    padding-right: 0;
    padding-left: 0;
}

.col-auto {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 auto;
    flex: 0 0 auto;
    width: auto;
    max-width: 100%;
}

.border-bottom-primary {
    border-bottom: .25rem solid #4e73df !important;
}

.pb-3,
.py-3 {
    padding-bottom: 1rem !important;
}

.pt-3,
.py-3 {
    padding-top: 1rem !important;
}

.mb-4,
.my-4 {
    margin-bottom: 1.5rem !important;
}
</style>


<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-3 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col-md-10">
                        <div class="h5 mb-0 font-weight-bold text-gray-800">BT :
                            <?=Editable::widget([
    'model' => $model,
    'attribute' => 'bt',
    'name' => 'bt',
    'asPopover' => true,
    'type' => 'primary',
    'showAjaxErrors' => true,
    'closeOnBlur' => true,
    'valueIfNull' => '-',
    'header' => 'อุณหภูมิร่างกาย',
    'size' => 'sm',
    'placement' => 'right',
    'containerOptions' => [],
    'contentOptions' => [],
    'inputType' => kartik\editable\Editable::INPUT_TEXT,
    'submitButton' => [
        'class' => 'btn btn-sm btn-primary',
        'icon' => '<i class="fas fa-edit"></i>',
    ],
    'options' => ['class' => 'form-control', 'placeholder' => 'อุณหภูมิร่างกาย...'],
    'formOptions' => [
        'method' => 'post',
        // 'action' => ['producturl/update?type=ajax&id=' . $model->id]
    ],
    'pluginEvents' => [
        "editableSuccess" => "function(event, val, form, data) {
                                    getCToF();
                              }",
    ],
]);?>
                            C <code id="bt_f"><?=UnitHelper::getCToF($model->bt);?></code> F</div>


                        <div class="h5 mb-0 font-weight-bold text-gray-800">BP :
                        <?=Editable::widget([
    'model' => $model,
    'attribute' => 'bp1',
    'name' => 'bp1',
    'asPopover' => true,
    'type' => 'primary',
    'showAjaxErrors' => true,
    'closeOnBlur' => true,
    'valueIfNull' => '-',
    'header' => 'ความดันโลหิตบน',
    'size' => 'sm',
    'placement' => 'right',
    'containerOptions' => [],
    'contentOptions' => [],
    'inputType' => kartik\editable\Editable::INPUT_TEXT,
    'submitButton' => [
        'class' => 'btn btn-sm btn-primary',
        'icon' => '<i class="fas fa-edit"></i>',
    ],
    'options' => ['class' => 'form-control', 'placeholder' => 'ความดันโลหิตบน...'],
    'formOptions' => [
        'method' => 'post',
        // 'action' => ['producturl/update?type=ajax&id=' . $model->id]
    ],
    'pluginEvents' => [
        "editableSuccess" => "function(event, val, form, data) {
                                    getCToF();
                              }",
    ],
]);
?>

                                / <?=Editable::widget([
    'model' => $model,
    'attribute' => 'bp2',
    'name' => 'bp2',
    'asPopover' => true,
    'type' => 'primary',
    'showAjaxErrors' => true,
    'closeOnBlur' => true,
    'valueIfNull' => '-',
    'header' => 'ความดันโลหิตล่าง',
    'size' => 'sm',
    'placement' => 'right',
    'containerOptions' => [],
    'contentOptions' => [],
    'inputType' => kartik\editable\Editable::INPUT_TEXT,
    'submitButton' => [
        'class' => 'btn btn-sm btn-primary',
        'icon' => '<i class="fas fa-edit"></i>',
    ],
    'options' => ['class' => 'form-control', 'placeholder' => 'ความดันโลหิตบ่าง...'],
    'formOptions' => [
        'method' => 'post',
        // 'action' => ['producturl/update?type=ajax&id=' . $model->id]
    ],
    'pluginEvents' => [
        "editableSuccess" => "function(event, val, form, data) {
                                    getCToF();
                              }",
    ],
]);
?>

                                mmHg</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <!-- BP :  -->
                            <!-- <code><?php //$model->bp1;?></code>/<code><?php //$model->bp2;?></code>

                      (confirm) mmHg -->
                        </div>


                       <div class="h5 mb-0 font-weight-bold text-gray-800">Position :
                          <code><?=$model->position;?></code>
                         </div>

                         <div class="h5 mb-0 font-weight-bold text-gray-800">Arm :
                          <code><?=$model->arm;?></code>
                         </div>

                       

                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-tag fa-2x text-gray-300"></i>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-3 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col-md-10">


                    <div class="h5 mb-0 font-weight-bold text-gray-800">PR :
                        <?=Editable::widget([
    'model' => $model,
    'attribute' => 'pr',
    'name' => 'pr',
    'asPopover' => true,
    'type' => 'primary',
    'showAjaxErrors' => true,
    'closeOnBlur' => true,
    'valueIfNull' => '-',
    'header' => 'จังหวะของชีพจร',
    'size' => 'sm',
    'placement' => 'right',
    'containerOptions' => [],
    'contentOptions' => [],
    'inputType' => kartik\editable\Editable::INPUT_TEXT,
    'submitButton' => [
        'class' => 'btn btn-sm btn-primary',
        'icon' => '<i class="fas fa-edit"></i>',
    ],
    'options' => ['class' => 'form-control', 'placeholder' => 'จังหวะของชีพจร...'],
    'formOptions' => [
        'method' => 'post',
        // 'action' => ['producturl/update?type=ajax&id=' . $model->id]
    ],
    'pluginEvents' => [
        "editableSuccess" => "function(event, val, form, data) {
                                    getCToF();
                              }",
    ],
]);
?>

                        /min
                        </div>

                        <div class="h5 mb-0 font-weight-bold text-gray-800">PR Rhythm :
                          <code><?=$model->pr_rhythm;?></code>
                         </div>


                         <div class="h5 mb-0 font-weight-bold text-gray-800">RR :
                        <?=Editable::widget([
    'model' => $model,
    'attribute' => 'rr',
    'name' => 'rr',
    'asPopover' => true,
    'type' => 'primary',
    'showAjaxErrors' => true,
    'closeOnBlur' => true,
    'valueIfNull' => '-',
    'header' => 'อัตราการหายใจ',
    'size' => 'sm',
    'placement' => 'right',
    'containerOptions' => [],
    'contentOptions' => [],
    'inputType' => kartik\editable\Editable::INPUT_TEXT,
    'submitButton' => [
        'class' => 'btn btn-sm btn-primary',
        'icon' => '<i class="fas fa-edit"></i>',
    ],
    'options' => ['class' => 'form-control', 'placeholder' => 'อัตราการหายใจ ...'],
    'formOptions' => [
        'method' => 'post',
        // 'action' => ['producturl/update?type=ajax&id=' . $model->id]
    ],
    'pluginEvents' => [
        "editableSuccess" => "function(event, val, form, data) {
                                    getCToF();
                              }",
    ],
]);
?>
                        /min
                        </div>




                        <div class="h5 mb-0 font-weight-bold text-gray-800">O2Sat :
                        <?=Editable::widget([
    'model' => $model,
    'attribute' => 'o2sat',
    'name' => 'o2sat',
    'asPopover' => true,
    'type' => 'primary',
    'showAjaxErrors' => true,
    'closeOnBlur' => true,
    'valueIfNull' => '-',
    'header' => 'ความเข้มข้นของออกซิเจน',
    'size' => 'sm',
    'placement' => 'right',
    'containerOptions' => [],
    'contentOptions' => [],
    'inputType' => kartik\editable\Editable::INPUT_TEXT,
    'submitButton' => [
        'class' => 'btn btn-sm btn-primary',
        'icon' => '<i class="fas fa-edit"></i>',
    ],
    'options' => ['class' => 'form-control', 'placeholder' => 'ความเข้มข้นของออกซิเจน...'],
    'formOptions' => [
        'method' => 'post',
        // 'action' => ['producturl/update?type=ajax&id=' . $model->id]
    ],
    'pluginEvents' => [
        "editableSuccess" => "function(event, val, form, data) {
                                    getCToF();
                              }",
    ],
]);
?>
                        %
                        </div>

                    </div>
                    <div class="col-auto">
                        <i class="fas fa-file-medical-alt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-3 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col-md-10">

                        
                        <div class="h5 mb-0 font-weight-bold text-gray-800">WC :
                        <?=Editable::widget([
    'model' => $model,
    'attribute' => 'wc',
    'name' => 'wc',
    'asPopover' => true,
    'type' => 'primary',
    'showAjaxErrors' => true,
    'closeOnBlur' => true,
    'valueIfNull' => '-',
    'header' => 'เส้นรอบเอว',
    'size' => 'sm',
    'placement' => 'right',
    'containerOptions' => [],
    'contentOptions' => [],
    'inputType' => kartik\editable\Editable::INPUT_TEXT,
    'submitButton' => [
        'class' => 'btn btn-sm btn-primary',
        'icon' => '<i class="fas fa-edit"></i>',
    ],
    'options' => ['class' => 'form-control', 'placeholder' => 'เส้นรอบเอว...'],
    'formOptions' => [
        'method' => 'post',
        // 'action' => ['producturl/update?type=ajax&id=' . $model->id]
    ],
    'pluginEvents' => [
        "editableSuccess" => "function(event, val, form, data) {
                                    getCToF();
                              }",
    ],
]);
?>

                        cm
                            <code id="wc_in"><?=UnitHelper::getCmToIn($model->wc);?></code> In</div>



                        <div class="h5 mb-0 font-weight-bold text-gray-800">IC :
                        <?=Editable::widget([
    'model' => $model,
    'attribute' => 'ic',
    'name' => 'ic',
    'asPopover' => true,
    'type' => 'primary',
    'showAjaxErrors' => true,
    'closeOnBlur' => true,
    'valueIfNull' => '-',
    'header' => 'เส้นรอบอกขณะหายใจเข้า',
    'size' => 'sm',
    'placement' => 'right',
    'containerOptions' => [],
    'contentOptions' => [],
    'inputType' => kartik\editable\Editable::INPUT_TEXT,
    'submitButton' => [
        'class' => 'btn btn-sm btn-primary',
        'icon' => '<i class="fas fa-edit"></i>',
    ],
    'options' => ['class' => 'form-control', 'placeholder' => 'เส้นรอบอกขณะหายใจเข้า...'],
    'formOptions' => [
        'method' => 'post',
        // 'action' => ['producturl/update?type=ajax&id=' . $model->id]
    ],
    'pluginEvents' => [
        "editableSuccess" => "function(event, val, form, data) {
                                    getCToF();
                              }",
    ],
]);
?>

                          cm
                            <code id="ic_in"><?=UnitHelper::getCmToIn($model->ic);?></code> In</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">EC :
                        <?=Editable::widget([
    'model' => $model,
    'attribute' => 'ec',
    'name' => 'ec',
    'asPopover' => true,
    'type' => 'primary',
    'showAjaxErrors' => true,
    'closeOnBlur' => true,
    'valueIfNull' => '-',
    'header' => 'เส้นรอบอกขณะหายใจออก',
    'size' => 'sm',
    'placement' => 'right',
    'containerOptions' => [],
    'contentOptions' => [],
    'inputType' => kartik\editable\Editable::INPUT_TEXT,
    'submitButton' => [
        'class' => 'btn btn-sm btn-primary',
        'icon' => '<i class="fas fa-edit"></i>',
    ],
    'options' => ['class' => 'form-control', 'placeholder' => 'เส้นรอบอกขณะหายใจออก...'],
    'formOptions' => [
        'method' => 'post',
        // 'action' => ['producturl/update?type=ajax&id=' . $model->id]
    ],
    'pluginEvents' => [
        "editableSuccess" => "function(event, val, form, data) {
                                    getCToF();
                              }",
    ],
]);
?>

                           cm
                            <code id="ec_in"><?=UnitHelper::getCmToIn($model->ec);?></code> In</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">HC :

                        <?=Editable::widget([
    'model' => $model,
    'attribute' => 'hc',
    'name' => 'hc',
    'asPopover' => true,
    'type' => 'primary',
    'showAjaxErrors' => true,
    'closeOnBlur' => true,
    'valueIfNull' => '-',
    'header' => 'เส้นรอบศีรษะ',
    'size' => 'sm',
    'placement' => 'right',
    'containerOptions' => [],
    'contentOptions' => [],
    'inputType' => kartik\editable\Editable::INPUT_TEXT,
    'submitButton' => [
        'class' => 'btn btn-sm btn-primary',
        'icon' => '<i class="fas fa-edit"></i>',
    ],
    'options' => ['class' => 'form-control', 'placeholder' => 'เส้นรอบศีรษะ...'],
    'formOptions' => [
        'method' => 'post',
        // 'action' => ['producturl/update?type=ajax&id=' . $model->id]
    ],
    'pluginEvents' => [
        "editableSuccess" => "function(event, val, form, data) {
                                    getCToF();
                              }",
    ],
]);
?>

                          cm
                            <code id="hc_in"><?=UnitHelper::getCmToIn($model->hc);?></code> In</div>


                    </div>
                    <div class="col-auto">
                        <i class="fas fa-stethoscope fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-3 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col-md-10">




                    <div class="h5 mb-0 font-weight-bold text-gray-800">BW :
                        <?=Editable::widget([
    'model' => $model,
    'attribute' => 'bw',
    'name' => 'wb',
    'asPopover' => true,
    'type' => 'primary',
    'showAjaxErrors' => true,
    'closeOnBlur' => true,
    'valueIfNull' => '-',
    'header' => 'น้ำหนัก',
    'size' => 'sm',
    'placement' => 'right',
    'containerOptions' => [],
    'contentOptions' => [],
    'inputType' => kartik\editable\Editable::INPUT_TEXT,
    'submitButton' => [
        'class' => 'btn btn-sm btn-primary',
        'icon' => '<i class="fas fa-edit"></i>',
    ],
    'options' => ['class' => 'form-control', 'placeholder' => 'น้ำหนัก...'],
    'formOptions' => [
        'method' => 'post',
        // 'action' => ['producturl/update?type=ajax&id=' . $model->id]
    ],
    'pluginEvents' => [
        "editableSuccess" => "function(event, val, form, data) {
                                    getCToF();
                              }",
    ],
]);
?>
                           kg
                            <code id='bw_lb'><?=round(UnitHelper::getKgToLb($model->bw), 2);?></code> lb</div>
                        <!-- <div class="h5 mb-0 font-weight-bold text-gray-800">WC : <code><?php //$model->wc?></code> /min</div> -->
                        <div class="h5 mb-0 font-weight-bold text-gray-800">HT :
                        <?=Editable::widget([
    'model' => $model,
    'attribute' => 'ht',
    'name' => 'ht',
    'asPopover' => true,
    'type' => 'primary',
    'showAjaxErrors' => true,
    'closeOnBlur' => true,
    'valueIfNull' => '-',
    'header' => 'ส่วนสูง',
    'size' => 'sm',
    'placement' => 'right',
    'containerOptions' => [],
    'contentOptions' => [],
    'inputType' => kartik\editable\Editable::INPUT_TEXT,
    'submitButton' => [
        'class' => 'btn btn-sm btn-primary',
        'icon' => '<i class="fas fa-edit"></i>',
    ],
    'options' => ['class' => 'form-control', 'placeholder' => 'ส่วนสูง...'],
    'formOptions' => [
        'method' => 'post',
        // 'action' => ['producturl/update?type=ajax&id=' . $model->id]
    ],
    'pluginEvents' => [
        "editableSuccess" => "function(event, val, form, data) {
                                    getCToF();
                              }",
    ],
]);
?>
                        cm
                            <code id="ht_f"><?=UnitHelper::getCmToFt($model->ht);?></code> Ft</div>




                            <div class="h5 mb-0 font-weight-bold text-text-gray-800">BMI : <code id="bmi"><?=$model->bmi;?></code>
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">IBW :

                        <?=Editable::widget([
    'model' => $model,
    'attribute' => 'ibw',
    'name' => 'ibw',
    'asPopover' => true,
    'type' => 'primary',
    'showAjaxErrors' => true,
    'closeOnBlur' => true,
    'valueIfNull' => '-',
    'header' => 'IBW',
    'size' => 'sm',
    'placement' => 'right',
    'containerOptions' => [],
    'contentOptions' => [],
    'inputType' => kartik\editable\Editable::INPUT_TEXT,
    'submitButton' => [
        'class' => 'btn btn-sm btn-primary',
        'icon' => '<i class="fas fa-edit"></i>',
    ],
    'options' => ['class' => 'form-control', 'placeholder' => 'IBW...'],
    'formOptions' => [
        'method' => 'post',
        // 'action' => ['producturl/update?type=ajax&id=' . $model->id]
    ],
    'pluginEvents' => [
        "editableSuccess" => "function(event, val, form, data) {
                                    getCToF();
                              }",
    ],
]);
?>

                        kg
                        </div>


                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
