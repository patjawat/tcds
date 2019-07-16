<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\UnitHelper;


/* @var $this yii\web\View */
/* @var $model app\modules\chiefcomplaint\models\Pccservicepi */


$this->params['breadcrumbs'][] = ['label' => 'Pccservicepis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
.border-left-primary {
    border-left: .25rem solid #4e73df!important;
}
.border-left-success {
    border-left: .25rem solid #1cc88a!important;
}
.border-left-info {
    border-left: .25rem solid #36b9cc!important;
}
.border-left-warning {
    border-left: .25rem solid #f6c23e!important;
}

.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}

.pb-2, .py-2 {
    padding-bottom: .5rem!important;
}
.pt-2, .py-2 {
    padding-top: .5rem!important;
}
.h-100 {
    height: 100%!important;
}
.shadow {
    -webkit-box-shadow: 0 .15rem 1.75rem 0 rgba(58,59,69,.15)!important;
    box-shadow: 0 .15rem 1.75rem 0 rgba(58,59,69,.15)!important;
}
.card {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid #e3e6f0;
    border-radius: .35rem;
}
.card-body {
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.25rem;
}
.align-items-center {
    -webkit-box-align: center!important;
    -ms-flex-align: center!important;
    align-items: center!important;
}
.no-gutters {
    margin-right: 0;
    margin-left: 0;
}
.no-gutters>.col, .no-gutters>[class*=col-] {
    padding-right: 0;
    padding-left: 0;
}
.mr-2, .mx-2 {
    margin-right: .5rem!important;
}
.text-xs {
    font-size: 1.4rem;
}
.text-primary {
    color: #4e73df!important;
}
.font-weight-bold {
    font-weight: 700!important;
}
.dropdown .dropdown-menu .dropdown-header, .sidebar .sidebar-heading, .text-uppercase {
    text-transform: uppercase!important;
}
.mb-1, .my-1 {
    margin-bottom: .25rem!important;
}

.text-gray-800 {
    color: #5a5c69!important;
}
.font-weight-bold {
    font-weight: 700!important;
}
.mb-0, .my-0 {
    margin-bottom: 0!important;
}

.align-items-center {
    -webkit-box-align: center!important;
    -ms-flex-align: center!important;
    align-items: center!important;
}
.no-gutters {
    margin-right: 0;
    margin-left: 0;
}
.no-gutters>.col, .no-gutters>[class*=col-] {
    padding-right: 0;
    padding-left: 0;
}
.col-auto {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 auto;
    flex: 0 0 auto;
    width: auto;
    max-width: 100%;
}

.border-bottom-primary {
    border-bottom: .25rem solid #4e73df!important;
}
.pb-3, .py-3 {
    padding-bottom: 1rem!important;
}
.pt-3, .py-3 {
    padding-top: 1rem!important;
}
.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}

</style>

<div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-3 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col-md-10">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">BMI : <?=$model->bmi;?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Bw <?=$model->bw;?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Ht. <?=$model->ht;?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-tag fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-3 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                  <div class="col-md-10">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">xxx</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">BT <?=$model->bt;?>
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">WC <?=$model->wc?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-file-medical-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-3 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                  <div class="col-md-10">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">xxx</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">IC <?=$model->ic;?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">EC  <?=$model->ec;?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-stethoscope fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-3 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col-md-10">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">xx</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">HC(Newborn) <?=$model->hc;?></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><br></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>



<!-- <div class="row">
<div class="col-lg-12">
  <div class="card mb-4 py-3 border-left-primary shadow h-100 py-2">
    <div class="card-body">
      .border-left-primary
    </div>
  </div>
</div>
</div> -->


