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
'cc' => ''

]);?>
<?php
   echo $this->render('@app/modules/drug/views/hosdrug/index',[
    'searchModel' => $searchModel,
    'dataProvider' => $dataProvider,
    'cid'=>$cid
]);
?>
<?=$this->render('../default/panel_foot');?>
