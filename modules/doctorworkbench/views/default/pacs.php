<?php
use yii\helpers\Html;
use app\components\PatientHelper;
$hn =  PatientHelper::getCurrentHn();
$this->params['pt_title'] = PatientHelper::getPatientTitleByHn($hn);
?>

<iframe width="100%" height="800" src="http://10.1.41.112/html5/index.html?PTNID=<?=$hn;?>" frameborder="0" allowfullscreen></iframe>