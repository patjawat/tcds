<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;
use yii\web\View;
use kartik\widgets\Select2;
use yii\web\JsExpression;

CrudAsset::register($this);
$this->registerJS($this->render('../../dist/js/script.js'));
?>

<?php  echo $this->render('./create',['model' => $model]);?>

<?= Html::button('<i class="fa fa-trash"></i> ลบรายการ', ['class' => 'btn btn-danger','id'=>'btn-delete','style' => 'margin-bottom:5px;']) ?>
 
<div class="pcc-diagnosis-index">
    <div id="ajaxCrudDatatable">
        <?=GridView::widget([
            'id'=>'crud-diagnosis',
            'dataProvider' => $dataProvider,
            'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '-'],
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columns.php'),        
            'striped' => true,
            'condensed' => true,
            'responsive' => true,  
            'summary'=>false,       
        ])?>
    </div>
</div>


<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "footer"=>"",
])?>
<?php Modal::end(); ?>

<?php
$js = <<< JS
// $(document).ready(function() { 
    // $("#icd_code").select2({dropdownCssClass : 'bigdrop'}); 
// });

 $("#btn-delete").click(function(){
    var keys = $("#crud-datatable").yiiGridView("getSelectedRows");
    //console.log(keys);
    var url = 'index.php?r=doctorworkbench/pcc-diagnosis/bulk-delete'
    if(keys.length>0){
        $.ajax({
            url:url,
            method:'post',
            data:{pks:keys.join()},
            success: function(){
             $.pjax.reload({container: "#crud-datatable-pjax"});
            }
        });
        
    }
  });
JS;
$this->registerJS($js);
?>

