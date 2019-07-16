<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use yii\web\View;
use kartik\widgets\Select2;
use yii\web\JsExpression;
$this->registerJs($this->render('../../dist/js/script.js'));
$this->registerCss($this->render('../../dist/css/style.css'));
//$this->title = 'Procedure';
//$this->params['breadcrumbs'][] = ['label' => 'Order', 'url' => ['/doctorworkbench/pcc-diagnosis']];
//$this->params['breadcrumbs'][] = $this->title;
$action_index = Url::to(['index']);

?>

<style>
#procedure-container{
    height:248px
}
</style>
<span id="index" action="<?=$action_index;?>"></span>

<?php
// กำหนด laypout ของ Gridvire เอง
$layout = <<< HTML
<div class="panel panel-info">
      <div class="panel-heading">
            <h3 class="panel-title">Procedure List</h3>
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

<fieldset style="height: 77px;">
	<legend class="scheduler-border"><i class="fas fa-diagnoses"></i> Procedure Form</legend> 
<?php  //echo $this->render('./create',['model' => $model]);?>
<div id="ProcedureForm"></div>
</fieldset>


<fieldset style="height:350px;padding-top: 10px;">
	<legend class="scheduler-border"><i class="fas fa-diagnoses"></i> Procedure List</legend> 

    <?=
        GridView::widget([
            'id' => 'procedure',
            'dataProvider' => $dataProvider,
            'pjax' => true,
            'floatHeader' => true,
            'floatHeaderOptions' => ['scrollingTop' => '20'],
            'perfectScrollbar' => true,
            'footerRowOptions' => ['style' => 'font-weight:bold;text-decoration: underline; position: absolute'],
            'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'headerRowOptions' => ['style' => 'background-color: #00bfa5;color:#fff;'],
            'summary' => false,
            'columns' => require(__DIR__ . '/_columns.php'),
            //'layout' => $layout,
            'rowOptions'=>function($model){
                if($model->date_service == Date('Y-m-d')){
                    return ['class' => 'info'];
                }
                if($model->id == Yii::$app->request->get('id')){
                    return ['class' => 'success'];
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
<?php
$js = <<< JS
$(function(){
loadForm();

//  $("#btn-delete").click(function(){
//     var keys = $("#crud-procedure").yiiGridView("getSelectedRows");
//     //console.log(keys);
//     var url = 'index.php?r=doctorworkbench/pcc-procedure/bulk-delete'
//     if(keys.length>0){
//         $.ajax({
//             url:url,
//             method:'post',
//             data:{pks:keys.join()},
//             success: function(response){
//             $.pjax.reload({container:response.forceReload});
//             }
//         });
//     }
//   });
 
    // $('#crud-procedure').on('grid.radiocleared', function(ev, key, val) {
    //     //console.log("Key = " + key + ", Val = " + val);
    //     window.location.href = $('#index').attr('action');
    //     //alert();
    // });
// });


});


$('#procedure-pjax').on('pjax:start', function(event, data, status, xhr, options) {
    loadForm();
        // loadFormPe();
        // $.pjax({url:'index.php?r=chiefcomplaint/pccservicepe' , container: '#pe-pjax'})
});

    
function loadForm(){
    $.ajax({
        type: "get",
        url: "index.php?r=doctorworkbench/pcc-procedure/create",
        dataType: "json",
        success: function (response) {
            $('#ProcedureForm').html(response)
        }
    });
}
JS;
$this->registerJS($js);
?>


