<?php
use app\components\PatientHelper;
use app\components\DbHelper;
use app\modules_share\newpatient\models\mPatient;
use cenotia\components\modal\RemoteModal;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use lo\widgets\modal\ModalAjax;

$hn = PatientHelper::getCurrentHn();
$vn_session = PatientHelper::getCurrentVn();
$vn = PatientHelper::getDateVisitByVn(11);
$fullname = PatientHelper::getPatientNameByHn($hn);
$fullname = PatientHelper::getPatientNameByHn($hn);
$fname = PatientHelper::getCurrentFname();
$lname = PatientHelper::getCurrentLname();
$cid = PatientHelper::getCurrentCid();
$model = mPatient::findOne($hn);
use app\modules\doctorworkbench\models\Medication;
use app\modules\doctorworkbench\models\Drugitems;
use app\modules\doctorworkbench\models\HisDrug;

$q = 'CRD';
 $useMed =Medication::find()->select('icode')->where(['pcc_vn' => PatientHelper::getCurrentPccVn(),'vn' => PatientHelper::getCurrentVn(),'hn' => PatientHelper::getCurrentHn()])->all();           
//  $query = new \yii\db\Query();
//  $query->select(['id', 'concat(trade_name,general_name) as text'])
//          ->from('his_drug')
//          ->where("trade_name LIKE '%".$q."%'")
//          ->orwhere("general_name LIKE '%".$q."%'")
//          ->andWhere(['NOT IN','id',$useMed])
//          ->limit(20);
        
$data = [];

foreach ($useMed  as $key => $val_):
$data[]=$val_->icode;
endforeach;

// print_r($data);

$query  = HisDrug::find()
->select(['id', 'concat(trade_name,general_name) as text'])
->andFilterWhere(['like', 'trade_name', $q])
->orFilterWhere(['like', 'general_name', $q])
->andWhere(['NOT IN','id',$data])
->all();
    //  echo "<pre>";
    //   print_r($query);
    //   echo "</pre>";
    // foreach ($useMed as $key => $value) {
    //     echo $value->icode.'<br>';
    // }
    // print(array_values($query));
?>

<?php
$a=array("Name"=>"Peter","Age"=>"41","Country"=>"USA");
// print_r(array_values($query));
print_r($out['results'] = array_values($query));

?>