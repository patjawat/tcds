<?php
use app\components\loading\ShowLoading;
use app\components\UserHelper;
use app\components\PatientHelper;
use yii\helpers\ArrayHelper;
// echo ShowLoading::widget();
// use jsonrpc\JsonRpc;
// use JsonRpc;
use JsonRpc as Rpc;
use yii\helpers\Json;
?>

<?php

    //  $hn = \Yii::$app->request->post('hn');

        // $url = 'http://10.1.16.4/OrrCodeIgniter_3/index.php/HisPatientRpcS';
      
        // $Client = new JsonRpc\Client($url);
        // $success = false;
        // /**
        //  * ค้นหาข้อมูลด้วย HN.
        //  */
        // $success = $Client->call('getByHn', ['365656']);
        // //$success = $Client->call('getByHn', [$hn]);
        // echo $success
?>
<?php
// $output = shell_exec('ls -lart');
// echo "<pre>$output</pre>";

// $command = escapeshellcmd('python.py');
// $output = shell_exec('python python.py');
// system('/Users/patjawat/dev/scriptsoft/medicong-dev/views/site/test.sh');

$url = PatientHelper::getUrl().'OpdVisitRpcS';

        $Client = new Rpc\Client($url);
        $success = false;
        $success = $Client->call('getByHnDiv', ['657944','O10']);
        //  ถ้ามีข้อมูลไม่้ท่ากับค่าวาง
//        print_r($Client->result,1);
// echo $url;
// echo '<h1>Hello</h1>';
?>
 <div class="container">
            <div class="page-header">
                <h1>ข้อมูลการรับบริการผู้ป่วยนอก(JsonRPC)</h1>
            </div>
            <?php
            echo '<b>Json RPC:</b> ', $url;
            echo '<br /><br />';

            echo '<b>result:</b> ', print_r($Client->result, 1);
            echo '<br /><br />';

            echo '<b>error:</b> ', $Client->error;
            echo '<br /><br />';

            echo '<b>output:</b> ', $Client->output;
            ?>
        </div>



