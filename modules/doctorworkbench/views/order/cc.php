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
'cc' => 'active',
'pi' => '',
'pe' => '',
'education' => ''

]);?>
<?=$this->render('@app/modules/chiefcomplaint/views/pccservicecc/create',['model' => $model,'dataProvider'=>$dataProvider]);?>

<?=$this->render('../default/panel_foot');?>
