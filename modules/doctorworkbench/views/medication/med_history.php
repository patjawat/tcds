<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row" style="margin-bottom: 15px;">
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
	</div>


<div class="shadow">
    <div class="card-body">
        <div class="show-data"></div>
    </div>
</div>

<?php
$js  = <<< JS
// $(function(){
    loadMedHistoryItems();
// });

$('.keysearch').keyup(function(e){
    var value = $(this).val();
    if(e.keyCode == 13){
        loadMedHistoryItems();
        // loadDrugitems(value);
    }
});
JS;
$this->registerJS($js);
?>




