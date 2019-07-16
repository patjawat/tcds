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
'pe' => 'active',
'education' => ''

]);?>
<?=$this->render('@app/modules/chiefcomplaint/views/pccservicepe/create',['model' => $model,'dataProvider'=>$dataProvider]);?>
<?=$this->render('../default/panel_foot');?>
