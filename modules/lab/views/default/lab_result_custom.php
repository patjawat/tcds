<?php

//use app\components\FormatYear;
use app\components\HISHelper;
use app\components\PatientHelper;

//use app\components\PatientHelper;
//$limit = $searchModel->limit ? $searchModel->limit : 4;
$lab_request_ = [];
$result_ = [];
$checkin_col_ = [];

if (!is_null($hn)) {
    //$this->params['pt_title'] = PatientHelper::getPatientTitleByHn($hn);
    $this->params['pt_title'] = HISHelper::getPatientProfile($hn);
    $lab_request_ = HISHelper::getLabByHn($hn); //ปรับปรุงข้อมูลการส่งตรวจแลปของ HIS
    foreach ($lab_request_ as $key => $val_) {
        if (trim($val_->request_lab_id) !== "GLUS") {
            $checkin_date = date("Y-m-d", strtotime($val_->checkin_date));
            $checkin_time = date("H:i", strtotime(sprintf("%06s", $val_->checkin_time)));
            $checkin_col_[$val_->checkin_date . $val_->file_no] = ['file_no' => $val_->file_no,
                'checkin_date' => $checkin_date, 'checkin_time' => $checkin_time,
                'checkin_datetime' => $checkin_date . " " . $checkin_time];
        }
    }
    if (!is_null($checkin_col_)) {
        krsort($checkin_col_);
        $lab_result_ = HISHelper::getLabResultByHn($hn);
        foreach ($lab_result_ as $key => $val_) {
            $remark = NUll;
            if ($val_['lis_code'] == "10020" || $val_['lis_code'] == "10080") {
                $remark = "(" .
                        HISHelper::getLabEatRemark(new DateTime($val_['checkin_date'] . " " . $val_['checkin_time']), new DateTime($val_['eat_date'] . " " . $val_['eat_time'])) .
                        ")";
            }
            $result_[$val_['lis_code'] . $val_['reference_number']] = $val_['result'] . " " . $remark;
        }
    }
}
?>

<style media="screen">
    .pagination {
        display: inline-block;
        padding-left: 0;
        margin: 0px 0;
        border-radius: 4px;
    }
    #labview-container{
        height: 500px;
        border-bottom: .25rem solid #36b9cc!important;
    }

    .table-scroll {
        position:relative;
        max-width:99%;
        margin:auto;
        overflow:hidden;
        border:1px solid #000;
    }
    .table-wrap {
        width:100%;
        overflow:auto;
    }
    .table-scroll table {
        width:100%;
        margin:auto;
        border-collapse:separate;
        border-spacing:0;
    }
    .table-scroll th, .table-scroll td {
        padding:5px 10px;
        border:1px solid #000;
        background:#fff;
        white-space:nowrap;
        vertical-align:top;
    }
    .table-scroll thead, .table-scroll tfoot {
        background:#f9f9f9;
    }
    .clone {
        position:absolute;
        top:0;
        left:0;
        pointer-events:none;
    }
    .clone th, .clone td {
        visibility:hidden
    }
    .clone td, .clone th {
        border-color:transparent
    }
    .clone tbody th {
        visibility:visible;
        color:red;
    }
    .clone .fixed-side {
        border:1px solid #000;
        background:#eee;
        visibility:visible;
    }
    .clone thead, .clone tfoot{background:transparent;}


</style>

<?php echo $this->render('_search_custom', ['model' => $searchModel]); ?>
    <!-- <table class="table table-bordered table-hover"> -->
<div id="table-scroll" class="table-scroll">
    <div class="table-wrap">
        <table class="main-table table table-bordered table-hover">
            <thead>
                <tr>
                    <th class="fixed-side">รหัสผลตรวจ*orr</th>
                    <th class="fixed-side" width="400">Parameter</th>
                    <th class="fixed-side" width="400">Normal Range</th>
                    <th class="fixed-side">Unit</th>
                    <?php
                    $num = 1;
                    foreach ($checkin_col_ as $key => $val_):
                        ?>
                        <th><?= $val_['checkin_datetime'] ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dataProvider->getModels() as $key => $model): ?>
                    <tr>
                        <td class="fixed-side"><?php echo $model['lis_code']; ?></td>
                        <td class="fixed-side"><?php echo $model['test']; ?></td>
                        <td class="fixed-side"><?php echo $model['normal_range']; ?></td>
                        <td class="fixed-side"><?php echo $model['unit']; ?></td>
                        <?php foreach ($checkin_col_ as $key => $val_): ?>
                            <td align="center">
                                <code> 
                                    <?php
                                    $key = $model['lis_code'] . $val_['file_no'];
                                    echo array_key_exists($key, $result_) ? $result_[$key] : "";
                                    ?>
                                </code>
                            </td>
                        <?php endforeach;
                        ?>
                    </tr>
                <?php endforeach;
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php
$js = <<< JS
$(".main-table").clone(true).appendTo('#table-scroll').addClass('clone');  



$('#print_this').click(function (e) { 
    // e.preventDefault();
    var divToPrint = document.getElementById('table-scroll'); // เลือก div id ที่เราต้องการพิมพ์
var html =  '<html>'+ // 
            '<head>'+
                '<link href="css/print.css" rel="stylesheet" type="text/css">'+
            '</head>'+
                '<body onload="window.print(); window.close();">' + divToPrint.innerHTML + '</body>'+
            '</html>';
            
var popupWin = window.open();
popupWin.document.open();
popupWin.document.write(html); //โหลด print.css ให้ทำงานก่อนสั่งพิมพ์
popupWin.document.close();	
    
});

JS;
$this->registerJS($js);
?>
