<?php

use app\components\PatientHelper;
use kartik\widgets\Select2;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\modules\chiefcomplaint\models\MedPoint;
use app\modules\doctorworkbench\models\HisPatient;

$pcc_vn = PatientHelper::getCurrentPccVn();
$hn = PatientHelper::getCurrentHn();
$vn = PatientHelper::getCurrentVn();
$prefix = PatientHelper::getCurrentPrefix();
$fname = PatientHelper::getCurrentFname();
$lname = PatientHelper::getCurrentLname();
$cid = PatientHelper::getCurrentCid();
$fullname = $prefix . $fname . ' ' . $lname;
$patient = HisPatient::findOne(['hn' => $hn]);

if ($patient) {
    $sex = $patient->sex == 'M' ? 'ชาย' : 'หญิง';
} else {
    $sex = '';
}
$this->params['pt_title'] = PatientHelper::getPatientTitleByHn($hn);

?>
<style>
    .form-horizontal .control-label {
        padding-top: 7px;
        margin-bottom: 0;
        text-align: right;
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

<?php
$this->registerCss("
.box-shadow {
    -webkit-box-shadow: 0 0 10px 0 rgba(0,0,0,.10);
    box-shadow: 0 0 10px 0 rgba(0,0,0,.10);

}

.button-box-shadow {
    -webkit-box-shadow: 0 0 10px 0 rgba(0,0,0,.10);
    box-shadow: 0 0 10px 0 rgba(0,0,0,.10);
    margin:5px;
    padding: 5px;
    background: #00e676;
}
.cctext{
    font-size: 22px;
 //   -webkit-border-radius: 8px;
 //      -moz-border-radius: 8px;
 //           border-radius: 8px;
    margin-left:-5px;

}
.control-label{
//color:red;
}
.div#crud-cc-container.table-responsive.kv-grid-container{
    margin-top:20;
}

.btn-pop {
    //padding: 5px 5px;
    margin:5px;
    font-size: 16px;
    color: #ffffff;
    background: #00e676;
    width:auto;
    line-height: normal;
    -webkit-border-radius: 8px;
       -moz-border-radius: 8px;
            border-radius: 8px;
    }

.btn-pop-info {
    margin:5px;
    font-size: 16px;
    color: #ffffff;
    background: #f50057;
    width:auto;
    line-height: normal;
        -webkit-border-radius: 8px;
        -moz-border-radius: 8px;
    border-radius: 8px;
    }
");
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
</style>

<style>
    .card-menu {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        width: 40%;
        border-radius: 5px;
    }

    .card-menu:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }

    img {
        border-radius: 5px 5px 0 0;
    }

    .container-card {
        padding: 2px 16px;
    }
</style>
<h3><i class="fas fa-edit"></i> การซักประวัติ</h3>
<?php
// $data = Json::decode($model->nursing_assessment);
// echo $model->nursing_assessment[''];
// $data = $model->nursing_assessment;
// echo $data['type_of_patient'];
// var_dump($data);
?>



<?php $form = ActiveForm::begin([
    'id' => 'form-chiefcomplaint',
    'enableAjaxValidation' => true,
    'enableClientValidation' => true,
    'validateOnBlur' => true,
    'validateOnChange' => true,
    'validateOnSubmit' => true,
    // 'validationUrl' => ['/chiefcomplaint/chiefcomplaint/ajax-validation'],
    'fieldConfig' => [
        'horizontalCssClasses' => [
            'label' => 'col-lg-4 col-md-4 col-sm-4',
            'wrapper' => 'col-lg-8 col-md-8 col-sm-8',
        ],
    ],
    'layout' => 'horizontal',
]); ?>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">

        <!-- srart panel Default -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fas fa-clipboard-check"></i> Patient Data Panel</h3>
            </div>
            <div class="panel-body">
                <!-- Start Row -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <?= $form->field($model, 'med_point')->widget(Select2::classname(), [
                            'data' => ArrayHelper::map(MedPoint::find()->all(), 'id', 'name'),
                            'options' => ['placeholder' => 'เลือกจุดรับยา'],
                            'pluginOptions' => [
                                'allowClear' => true,
                            ],
                        ]); ?>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <?= $form->field($model, 'med_express', [
                            'horizontalCssClasses' => [
                                'label' => 'col-xs-1 col-sm-1 col-md-1 col-lg-1',
                                'wrapper' => 'col-lg-10 col-md-10 col-sm-10',
                            ],
                        ])->checkbox(['uncheck' => '0', 'checked' => '1'])->label(true); ?>
                    </div>

                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <p class="text-center" style="margin: 0px;">
                            <i class="fas fa-vials"></i>
                            Dm Staging
                        </p>
                        <p class="text-center" style="margin: 0px;">
                            <span class="text-danger">1234</span>
                        </p>
                    </div>


                </div>
                <!-- End Row -->

            </div>
        </div>
        <!-- End Panel Default -->



    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">

        <!-- srart panel Default -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fas fa-link"></i> External link</h3>
            </div>
            <div class="panel-body">
                <!-- Start Row -->
                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <p style="margin: 0px;">
                            <?= Html::a('<i class="far fa-check-square"></i> cv risk (thai)', 'http://10.1.99.6/Thai-CV-Risk-Score/index.php?hn="' . $hn . '"&prefix="' . $patient->prefix . '"&fname="' . $patient->fname . '"&lname="' . $patient->lname . '"sex="' . $sex . '"&birthday_date="' . $patient->birthday_date . '"', ['target' => '_blank']) ?>
                        </p>
                        <p style="margin: 0px;">
                            <?= Html::a('<i class="far fa-check-square"></i> cv risk (acc)', null, ['']); ?>
                        </p>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <?= Html::a('<i class="far fa-check-square"></i> dm risk', 'http://10.1.99.6/diabetes_risk_score/?hn="' . $hn . '"&prefix="' . $patient->prefix . '"&fname="' . $patient->fname . '"&lname="' . $patient->lname . '"sex="' . $sex . '"&birthday_date="' . $patient->birthday_date . '"', ['target' => '_blank']) ?>
                    </div>
                </div>
                <!-- End Row -->
            </div>
        </div>
        <!-- End Panel Default -->
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- <h3>ห้องตรวจแพทย์</h3> -->
        <div class="tabbable-panel">
            <div class="tabbable-line">
                <ul class="nav nav-tabs ">
                    <li class="active">
                        <a href="#tab_1" class="loadPage" data-toggle="tab" url="index.php?r=chiefcomplaint/pccservicecc">
                            <i class="fas fa-universal-access"></i> VITAL SIGNS AND CONTOUR OF PATIENT
                        </a>
                    </li>
                    <li>
                        <a href="#tab_3" class="loadPage" data-toggle="tab" url="index.php?r=chiefcomplaint/pccservicepi">
                            <i class="fas fa-file-alt"></i> NURSING ASSESSMENT AND CHIEF COMPLANT
                        </a>
                    </li>

                    <li>
                        <a href="#tab_4" class="loadPage" data-toggle="tab">
                            <i class="fas fa-notes-medical"></i> OPD NOTE & Document
                        </a>
                    </li>

                    <li>
                        <a href="#tab_5" class="loadPage" data-toggle="tab">
                            <i class="fas fa-portrait"></i> RECORD TODAY
                        </a>
                    </li>

                </ul>
                <!-- <div class="tab-content" style="margin-top:0px;border-top: .15rem solid #017bfe!important;"> -->
                <div class="tab-content" style="margin-top:0px;">
                    <div class="tab-pane active" id="tab_1">



                        <!-- newRow -->


                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="card shadow">
                                    <div class="card-body">

                                        <?= $form->field($model, 'requester')->hiddenInput(['class' => 'requester'])->label(false) ?>

                                        <div class="row">
                                            <!-- col--1 -->
                                            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3">
                                                <?= $form->field($model, 'bt')->textInput(['placeholder' => 'อุณหภูมิร่างกาย', 'nextid' => 'pccservicepi-height'])->label(true) ?>

                                                <!-- xx -->
                                                <div class="row">
                                                    <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
                                                        <?= $form->field($model, 'bp1', [
                                                            'inputOptions' => [
                                                                'placeholder' => 'ความดันโลหิตบน',
                                                            ],
                                                            'horizontalCssClasses' => [
                                                                'label' => 'col-xs-5 col-sm-5 col-md-5 col-lg-5',
                                                                'wrapper' => 'col-lg-7 col-md-7 col-sm-7',
                                                            ],
                                                        ])->label('BP') ?>
                                                    </div>
                                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                        <?= $form->field($model, 'bp2', [
                                                            'inputOptions' => [
                                                                'placeholder' => 'ความดันโลหิตล่าง',
                                                            ],
                                                            'template' => '{label} <div class="row"><div class="col-lg-11 col-md-11 col-sm-11">{input}{error}{hint}</div></div>',
                                                        ])->label(false) ?>
                                                    </div>
                                                </div>
                                                <!-- xx -->

                                                <?= $form->field($model, 'position')->widget(Select2::classname(), [
                                                    'data' => ["sit" => "Sit.", "lie" => "Lie."],
                                                    'options' => ['placeholder' => 'ท่าวัดความดันโลหิต'],
                                                    'pluginOptions' => [
                                                        'allowClear' => true,
                                                    ],
                                                ]); ?>

                                                <?= $form->field($model, 'arm')->widget(Select2::classname(), [
                                                    'data' => ["lt" => "Lt.", "rt" => "Rt."],
                                                    'options' => ['placeholder' => 'แขนข้างที่วัดความดันโลหิต'],
                                                    'pluginOptions' => [
                                                        'allowClear' => true,
                                                    ],
                                                ]); ?>


                                            </div>
                                            <!-- End row 1 -->

                                            <!-- Col-2  -->
                                            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3">

                                                <?= $form->field($model, 'pr')->textInput(['placeholder' => 'ชีพจร', 'nextid' => 'pccservicepi-height'])->label(true) ?>
                                                <?= $form->field($model, 'pr_rhythm')->widget(Select2::classname(), [
                                                    'data' => ["regular" => "Regular", "lrregular" => "Lrregular"],
                                                    'options' => ['placeholder' => 'จังหวะของชีพจร'],
                                                    'pluginOptions' => [
                                                        'allowClear' => true,
                                                    ],
                                                ]); ?>
                                                <?= $form->field($model, 'rr')->textInput(['placeholder' => 'อัตราการหายใจ', 'nextid' => 'pccservicepi-height'])->label(true) ?>
                                                <?= $form->field($model, 'o2sat')->textInput(['placeholder' => 'ความเข้มข้นของออกซิเจน', 'nextid' => 'pccservicepi-height'])->label(true) ?>


                                            </div>
                                            <!-- End Col-2 -->

                                            <!-- Col-3 -->
                                            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3">
                                                <?= $form->field($model, 'wc')->textInput(['placeholder' => 'เส้นรอบเอว', 'nextid' => 'pccservicepi-height'])->label(true) ?>
                                                <?= $form->field($model, 'ic')->textInput(['placeholder' => 'เส้นรอบอกขณะหายใจเข้า', 'nextid' => 'pccservicepi-height'])->label(true) ?>

                                                <?= $form->field($model, 'ec')->textInput(['placeholder' => 'เส้นรอบอกขณะหายใจออก', 'nextid' => 'pccservicepi-height'])->label(true) ?>
                                                <?= $form->field($model, 'hc')->textInput(['placeholder' => 'เส้นรอบศีรษะ', 'nextid' => 'pccservicepi-height'])->label(true) ?>
                                            </div>
                                            <!-- End Col-3 -->
                                            <!-- Col-4 -->
                                            <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3">
                                                <?= $form->field($model, 'bw')->textInput(['placeholder' => 'น้ำหนัก', 'nextid' => 'pccservicepi-height'])->label(true) ?>
                                                <?= $form->field($model, 'ht')->textInput(['placeholder' => 'ส่วนสูง', 'nextid' => 'pccservicepi-height'])->label(true) ?>
                                                <div class="form-group field-pccservicepi-bmi">
                                                    <label class="control-label col-lg-4 col-md-4 col-sm-4" for="pccservicepi-bmi">BMI</label>
                                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                                        <input type="text" id="bmi-show" class="form-control" placeholder="BMI" value="<?= $model->bmi; ?>" disabled="true">

                                                    </div>
                                                </div>

                                                <div class="form-group field-pccservicepi-ibw has-success">
                                                    <label class="control-label col-lg-4 col-md-4 col-sm-4" for="pccservicepi-ibw">IBW</label>
                                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                                        <input type="text" id="ibw-show" class="form-control" value="<?= $model->ibw ?>" placeholder="IBW" aria-invalid="false" disabled="true">

                                                    </div>

                                                </div>

                                                <?= $form->field($model, 'bmi')->hiddenInput(['placeholder' => 'BMI', 'nextid' => 'pccservicepi-height'])->label(false) ?>
                                                <?= $form->field($model, 'ibw')->hiddenInput(['placeholder' => 'IBW', 'nextid' => 'pccservicepi-height'])->label(false) ?>
                                            </div>
                                            <!-- End Col-4 -->
                                        </div>
                                        <br><br>


                                    </div>
                                    <!-- END BODY -->
                                </div>

                            </div>
                        </div>
                        <br>

                        <!-- End NewRow -->


                    </div>

                    <div class="tab-pane" id="tab_3">
                        <div class="card mb-4 py-3">
                            <div class="card-body">
                                <!-- <div id="nc-form">nc</div> -->

                                <div class="row">

                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <?= $form->field($model, 'cc_text', [
                                            'horizontalCssClasses' => [
                                                'label' => 'col-lg-1 col-md-1 col-sm-1',
                                                'wrapper' => 'col-xs-11 col-sm-11 col-md-11 col-lg-11',
                                            ],
                                        ])->textArea(
                                            [
                                                'placeholder' => 'อาการสำคัญ',
                                                'id' => 'cc_text',
                                                'nextid' => 'pccservicepi-height',
                                                'rows' => 8
                                            ]
                                        )->label(true) ?>



                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-1 col-smoffset-1 col-mdoffset-1 col-lgoffset-1">


                                                <p class="btn btn-blue" data-toggle="modal" data-target=".bd-popup1-modal-lg"> อาการ </p>
                                                <p class="btn btn-purple" data-toggle="modal" data-target=".bd-popup2-modal-lg"> ให้คำปรึกษา </p>
                                                <p class="btn btn-success" data-toggle="modal" data-target=".bd-popup3-modal-lg"> ติดตามอาการ </p>
                                                <p class="btn btn-pink" data-toggle="modal" data-target=".bd-popup4-modal-lg"> ตรวจสุขภาพ </p>


                                            </div>
                                        </div>
                                        <br>


                                    </div>

                                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                        <!-- Type of Patient -->
                                        <?= $form->field($model, 'nursing_assessment[type_of_patient]', [
                                            'horizontalCssClasses' => [
                                                'label' => 'col-xs-5 col-sm-5 col-md-5 col-lg-5',
                                                'wrapper' => 'col-lg-7 col-md-7 col-sm-7',
                                            ],

                                        ])->
                                            // inline()->
                                            checkboxList([
                                                1 => 'ER',
                                                2 => 'DM',
                                                3 => 'THYROID',
                                                4 => 'Eye',
                                                5 => 'Illness',
                                                6 => 'Check-up',
                                                7 => 'FU',
                                                8 => 'Insurance',
                                                9 => 'Contract',
                                                10 => 'Immunization',
                                                11 => 'ANC',
                                                12 => 'Refill',
                                                13 => 'Other',
                                            ], [

                                                'itemOptions' => [

                                                    // 'labelOptions' => ['class' => 'col-md-1']
                                                    // 'onclick' => 'return checkTypeOfPatient($(this).val());',
                                                    'class' => 'type_of_patient',

                                                ],

                                            ])->label('Type of Patient') ?>

                                    </div>

                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <?= $form->field($model, 'nursing_assessment[triage]')->widget(Select2::classname(), [
                                            'data' => [
                                                "Critlcal" => "Critlcal",
                                                "Emergency" => "Emergency",
                                                "Urgent" => "Urgent",
                                                "Semi-Urgent" => "Semi-Urgent",
                                                "Non-Urgent" => "Non-Urgent",
                                            ],
                                            'options' => ['placeholder' => 'Select triage ...'],
                                            'pluginOptions' => [
                                                'allowClear' => true,
                                            ],
                                        ])->label('Triage'); ?>
                                        <div id='dm_type'>
                                            <?= $form->field($model, 'nursing_assessment[dm_type]', [])->widget(Select2::classname(), [
                                                'data' => [
                                                    'Loss' => "Loss",
                                                    'New' => "New",
                                                    'Fu' => "Fu",
                                                    'illness' => "illness",
                                                    'Foot Ulcer' => "Foot Ulcer",
                                                    'Consult' => "Consult",
                                                    'Other' => "Other",
                                                ],
                                                'options' => [
                                                    'id' => 'dm_type_form',
                                                    'placeholder' => 'Select DM type',
                                                    // 'disabled' => true
                                                ],
                                                'pluginOptions' => [
                                                    'allowClear' => true,
                                                ],
                                            ])->label('DM Type'); ?>
                                        </div>
                                        <div id='thyroid_type'>
                                            <?= $form->field($model, 'nursing_assessment[thyroid_type]', [])->widget(Select2::classname(), [
                                                'data' => [
                                                    'Loss' => "Loss",
                                                    'New' => "New",
                                                    'Fu' => "Fu",
                                                    'illness' => "illness",
                                                    'Consult' => "Consult",
                                                    'Other' => "Other",
                                                ],
                                                'options' => [
                                                    'id' => 'thyroid_type_form',
                                                    'placeholder' => 'Select Thyriod type',
                                                ],
                                                'pluginOptions' => [
                                                    'allowClear' => true,
                                                ],
                                            ])->label('Thyroid Type'); ?>
                                        </div>

                                        <?= $form->field($model, 'nursing_assessment[access]')->widget(Select2::classname(), [
                                            'data' => [
                                                'Walk' => "Walk",
                                                'Wheelchair' => "Wheelchair",
                                                'Stretcher' => "Stretcher",
                                            ],
                                            'options' => ['placeholder' => 'Select Access ...'],
                                            'pluginOptions' => [
                                                'allowClear' => true,
                                            ],
                                        ])->label('Access'); ?>
                                        <?= $form->field($model, 'nursing_assessment[loc]')->widget(Select2::classname(), [
                                            'data' => [
                                                1 => "รู้ตัวดี",
                                                2 => "สับสน",
                                                3 => "ซึมปลุกตื่น",
                                                4 => "ซึมปลุกไม่ค่อยตื่น",
                                                5 => "ตอบสนองเล็กน้อย",
                                                6 => "ไม่รู้สึกตัว",
                                            ],
                                            'options' => ['placeholder' => 'Select LOC'],
                                            'pluginOptions' => [
                                                'allowClear' => true,
                                            ],
                                        ])->label('LOC'); ?>

                                        <?= $form->field($model, 'nursing_assessment[pain_score_adult]')->textInput()->label('Pain Score (Adult)'); ?>
                                        <?= $form->field($model, 'nursing_assessment[pain_score_child]')->textInput(['id' => 'pain_score_child'])->label('Pain Score (Child)'); ?>
                                        <div id="child_items">
                                            <?= $form->field($model, 'nursing_assessment[pain_score_child_items]')->widget(Select2::classname(), [
                                                'data' => [
                                                    'NIPS' => "NIPS",
                                                    'FLACC' => 'FLACC',
                                                    'FPS' => 'FPS',
                                                    'NRS' => 'NRS',
                                                ],
                                                'options' => ['placeholder' => 'Child Items', 'id' => 'score_child_items'],
                                                'pluginOptions' => [
                                                    'allowClear' => true,
                                                ],
                                            ])->label('Child Items'); ?>
                                        </div>
                                        <?= $form->field($model, 'nursing_assessment[fall_risk]')->widget(Select2::classname(), [
                                            'data' => [
                                                'Y' => "Yes",
                                                'N' => "No",
                                            ],
                                            'options' => ['placeholder' => 'Fall Risk', 'id' => 'fall_risk'],
                                            'pluginOptions' => [
                                                'allowClear' => true,
                                            ],
                                            'pluginEvents' => [
                                                "change" => "function() {
                                                console.log($(this).val());
                                                if($(this).val() == 'Y'){
                                                    $('.fall_risk').show();
                                                }else{
                                                    $('.fall_risk').hide();
                                                    $(':checkbox').attr('checked', false);
                                                }
                                            }",
                                            ],
                                        ])->label('Fall Risk'); ?>


                                        <?= $form->field($model, 'nursing_assessment[risk_precaution]')->widget(Select2::classname(), [
                                            'data' => [
                                                'Standard' => "Standard",
                                                'Contact' => "Contact",
                                                'Droplet' => "Droplet",
                                                'Airborne' => "Airborne",
                                            ],
                                            'options' => ['placeholder' => 'select Infection Risk Precaution'],
                                            'pluginOptions' => [
                                                'allowClear' => true,
                                            ],
                                        ])->label('Infection Risk Precaution'); ?>

                                    </div>
                                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 fall_risk">
                                        Fall Risk Check
                                        <?= $form->field($model, 'nursing_assessment[fall_risk_yes]', [
                                            'template' => '{label} <div class="row"><div class="col-lg-11 col-md-11 col-sm-11">{input}{error}{hint}</div></div>',
                                        ])->checkBoxList([
                                            1 => 'มีประวัติ',
                                            2 => 'ได้ยา',
                                            3 => 'ใช้อุปกรณ์',
                                            4 => 'มีปัญหาทรงตัว',
                                            5 => 'แอลกอฮอล์',
                                        ])->label(false) ?>
                                    </div>
                                </div>
                            </div>
                            <!-- END BODY -->
                        </div>
                    </div>
                    <!-- End tabs3 -->

                    <div class="tab-pane" id="tab_4">
                        <div class="card mb-4 py-3">
                            <div class="card-body">
                                <!-- Start Row Tab4 -->
                                <div class="row">
                                    <div class="col-xs-8 col-sm-7 col-md-7 col-lg-8">
                                        <br>
                                        <?= $form->field($model, 'opd_note', [
                                            'horizontalCssClasses' => [
                                                'label' => 'col-lg-1 col-md-1 col-sm-1',
                                                'wrapper' => 'col-xs-11 col-sm-11 col-md-11 col-lg-11 col-sm-offset-0',
                                            ],
                                        ])->textArea(
                                            [
                                                'placeholder' => '',
                                                'id' => 'cc_text',
                                                'nextid' => 'pccservicepi-height',
                                                'rows' => 8
                                            ]
                                        )->label(false) ?>
                                    </div>
                                    <!-- End Col-6 -->
                                    <div class="col-xs-4 col-sm-5 col-md-5 col-lg-4">
                                        <!-- <h1>แสดงรายการเอกสาร</h1> -->
                                        <br>

                                        <ul>
                                            <li>
                                                <i class="fas fa-file-alt"></i> <?= Html::a('แบบฟอร์ม OPD DOCTOR RECORD', ['/chiefcomplaint/report/opd-doctor-record', 'report_name' => 'opd-doctor-record', 'hn' => $hn, 'vn' => $vn], ['class' => 'print']) ?>
                                            </li>
                                            <li>
                                                <i class="fas fa-file-alt"></i> <?= Html::a('แบบฟอร์ม OPD DOCTOR', ['/dm/default/form', 'form_name' => 'dm_assessment_today', 'title' => 'DM Assessment Today'], ['target' => '_blank']) ?>
                                            </li>
                                        </ul>
                                        <hr>
                                    </div>
                                    <!-- Emd Col6 -->
                                </div>
                                <!-- end Row -->
                            </div>
                        </div>
                        <!-- End Card -->

                    </div>

                    <!-- End Tab เอกสาร -->


                    <div class="tab-pane" id="tab_5">
                        <div class="card mb-4 py-3">
                            <div class="card-body">
                                <!-- <h1>Record Today</h1> -->
                                <h4 class="text-primary"><i class="fas fa-calendar-alt"></i> 12/04/2562</h4>
                                <div class="row">
                                    <?php for ($x = 0; $x <= 3; $x++) : ?>
                                    <div class="col-md-3">
                                        <div class="card mb-4 box-shadow">
                                            <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22348%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20348%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16ccefbf0b6%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A17pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16ccefbf0b6%22%3E%3Crect%20width%3D%22348%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22116.7109375%22%20y%3D%22120.15%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
                                            <div class="card-body">
                                                <p class="card-text">This is a wider card</p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                                    </div>
                                                    <small class="text-muted">9 mins</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endfor; ?>
                                </div>
                                <hr>
                                <h4 class="text-primary"><i class="fas fa-calendar-alt"></i>15/08/2562</h4>
                                <div class="row">
                                    <?php for ($x = 0; $x <= 3; $x++) : ?>
                                    <div class="col-md-3">
                                        <div class="card mb-4 box-shadow">
                                            <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22348%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20348%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16ccefbf0b6%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A17pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16ccefbf0b6%22%3E%3Crect%20width%3D%22348%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22116.7109375%22%20y%3D%22120.15%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
                                            <div class="card-body">
                                                <p class="card-text">This is a wider card</p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                                    </div>
                                                    <small class="text-muted">9 mins</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endfor; ?>
                                </div>




                            </div>
                        </div>
                        <!-- End Card -->

                    </div>

                    <!-- End Tab Record ToDay -->


                </div>
            </div>
        </div>
        <!-- <div id="nc"></div> -->

    </div>

    <?php //Html::submitButton("Submit", ['class' => "btn"]); 
    ?>
    <div class="row" style="margin: auto;width: 103%;">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <?= Html::submitButton('<i class="fas fa-check"></i> บันทึก', ['class' => "btn btn-success"]); ?>

            <!-- <span class="btn btn-success" id="saveChiefcomplaint"> <i class="fas fa-check"></i> บันทึก</span> -->
            <?= Html::a('ยกเลิก', ['/site'], ['class' => 'btn btn-default']); ?> | ผู้บันทึก <i class="fas fa-user-edit"></i> : <code>
                <!-- <span class="show-requester-name"></span> -->
                <?= $requester ? PatientHelper::RequesterName($requester) : '-'; ?>
            </code> &nbsp;| <i class="far fa-clock"></i> : <code><?= $model->updated_at ?> </code>

        </div>
    </div>

    <?php ActiveForm::end(); ?>
    <!--- DIALOG 1--->
    <div class="modal fade bd-popup1-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="popup1ModalLabel">อาการ
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button></h3>
                </div>
                <div class="modal-body">
                    <form name="form1" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="button" class=" btn btn-pop-info " value="ผู้ป่วยมีอาการ" OnClick="document.form1.tmp_cc1.value = document.form1.tmp_cc1.value + 'CC: ผู้ป่วยมีอาการ ';">
                                <input type="button" class=" btn btn-pop " value="ไข้" OnClick="document.form1.tmp_cc1.value = document.form1.tmp_cc1.value + 'ไข้ ';">
                                <input type="button" class=" btn btn-pop " value="เจ็บคอ" OnClick="document.form1.tmp_cc1.value = document.form1.tmp_cc1.value + 'เจ็บคอ ';">
                                <input type="button" class=" btn btn-pop " value="ไอ" OnClick="document.form1.tmp_cc1.value = document.form1.tmp_cc1.value + 'ไอ ';">
                                <input type="button" class=" btn btn-pop " value="ปวดท้อง" OnClick="document.form1.tmp_cc1.value = document.form1.tmp_cc1.value + 'ปวดท้อง ';
                                   ">
                                <input type="button" class=" btn btn-pop " value="คลื่นไส้อาเจียน" OnClick="document.form1.tmp_cc1.value = document.form1.tmp_cc1.value + 'คลื่นไส้อาเจียน ';">
                                <input type="button" class=" btn btn-pop " value="เวียนศีรษะ" OnClick="document.form1.tmp_cc1.value = document.form1.tmp_cc1.value + 'เวียนศีรษะ ';">
                                <input type="button" class=" btn btn-pop " value="ปวดศีรษะ" OnClick="document.form1.tmp_cc1.value = document.form1.tmp_cc1.value + 'ปวดศีรษะ ';">
                                <input type="button" class=" btn btn-pop " value="มึนงง" OnClick="document.form1.tmp_cc1.value = document.form1.tmp_cc1.value + 'มึนงง ';">
                                <input type="button" class=" btn btn-pop " value="ใจสั่น" OnClick="document.form1.tmp_cc1.value = document.form1.tmp_cc1.value + 'ใจสั่น ';">
                                <input type="button" class=" btn btn-pop " value="เจ็บแน่นหน้าอก" OnClick="document.form1.tmp_cc1.value = document.form1.tmp_cc1.value + 'เจ็บแน่นหน้าอก ';">
                                <input type="button" class=" btn btn-pop " value="เหนื่อยหอบหายใจลำบาก" OnClick="document.form1.tmp_cc1.value = document.form1.tmp_cc1.value + 'เหนื่อยหอบหายใจลำบาก ';">
                                <input type="button" class=" btn btn-pop " value="ปัสสาวะแสบขัด" OnClick="document.form1.tmp_cc1.value = document.form1.tmp_cc1.value + 'ปัสสาวะแสบขัด ';">
                                <input type="button" class=" btn btn-pop " value="ถ่ายเหลว" OnClick="document.form1.tmp_cc1.value = document.form1.tmp_cc1.value + 'ถ่ายเหลว ';">
                                <input type="button" class=" btn btn-pop-info " value="เป็นมา" OnClick="document.form1.tmp_cc1.value = document.form1.tmp_cc1.value + 'เป็นมา 1 วัน ';">

                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                TEXT : <textarea class="form-control cctext" id="tmp_cc1" rows="6"></textarea>
                            </div>
                        </div>
                    </FORM>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="button" id="btnsave-tmpcc1" class="btn btn-primary" data-dismiss="modal" value="OK">
                </div>
            </div>
        </div>
    </div>
    <!--- DIALOG 2--->
    <div class="modal fade bd-popup2-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="popup2ModalLabel">ปรึกษา
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button></h3>
                </div>
                <div class="modal-body">
                    <form name="form2" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="button" class=" btn btn-pop-info " value="ขอรับคำปรึกษาเรื่อง" OnClick="document.form2.tmp_cc2.value = document.form2.tmp_cc2.value + 'ขอรับคำปรึกษาเรื่อง ';">
                                <input type="button" class=" btn btn-pop " value="ตรวจเบาหวาน" OnClick="document.form2.tmp_cc2.value = document.form2.tmp_cc2.value + 'ตรวจเบาหวาน ';">
                                <input type="button" class=" btn btn-pop " value="ตรวจไทรอยด์" OnClick="document.form2.tmp_cc2.value = document.form2.tmp_cc2.value + 'ตรวจไทรอยด์';">
                                <input type="button" class=" btn btn-pop " value="ตรวจความดันสูง" OnClick="document.form2.tmp_cc2.value = document.form2.tmp_cc2.value + 'ตรวจความดันสูง ';">
                                <input type="button" class=" btn btn-pop " value="ตรวจไขมัน" OnClick="document.form2.tmp_cc2.value = document.form2.tmp_cc1.value + 'ตรวจไขมัน ';">
                                <input type="button" class=" btn btn-pop " value="โปรแกรมตรวจสุขภาพ" OnClick="document.form2.tmp_cc2.value = document.form2.tmp_cc2.value + 'โปรแกรมตรวจสุขภาพ โปรแกรม ';">
                                <input type="button" class=" btn btn-pop " value="รับยาต่อเนื่อง" OnClick="document.form2.tmp_cc2.value = document.form2.tmp_cc2.value + 'การรับยาต่อเนื่อง ';">
                                <input type="button" class=" btn btn-pop " value="วัคซีน" OnClick="document.form2.tmp_cc2.value = document.form2.tmp_cc2.value + 'การรับวัคซีน ';">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                TEXT : <textarea class="form-control cctext" id="tmp_cc2" rows="6"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="button" id="btnsave-tmpcc2" class="btn btn-primary" data-dismiss="modal" value="OK">
                </div>
            </div>
        </div>
    </div>
    <!--- DIALOG 3--->
    <div class="modal fade bd-popup3-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="popup3ModalLabel">ติดตาม
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button></h3>
                </div>
                <div class="modal-body">
                    <form name="form3" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="button" class=" btn btn-pop-info " value="ติดตามตามนัด" OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'ติดตามตามนัด ';">
                                <input type="button" class=" btn btn-pop " value="เบาหวาน" OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'เบาหวาน ';">
                                <input type="button" class=" btn btn-pop " value="ไทรอยด์" OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'ไทรอยด์ ';">
                                <input type="button" class=" btn btn-pop " value="ความดันสูง" OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'ความดันสูง ';">
                                <input type="button" class=" btn btn-pop " value="ไขมัน" OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'ไขมัน ';">
                                <input type="button" class=" btn btn-pop " value="อาการทั่วไปปกติ" OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'อาการทั่วไปปกติ ';">
                                <input type="button" class=" btn btn-pop " value="หลังผ่าตัด" OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'หลังผ่าตัด ';">
                                <input type="button" class=" btn btn-pop " value="ทำแผลบริเวณ" OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'ทำแผลบริเวณ ';">
                                <input type="button" class=" btn btn-pop " value="ตัดเล็บเท้า" OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'ตัดเล็บเท้า ';">
                                <input type="button" class=" btn btn-pop " value="รับบริการวัคซีนไข้หวัดใหญ่" OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'รับบริการวัคซีนไข้หวัดใหญ่ ';">
                                <input type="button" class=" btn btn-pop " value="เรื่องแผลที่เท้า" OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'เรื่องแผลที่เท้า ';">
                                <input type="button" class=" btn btn-pop-info " value="นัดครั้งต่อไป" OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + 'นัดครั้งต่อไปอีก ';">
                                <input type="button" class=" btn btn-pop-info " value="สัปดาห์" OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + '1 สัปดาห์ ';">
                                <input type="button" class=" btn btn-pop-info " value="เดือน" OnClick="document.form3.tmp_cc3.value = document.form3.tmp_cc3.value + '1 เดือน ';">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                TEXT : <textarea class="form-control cctext" id="tmp_cc3" rows="6"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="button" id="btnsave-tmpcc3" class="btn btn-primary" data-dismiss="modal" value="OK">
                </div>
            </div>
        </div>
    </div>
    <!--- DIALOG 4--->
    <div class="modal fade bd-popup4-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="popup4ModalLabel">ตรวจสุขภาพ
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button></h3>
                </div>
                <div class="modal-body">
                    <form name="form4" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="button" class=" btn btn-pop-info " value="ขอรับการตรวจ " OnClick="document.form4.tmp_cc4.value = document.form4.tmp_cc4.value + 'ผู้ป่วยขอรับการ';">
                                <input type="button" class=" btn btn-pop " value="ตรวจสุขภาพประจำปี " OnClick="document.form4.tmp_cc4.value = document.form4.tmp_cc4.value + 'ตรวจสุขภาพประจำปี โปรแกรม ';">
                                <input type="button" class=" btn btn-pop " value="ตรวจสุขภาพก่อนแต่งงานหรือวางแผนตั้งครรภ์" OnClick="document.form4.tmp_cc4.value = document.form4.tmp_cc4.value + 'ตรวจสุขภาพก่อนแต่งงานหรือวางแผนตั้งครรภ์';">
                                <input type="button" class=" btn btn-pop " value="ตรวจสุขภาพก่อนทำประกัน" OnClick="document.form4.tmp_cc4.value = document.form4.tmp_cc4.value + 'ตรวจสุขภาพก่อนทำประกัน ';">
                                <input type="button" class=" btn btn-pop " value="ตรวจสุขภาพขอใบขับขี่" OnClick="document.form4.tmp_cc4.value = document.form4.tmp_cc4.value + 'ตรวจสุขภาพขอใบขับขี่ ';
                                   ">
                                <input type="button" class=" btn btn-pop " value="ตรวจสุขภาพขอใบรับรองแพทย์" OnClick="document.form4.tmp_cc4.value = document.form4.tmp_cc4.value + 'ตรวจสุขภาพขอใบรับรองแพทย์ ';">
                                <input type="button" class=" btn btn-pop " value="ตรวจสุขภาพก่อนเข้าทำงาน" OnClick="document.form4.tmp_cc4.value = document.form4.tmp_cc4.value + 'ตรวจสุขภาพก่อนเข้าทำงาน ';">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                TEXT : <textarea class="form-control cctext" id="tmp_cc4" rows="6"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="button" id="btnsave-tmpcc4" class="btn btn-primary" data-dismiss="modal" value="OK">
                </div>
            </div>
        </div>
    </div>
    <!--- DIALOG 5--->
    <div class="modal fade bd-popup5-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="popup4ModalLabel">ตรวจสุขภาพ
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button></h3>
                </div>
                <div class="modal-body">
                    <form name="form5" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="button" class=" btn btn-pop-info " value="นัดโดย " OnClick="document.form5.tmp_cc5.value = document.form5.tmp_cc5.value + 'นัดโดย ';">
                                <input type="button" class=" btn btn-pop-info " value="ให้เข้าพบ" OnClick="document.form5.tmp_cc5.value = document.form5.tmp_cc5.value + 'ให้เข้าพบ ';">
                                <input type="button" class=" btn btn-pop " value="แพทย์ 1" OnClick="document.form5.tmp_cc5.value = document.form5.tmp_cc5.value + 'แพทย์ 1';">
                                <input type="button" class=" btn btn-pop " value="แพทย์ 2" OnClick="document.form5.tmp_cc5.value = document.form5.tmp_cc5.value + 'แพทย์ 2';">
                                <input type="button" class=" btn btn-pop " value="แพทย์ 3" OnClick="document.form5.tmp_cc5.value = document.form5.tmp_cc5.value + 'แพทย์ 3';">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                TEXT : <textarea class="form-control cctext" id="tmp_cc5" rows="6"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="button" id="btnsave-tmpcc5" class="btn btn-primary" data-dismiss="modal" value="OK">
                </div>
            </div>
        </div>
    </div>
    <!--- END DIALOG --->










    <?php
    $requester = $model->requester;
    $js = <<< JS




$(function(){

    // $("#form-chiefcomplaint").submit(function(event) {
    //     $("#form-chiefcomplaint").on('beforeSubmit', function(e) {
    //     e.preventDefault(); // stopping submitting
    //         var form = $(this);
    //         if (form.find('.has-error').length) {
    //     //   return false;
    //       console.log(form.find('.has-error').length)
    //         }else{
    //             if($('#chiefcomplaint-requester').val() == ''){
    //                 confirmRequester();
    //             }else{
    //                 alert('success');
    //             }
    //     console.log(form.find('.has-error').length)
    //     return false;
    //  }
    //  return false;
    // });

loadFormControl();
// getRequesterName();
scoreChildControl();

$('#pain_score_child').keyup(function(){
    scoreChildControl();
});

$(".type_of_patient").click(function(e, parameters) {

var nonUI = false;
try {
    nonUI = parameters.nonUI;
} catch (e) {}
var checked = nonUI ? !this.checked : this.checked;
// alert('Checked = ' + checked);
var value = e.target.value;
if(checked == true){
    if(value == 2){
        $("#dm_type").show();
    }
    if(value == 3){
        $("#thyroid_type").show();
    }
   console.log('checked'+value);
}else{
   console.log('Uncheck'+value);

   if(value == 2){
        $("#dm_type").hide();
        $("#dm_type_form").val(null).trigger('change');
    }
    if(value == 3){
        $("#thyroid_type").hide();
        $("#thyroid_type_form").val(null).trigger('change');
    }

}
});


$("#butTriggerChange").click(function() {
$("#myCheckbox").trigger('click', {
            nonUI : true
        })
});


$('#show-bmi').prop('disabled', true);
$('#chiefcomplaint-bw').keyup(function(){
    bmi();
    console.log($(this).val());
});

$('#chiefcomplaint-ht').keyup(function(){
    bmi();
    console.log($(this).val());
});

// $('#saveChiefcomplaint').click(function(){
//     //confirmRequester()
//     saveChiefcomplaint();
//    var form =  $('#form-chiefcomplaint');

// //    if (form.find('.has-error').length) {
// //     $.alert({
// //                     theme:'modern',
// //                     title: 'แจ้งเตือน!',
// //                     content: 'ข้อมูลไม่สมบรูณ์',
// //                     backgroundDismiss: false,
// //                     backgroundDismissAnimation: 'glow',
// //                     animation: 'zoom',
// //                     closeAnimation: 'scale'
// //                     // animationSpeed: 900,
// //                 });
// //         }else{
// //             confirmRequester();

// //         }

// });

$('#btnsave-tmpcc1').click(function() {
var tmpcc1 = $('#tmp_cc1').val(); //DATA NEW TMP CC 1
var cc = $('#cc_text').val();// DATA OLD IN TEXT
    $('#cc_text').html(cc+" "+tmpcc1);
    $('#myModal').modal('hide');
});

$('#btnsave-tmpcc2').click(function() {
var tmpcc2 = $('#tmp_cc2').val(); //DATA NEW TMP CC 2
var cc = $('#cc_text').val();// DATA OLD IN TEXT
    $('#cc_text').html(cc+" "+tmpcc2);
    $('#myModal').modal('hide');
});

$('#btnsave-tmpcc3').click(function() {
var tmpcc3 = $('#tmp_cc3').val(); //DATA NEW TMP CC 3
var cc = $('#cc_text').val();// DATA OLD IN TEXT
    $('#cc_text').html(cc+" "+tmpcc3);
    $('#myModal').modal('hide');
});

$('#btnsave-tmpcc4').click(function() {
var tmpcc4 = $('#tmp_cc4').val(); //DATA NEW TMP CC 4
var cc = $('#cc_text').val();// DATA OLD IN TEXT
    $('#cc_text').html(cc+" "+tmpcc4);
    $('#myModal').modal('hide');
});

$('#btnsave-tmpcc5').click(function() {
var tmpcc5 = $('#tmp_cc5').val(); //DATA NEW TMP CC 5
var cc = $('#cc_text').val();// DATA OLD IN TEXT
    $('#cc_text').html(cc+" "+tmpcc5);
    $('#myModal').modal('hide');
});

$('#btn-clear').click(function() {
    $('#plan_text').html("");
});


$('.print').click(function(e){
    e.preventDefault();
    var url = $(this).attr('href');
    $.ajax({
        type: "post",
        url: "index.php?r=opdvisit/opd-visit/check-print-status",
        dataType: "json",
        success: function (response) {
            if(response == "print"){
                $.alert({
                    theme:'modern',
                    title: 'แจ้งเตือน!',
                    content: 'OPD DOCTOR RECORD ได้ถูกพิมพ์แล้ว',
                    backgroundDismiss: false,
                    backgroundDismissAnimation: 'glow',
                    animation: 'zoom',
                    closeAnimation: 'scale'
                    // animationSpeed: 900,
                }
                );

                return false;
            }else{
                $.confirm({
                    theme:'modern',
                    title: 'พิมพ์ OPD DOCTOR RECORD',
                    content: 'ยืนยันการพิมพ์ OPD DOCTOR RECORD!',
                    buttons: {
                        confirm: function () {
                            window.open(url);
                        },
                        cancel: function () {
                            $.alert('Canceled!');
                        },
                    }
                });
            }
        }
    });

});





});

function scoreChildControl(){
    var value = $('#pain_score_child').val()
    if(value !== ''){
        $('#child_items').show();
    }else{
        $('#child_items').hide();
        $('#score_child_items').val(null).trigger('change');
    }
}

// function getRequesterName(){
//     $.ajax({
//         type: "post",
//         url: "index.php?r=site/get-requester ",
//         data: {'key':'$requester'} ,
//         dataType: "json",
//         success: function (response) {
//             $('.show-requester-name').html(response);
//         }
//     });
// }

function loadFormControl(){
    $("#dm_type").css("background-color:#fb1b1b;");
    if($('#dm_type_form').val() == '')
        {
        $("#dm_type").hide();
        }else{
            $("#dm_type").show();
        }

    if($('#thyroid_type_form').val() == '')
    {
            $("#thyroid_type").hide();
        }else{
            $("#thyroid_type").show();

    }


    if($('#fall_risk').val() == 'Y'){
        $('.fall_risk').show();
    }else{
        $('.fall_risk').hide();
    }

}

// สูตรหา BMI
function bmi(){
    var w = $('#chiefcomplaint-bw').val();
    var h = $('#chiefcomplaint-ht').val();
    var hm = h/100;
    var bmi = w / (hm*hm)
    if(bmi.toFixed(2) == 'NaN' || bmi.toFixed(2) == 'Infinity'){
        $('#chiefcomplaint-bmi').val('');
        $('#bmi-show').val('');
    }else{
        $('#chiefcomplaint-bmi').val(bmi.toFixed(2));
        $('#bmi-show').val(bmi.toFixed(2));
        ibw();
    }
}

// สูตรหา IBW
function ibw(){
    var h = $('#chiefcomplaint-ht').val();
    var ht = h*0.01;
    var ibw = 25 * (ht*ht);
    $('#chiefcomplaint-ibw').val(ibw.toFixed(2));
    $('#ibw-show').val(ibw.toFixed(2));
}

JS;
    $this->registerJS($js);
    ?>