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
'pi' => 'active',
'pe' => '',
'education' => ''

]);?>
<?=$this->render('@app/modules/chiefcomplaint/views/pccservicepi/create', ['model' => $model,'dataProvider'=>$dataProvider]);?>
<?=$this->render('../default/panel_foot');?>
