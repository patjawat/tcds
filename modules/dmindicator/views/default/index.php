<?php
use yii\bootstrap\ActiveForm;
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

.panel-primary {
    border-color: #eaeaea;
}

.panel-success {
    border-color: #eaeaea;
}

.panel-info {
    border-color: #eaeaea;
}

.panel-primary>.panel-heading {
    color: #fff;
    background-color: #007bff;
    border-color: #ffffff;
}

.panel-info>.panel-heading {
    color: #fff;
    background-color: #17a2b8;
    border-color: #ffffff;
}

.panel-success>.panel-heading {
    color: #fff;
    background-color: #28a745;
    border-color: #ffffff;
}

.panel-default>.panel-heading {
    color: #333333;
    background-color: #ececec;
    border-color: #ddd;
}
</style>

<h2>DM Indicators</h2>


<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Kidney</a></li>
    <li><a data-toggle="tab" href="#menu1"> Eye</a></li>
    <li><a data-toggle="tab" href="#menu2"> Neuropathy and Vaseular</a></li>
    <li><a data-toggle="tab" href="#menu3">BP</a></li>
    <li><a data-toggle="tab" href="#menu4">A1C</a></li>
    <li><a data-toggle="tab" href="#menu5">Lipid</a></li>
    <li><a data-toggle="tab" href="#menu6">Smoking</a></li>
    <li><a data-toggle="tab" href="#menu7">Flu vaccine</a></li>
    <li><a data-toggle="tab" href="#menu8">ESRD</a></li>
    <li><a data-toggle="tab" href="#menu9">Blindness</a></li>
    <li><a data-toggle="tab" href="#menu10">Foot and Toe</a></li>
    <li><a data-toggle="tab" href="#menu11">Macrovascular</a></li>
    <li><a data-toggle="tab" href="#menu12">Target of control</a></li>
    <li><a data-toggle="tab" href="#menu13">TDS</a></li>
    <li><a data-toggle="tab" href="#menu14">Drug use</a></li>
</ul>

<?php $form = ActiveForm::begin([
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
<div class="tab-content">
    <!-- Home Content -->
    <div id="home" class="tab-pane fade in active">
        <h3>kidney</h3>
        <?=$this->render('./kidney');?>
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
                            <p class="pull-left">In Hospital <code>ทำมาแล้วเมื่อ 11 วัน 12 เดือน 2 ปี </code></p>
                            <p class="pull-right"><i class="fas fa-calendar"></i> 20/08/2562</p>
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
                            <p class="pull-left">Out Hospital</p>
                            <p class="pull-right"><i class="fas fa-calendar"></i> 20/08/2562</p>
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
                        <?= $form->field($model, 'eye_out_hos[glaucerna_ye]')->inline()->checkboxList(['Rt' => 'Rt','Rl' => 'Rl'])->label('Yes'); ?>
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
                            <p class="pull-left">Out Hospital <code>ทำมาแล้วเมื่อ 11 วัน 12 เดือน 2 ปี </code></p>
                            <p class="pull-right"><i class="fas fa-calendar"></i> 20/08/2562</p>
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
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

                <div class="shadow card">

                    <!-- start row -->
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <p class="text-center">Rt</p>
                            <?= $form->field($model, 'neuropathy_vaseular[mnf_rt]')->inline()->radioList(['Intact' => 'Intact','Dimish' => 'Dimish','Impair' => 'Impair'])->label('MNF'); ?>
                            <?= $form->field($model, 'neuropathy_vaseular[vt_rt]')->inline()->radioList(['Intact' => 'Intact','Dimish' => 'Dimish','Impair' => 'Impair'])->label('VT'); ?>
                            <?= $form->field($model, 'neuropathy_vaseular[dp_rt]')->inline()->radioList(['0' => '0','1' => '1','2' => '2'])->label('DP'); ?>
                            <?= $form->field($model, 'neuropathy_vaseular[pt_rt]')->inline()->radioList(['0' => '0','1' => '1','2' => '2'])->label('PT'); ?>

                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <p class="text-center">Lt</p>
                            <?= $form->field($model, 'neuropathy_vaseular[mnf_lt]')->inline()->radioList(['Intact' => 'Intact','Dimish' => 'Dimish','Impair' => 'Impair'])->label(false); ?>
                            <?= $form->field($model, 'neuropathy_vaseular[vt_lt]')->inline()->radioList(['Intact' => 'Intact','Dimish' => 'Dimish','Impair' => 'Impair'])->label(false); ?>
                            <?= $form->field($model, 'neuropathy_vaseular[dp_lt]')->inline()->radioList(['0' => '0','1' => '1','2' => '2'])->label(false); ?>
                            <?= $form->field($model, 'neuropathy_vaseular[pt_lt]')->inline()->radioList(['0' => '0','1' => '1','2' => '2'])->label(false); ?>

                        </div>
                    </div>
                    <!-- End Row -->


                </div>
                <!-- end container -->
            </div>
        </div>
        <!-- End Row -->
        <br>
        <?=$this->render('neuropathy_aseular');?>

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
        <!-- smoking -->
        <br>
        <!-- start Row -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

                <div class="shadow card">
                    <?= $form->field($model, 'smoking[check]')->checkboxList($model->getItemSmoking()); ?>
                    <?= $form->field($model, 'smoking[how_long_ago]')->checkboxList($model->getItemHowLongAgo())->label('How long ago?'); ?>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">

                <?=$this->render('smoking');?>

            </div>
            <!-- End Col-8 -->
        </div>
        <!-- End Row -->

    </div>
    <!-- End Menu6 -->

    <!-- start menu7 -->
    <div id="menu7" class="tab-pane fade">

        <?= $form->field($model, 'flu_vaccine',[
        'horizontalCssClasses' => [
            'offset' => 'col-sm-offset-0',
            'label' => 'col-sm-1',
            'wrapper' => 'col-sm-2',
        ]
    ])->checkbox()->label('Out-hotpital'); ?>

        <?=$this->render('flu_vaccine');?>
    </div>
    <!-- End Menu7 -->

    <!-- start menu8 -->
    <div id="menu8" class="tab-pane fade">
        <?= $form->field($model, 'esrd',[
        'horizontalCssClasses' => [
            'offset' => 'col-sm-offset-0',
            'label' => 'col-sm-1',
            'wrapper' => 'col-sm-2',
        ]
    ])->checkbox()->label('ESRD'); ?>
    </div>
    <!-- End Menu8 -->

    <!-- start menu9 -->
    <div id="menu9" class="tab-pane fade">

        <div class="row">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <?= $form->field($model, 'blindness[Rt]',[
        'horizontalCssClasses' => [
            'offset' => 'col-sm-offset-0',
            'label' => 'col-sm-1',
            'wrapper' => 'col-sm-2',
        ]
    ])->checkbox()->label('Rt'); ?>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <?= $form->field($model, 'blindness[Lt]',[
        'horizontalCssClasses' => [
            'offset' => 'col-sm-offset-0',
            'label' => 'col-sm-1',
            'wrapper' => 'col-sm-2',
        ]
    ])->checkbox()->label('Lt'); ?>
            </div>
        </div>


    </div>
    <!-- End Menu9 -->

    <!-- start menu10 -->
    <div id="menu10" class="tab-pane fade">

        <div class="row">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <?= $form->field($model, 'smoking[how_long_ago]')->checkboxList($model->getItemFootAndToe())->label('Rt'); ?>

            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <?= $form->field($model, 'smoking[how_long_ago]')->checkboxList($model->getItemFootAndToe())->label('Lt'); ?>

            </div>
        </div>


    </div>
    <!-- End Menu10 -->

    <!-- start menu11 -->
    <div id="menu11" class="tab-pane fade">
        <br>
        <!-- start Row1 -->
        <div class="row">
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                <?= $form->field($model, 'macrovascular[mi]')->checkbox()->label('MI'); ?>
            </div>

            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <?= $form->field($model, 'macrovascular[mi_date]')->textInput(['disabled' => true])->label(false); ?>
            </div>
        </div>
        <!-- End Row1 -->
        <!-- start Row2 -->
        <div class="row">
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                <?= $form->field($model, 'macrovascular[stroke]')->checkbox()->label('Stroke'); ?>
            </div>

            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <?= $form->field($model, 'macrovascular[stroke_date]')->textInput(['disabled' => true])->label(false); ?>
            </div>
        </div>
        <!-- End Row2 -->
        <!-- start Row3 -->
        <div class="row">
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                <?= $form->field($model, 'macrovascular[pad]')->checkbox()->label('PAD'); ?>
            </div>

            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <?= $form->field($model, 'macrovascular[pad_date]')->textInput(['disabled' => true])->label(false); ?>
            </div>
        </div>
        <!-- End Row3 -->


    </div>
    <!-- End Menu11 -->

    <!-- start menu11 -->
    <div id="menu12" class="tab-pane fade">
    <br>
        <!-- start Row1 -->
        <div class="row">
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <?= $form->field($model, 'target_of_control[a1c]')->checkbox()->label('A1C'); ?>
            </div>

            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <?= $form->field($model, 'target_of_control[a1c_date]')->textInput(['disabled' => true])->label(false); ?>
            </div>
        </div>
        <!-- End Row1 -->
        <!-- start Row2 -->
        <div class="row">
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <?= $form->field($model, 'target_of_control[bp]')->checkbox()->label('BP'); ?>
            </div>

            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <?= $form->field($model, 'target_of_control[bp_date]')->textInput(['disabled' => true])->label(false); ?>
            </div>
        </div>
        <!-- End Row2 -->
        <!-- start Row3 -->
        <div class="row">
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <?= $form->field($model, 'macrovascular[ldl_c]')->checkbox()->label('LDL-C'); ?>
            </div>

            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <?= $form->field($model, 'macrovascular[ldl_c_date]')->textInput(['disabled' => true])->label(false); ?>
            </div>
        </div>
        <!-- End Row3 -->
    </div>
    <!-- End Menu12 -->

    <!-- start menu11 -->
    <div id="menu13" class="tab-pane fade">
    <br>
        <!-- start Row1 -->
        <div class="row">
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <?= $form->field($model, 'tds[unsuitable]')->checkbox()->label('Unsuitable'); ?>
            </div>

            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <?= $form->field($model, 'tds[unsuitable_date]')->textInput(['disabled' => true])->label(false); ?>
            </div>
        </div>
        <!-- End Row1 -->
        <!-- start Row2 -->
        <div class="row">
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <?= $form->field($model, 'tds[other_hospital]')->checkbox()->label('Other hospital'); ?>
            </div>

            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <?= $form->field($model, 'tds[other_hospital_date]')->textInput(['disabled' => true])->label(false); ?>
            </div>
        </div>
        <!-- End Row2 -->
        <!-- start Row3 -->
        <div class="row">
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <?= $form->field($model, 'tds[dead_c]')->checkbox()->label('Dead'); ?>
            </div>

            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <?= $form->field($model, 'tds[dead_c_date]')->textInput(['disabled' => true])->label(false); ?>
            </div>
        </div>
        <!-- End Row3 -->
    </div>
    <!-- End Menu13 -->

    <!-- start menu14 -->
    <div id="menu14" class="tab-pane fade">
        14
    </div>
    <!-- End Menu14 -->

</div>


<?php ActiveForm::end(); ?>
<?php
$js = <<< JS
EyeLastInhospital();
EyeLastOuthospital();


function EyeLastInhospital(){
$.ajax({
  type: "get",
  url: "index.php?r=dmindicator/dmindicators/eye-last-in-hospital",
  dataType: "json",
  success: function (response) {
    $('#EyelastInHospital').html(response);
  }
});
}

function EyeLastOuthospital(){
$.ajax({
  type: "get",
  url: "index.php?r=dmindicator/dmindicators/eye-last-out-hospital",
  dataType: "json",
  success: function (response) {
    $('#EyelastOutHospital').html(response);
  }
});
}




JS;
$this->registerJS($js);

?>