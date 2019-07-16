<?=$this->render('../default/panel_top',[
'emr' => '',
'lab' => '',
'drug' => '',
'diagnosis' => '',
'medication' => '',
'procedure' => '',
'pre_order_lab' =>'',
'apointment' => '',
'treatmment_plan' => '',
'cc' => '',
'pi' => '',
'pe' => '',
'education' => 'active'

]);?>
<?php
    echo $this->render('@app/modules/education/views/education/create',[
        'model'=>$model,
        'dataProvider'=>$dataProvider
                       //'searchModel' => $searchModel,
                       //'dataProvider' => $dataProvider,
                       //'cid'=>$cid
                       ]);
    ?>
<?=$this->render('../default/panel_foot');?>