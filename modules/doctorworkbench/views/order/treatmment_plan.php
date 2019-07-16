<?=$this->render('../default/panel_top',[
'emr' => '',
'lab' => '',
'drug' => '',
'diagnosis' => '',
'medication' => '',
'procedure' => '',
'pre_order_lab' =>'',
'apointment' => '',
'treatmment_plan' => 'active',
'cc' => '',
'pi' => '',
'pe' => '',
'education' => ''

]);?>
<?=$this->render('@app/modules/treatment/views/treatmentplan/create',['model' => $model,]);?>

<?=$this->render('../default/panel_foot');?>
