<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
$this->registerJS($this->render('../../dist/js/medication.js'));
$this->registerJS($this->render('../../dist/js/script.js'));
$this->registerCss($this->render('../../dist/css/style.css'));

//$this->title = 'Midecation';
//$this->params['breadcrumbs'][] = ['label' => 'Order', 'url' => ['/doctorworkbench/pcc-diagnosis']];
//$this->params['breadcrumbs'][] = $this->title;

?>
<style>
#medication-container{
    height:248px
}
</style>

<?php
// กำหนด laypout ของ Gridvire เอง
$layout = <<< HTML
<div class="panel panel-info">
      <div class="panel-heading">
            <h3 class="panel-title">Mediaction List</h3>
      </div>
      <div class="panel-body">
<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
    {pager}
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="pull-right">
        {toggleData}
        {export}
        </div>
     </div>
    </div>
<div class="clearfix"></div>
{items}
</div>
</div>
HTML;
?>

<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

<!-- 
<fieldset style="height:350px;padding-top: 10px;">
	<legend class="scheduler-border"><i class="fas fa-pills"></i> Medication Form</legend> 

<?php //echo $this->render('./create', ['model' => $model]); ?>

<div style="margin-top:15px;margin-bottom:10px;">
<?php // Html::button('<i class="fa fa-trash"></i> ลบรายการ', ['class' => 'btn btn-danger pull-eft', 'id' => 'btn-delete','style' => 'margin-right: 5px;']) ?>
<?php // Html::button('<i class="fa fa-edit"></i> แก้ไขที่เลือก', ['class' => 'btn btn-warning pull-eft', 'id' => 'btn-update-select']) ?>

</div>
</fieldset> -->
        
        <div id="showForm"></div>
</div>
<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
        
    <fieldset style="height:350px;padding-top: 10px;">
	<legend class="scheduler-border"><i class="fas fa-pills"></i> Medication List</legend> 


        <?=
        GridView::widget([
            'id' => 'medication',
            'dataProvider' => $dataProvider,
            'pjax' => true,
            'floatHeader' => true,
            'floatHeaderOptions' => ['scrollingTop' => '20'],
            'perfectScrollbar' => true,
            'footerRowOptions' => ['style' => 'font-weight:bold;text-decoration: underline; position: absolute'],
            'columns' => require(__DIR__ . '/_columns.php'),
            'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
            // 'showPageSummary' => true,
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'summary' => false,
            'headerRowOptions' => ['style' => 'background-color: #00bfa5;color:#fff;'],
            'layout' => $layout,
            'rowOptions'=>function($model){
                if($model->date_service == Date('Y-m-d')){
                    return ['class' => 'info'];
                }
            },
            'replaceTags' => [
                '{custom}' => function($widget) {
                    if ($widget->panel === true) {
                        return '';
                    } else {
                        return '';
                    }
                }
            ],
            'pager' => [
                'options'=>['class'=>'pagination'], 
                'prevPageLabel' => 'Previous', 
                'nextPageLabel' => 'Next',
                'firstPageLabel'=>'First',
                'lastPageLabel'=>'Last',
                'nextPageCssClass'=>'next',
                'prevPageCssClass'=>'prev',
                'firstPageCssClass'=>'first',
                'lastPageCssClass'=>'last',
                'maxButtonCount'=>10,
                 ],        
        ])
        ?>
</fieldset>
</div>
</div>
<?php
$js = <<< JS

$(function(){
    loadForm();
// ====> การลบข้อมูลที่เลือก
$("#btn-delete").click(function(){
    var keys = $("#crud-medication").yiiGridView("getSelectedRows");
    var url = 'index.php?r=doctorworkbench/pcc-medication/bulk-delete'
    if(keys.length>0){
        $.ajax({
            url:url,
            method:'post',
            data:{pks:keys.join()},
            success: function(){
             $.pjax.reload({container: "#crud-medication-pjax"});
             totalPriceupdate($('#cid').val());
            }
        }); 
    }
  });  

  $('#medication-pjax').on('pjax:success', function(event, data, status, xhr, options) {
    loadForm();
        // loadFormPe();
        // $.pjax({url:'index.php?r=chiefcomplaint/pccservicepe' , container: '#pe-pjax'})
    });
});

  // รวมราคาค่ายา
function totalPriceupdate(cid){
    $.ajax({
      type: "get",
      url: "index.php?r=doctorworkbench/pcc-medication/sum-price",
      data:{cid:cid},
      dataType: "json",
      success: function (response) {
          const formatter = new Intl.NumberFormat('th', {
           // style: 'currency',
           // currency: 'USD',
            minimumFractionDigits: 2
          })
          $('#totalprice').html(formatter.format(response));
      }
  });
  }

  function loadForm(){
      $.ajax({
          type: "get",
          url: "index.php?r=doctorworkbench/pcc-medication/create",
          dataType: "json",
          success: function (response) {
              $('#showForm').html(response)
          }
      });
  }


  
JS;
$this->registerJS($js);
?>
