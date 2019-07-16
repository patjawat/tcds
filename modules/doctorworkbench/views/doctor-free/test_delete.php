<?php
use Yii;
use app\modules\doctorworkbench\models\DoctorFree;
use app\modules\doctorworkbench\models\DoctorFreeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use app\components\PatientHelper;
use app\components\DbHelper;
use app\components\UserHelper;
use JsonRpc;


 $url = PatientHelper::getUrl().'/DFRpcS';
 # create our client object, passing it the server url
 $Client = new JsonRpc\Client($url);
 # set up our rpc call with a method and params
 $success = false;

 $idx_ = ['document_id' => "DF00000001", 'document_thdate' => "25620504"];
$success = $Client->call('rmvDfOpd', [$idx_]);


?>

<?php
            echo '<b>Json RPC:</b> ', $url;
            echo '<br /><br />';

            echo '<b>result:</b> ', print_r($Client->result, 1);
            echo '<br /><br />';

            echo '<b>error:</b> ', $Client->error;
            echo '<br /><br />';

            echo '<b>output:</b> ', $Client->output;
            ?>