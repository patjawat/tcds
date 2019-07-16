<?php

use app\components\loading\ShowLoading;
use yii\widgets\ActiveForm;
use yii\data\ArrayDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use app\assets\DataTableAsset;
use app\modules\stock\models\PccServiceMedication;

DataTableAsset::register($this);
?>
<div class="site-index">

    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title"><i class="glyphicon glyphicon-list" aria-hidden="true"></i> ปริมาณการใช้ยาครั้งถัดไป</div>
        </div>
        <div class="panel-body"> 
            <div id="grid-view-data-table" class="grid-view">
                <table class="table  table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>                                
                            <th>รายการ</th>
                            <th >รวมจำนวนจ่าย</th>                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $sql = " SELECT tmt24_code,drug_name,sum(qty) as total,unit
                            from pcc_service_medication
                            GROUP BY tmt24_code,drug_name,unit
                            ORDER BY drug_name ";
                        $raw = \Yii::$app->db->createCommand($sql)->queryAll();
                        $dataProvider = new ArrayDataProvider([
                            'allModels' => $raw,
                            'pagination' => FALSE
                        ]);
                        ?>
                        <?php foreach ($raw as $key => $data): ?>
                            <tr>                         
                                <td><?= $i++ ?></td>
                                <td><?= $data['drug_name'] ?></td>                                
                                <td><?= $data['total'] ?></td>                                
                            </tr>                                
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
$js = <<< JS
    $('#grid-view-data-table .table').DataTable();     
JS;
$this->registerJs($js);

