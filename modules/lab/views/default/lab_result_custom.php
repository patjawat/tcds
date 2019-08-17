<?php

use app\modules\lab\models\LabResult;
use app\components\FormatYear;
use app\components\PatientHelper;

//$limit = $searchModel->limit ? $searchModel->limit : 4;
$sql = "SELECT DISTINCT `checkin_date`, `checkin_time` FROM `theptarin`.`lab_result` AS `lab_result` WHERE `patient_id` = :patient_id ORDER BY `checkin_date` DESC, `checkin_time` DESC";
$checkin_cols = Yii::$app->theptarin->createCommand($sql)->bindValue(':patient_id', $hn)->queryAll();
$this->params['pt_title'] = PatientHelper::getPatientTitleByHn($hn);
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
                    foreach ($checkin_cols as $key => $value):
                        ?>
                        <th><?= FormatYear::toThai($value['checkin_date']) . ' : ' . $value['checkin_time'] ?></th>
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
                        <?php foreach ($checkin_cols as $key => $value): ?>
                            <td align="center">
                                <code> 
                                    <?php
                                    $cell_val = new LabResult();
                                    echo $cell_val->checkinCustom($model['patient_id'], $model['lis_code'], $value['checkin_date'], $value['checkin_time']);
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
