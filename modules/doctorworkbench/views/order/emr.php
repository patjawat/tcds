<?=$this->render('../default/panel_top',[
                 'emr' => 'active',
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
              'education' => ''
                 ]);?>
<?php
    echo $this->render('@app/modules/emr/views/emrdetail/index',[
                       //'searchModel' => $searchModel,
                       'dataProvider' => $dataProvider,
                       'cid'=>$cid
                       ]);
    ?>
<?=$this->render('../default/panel_foot');?>
