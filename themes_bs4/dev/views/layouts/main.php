<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use kartik\bs4dropdown\Dropdown;
use yii\widgets\Breadcrumbs;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;

use app\assets\DevAsset;
use app\widgets\Alert;

use app\components\UserHelper;
use app\components\PatientHelper;

DevAsset::register($this);
$hn = PatientHelper::getCurrentHn();

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link href="https://fonts.googleapis.com/css?family=Kanit:300,400|Prompt:300,400&display=swap|Nunito:300,400&display=swap" rel="stylesheet">
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:300,400&display=swap" rel="stylesheet"> -->
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<style>
body{
    font-family: 'Kanit', sans-serif;

/* font-family: 'Prompt', sans-serif;
background-color: #e7e8ec99;
margin: 0;
    /* font-family: Nunito,sans-serif; */
    font-size: .875rem;
    font-weight: 400;
    line-height: 1.5;
    color: #6c757d;
    text-align: left;
    background-color: #fafbfe;
}
.container{
    width:95%;
    max-width: none;
}
.bg-dark {
    background-image: linear-gradient( 135deg, #17a2b8 10%, #cbc8cc 100%);
}

.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
    margin: 10px 0;
    font-weight: 700;
    /* color: #98a6ad!important; */
    color: #98a6ad;
}

.tasks .card {
    white-space: normal;
    margin-top: 1rem;
}

.card {
    border: none;
    -webkit-box-shadow: 0 0 35px 0 rgba(154,161,171,.15);
    box-shadow: 0 0 35px 0 rgba(154,161,171,.15);
    margin-bottom: 30px;
}
.mb-0, .my-0 {
    margin-bottom: 0!important;
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
    border: 1px solid #e3eaef;
    border-radius: .25rem;
}
.align-items-center {
    -webkit-box-align: center!important;
    -ms-flex-align: center!important;
    align-items: center!important;
}

.text-body {
    color: #6c757d!important;
}
a, button {
    outline: 0!important;
}
.text-muted {
    color: #98a6ad!important;
}

.font-weight-normal {
    font-weight: 400!important;
}
.mt-0, .my-0 {
    margin-top: 0!important;
}

</style>

<?php Modal::begin([
        'id' => 'main-modal',
        'header' => '<h4 class="modal-title"></h4>',
        'size'=>'modal-lg',
        'footer' => '',
        'clientOptions' => ['backdrop' => 'static', 'keyboard' => false],
        ]);
        Modal::end();
        ?>




<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '<img src="img\logo-02.png"style="height: 40px;margin-top: -10px;"/>',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            // 'class' => 'fixed-top navbar-expand-md navbar-light bg-light',
            // 'class' => 'fixed-top navbar-expand-md navbar-dark bg-dark' ,
            // 'class' => 'fixed-top navbar-expand-md navbar-light bg-light shadow',
            'class' => 'navbar-inverse navbar-fixed-top',
            'style' => 'margin-left: -63px;'
        ],
    ]);
    $menuItems = [
        // ['label' => 'Home', 'url' => ['/site/index']],
        // ['label' => 'About', 'url' => ['/site/about']],
        // ['label' => 'Contact', 'url' => ['/site/contact']],
        
    ];
    // if (Yii::$app->user->isGuest) {
    //     $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
    //     $menuItems[] = ['label' => 'Login', 'url' => ['/user/security/login']];
    // } else {
    //     $menuItems[] = '<li>'
    //         . Html::beginForm(['/site/logout'], 'post')
    //         . Html::submitButton(
    //             'Logout (' . Yii::$app->user->identity->username . ')',
    //             ['class' => 'btn btn-link logout']
    //         )
    //         . Html::endForm()
    //         . '</li>';
    // }
    ?>
        <!-- <form class="navbar-form navbar-left" action="/action_page.php">
    <div class="form-group has-feedback search">
        <input type="text" class="form-control" placeholder="Search" />
        <i class="glyphicon glyphicon-search form-control-feedback"></i>
    </div>
</form> -->

<?php if (!\Yii::$app->user->isGuest): ?>

<?php if (empty($hn)): ?>
            <div style="padding-top:0px">
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
    <?php endif; ?>
    <?php endif; ?>


    <div style="color: white;margin-left: 17px;margin-top:0px;">
                                <h5 style="color:#e9ecef;">
                                    <?= empty($this->params['pt_title']) ? '' : $this->params['pt_title'] ?>
                                    <?php if (!empty($hn)): ?>
                                        <?php // Html::a('  <i class="fas fa-power-off"></i>', ['/site/index'], ['style' => 'color:white', 'title' => 'ยกเลิกให้บริการ','class' => 'btn btn-sm btn-danger']) ?>
                                    <?php endif; ?>
                                </h5>

                            </div>


    <?php
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav mr-auto'],
        'items' => $menuItems,
    ]);


    $menuItems_right = [
        ['label' => 'Home', 'url' => ['/site/index']],
        // [
        //     'label' => 'Dropdown', 
        //     'items' => [
        //         ['label' => 'Section 1', 'url' => '/'],
        //         ['label' => 'Section 2', 'url' => '#'],
        //         [
        //              'label' => 'Section 3', 
        //              'items' => [
        //                  ['label' => 'Section 3.1', 'url' => '/'],
        //                  ['label' => 'Section 3.2', 'url' => '#'],
        //                  [
        //                      'label' => 'Section 3.3', 
        //                      'items' => [
        //                          ['label' => 'Section 3.3.1', 'url' => '/'],
        //                          ['label' => 'Section 3.3.2', 'url' => '#'],
        //                      ],
        //                  ],
        //              ],
        //          ],
        //     ],
        // ],
        // ['label' => 'zzAbout', 'url' => ['/site/about']],
        
    ];

        if (Yii::$app->user->isGuest) {
        $menuItems_right[] = ['label' => 'Login', 'url' => ['/user/security/login']];
    } else {
        $menuItems_right[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . UserHelper::getUser('fullname') ? UserHelper::getUser('fullname') : \Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    ?>

    <?php
    echo Nav::widget([
        'items' => $menuItems_right,
        'dropdownClass' => Dropdown::classname(), // use the custom dropdown
        // 'options' => ['class' => 'navbar-nav mr-auto'],
        'options' => ['class' => 'my-2 my-md-0 mr-md-3'],
    ]);

    NavBar::end();
    ?>

    <?=$this->render('@app/components/_toolbar'); ?>


</div>

    <div class="container" style="margin-top: 10px;width: 100%;">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>



<footer class="footer">
    <div class="container">
        <p class="float-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>