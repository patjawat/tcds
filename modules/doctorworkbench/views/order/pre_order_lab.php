<?=$this->render('../default/panel_top',[
'emr' => '',
'lab' => '',
'drug' => '',
'diagnosis' => '',
'medication' => '',
'procedure' => '',
'pre_order_lab' =>'active',
'apointment' => '',
'treatmment_plan' => '',
'cc' => '',
'pi' => '',
'pe' => '',
'education' => ''

]);?>

<?php
   echo $this->render('@app/modules/lab/views/preorderlab/index',[
    'searchModel' => $searchModel,
    'dataProvider' => $dataProvider,
    'model' => $model

]);
?>


<?=$this->render('../default/panel_foot');?>
