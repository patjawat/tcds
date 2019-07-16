<?php
/* @var $this \yii\web\View */
/* @var $content string */

//
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\DevAsset;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use cenotia\components\modal\RemoteModal;
use lavrentiev\widgets\toastr\NotificationFlash;
use app\components\UserHelper;


use app\components\PatientHelper;

DevAsset::register($this);
// \yii\bootstrap\BootstrapAsset::register($this);
$hn = PatientHelper::getCurrentHn();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="./img/medico.ico" type="image/x-icon"/>
        <link rel="shortcut icon" href="./img/medico.ico" type="image/x-icon"/>
        <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
        <style>

           #main-remote > .modal-dialog {
               width:65%;
           }
            #user-display > a:link {
                color: white;
            }

            /* visited link */
            #user-display > a:visited {
                color: white;
            }

            /* mouse over link */
            #user-display > a:hover {
                color: whitesmoke;
            }

            /* selected link */
            #user-display > a:active {
                color: whitesmoke;
            }

            .breadcrumb > li + li:before {
                content: "|" !important;
            }
            .nav > li > a {
                position: relative;
                display: block;
                padding: 10px 15px;
                color: #eee;
            }

            .nav > li > a:hover, .nav > li > a:focus {
                text-decoration: none;
                background-color: #ffffff;
                color: #505f70;
            }



            /* custom card */
            .border-left-primary {
    border-left: .25rem solid #4e73df!important;
}
.border-left-success {
    border-left: .25rem solid #1cc88a!important;
}
.border-left-info {
    border-left: .25rem solid #36b9cc!important;
}
.border-left-warning {
    border-left: .25rem solid #f6c23e!important;
}
.border-left-danger {
    border-left: .25rem solid #e74a3b!important;
}

.border-bottom-danger {
    border-bottom: .25rem solid #e74a3b!important;
}

.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}

.pb-2, .py-2 {
    padding-bottom: .5rem!important;
}
.pt-2, .py-2 {
    padding-top: .5rem!important;
}
.h-100 {
    height: 100%!important;
}
.shadow {
    -webkit-box-shadow: 0 .15rem 1.75rem 0 rgba(58,59,69,.15)!important;
    box-shadow: 0 .15rem 1.75rem 0 rgba(58,59,69,.15)!important;
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
    -webkit-box-align: center!important;
    -ms-flex-align: center!important;
    align-items: center!important;
}
.no-gutters {
    margin-right: 0;
    margin-left: 0;
}
.no-gutters>.col, .no-gutters>[class*=col-] {
    padding-right: 0;
    padding-left: 0;
}
.mr-2, .mx-2 {
    margin-right: .5rem!important;
}
.text-xs {
    font-size: 1.4rem;
}
.text-primary {
    color: #4e73df!important;
}
.font-weight-bold {
    font-weight: 700!important;
}
.dropdown .dropdown-menu .dropdown-header, .sidebar .sidebar-heading, .text-uppercase {
    text-transform: uppercase!important;
}
.mb-1, .my-1 {
    margin-bottom: .25rem!important;
}

.text-gray-800 {
    color: #5a5c69!important;
}
.font-weight-bold {
    font-weight: 700!important;
}
.mb-0, .my-0 {
    margin-bottom: 0!important;
}

.align-items-center {
    -webkit-box-align: center!important;
    -ms-flex-align: center!important;
    align-items: center!important;
}
.no-gutters {
    margin-right: 0;
    margin-left: 0;
}
.no-gutters>.col, .no-gutters>[class*=col-] {
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
    border-bottom: .25rem solid #4e73df!important;
}
.pb-3, .py-3 {
    padding-bottom: 1rem!important;
}
.pt-3, .py-3 {
    padding-top: 1rem!important;
}
.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}

#toast-container {
    position: fixed;
    z-index: 999999;
    pointer-events: none;
    margin-top: 7%;
}

        </style>
        <?= Html::csrfMetaTags() ?>
        <title>MedicoNG Dev</title>
        <?php $this->head() ?>
    </head>
    <body style="font-family: 'Kanit', sans-serif;background-color:#f8f9fa;">
        <?php $this->beginBody() ?>
        <?php Modal::begin([
        'id' => 'main-modal',
        'header' => '<h4 class="modal-title"></h4>',
        'size'=>'modal-lg',
        'footer' => '',
        'clientOptions' => ['backdrop' => 'static', 'keyboard' => false],
        ]);
        Modal::end();
        ?>
        <?php //Modal::begin([
        // 'id' => 'drug-alert-modal',
        // 'header' => '<h4 class="modal-title"></h4>',
        // 'size'=>'modal-lg',
        // 'footer' => '',
        // 'clientOptions' => ['backdrop' => 'static', 'keyboard' => false],
        // ]);
        // Modal::end();
        ?>
        <?php RemoteModal::begin([
        "id"=>"alert-remote",
        "options"=> [ "class"=>"fade"],
        'size'=>'modal-lg',
        "footer"=>"", // always need it for jquery plugin
        ])?>
      <?php RemoteModal::end(); ?>
              <?php RemoteModal::begin([
              "id"=>"main-remote",
              "options"=> [ "class"=>"fade slide-right "],
              "footer"=>"", // always need it for jquery plugin
              ])?>
      <?php RemoteModal::end(); ?>

<nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= Url::to(['/site/landing']) ?>"><img src="img\logo-02.png"style="height: 40px;margin-top: -10px;"/></a>

                </div>
                <div id="navbar" class="collapse navbar-collapse" style="margin-left:10px;">
                    <ul class="nav navbar-nav">
                    
                    <?php if (!\Yii::$app->user->isGuest): ?>

                <?php if (empty($hn)): ?>
                        <li>
                            <div style="padding-top: 10px">
                                <?php
                                $form = ActiveForm::begin([
                                            'method' => 'POST',
                                            // 'action' => Url::to(['/patient/search/api']),
                                            'action' => Url::to(['/opdvisit/opd-visit/api']),
                                            'options' => ['class' => 'form-inline'],
                                            'id' => 'form-search'
                                ]);
                                ?>
                                <div class="form-group">
                                    <input type="text" name="hn" id="hn" class="form-control"  placeholder="HN" value="<?=$hn;?>">
                                    <input type="hidden" name="dep" id="dep" class="form-control"  value="">
                                </div>
                                <?php if (empty($hn)): ?>
                                    <button type="submit" class="btn btn-default" ><i class="glyphicon glyphicon-search"></i></button>
                                <?php else: ?>
                                    <button type="submit" class="btn btn-default" disabled title='กรุณายกเลิกให้บริการคนปัจจุบัน'><i class="glyphicon glyphicon-search"></i></button>
                                <?php endif; ?>

                                <?php ActiveForm::end() ?>
                            </div>
                        </li>
                    <?php endif; ?>
                    <?php endif; ?>

                        <li>
                            <div style="color: white;margin-left: 17px;margin-top:0px;">
                                <h4>
                                    <?= empty($this->params['pt_title']) ? '' : $this->params['pt_title'] ?>
                                    <?php if (!empty($hn)): ?>
                                        <?php // Html::a('  <i class="fas fa-power-off"></i>', ['/site/index'], ['style' => 'color:white', 'title' => 'ยกเลิกให้บริการ','class' => 'btn btn-sm btn-danger']) ?>
                                    <?php endif; ?>
                                </h4>

                            </div>
                        </li>

                    </ul>
                    <ul class="nav navbar-nav navbar-right" style="padding-right: 20px;">
                        <?php  if (PatientHelper::getCurrentCountDrugAllergy() > 0): ?>
                      <li>
                        <?php 
                        echo Html::a('<i class="faa-horizontal animated fa fa-bell"  style="font-size:20px;color:white;">
                        </i>', null, ['role' => 'alert-remotex','class' => 'patient-alert'])
                        ?>
                        <!-- <span class="badge" style="background-color: #ff5722;">'.PatientHelper::getCurrentCountDrugAllergy().'</span> -->
                      </a>
                    </li>
                    <?php  endif; ?>
                        <?php if (\Yii::$app->user->isGuest): ?>

                        <?php else: ?>
                        <li style="padding-right: 30px;">
                        <?=Html::a('<i class="fa fa-user"  style="font-size:20px;color:white;">
                        <span class="badge" style="background-color: #ff5722;">'.PatientHelper::getVisitCount().'</span>
                        </i>', ['/site/queue'], ['role' => 'main-remote'])?>
                        </li>
                        <?php endif; ?>

                        <!-- <li><img src="img\profile.png" height="40px" class="img-circle" style="padding-top: 6px;" /></li> -->
                        <li><i class="fas fa-fingerprint" style="font-size: 25px;margin-top: 12px;"></i></li>
                        <li  style="padding-top: 5px;padding-left: 5px;">
                            <h4>
                                <div id='user-display'>
                                    <?php if (\Yii::$app->user->isGuest): ?>
                                        <?= Html::a('Login', ['/user/security/login']) ?>
                                    <?php else: ?>
                                        <?= Html::a(UserHelper::getUser('fullname') ? UserHelper::getUser('fullname') : \Yii::$app->user->identity->username, ['/site/about']) ?> |  <span id="show-department"></span>
                                    <?php endif; ?>
                                </div>
                            </h4>
                        </li>
                    </ul>
                </div><!--/.nav-collapse -->

            </div>
        </nav>


        <!-- <div style="width: 100%; margin-top: 50px;position:fixed;z-index: 10;" > -->
        <div style="width: 100%; margin-top: 50px;" >

        <nav class="navbar navbar-default" role="navigation" style="margin-left: -1px;background-color: #525f6f">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- <a class="navbar-brand" href="#" style="color: #ffffff;"><?php //$this->title;?></a> -->
    </div>
    <!-- Group the nav links, forms, drop-down menus and other elements for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="margin-left:10px;">
            <?=$this->render('@app/components/_toolbar'); ?>
      </ul>


    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>

<?php

$js = <<< JS
//  ตรวจสอบ การตั้งค่าแผนก/คลินิก ######################
var department = localStorage.getItem("department");



$('#dep').val(department);
if(department === null){
    $('#show-content').hide();
}else{
    $('#show-content').show();
    $('#show-department').html(localStorage.getItem("department"));
}

$('#show-department').click(function(){
    $("#activity-modal").modal("show");
    $('#department').val(localStorage.getItem("department")).trigger('change');
});



// ค้นหาผู้มารับบริการ ########################
$("#form-search").submit(function(event) {
    event.preventDefault(); // stopping submitting
    var data = $(this).serializeArray();
    var url = $(this).attr('action');
    $.ajax({
        url: url,
        type: 'post',
        // dataType: 'json',
        beforeSend: function(){
            $('#main-modal').modal('show');
            $('.modal-title').html('กรุณารอสักครู่...');
            $('.modal-body').html('<div class="progress"><div class="progress-bar progress-bar-striped active" role="progressbar"aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div></div>')
        },
        data: data
    })
    .done(function(response) {
        if (response.error == true) {
            $('.modal-title').html('การแจ้งเตือน');
            $('#main-modal').modal('show');
            $('.modal-body').html(response.content)
        }

    })
    .fail(function() {
        console.log("error");
    });

});

JS;
$this->registerJS($js);
?>
        <div id="show-content"  style="width: 97%;margin: 0 auto;">

            <?=
            Breadcrumbs::widget([
                'homeLink' => false,
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ])
            ?>

            <?php echo \yii2mod\notify\BootstrapNotify::widget(); ?>
            <?= $content ?>
        </div><!-- /.container -->


        <div class="config-department" style="margin-top: 151px;">
        <?php echo $this->render('@app/views/site/change_name');?>
        </div>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
