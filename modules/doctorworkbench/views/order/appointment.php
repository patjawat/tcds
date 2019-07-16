<?=

$this->render('../default/panel_top', [
              'emr' => '',
              'lab' => '',
              'drug' => '',
              'diagnosis' => '',
              'medication' => '',
              'procedure' => '',
              'pre_order_lab' => '',
              'apointment' => 'active',
              'treatmment_plan' => '',
              'cc' => '',
              'pi' => '',
              'pe' => '',
              'education' => ''
              ]);
?>
<?php
    
    echo $this->render('@app/modules/appointment/views/default/index', [
                       'events' => $events,
                       //'searchModel' => $searchModel,
                       'dataProvider' => $dataProvider,
                       //'cid' => $cid
                       ]);
    ?>
<?= $this->render('../default/panel_foot'); ?>
