<?php
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'ตั้งค่าระบบ';
?>
<style>
.panel-primary {
    border-color: #9e9e9e3b;;
    box-shadow: 0 0.15rem 1.75rem 0 rgba(58,59,69,.15);
}
.panel-primary > .panel-heading {
    color: #fff;
    background-color: #017bfe;
    border-color: #017bfd;
}
.shadow {
    -webkit-box-shadow: 0 .15rem 1.75rem 0 rgba(58,59,69,.15)!important;
    box-shadow: 0 .15rem 1.75rem 0 rgba(58,59,69,.15)!important;
}
.p-menu {
    /* background-color: #eee;
    padding: 10px; */
}
.p-menu:hover {
    color:#007bff;
}
</style>

<?php

?>
<div class="row">
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        
        <div class="panel panel-primary">
              <div class="panel-heading">
                    <h3 class="panel-title">Menu Setting</h3>
              </div>
              <div class="panel-body">
                    <a href="#" class="p-menu" url="<?=Url::to(['/settings/department'])?>">ผู้ใช้งานระบบ</a><br>
                    <a href="#" class="p-menu" url="<?=Url::to(['/settings/department'])?>">แผนก / คลินิก</a>
              </div>
        </div>
        
    </div>
    
    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
        <div id="show-data">
        
        <div class="panel panel-primary" style="height: 530px;">
              <div class="panel-heading">
                    <h3 class="panel-title">แสดงการตั้งค่าระบบ</h3>
              </div>
              <div class="panel-body">
              <h3 class="text-center">การตั้งค่าระบบ</h3>
        <?=Html::img('@web/img/settings.svg',['style' => 'width:36%;margin-left: 37%;'])?>
              </div>
        </div>
        
        </div>


        <div class="show-setting">
    </div> <!-- cdepartment-index -->

    </div>
</div>

<?php
$loadding = Html::img('@web/img/loading.gif',['style' => 'padding: 38%;padding-top: 10%;']);

$js = <<< JS
$(function(){
    
    $('.p-menu').click(function (e) { 
        var url = $(this).attr('url');
        // e.preventDefault();
        console.log(url);
        $.ajax({
            type: "get",
            url:url ,
            beforeSend:function(){
                $('#show-data').html('$loadding');
            },
            dataType:'json',
            success: function (response) {
                $('#show-data').html(response);
                
            }
        });
        
    });

// 
});

// $.pjax.reload({container: response.forceReload});
$('#crud-datatable-pjax').on('pjax:complete', function() {
    alert();

});

JS;
$this->registerJS($js);
?>