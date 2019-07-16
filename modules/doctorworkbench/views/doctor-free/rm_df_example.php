<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
chdir(__DIR__);
ini_set('default_charset', 'UTF-8');
ini_set('display_errors', '1');
require_once 'vendor/autoload.php';
# set the url of the server
$url = 'http://10.1.88.4/HIS/index.php/DFRpcS';
//$url = 'http://61cd1fe0.ngrok.io/HIS/index.php/DFRpcS';
# create our client object, passing it the server url
$Client = new JsonRpc\Client($url);
# set up our rpc call with a method and params
$success = false;
/**
 * ค่าที่ต้องส่งเพื่อลบค่าแพทย์ผู้ป่วยนอกเป็นอะเรย์
 * - document_id(string 10) : หมายเลขเอกสาร DF + [RUNING NUMBER] เป็นคีย์หลักเพื่อตรวจสอบลบข้อมูล
 * - document_thdate(int 8) : พ.ศ.เดือนวัน ที่สร้างเอกสาร คีย์เพื่อตรวจสอบที่อีกชั้น
 */
$idx_ = ['document_id' => "DF00000001", 'document_thdate' => "25620504"];
$success = $Client->call('rmvDfOpd', [$idx_]);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ลบค่าแพทย์ผู้ป่วยนอก(JsonRPC)</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="page-header">
                <h1>ลบค่าแพทย์ผู้ป่วยนอก HIMs(JsonRPC)</h1>
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
    </body>
</html>
