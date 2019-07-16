<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;

$this->params['breadcrumbs'][] = $this->title;
?>

      <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="pill" href="#menu1"><i class="fas fa-pills"></i> Medication Items</a></li>
    <li><a data-toggle="pill" href="#menu2"><i class="fas fa-history"></i> Medication History</a></li>
  </ul>
  
  <div class="tab-content">
    <div id="menu1" class="tab-pane fade in active">
      <div class="row" style="margin-bottom: 15px;margin-top: 15px;">
		<div class="col-md-6">
            <div class="input-group" id="adv-search">
                <input type="text" class="keysearch form-control" value="" >  
                <div class="input-group-btn">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    </div>
                </div>
            </div>
          </div>
        </div>

      
      <div class="card mb-4 py-3 border-left-danger shadow">
         <div class="card-body">
         <div class="show-items"></div>
       </div>
</div>

    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Menu 2</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    
  </div>



<?php
$js  = <<< JS

$('.keysearch').keyup(function(e){
    var value = $(this).val();
    if(e.keyCode == 13){
        loadDrugitems(value);
    }
});
JS;
$this->registerJS($js);
?>




