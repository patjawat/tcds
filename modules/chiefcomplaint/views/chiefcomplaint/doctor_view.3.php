<?php

use app\components\UnitHelper;
use kartik\editable\Editable;

/* @var $this yii\web\View */
/* @var $model app\modules\chiefcomplaint\models\Pccservicepi */

$this->params['breadcrumbs'][] = ['label' => 'Pccservicepis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
.card .header-title {
    margin-bottom: .5rem;
    text-transform: uppercase;
    letter-spacing: .02em;
    font-size: .875rem;
    margin-top: 0;
}
.mb-3, .my-3 {
    margin-bottom: 1.5rem!important;
}
.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
    margin: 10px 0;
    font-weight: 700;
}
.pb-1, .py-1 {
    padding-bottom: .375rem!important;
}
.pt-1, .py-1 {
    padding-top: .375rem!important;
}
.align-items-center {
    -webkit-box-align: center!important;
    -ms-flex-align: center!important;
    align-items: center!important;
}

.align-items-center {
    -webkit-box-align: center!important;
    -ms-flex-align: center!important;
    align-items: center!important;
}
</style>

<div class="card">
    <div class="card-body">
        <div class="dropdown float-right">
            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-dots-vertical"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item">Action</a>
            </div>
        </div>
        <h4 class="header-title mb-3"> VITAL SIGNS</h4>

        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto;">
            <div class="slimscroll" style="max-height: 320px; overflow: hidden; width: auto;">
                <div class="row py-1 align-items-center">
                    <div class="col-auto">
                        <i class="mdi mdi-arrow-collapse-up text-danger font-18"></i>
                    </div>
                    <div class="col pl-0">
                        <a href="javascript:void(0);" class="text-body">BT</a>
                    </div>
                    <div class="col-auto">
                        <span class="text-success font-weight-bold pr-2">
                            <code><?=$model->bt;?> </code> C 
                            <code id="bt_f"><?php echo UnitHelper::getCToF($model->bt);?></code> F</div>
                    </span>
                </div>
            </div>
            <div class="row py-1 align-items-center">
                <div class="col-auto">
                    <i class="mdi mdi-arrow-collapse-down text-success font-18"></i>
                </div>
                <div class="col pl-0">
                    <a href="javascript:void(0);" class="text-body">BP</a>
                </div>
                <div class="col-auto">
                    <span class="text-success font-weight-bold pr-2"><code><?=$model->bp1;?></code> / <code><?=$model->bp2;?></code></span>
                </div>
            </div>
            <div class="row py-1 align-items-center">
                <div class="col-auto">
                    <i class="mdi mdi-arrow-collapse-down text-success font-18"></i>
                </div>
                <div class="col pl-0">
                    <a href="javascript:void(0);" class="text-body">Position</a>
                </div>
                <div class="col-auto">
                    <span class="text-success font-weight-bold pr-2"><code><?=$model->position;?></code></span>
                </div>
            </div>
            <div class="row py-1 align-items-center">
                <div class="col-auto">
                    <i class="mdi mdi-arrow-collapse-up text-danger font-18"></i>
                </div>
                <div class="col pl-0">
                    <a href="javascript:void(0);" class="text-body">Arm</a>
                </div>
                <div class="col-auto">
                    <span class="text-danger font-weight-bold pr-2"><code><?=$model->arm;?></code></span>
                </div>
            </div>
            <div class="row py-1 align-items-center">
                <div class="col-auto">
                    <i class="mdi mdi-arrow-collapse-down text-success font-18"></i>
                </div>
                <div class="col pl-0">
                    <a href="javascript:void(0);" class="text-body">PR</a>
                </div>
                <div class="col-auto">
                    <span class="text-success font-weight-bold pr-2">
                    <code><?=$model->pr;?></code> / min
                    </span>
                </div>
            </div>
            <div class="row py-1 align-items-center">
                <div class="col-auto">
                    <i class="mdi mdi-arrow-collapse-up text-danger font-18"></i>
                </div>
                <div class="col pl-0">
                    <a href="javascript:void(0);" class="text-body">PR Rhythm</a>
                </div>
                <div class="col-auto">
                    <span class="text-danger font-weight-bold pr-2">
                    <code><?=$model->pr_rhythm;?></code>
                    </span>
                </div>
            </div>
            <div class="row py-1 align-items-center">
                <div class="col-auto">
                    <i class="mdi mdi-arrow-collapse-up text-danger font-18"></i>
                </div>
                <div class="col pl-0">
                    <a href="javascript:void(0);" class="text-body">RR</a>
                </div>
                <div class="col-auto">
                    <span class="text-success font-weight-bold pr-2">
                    <code><?=$model->rr;?></code> / min</span>
                </div>
            </div>
            <div class="row py-1 align-items-center">
                <div class="col-auto">
                    <i class="mdi mdi-arrow-collapse-down text-success font-18"></i>
                </div>
                <div class="col pl-0">
                    <a href="javascript:void(0);" class="text-body">O2Sat</a>
                </div>
                <div class="col-auto">
                    <span class="text-success font-weight-bold pr-2">
                    <code><?=$model->o2sat;?></code> %
                    </span>
                </div>
            </div>

            <div class="row py-1 align-items-center">
                <div class="col-auto">
                    <i class="mdi mdi-arrow-collapse-down text-success font-18"></i>
                </div>
                <div class="col pl-0">
                    <a href="javascript:void(0);" class="text-body">WC</a>
                </div>
                <div class="col-auto">
                    <span class="text-success font-weight-bold pr-2">
                   <code><?=$model->wc;?></code> cm
                            <code id="wc_in"><?=UnitHelper::getCmToIn($model->wc);?></code> In
                    </span>
                </div>
            </div>

            <div class="row py-1 align-items-center">
                <div class="col-auto">
                    <i class="mdi mdi-arrow-collapse-down text-success font-18"></i>
                </div>
                <div class="col pl-0">
                    <a href="javascript:void(0);" class="text-body">IC</a>
                </div>
                <div class="col-auto">
                    <span class="text-success font-weight-bold pr-2">
                    <code><?=$model->ic;?></code>
                    cm
                            <code id="ic_in"><?=UnitHelper::getCmToIn($model->ic);?></code> In
                    </span>
                </div>
            </div>

            <div class="row py-1 align-items-center">
                <div class="col-auto">
                    <i class="mdi mdi-arrow-collapse-down text-success font-18"></i>
                </div>
                <div class="col pl-0">
                    <a href="javascript:void(0);" class="text-body">EC</a>
                </div>
                <div class="col-auto">
                    <span class="text-success font-weight-bold pr-2">
                    <code><?=$model->ec;?></code> cm
                            <code id="wc_in"><?=UnitHelper::getCmToIn($model->ec);?></code> In
                    </span>
                </div>
            </div>



            <div class="row py-1 align-items-center">
                <div class="col-auto">
                    <i class="mdi mdi-arrow-collapse-down text-success font-18"></i>
                </div>
                <div class="col pl-0">
                    <a href="javascript:void(0);" class="text-body">IC</a>
                </div>
                <div class="col-auto">
                    <span class="text-success font-weight-bold pr-2">
                    <code><?=$model->ic;?></code> cm
                            <code id="wc_in"><?=UnitHelper::getCmToIn($model->ic);?></code> In
                    </span>
                </div>
            </div>



            <div class="row py-1 align-items-center">
                <div class="col-auto">
                    <i class="mdi mdi-arrow-collapse-down text-success font-18"></i>
                </div>
                <div class="col pl-0">
                    <a href="javascript:void(0);" class="text-body">EC</a>
                </div>
                <div class="col-auto">
                    <span class="text-success font-weight-bold pr-2">
                    <code><?=$model->ec;?></code> cm
                            <code id="wc_in"><?=UnitHelper::getCmToIn($model->ec);?></code> In
                    </span>
                </div>
            </div>



            <div class="row py-1 align-items-center">
                <div class="col-auto">
                    <i class="mdi mdi-arrow-collapse-down text-success font-18"></i>
                </div>
                <div class="col pl-0">
                    <a href="javascript:void(0);" class="text-body">HC</a>
                </div>
                <div class="col-auto">
                    <span class="text-success font-weight-bold pr-2">
                    <code><?=$model->hc;?></code> cm
                            <code id="wc_in"><?=UnitHelper::getCmToIn($model->hc);?></code> In
                    </span>
                </div>
            </div>



            <!-- ######## -->

            <div class="row py-1 align-items-center">
                <div class="col-auto">
                    <i class="mdi mdi-arrow-collapse-down text-success font-18"></i>
                </div>
                <div class="col pl-0">
                    <a href="javascript:void(0);" class="text-body">BW</a>
                </div>
                <div class="col-auto">
                    <span class="text-success font-weight-bold pr-2">
                    <code><?=$model->bw;?></code>
                    kg
                            <code id='bw_lb'><?=round(UnitHelper::getKgToLb($model->bw), 2);?></code> lb
                    </span>
                </div>
            </div>



            <div class="row py-1 align-items-center">
                <div class="col-auto">
                    <i class="mdi mdi-arrow-collapse-down text-success font-18"></i>
                </div>
                <div class="col pl-0">
                    <a href="javascript:void(0);" class="text-body">HT</a>
                </div>
                <div class="col-auto">
                    <span class="text-success font-weight-bold pr-2">
                    <code><?=$model->ht;?></code> cm
                            <code id="ht_f"><?=UnitHelper::getCmToFt($model->ht);?></code> Ft
                    </span>
                </div>
            </div>



            <div class="row py-1 align-items-center">
                <div class="col-auto">
                    <i class="mdi mdi-arrow-collapse-down text-success font-18"></i>
                </div>
                <div class="col pl-0">
                    <a href="javascript:void(0);" class="text-body">BMI</a>
                </div>
                <div class="col-auto">
                    <span class="text-success font-weight-bold pr-2">
                    <code><?=$model->bmi;?></code>
                    </span>
                </div>
            </div>



            <div class="row py-1 align-items-center">
                <div class="col-auto">
                    <i class="mdi mdi-arrow-collapse-down text-success font-18"></i>
                </div>
                <div class="col pl-0">
                    <a href="javascript:void(0);" class="text-body">IBW</a>
                </div>
                <div class="col-auto">
                    <span class="text-success font-weight-bold pr-2">
                    <code><?=$model->ibw;?></code> kg
                            
                    </span>
                </div>
            </div>



        </div>
        <div class="slimScrollBar"
            style="background: rgb(158, 165, 171); width: 8px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 237.037px;">
        </div>
        <div class="slimScrollRail"
            style="width: 8px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;">
        </div>
    </div> <!-- end slimscroll -->
</div>
<!-- end card-body -->
</div>
