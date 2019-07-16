<?php

namespace app\components;

use yii\base\Component;
use app\modules_nurse\patiententry\models\SOpdVisit;

class NurseHelper extends Component {

    public static function openVisit($hn) {
        $vdate = date('Y-m-d');
        $vtime = date('H:i:s');
        $model = new SOpdVisit();
        $model->hn = $hn;
        $json = ['vdate' => $vdate,'vtime'=>$vtime];
        //$json = json_encode($json); // insert ด้วย model ไม่ต้อง json_encode
        $model->data_json = $json;        
        if($model->save(FALSE)){
            $sql = "SELECT vn from s_opd_visit  WHERE hn = '$hn' "
                    . " AND data_json->>'vdate' = '$vdate' AND data_json->>'vtime' = '$vtime'";
            $visit = SOpdVisit::findBySql($sql)->one();
            return $visit->vn;
        }
    }

}
