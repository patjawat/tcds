<?php
use yii\bootstrap\ActiveForm;

use yii\helpers\Html;
use yii\helpers\Url;
use yii\base\InvalidConfigException;
use yii\bootstrap\Modal;
use yii\web\JsExpression;
use yii\web\View;
use app\components\PatientHelper;
use app\components\DateTimeHelper;
use app\components\ReportHelper;
use app\components\FormatYear;

use app\modules\dmindicators\models\DmIndicators;



$hn = PatientHelper::getCurrentHn();
$vn = PatientHelper::getCurrentVn();
$this->params['pt_title'] = PatientHelper::getPatientTitleByHn($hn);

if($hn){
$dmi = DmIndicators::find()
->where(['hn' => $hn])
->andWhere(['NOT IN', 'vn', $vn])->orderby(['created_at' => SORT_DESC])->all();
}else{
    $dmi = new  DmIndicators();
}

?>
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

.help-block {
    display: block;
    margin-top: 0px;
    margin-bottom: 0px;
    color: #737373;
}

.form-group {
    margin-bottom: 5px;
}

legend {
    display: block;
    width: 9%;
    padding: 0;
    margin-bottom: 0px;
    font-size: 18px;
    line-height: inherit;
    color: #333333;
    border: 0;
    border-bottom: none;
}

fieldset {
    border: 1px solid #c0c0c0;
    margin: 0 2px;
    padding: 0.35em 0.625em 0.75em;
    border-style: dashed;
    border-radius: 5px;
}
</style>


<?php $form = ActiveForm::begin([
    'id' => 'form-dmindicator',
                            'layout' => 'horizontal',
                            'fieldConfig' => [
                              'horizontalCssClasses' => [
                                  'label' => 'col-sm-4',
                                  'offset' => 'col-sm-offset-4',
                                  'wrapper' => 'col-sm-8',
                                  'error' => '',
                                  'hint' => '',
                              ],
                          ],
                          ]); ?>
<div class="row">
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-2">
        <h2>DM Indicators</h2>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-2">
        <button type="button" class="btn btn-success" id="save-dmindicator" style="margin-top: 20px;">บันทึก</button>
    </div>

</div>


<!-- start row -->
<div class="row">
    <!-- start col-2 -->
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-2">

        <fieldset style="">
            <legend>ESRD</legend>
            <?= $form->field($model, 'esrd',[
        'horizontalCssClasses' => [
            'offset' => 'col-sm-offset-0',
            'label' => 'col-sm-1',
            'wrapper' => 'col-sm-2',
        ]
    ])->checkbox()->label('ESRD'); ?>
        </fieldset>


    </div>
    <!-- End Col-2 -->

    <!-- start col-2 -->
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-2">
        <fieldset>
            <legend>Blindness</legend>

            <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <?= $form->field($model, 'blindness[rt]',[
        'horizontalCssClasses' => [
            'offset' => 'col-sm-offset-0',
            'label' => 'col-sm-1',
            'wrapper' => 'col-sm-2',
        ]
    ])->checkbox()->label('Rt'); ?>

                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <?= $form->field($model, 'blindness[lt]',[
        'horizontalCssClasses' => [
            'offset' => 'col-sm-offset-0',
            'label' => 'col-sm-1',
            'wrapper' => 'col-sm-2',
        ]
    ])->checkbox()->label('Lt'); ?>
                </div>
            </div>

        </fieldset>
    </div>
    <!-- End col-2 -->

    <!-- start col-2 -->
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-2">
        <fieldset>
            <legend>Unsuitable</legend>
            <?= $form->field($model, 'tds[unsuitable]',[
        'horizontalCssClasses' => [
            'offset' => 'col-sm-offset-0',
            'label' => 'col-sm-3',
            'wrapper' => 'col-sm-9',
        ]
    ])->checkbox()->label('Unsuitable'); ?>
        </fieldset>
    </div>
    <!-- End Col-2 -->


    <!-- start col-2 -->
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-2">
        <fieldset>
            <legend>Other&nbsp;hospital</legend>
            <?= $form->field($model, 'tds[other_hospital]',[
        'horizontalCssClasses' => [
            'offset' => 'col-sm-offset-0',
            'label' => 'col-sm-3',
            'wrapper' => 'col-sm-9',
        ]
    ])->checkbox()->label('Other hospital'); ?>
        </fieldset>
    </div>
    <!-- End Col-2 -->



    <!-- start col-2 -->
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-2">
        <fieldset>
            <legend>Dead</legend>
            <?= $form->field($model, 'tds[dead]',[
        'horizontalCssClasses' => [
            'offset' => 'col-sm-offset-0',
            'label' => 'col-sm-3',
            'wrapper' => 'col-sm-9',
        ]
    ])->checkbox()->label('Dead'); ?>
        </fieldset>
    </div>
    <!-- End Col-2 -->


</div>
<!-- End Row -->

<br>





<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Kidney</a></li>
    <li><a data-toggle="tab" href="#menu1"> Eye</a></li>
    <li><a data-toggle="tab" href="#menu2"> Neuropathy and Vaseular</a></li>
    <li><a data-toggle="tab" href="#menu3">BP</a></li>
    <li><a data-toggle="tab" href="#menu4">A1C</a></li>
    <li><a data-toggle="tab" href="#menu5">Lipid</a></li>
    <li><a data-toggle="tab" href="#menu6">Smoking</a></li>
    <li><a data-toggle="tab" href="#menu7">Flu vaccine</a></li>
    <!-- <li><a data-toggle="tab" href="#menu8">ESRD</a></li> -->
    <!-- <li><a data-toggle="tab" href="#menu9">Blindness</a></li> -->
    <li><a data-toggle="tab" href="#menu10">Foot and Toe</a></li>
    <li><a data-toggle="tab" href="#menu11">Macrovascular</a></li>
    <li><a data-toggle="tab" href="#menu12">Target of control</a></li>
    <!-- <li><a data-toggle="tab" href="#menu13">TDS</a></li> -->
    <li><a data-toggle="tab" href="#menu14">Drug use</a></li>
</ul>


<div class="tab-content">
    <!-- Home Content -->
    <div id="home" class="tab-pane fade in active">
        <br>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fas fa-list-ul"></i> kidney</h3>
            </div>
            <div class="panel-body shadow">
                <?=$this->render('./kidney');?>
            </div>
        </div>

    </div>
    <!-- End Home content -->

    <!-- Menu1 Content -->
    <div id="menu1" class="tab-pane fade">
        <!-- <h3>Eye</h3>
     -->
        <br>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                <!-- start panel -->
                <div class="panel panel-success shadow">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <p class="pull-left">In Hospital ทำมาแล้วเมื่อ <code id="EyelastInHospitalLastDate"></code>
                            </p>
                            <p class="pull-right"><i class="fas fa-calendar"></i> <span id="in_hos_created_at"></span>
                            </p>
                            <br>
                        </h3>
                    </div>
                    <div class="panel-body">

                        <!-- <br> -->
                        <div id="EyelastInHospital"></div>

                    </div>
                </div>
                <!-- End panel -->

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                <!-- start panel -->
                <div class="panel panel-primary shadow">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <p class="pull-left"><i class="far fa-edit"></i> Out Hospital</p>
                            <p class="pull-right"><i class="fas fa-calendar"></i>
                                <?=FormatYear::ToThai(date('Y-m-d'));?></p>
                            <br>
                        </h3>
                    </div>
                    <div class="panel-body">

                        <?= $form->field($model, 'eye_out_hos[no_dr]')->inline()->checkboxList(['Rt' => 'Rt','Rl' => 'Rl'])->label('No DR'); ?>
                        <?= $form->field($model, 'eye_out_hos[dme]')->inline()->checkboxList(['Rt' => 'Rt','Rl' => 'Rl'])->label('DME'); ?>
                        <?= $form->field($model, 'eye_out_hos[npdr]')->inline()->checkboxList(['Rt' => 'Rt','Rl' => 'Rl'])->label('NPDR'); ?>
                        <?= $form->field($model, 'eye_out_hos[mile]')->inline()->checkboxList(['Rt' => 'Rt','Rl' => 'Rl'])->label('Mild'); ?>
                        <?= $form->field($model, 'eye_out_hos[servere]')->inline()->checkboxList(['Rt' => 'Rt','Rl' => 'Rl'])->label('Servere'); ?>
                        <?= $form->field($model, 'eye_out_hos[PRD]')->inline()->checkboxList(['Rt' => 'Rt','Rl' => 'Rl'])->label('PDR'); ?>
                        <?= $form->field($model, 'eye_out_hos[laser_rx]')->inline()->checkboxList(['Rt' => 'Rt','Rl' => 'Rl'])->label('Laser Rx'); ?>
                        <?= $form->field($model, 'eye_out_hos[no_laser_rx]')->inline()->checkboxList(['Rt' => 'Rt','Rl' => 'Rl'])->label('No laser Rx'); ?>
                        <?= $form->field($model, 'eye_out_hos[pdr_with_hrc]')->inline()->checkboxList(['Rt' => 'Rt','Rl' => 'Rl'])->label('PDR with HRC'); ?>
                        <?= $form->field($model, 'eye_out_hos[cataract]')->inline()->checkboxList(['Rt' => 'Rt','Rl' => 'Rl'])->label('Cataract'); ?>
                        <?= $form->field($model, 'eye_out_hos[cataract_no]')->inline()->checkboxList(['Rt' => 'Rt','Rl' => 'Rl'])->label('No'); ?>
                        <?= $form->field($model, 'eye_out_hos[cataract_yes]')->inline()->checkboxList(['Rt' => 'Rt','Rl' => 'Rl'])->label('Yes'); ?>
                        <?= $form->field($model, 'eye_out_hos[operation]')->inline()->checkboxList(['Rt' => 'Rt','Rl' => 'Rl'])->label('Operation'); ?>
                        <?= $form->field($model, 'eye_out_hos[glaucerna]')->inline()->checkboxList(['Rt' => 'Rt','Rl' => 'Rl'])->label('Glaucerna'); ?>
                        <?= $form->field($model, 'eye_out_hos[glaucerna_no]')->inline()->checkboxList(['Rt' => 'Rt','Rl' => 'Rl'])->label('No'); ?>
                        <?= $form->field($model, 'eye_out_hos[glaucerna_yes]')->inline()->checkboxList(['Rt' => 'Rt','Rl' => 'Rl'])->label('Yes'); ?>
                        <?= $form->field($model, 'eye_out_hos[no_slit_lamp_exam]')->inline()->checkboxList(['Rt' => 'Rt','Rl' => 'Rl'])->label('No slit-lamp exam'); ?>


                    </div>
                </div>
                <!-- End panel -->

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                <!-- start panel -->
                <div class="panel panel-info shadow">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <p class="pull-left">Out Hospital <code id="EyelastOutHospitalLastDate"></code></p>
                            <p class="pull-right"><i class="fas fa-calendar"></i> <span
                                    id="EyelastOutHospitalDate"></span></p>
                            <br>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div id="EyelastOutHospital"></div>
                    </div>
                </div>
                <!-- End panel -->

            </div>
        </div>

    </div>

    <!-- End Menu1 -->

    <!-- start menu2 -->
    <div id="menu2" class="tab-pane fade">
        <br>

        <!-- start row main -->
        <div class="row">
            <!-- start col-main -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="far fa-edit"></i> Neuropathy and Vaseular</h3>
                    </div>
                    <div class="panel-body shadow">

                        <!-- start row sub-->
                        <div class="row">

                            <!-- start-col -->
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                                <p class="text-center">Rt</p>
                                <?=$form->field($model, 'neuropathy_vaseular[mnf_rt]',
                            ['horizontalCssClasses' => [
                                  'label' => 'col-sm-3',
                                  'wrapper' => 'col-sm-9',
                              ]]
                              )->inline()->radioList(['Intact' => 'Intact','Diminish' => 'Diminish','Impair' => 'Impair'])->label('MNF'); ?>
                                <?=$form->field($model, 'neuropathy_vaseular[vt_rt]',
                               ['horizontalCssClasses' => [
                                'label' => 'col-sm-3',
                                'wrapper' => 'col-sm-9',
                            ]]
                            )->inline()->radioList(['Intact' => 'Intact','Diminish' => 'Diminish','Impair' => 'Impair'])->label('VT'); ?>
                                <?=$form->field($model, 'neuropathy_vaseular[dp_rt]',
                               ['horizontalCssClasses' => [
                                'label' => 'col-sm-3',
                                'wrapper' => 'col-sm-9',
                            ]]
                            )->inline()->radioList(['0' => '0','1' => '1','2' => '2'])->label('DP'); ?>
                                <?=$form->field($model, 'neuropathy_vaseular[pt_rt]',
                               ['horizontalCssClasses' => [
                                'label' => 'col-sm-3',
                                'wrapper' => 'col-sm-9',
                            ]]
                            )->inline()->radioList(['0' => '0','1' => '1','2' => '2'])->label('PT'); ?>

                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <p class="text-center">Lt</p>
                                <?=$form->field($model, 'neuropathy_vaseular[mnf_lt]',
                               ['horizontalCssClasses' => [
                                'label' => 'col-sm-0',
                                'wrapper' => 'col-sm-9',
                                'offset' => 'col-sm-offset-1',
                            ]]
                            )->inline()->radioList(['Intact' => 'Intact','Diminish' => 'Diminish','Impair' => 'Impair'])->label(false); ?>
                                <?=$form->field($model, 'neuropathy_vaseular[vt_lt]',
                               ['horizontalCssClasses' => [
                                'label' => 'col-sm-0',
                                'wrapper' => 'col-sm-9',
                                'offset' => 'col-sm-offset-1',
                            ]]
                            )->inline()->radioList(['Intact' => 'Intact','Diminish' => 'Diminish','Impair' => 'Impair'])->label(false); ?>
                                <?=$form->field($model, 'neuropathy_vaseular[dp_lt]',
                               ['horizontalCssClasses' => [
                                'label' => 'col-sm-0',
                                'wrapper' => 'col-sm-9',
                                'offset' => 'col-sm-offset-1',
                            ]]
                            )->inline()->radioList(['0' => '0','1' => '1','2' => '2'])->label(false); ?>
                                <?=$form->field($model, 'neuropathy_vaseular[pt_lt]',
                               ['horizontalCssClasses' => [
                                'label' => 'col-sm-0',
                                'wrapper' => 'col-sm-9',
                                'offset' => 'col-sm-offset-1',
                            ]]
                            )->inline()->radioList(['0' => '0','1' => '1','2' => '2'])->label(false); ?>

                            </div>
                            <!-- End col -->
                        </div>
                        <!-- End Row sub-->


                    </div>
                    <!-- End panel body -->
                </div>
                <!-- End panel -->
            </div>
            <!-- end col main -->
            <!-- start col-main -->

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <?php //$this->render('neuropathy_aseular',['model' => $dmi]);?>

            </div>
            <!-- end col main -->

        </div>
        <!-- End Row main -->




        <br>


    </div>
    <!-- End Menu2 -->

    <!-- start menu3 -->
    <div id="menu3" class="tab-pane fade">
        <?=$this->render('bp');?>
    </div>
    <!-- End Menu3 -->

    <!-- start menu4 -->
    <div id="menu4" class="tab-pane fade">
        <?=$this->render('a1c');?>
    </div>
    <!-- End Menu4 -->

    <!-- start menu5 -->
    <div id="menu5" class="tab-pane fade">
        <?=$this->render('lipid');?>
    </div>
    <!-- End Menu5 -->

    <!-- start menu6 -->
    <div id="menu6" class="tab-pane fade">
        <br>

        <!-- smoking -->


        <!-- start Row -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">

                <!-- start panel -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="far fa-edit"></i> Smoking</h3>
                    </div>
                    <div class="panel-body shadow">


                        <?= $form->field($model, 'smoking[check]')->checkboxList($model->getItemSmoking()); ?>
                        <?= $form->field($model, 'smoking[check_how_long_ago]')->checkboxList($model->getItemHowLongAgo())->label('How long ago?'); ?>

                    </div>
                    <!-- End panel body -->
                </div>
                <!-- end panel -->

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">

                <?=$this->render('smoking',['model' => $dmi]);?>

            </div>
            <!-- End Col-8 -->
        </div>
        <!-- End Row -->



    </div>
    <!-- End Menu6 -->

    <!-- start menu7 -->
    <div id="menu7" class="tab-pane fade">

        <?= $form->field($model, 'flu_vaccine[out_hospital]',[
        'horizontalCssClasses' => [
            'offset' => 'col-sm-offset-0',
            'label' => 'col-sm-1',
            'wrapper' => 'col-sm-2',
        ]
    ])->checkbox()->label('Out-hospital'); ?>

        <?=$this->render('flu_vaccine');?>
    </div>
    <!-- End Menu7 -->

    <!-- start menu8 -->
    <!-- <div id="menu8" class="tab-pane fade">
ESRD OLD
    </div> -->
    <!-- End Menu8 -->

    <!-- start menu9 -->
    <div id="menu9" class="tab-pane fade">
        <!-- <h1>Blindness</h1> -->



    </div>
    <!-- End Menu9 -->

    <!-- start menu10 -->
    <div id="menu10" class="tab-pane fade">
        <!-- Foot  And Toe -->
        <br>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="far fa-edit"></i> Foot And Toe</h3>
            </div>
            <div class="panel-body shadow">


                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <?= $form->field($model, 'foot_and_toe[rt]')->checkboxList($model->getItemFootAndToe())->label('Rt'); ?>

                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <?= $form->field($model, 'foot_and_toe[lt]')->checkboxList($model->getItemFootAndToe())->label('Lt'); ?>

                    </div>
                    <!-- End Row -->
                </div>

                <!-- End panel body -->
            </div>
            <!-- End panel -->
        </div>



    </div>
    <!-- End Menu10 -->

    <!-- start menu11 -->
    <div id="menu11" class="tab-pane fade">
        <br>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="far fa-edit"></i> Macrovascular</h3>
            </div>
            <div class="panel-body shadow">


                <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <?= $form->field($model, 'macrovascular[items]',
        ['horizontalCssClasses' => [
            'label' => 'col-sm-6',
            'wrapper' => 'col-sm-4',
            'offset' => 'col-sm-offset-1',
        ]]
        )->checkboxList($model->getMacrovascular(),[

            'itemOptions' => [
            
                // 'labelOptions' => ['class' => 'col-md-1']
                // 'onclick' => 'return checkTypeOfPatient($(this).val());',
                'class' => 'macrovascular-items'
            
            ]
            
            ])->label('Macrovascular'); ?>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <?= $form->field($model, 'macrovascular[item1_date]',
             ['horizontalCssClasses' => [
                'label' => 'col-sm-6',
                'wrapper' => 'col-sm-6',
                'offset' => 'col-sm-offset-0',
            ]]
            )->textInput(['id' => 'item_date1','style' => 'height: 25px;border: none;'])->label(false); ?>
                        <?= $form->field($model, 'macrovascular[item2_date]',
             ['horizontalCssClasses' => [
                'label' => 'col-sm-6',
                'wrapper' => 'col-sm-6',
                'offset' => 'col-sm-offset-0',
            ]]
            )->textInput(['id' => 'item_date2','style' => 'height: 25px;border: none;'])->label(false); ?>
                        <?= $form->field($model, 'macrovascular[item3_date]',
             ['horizontalCssClasses' => [
                'label' => 'col-sm-6',
                'wrapper' => 'col-sm-6',
                'offset' => 'col-sm-offset-0',
            ]]
            )->textInput(['id' => 'item_date3','style' => 'height: 25px;border: none;'])->label(false); ?>

                    </div>
                </div>


                <!-- End panel body -->
            </div>
            <!-- End panel -->
        </div>
        <!-- End Menu11 -->
    </div>

    <!-- start menu11 -->
    <div id="menu12" class="tab-pane fade">
        <!-- Target of control -->
        <br>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="far fa-edit"></i> Target of control</h3>
            </div>
            <!-- start panel-body -->
            <div class="panel-body shadow">

                <!-- start row  -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <?= $form->field($model, 'target_of_control[a1c]',
             ['horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'wrapper' => 'col-sm-6',
                'offset' => 'col-sm-offset-0',
            ]]
            )->textInput(['style' => ''])->label('A1C'); ?>
                    </div>
                </div>
                <!-- End row -->

                <!-- start row -->
                <div class="row">
                    <!-- start col-2 -->
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <?= $form->field($model, 'target_of_control[bp1]',
             ['horizontalCssClasses' => [
                'label' => 'col-sm-6',
                'wrapper' => 'col-sm-6',
                'offset' => 'col-sm-offset-0',
            ]]
            )->textInput(['id' => 'item_date3','style' => ''])->label('BP'); ?>

                    </div>
                    <!-- End col-2 -->
                    <!-- start col-2 -->
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <?= $form->field($model, 'target_of_control[bp2]',
             ['horizontalCssClasses' => [
                'label' => 'col-sm-3',
                'wrapper' => 'col-sm-9',
                'offset' => 'col-sm-offset-0',
            ]]
            )->textInput(['id' => 'item_date3','style' => ''])->label(false); ?>

                    </div>
                    <!-- end col-2 -->
                </div>
                <!-- end row -->


                <!-- start row  -->
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <?= $form->field($model, 'target_of_control[ldlc]',
             ['horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'wrapper' => 'col-sm-6',
                'offset' => 'col-sm-offset-0',
            ]]
            )->textInput(['style' => ''])->label('LDL-C'); ?>
                    </div>
                </div>
                <!-- End row -->
            </div>
            <!-- End panel body -->
        </div>
        <!-- End panel -->

    </div>
    <!-- End Menu11 -->

    <!-- start menu11 -->
    <!-- <div id="menu13" class="tab-pane fade">

    
    </div> -->
    <!-- End Menu13 -->

    <!-- start menu11 -->
    <div id="menu14" class="tab-pane fade">
        <br>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fas fa-list-ul"></i> Drug use</h3>
            </div>
            <div class="panel-body">

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Drug use</th>
                            <th>ทำมาแล้วเมื่อ</th>
                            <th>วดป</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>ACEI</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>ARB</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Statin</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>


    </div>
    <!-- End Menu11 -->

</div>


<?php ActiveForm::end(); ?>
<?php
// $now_date = Date('m-d');
$js = <<< JS
EyeLastInhospital();
EyeLastOuthospital();


var today = new Date();
var dd = today.getDate();

var mm = today.getMonth(); 
var yyyy = today.getFullYear()+543;
if(dd<10) 
{
    dd='0'+dd;
} 

if(mm<10) 
{
    mm='0'+mm;
} 
today = dd+'/'+mm+'/'+yyyy;
// console.log(today);
// today = mm+'/'+dd+'/'+yyyy;
// console.log(today);
// today = dd+'-'+mm+'-'+yyyy;
// console.log(today);
// today = dd+'/'+mm+'/'+yyyy;
console.log(today);






$(".macrovascular-items").click(function(e, parameters) {

var nonUI = false;
try {
    nonUI = parameters.nonUI;
} catch (e) {}
var checked = nonUI ? !this.checked : this.checked;
// alert('Checked = ' + checked);
var value = e.target.value;

// console.log(parameters.nonUI);


// console.log(this.prop("checked"));
// $('#item_date'+value).val('xx')
if(checked == true){
//     if(value == 2){
//         $("#dm_type").show();
//     }
//     if(value == 3){
//         $("#thyroid_type").show();
//     }
//    console.log('checked'+value);
   $('#item_date'+value).val(today);

}else{
//    console.log('Uncheck'+value);
   $('#item_date'+value).val('');


//    if(value == 2){
//         $("#dm_type").hide();
//         $("#dm_type_form").val(null).trigger('change');
//     }
//     if(value == 3){
//         $("#thyroid_type").hide();
//         $("#thyroid_type_form").val(null).trigger('change');
//     }

}
});





$('#save-dmindicator').click(function (e) { 
    e.preventDefault();
    
    $.confirm({
    title: 'ยืนยันการบันทึก!',
    buttons: {
        confirm: function () {
            saveDmindicator();
        },
        cancel: function () {
            
        },
    }
});
// saveDmindicator();
    
});

function EyeLastInhospital(){
$.ajax({
  type: "get",
  url: "index.php?r=dmindicator/dmindicators/eye-last-in-hospital",
  dataType: "json",
  success: function (response) {
    $('#EyelastInHospital').html(response.data);
    $('#EyelastInHospitalLastDate').html(response.last_date)
    $('#in_hos_created_at').html(response.created_at)
   
  }
});
}

function EyeLastOuthospital(){
$.ajax({
  type: "get",
  url: "index.php?r=dmindicator/dmindicators/eye-last-out-hospital",
  dataType: "json",
  success: function (response) {
    $('#EyelastOutHospital').html(response.data);
    $('#EyelastOutHospitalLastDate').html(response.created_last);
    $('#EyelastOutHospitalDate').html(response.created_date);
    // console.log(response.created_date)
  }
});
}

function saveDmindicator(){
    // alert('Save');
    var form = $('#form-dmindicator');
    var url = form.attr('action')
$.ajax({
    type: "post",
    url:url,
    data: form.serialize(),
    dataType: "json",
    success: function (response) {
       $.alert('บัรทึกสำเร็จ!');
        
    }
});
}


JS;
$this->registerJS($js);

?>