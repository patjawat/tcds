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

<h1>

<?php
// outputs the username that owns the running php/httpd process
// (on a system with the "whoami" executable in the path)
$data =  exec('mkdir /Users/patjawat/dev/scriptsoft/medicong-dev/views/site');
// print_r($data);
?>

</h1>
<h1><?php //DateTimeHelper::getDbTime();?></h1>
<?php

// $url = PatientHelper::getUrl().'OpdVisitRpcS';

//         $Client = new JsonRpc\Client($url);
//         $success = false;
//         $success = $Client->call('getByHnDiv', ['460028','DP1']);

//         //  ถ้ามีข้อมูลไม่้ท่ากับค่าวาง

// echo "<pre>";
// print_r($Client->result);
// echo "</pre>";
// $date =  $Client->result[0]->visit_date;
// echo $data;



// $y = substr($date,0,4);
// $m = substr($date,4,2);
// $d = substr($date,6,2);
// $b_date = $y.'-'.$m.'-'.$d;
// echo $b_date;
// $check_vn = OpdVisit::findOne(['hn' => '460028','pcc_vn' => '101','visit_date' => '2019-04-17']);
//
// print_r($check_vn->pcc_vn);

// $url = PatientHelper::getUrl().'DrugAllergyRpcS';
// $Client = new JsonRpc\Client($url);
// $success = false;
// $success = $Client->call('getByHn', ['197642']);
// $data =  $Client->result;
// echo count($data);

// $hn = '156658';
// $department = 'O10';

// $hn = '460028';
// $department = 'DP1';
// $url = PatientHelper::getUrl().'OpdVisitRpcS';

// $Client = new JsonRpc\Client($url);
// $success = false;
// $success = $Client->call('getByHnDiv', [$hn,$department]);

// echo "<pre>";
// print_r($Client->result);
// echo "</pre>";

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
