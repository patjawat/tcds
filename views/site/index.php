<?php

use app\components\loading\ShowLoading;
use yii\widgets\ActiveForm;
use yii\data\ArrayDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\DataTableAsset;
use app\components\DbHelper;
use app\components\FormatYear;
use app\components\PatientHelper;
use app\components\HisApiHelper;
use app\components\DateTimeHelper;
use app\modules\opdvisit\models\OpdVisit;

use JsonRpc as Rpc;

$this->title = 'ทะเบียนผู้รับบริการ';
$this->params['pt_title'] = '<i class="fa fa-wheelchair" aria-hidden="true"></i> กรุณาเลือกผู้เข้ารับบริการ';
?>
<h3><i class="fas fa-user-edit"></i> <?= Html::encode($this->title) ?></h3>
<div class="card mb-4 py-3 border-left-primary shadow h-100 py-2">
    <div class="card-body">
<div id="showVisit"></div>
</div>
</div>

<?php
$url = Url::to(['/opdvisit/default/list']);
$js = <<< JS
    setDepartment();
    var department = localStorage.getItem("department");
    $.ajax({
        type: "get",
        url:"$url",
        beforeSend:function(){
            // $('#showVisit').hide();
            $('#showVisit').html('<img src="img/loading.gif" style="padding-left:45%;padding-top:8%;" />');
        },
        data:{department:department},
        dataType: "json",
        success: function (response) {
            // $('#showLoadding').hide();
            // $('#showVisit').show();
            $('#showVisit').html(response)

        }
    });


    function setDepartment(){
        var val = localStorage.getItem("department");
            // console.log(val);
            localStorage.setItem("department",val);
            $.ajax({
                type: "get",
                url: "index.php?r=site/set-department",
                data:{
                    department:val
                },
                dataType: "json",
                success: function (response) {


                }
            });
    }
JS;
$this->registerJs($js);
