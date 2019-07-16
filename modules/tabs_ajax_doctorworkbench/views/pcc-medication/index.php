<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;

CrudAsset::register($this);
?>

<?php echo $this->render('./create', ['model' => $model]); ?>

<div style="margin-top:15px;">
<?= Html::button('<i class="fa fa-trash"></i> ลบรายการ', ['class' => 'btn btn-danger pull-eft', 'id' => 'btn-delete']) ?>
<?=Html::a('<i class="fa fa-print"></i> พิมพ์ฉลากยา','http://122.154.235.70/medico/report/',['class' => 'btn btn-info pull-right','target' => '_blank'])?>
<?php // Html::button('<i class="fa fa-print"></i> พิมพ์สติกเกอร์ยา', ['class' => 'pull-right','id' => 'modelButton', 'value' => \yii\helpers\Url::to(['print-med']), 'class' => 'btn btn-success']);// show modal ?> 
</div>

<div class="pcc-medication-index" style="margin-top:7px;">
    <div id="ajaxCrudDatatable">
        <?=
        GridView::widget([
            'id' => 'crud-medication',
            'dataProvider' => $dataProvider,
            'pjax' => true,
            'columns' => require(__DIR__ . '/_columns.php'),
            'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => '-'],
            'showPageSummary' => true,
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'summary' => false,
        ])
        ?>
    </div>
</div>
<?php
            
Modal::begin([
        'header' => '<h4>Print</h4>',
        'id'     => 'modelprint',
        'size'   => 'model-lg',
]);

echo "<div id='modelContent'></div>";

Modal::end();
?>



<?php
Modal::begin([
    "id" => "ajaxCrudModal",
    "footer" => "",
])
?>
<?php Modal::end(); ?>

<?php
$js = <<< JS
// $('#icode').on('select2:select', function (e) {
//      $("#qty").focus();
// });

 $("#btn-delete").click(function(){
    var keys = $("#crud-datatable").yiiGridView("getSelectedRows");
    //console.log(keys);
    var url = 'index.php?r=doctorworkbench/pcc-medication/bulk-delete'
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
  
  
  $(function(){
    $('#modelButton').click(function(){
        $('#modelprint').modal('show')
            .find('#modelContent')
            .load($(this).attr('value'));
    });
});


JS;
$this->registerJS($js);
?>