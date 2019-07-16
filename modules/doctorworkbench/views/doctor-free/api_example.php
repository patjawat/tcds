<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
// chdir(__DIR__);
// ini_set('default_charset', 'UTF-8');
// ini_set('display_errors', '1');
// require_once 'vendor/autoload.php';
# set the url of the server
// $url = 'http://10.1.88.4/HIS/index.php/DFRpcS';
$url = 'http://53771a38.ngrok.io/HIS/index.php/DFRpcS';
# create our client object, passing it the server url
$Client = new JsonRpc\Client($url);
# set up our rpc call with a method and params
$success = false;
/**
 * ค่าที่ต้องส่งเพื่อบันทึกค่าแพทย์ผู้ป่วยนอกเป็นอะเรย์
 * - document_id(string 10) : หมายเลขเอกสาร DF + [RUNING NUMBER] เป็นคีย์หลักเพื่อตรวจสอบแก้ไขข้อมูล
 * - document_thdate(int 8) : พ.ศ.เดือนวัน ที่สร้างเอกสาร
 * - document_time(int 4) : ชม.นาที
 * - hn (bigint) : หมายเลขประจำตัวผู้ป่วย
 * - vn (int) : ลำดับที่รับบริการผู้ป่วยนอก
 * - vn_seq (int 2) : ลำดับการเข้ารับบริการตามจุดของผู้ป่วย
 * - requester_id (string 6) : รหัสผู้บันทึกข้อมูล
 * - ips_id (string 2) : รหัสประเภทค่าแพทย์
 * - doctor_id (string 5) : รหัสแพทย์
 * - df_price (currency 6) : ค่าธรรมเนียมแพทย์
 * - df_quantity (int) : ค่าเริ่มต้น 1 (ไม่ส่งก็ได้)
 * - div_id (string 3) : รหัสหน่วยงาน
 * - contract_type (string) : ประเภทคู่สัญญามาจาก VN. (ไม่ส่งก็ได้)
 * - contract_code (string) : รหัสคู่สัญญามาจาก VN. (ไม่ส่งก็ได้)
 * - program_id () : รหัสโปรแกรมค่าเริ่มต้นเป็น DFRpcS (ไม่ส่งก็ได้)
 */
$idx_ = ['document_id' => "DF00000001", 'document_thdate' => "25620504", 'document_time' => "0019", 'hn' => "460028",
    'vn' => "0001", 'vn_seq' => "02", 'requester_id' => "ITIT", 'ips_id' => "01", 'doctor_id' => "1104", 'df_price' => "999999",
    'df_quantity' => "1", 'div_id' => "O10", 'contract_type' => "1", 'contract_code' => "", 'program_id' => "DFRequest"];
$idx_['hims_thdate'] = substr($idx_['document_thdate'], 2);
$success = $Client->call('setDfOpd', [$idx_]);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>บันทึกค่าแพทย์ผู้ป่วยนอก(JsonRPC)</title>
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
    </head>
    <body>
        <div class="container">
            <div class="page-header">
                <h1>ค่าแพทย์ผู้ป่วยนอก HIMs(JsonRPC)</h1>
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
