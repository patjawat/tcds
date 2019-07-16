<?php
use app\modules\dmindicators\models\DmIndicators;
use yii\helpers\Json;
use app\components\PatientHelper;
use app\components\FormatYear;
$hn = PatientHelper::getCurrentHn();
$vn = PatientHelper::getCurrentVn();

// $model = DmIndicators::find(['hn' => $hn])->limit(2)->all();
$neuropathy_vaseular0 = Json::decode( $model ? $model[0]->neuropathy_vaseular : '');
$neuropathy_vaseular1 = Json::decode($model ?  (count($model) > 0 ? $model[1]->neuropathy_vaseular : '') : '' );


?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <!-- start panel -->
        <div class="panel panel-default shadow">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <p class="pull-left"><i class="fas fa-list-ul"></i>  Previous Result</p>
                    <!-- <p class="pull-right"><i class="fas fa-calendar"></i> 20/08/2562</p> -->
                    <br>
                </h3>
            </div>
            <div class="panel-body">



            <div id="NeuropathyAseular1xx"></div>

            
            <table class="table table-bordered table-hover">
                <thead > 
                    <tr>
                        <th rowspan="2">รายการ</th>
                        <th colspan="2">ทำมาแล้วเมื่อ <?=$model ? FormatYear::ymd($model[0]->created_at) : '';?> : <?=$model ? FormatYear::toThai($model[0]->created_at) : '';?></th>
                        <th colspan="2">ทำมาแล้วเมื่อ <?= count($model) > 0 ? FormatYear::ymd($model[1]->created_at) : '';?> : <?= count($model) > 0 ?  FormatYear::toThai($model[1]->created_at) : '';?></th>
                    </tr>
                    <tr>
                        
                        <th style="text-align: center;">Rt</th>
                        <th style="text-align: center;">Lt</th>
                        <th style="text-align: center;">Rt</th>
                        <th style="text-align: center;">Lt</th>
                    </tr>
                </thead>
                <tbody style="text-align: center;">
                    <tr>
                        <td valign="middle">MNF</td>
                        <td><?=$neuropathy_vaseular0['mnf_rt'];?></td>
                        <td><?=$neuropathy_vaseular0['mnf_lt'];?></td>
                        <td><?=$neuropathy_vaseular1['mnf_rt'];?></td>
                        <td><?=$neuropathy_vaseular1['mnf_lt'];?></td>
                    </tr>
                    <tr>
                        <td>TV</td>
                        <td><?=$neuropathy_vaseular0['vt_rt'];?></td>
                        <td><?=$neuropathy_vaseular0['vt_lt'];?></td>
                        <td><?=$neuropathy_vaseular1['vt_rt'];?></td>
                        <td><?=$neuropathy_vaseular1['vt_lt'];?></td>
                    </tr>
                    <tr>
                        <td>DP</td>
                        <td><?=$neuropathy_vaseular0['dp_rt'];?></td>
                        <td><?=$neuropathy_vaseular0['dp_lt'];?></td>
                        <td><?=$neuropathy_vaseular1['dp_rt'];?></td>
                        <td><?=$neuropathy_vaseular1['dp_lt'];?></td>
                    </tr>
                    <tr>
                        <td>PT</td>
                        <td><?=$neuropathy_vaseular0['pt_rt'];?></td>
                        <td><?=$neuropathy_vaseular0['pt_lt'];?></td>
                        <td><?=$neuropathy_vaseular1['pt_rt'];?></td>
                        <td><?=$neuropathy_vaseular1['pt_lt'];?></td>
                    </tr>
                </tbody>
            </table>
            

            </div>
        </div>
        <!-- End panel -->

    </div>

</div>


<?php
$js  = <<< JS

LastNeuropathyAseular1();
LastNeuropathyAseular2();

function LastNeuropathyAseular1(){
    $.ajax({
    type: "get",
    url: "index.php?r=dmindicator/dmindicators/neuropathy-aseular",
    dataType: "json",
    success: function (response) {
        $('#NeuropathyAseular1').html(response);
    }
});
}

function LastNeuropathyAseular2(){
    $.ajax({
    type: "get",
    url: "index.php?r=dmindicator/dmindicators/neuropathy-aseular",
    dataType: "json",
    success: function (response) {
        $('#NeuropathyAseular2').html(response);
    }
});
}


JS;
$this->registerJS($js);
?>