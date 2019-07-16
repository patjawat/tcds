<?php
use yii\bootstrap\Modal;
$this->registerJs($this->render('../../dist/js/drughis.js'));

?>



<?=$this->render('../default/panel_top',[
'emr' => '',
'lab' => '',
'drug' => 'active',
'diagnosis' => '',
'medication' => '',
'procedure' => '',
'pre_order_lab' =>'',
'apointment' => '',
'treatmment_plan' => '',
'cc' => '',
'pi' => '',
'pe' => '',
'education' => ''

]);?>
<?php
   echo $this->render('@app/modules/drug/views/pccmed/index',[
    'searchModel' => $searchModel,
    'dataProvider' => $dataProvider,
]);
?>


<?=$this->render('../default/panel_foot');?>

<?php
$js = <<< JS


JS;
$this->registerJS($js);
?>
