<?=$this->render('../default/panel_top',[
'emr' => '',
'lab' => 'active',
'drug' => '',
'diagnosis' => '',
'medication' => '',
'procedure' => '',
'pre_order_lab' =>'',
'apointment' => '',
'treatmment_plan' => '',
'cc' => ''

]);?>
<?php
   echo $this->render('@app/modules/lab/views/hoslab/index',[
    'searchModel' => $searchModel,
    'dataProvider' => $dataProvider,
    'cid'=>$cid
]);
?>
<?=$this->render('../default/panel_foot');?>
