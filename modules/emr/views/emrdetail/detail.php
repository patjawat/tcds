<?php

use app\modules\emr\models\GatewayEmrVisit;
//use app\modules\emr\models\PccDiagnosis;
//use app\modules\emr\models\PccDiagnosisSearch;
use app\modules\emr\models\GatewayEmrDiag;
use app\modules\emr\models\GatewayEmrDiagSearch;
use yii\widgets\DetailView;
use kartik\grid\GridView;

$model = GatewayEmrVisit::findOne($id);
//$modelDiag = PccDiagnosis::find()->where(['vn' => $vn, 'provider_code' => $provider_code]);
$searchModel = new GatewayEmrDiagSearch();
$dataProviderDiag = $searchModel->search(Yii::$app->request->queryParams, $vn, $hospcode);
?>
<div class="col-sm-6">
    <div class="panel panel-success">
        <div class="panel-heading">
            <div class="panel-title">
                <i class="fa fa-thermometer-quarter" style="margin-right: 10px"></i> 

                การคัดกรองทั่วไป
            </div>
        </div>
        <div class="panel-body">
<?=
DetailView::widget([
    'model' => $model,
    'attributes' => [
        [
            'attribute' => 'pulse',
            'value' => function($model) {
                $bp = $model->bpd . ' / ' . $model->bps;
                $pulse = $model->pulse ? $model->pulse : 'ไม่มี';
                $temp = $model->temperature ? $model->temperature : 'ไม่มี';
                $rr = $model->rr ? $model->rr : 'ไม่มี';

                if ($model->pulse == '') {
                    return '';
                } else {
                    return 'BP = ' . $bp . ' , Pulse = ' . $pulse . ' , Temp = ' .
                            $temp . ' , RR = ' . $rr;
                }
            }
        ],
        [
            'attribute' => 'cc',
            'value' => function($model) {
                if ($model->cc == '') {
                    return '';
                } else {
                    return $model->cc;
                }
            }
        ],
        [
            'attribute' => 'pe',
            'value' => function($model) {
                if ($model->pe == '') {
                    return '';
                } else {
                    return $model->pe;
                }
            }
        ],
        [
            'attribute' => 'pi',
            'value' => function($model) {
                if ($model->pi == '') {
                    return '';
                } else {
                    return $model->pi;
                }
            }
        ],
    //'pi',
//                    [
//                        'attribute' => 'bpd',
//                        'value' => function($model) {
//                            if ($model->bpd == '') {
//                                return '';
//                            } else {
//                                return $model->bpd . ' / ' . $model->bps;
//                            }
//                        }
//                    ],
    ],
])
?>
        </div>
    </div>
</div>

<div class="col-sm-6">
    <div class="panel panel-warning">
        <div class="panel-heading">
            <div class="panel-title">
                <i class="fa fa-flask" style="margin-right: 10px"></i> 

                การวินิจฉัยโรค
            </div>
        </div>
        <div class="panel-body">

<?=
GridView::widget([
    'dataProvider' => $dataProviderDiag,
    //'filterModel' => $searchModel,
    //'showPageSummary'=>true,
    'striped' => true,
    'pjax' => true,
    'pjaxSettings' => [
        'neverTimeout' => true,
    ],
    'striped' => true,
    'hover' => true,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'icd_code',
        'icd_name'
    ],
]);
?>
        </div>
    </div>
</div>


<!--<div class="col-sm-6">
    <table class="table table-bordered table-condensed table-hover medium kv-table">
        <tr class="success">
            <th colspan="3" class="text-center">การคัดกรองทั่วไป</th>
        </tr>
        <tr class="active" style="width: 20px">
            <th class="text-center" style="width: 10%">#</th>
            <th style="width: 20%">รายการ</th>
            <th class="text-center" style="width: 70%">รายละเอียด</th>
        </tr>
        <tr style="width: 20px">
            <td class="text-center" >1</td>
            <td>Vital Sign</td>
            <td>0 </td>
        </tr>
        <tr>
            <td class="text-center">2</td>
            <td>CC</td>
            <td >ตรวจคัดกรองทั่วไป</td>
        </tr>
        <tr>
            <td class="text-center">3</td>
            <td>PE</td>
            <td></td>
        </tr>
        <tr>
            <td class="text-center">4</td>
            <td>PI</td>
            <td></td>
        </tr>
        <tr>
            <td class="text-center">5</td>
            <td>BP</td>
            <td >110/70</td>
        </tr>

        <tr class="warning">
    <th></th><th>Total</th><th class="text-right">209.00</th>
</tr>
    </table>
</div>-->

<!--<div class="col-sm-6">
    <table class="table table-bordered table-condensed table-hover medium kv-table">
        <tr class="danger">
            <th colspan="3" class="text-center text-danger">การวินิจฉัยโรค</th>
        </tr>
        <tr class="active" style="width: 20px">
            <th class="text-center" style="width: 10%">#</th>
            <th style="width: 20%">รหัส</th>
            <th class="text-center" style="width: 70%">รายหาร</th>
        </tr>
        <tr style="width: 20px">
            <td class="text-center" style="width: 20px">1</td><td>Vital Sign</td><td class="text-right">188.10 </td>
        </tr>


        <tr class="warning">
    <th></th><th>Total</th><th class="text-right">209.00</th>
</tr>
    </table>
</div>-->
