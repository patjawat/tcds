<?php
use app\components\loading\ShowLoading;
use app\components\UserHelper;
use yii\helpers\ArrayHelper;
// echo ShowLoading::widget();
// use jsonrpc\JsonRpc;
// use JsonRpc;
?>

<div class="jumbotron">
    <h3>หน้าสำหรับประกาศข่าวประชาสัมพันธ์ขององค์กร</h3>   
    <?php if (1==1):?>
        <!-- <h4>กรุณาลงชื่อเข้าใช้ระบบ</h4>
         <p>user กลุ่มพยาบาล= (nurse1 , 112233) / (nurse2 , 112233) / (nurse3 , 112233) </p>
        <p>user กลุ่มแพทย์ = (doctor1 , 112233) / (doctor2 , 112233) / (doctor3 , 112233)</p>
        <p>user Vital Sign and screening nurse  = (user1 , 112233)</p>
        <p>user Q-Managese  = (user1 , 112233)</p>
        <p>user DM Nures Manage   = (user1 , 112233)</p>
        <p>user Exit Nurse  = (user1 , 112233)</p> -->
       

    <?php endif; ?>
</div>
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
$output = shell_exec('sh script/script.sh');
// $output = shell_exec('pwd');
// system('/Users/patjawat/dev/scriptsoft/medicong-dev/views/site/test.sh');

echo "<pre>$output</pre>";


?>
<?php 

// $command = '/Users/patjawat/dev/scriptsoft/tcds/python_api/testphp.py';
// $output = shell_exec($command);
// print_r($output);

?>