<?php

namespace app\components;

use yii\base\Component;
use app\modules_share\newpatient\models\mPatient;
use app\models\lookup\CPrename;
use yii\base\UserException;
use lavrentiev\widgets\toastr\Notification;
use JsonRpc;
use yii\helpers\Json;
use app\components\DbHelper;
use app\components\UserHelper;
use app\modules\opdvisit\models\OpdVisit;
use app\modules\opdvisit\models\HisPatient;


class PatientHelper extends Component
{
    public static function getUrl()
    {
        return 'http://133f2fdb.ngrok.io/HIS/index.php/';
    }

    public static function getPatientTitleByHn($hn)
    {
        $show = '<i class="fa fa-wheelchair" aria-hidden="true"></i> กรุณาเลือกผู้เข้ารับบริการ';
        if (empty($hn)) {
            return $show;
        } else {
            # code...
            $pt_title = 'HN '.self::getCurrentHn().
            ' | '.
            self::getCurrentPrefix().
            self::getCurrentFname() .
            '  '. self::getCurrentLname().
            ' / '.self::getCurrentSex().
            '   | อายุ  '.self::getCurrentAgeY().'-'.self::getCurrentAgeM().'-'.self::getCurrentAgeD().' '.self::getCurrentDoctorPrefix().'| <i class="fas fa-user-md"></i> '.self::getCurrentDoctorName();
            // $pt_title .= " :" . $model->agey . "ปี " . $model->agem . "ด " . $model->aged . "ว";
            // return '<i class="fa fa-wheelchair" aria-hidden="true"></i> '. $hn .':'. $pt_title;
            return  $pt_title;
        }
        // $model = mPatient::findOne($hn);
        // if ($model) {
        //     $prename = CPrename::findOne($model->prename);
        //     $pt_title = '<i class="far fa-user"></i> '.self::getCurrentFname() . self::getCurrentLname().'   | อายุ  '.$model->agey;
        //     // $pt_title .= " :" . $model->agey . "ปี " . $model->agem . "ด " . $model->aged . "ว";
        //     // return '<i class="fa fa-wheelchair" aria-hidden="true"></i> '. $hn .':'. $pt_title;
        //     return  $pt_title;
        // } else {
        //     return '<i class="fa fa-wheelchair" aria-hidden="true"></i> กรุณาเลือกผู้เข้ารับบริการ';
        // }
    }

    public static function getPatientNameByHn($hn)
    {

        // $show = '<i class="fa fa-wheelchair" aria-hidden="true"></i> กรุณาเลือกผู้เข้ารับบริการ';
        // if (empty($hn)) {
        //     return '';
        // }
        // $model = mPatient::findOne($hn);
        // if ($model) {
        //     $prename = CPrename::findOne($model->prename);
        //     $pt_title = $prename->title_th . $model->fname . " " . $model->lname;

        //     return  $pt_title;
        // }
    }


    public static function getDummy()
    {
        return 'dummmy';
    }
    //getCurrentCid
    public static function getCurrentCid()
    {
        return \Yii::$app->session->get('cid');
    }
    public static function genNextHn()
    {
        $prev_hn = mPatient::find()->orderBy(['hn' => SORT_DESC])->one();
        $next_hn = '000000000' . ((int) $prev_hn->hn + 1);
        return substr($next_hn, -9);
    }

    public static function setCurrentHn($hn)
    {
        self::removeCurrentHn();
        \Yii::$app->session->set('hn', $hn);
    }

    public static function setCurrentVn($vn)
    {
        self::removeCurrentVn();
        \Yii::$app->session->set('vn', $vn);
    }

    public static function setCurrentPccVn($pcc_vn)
    {
        self::removeCurrentVn();
        \Yii::$app->session->set('pcc_vn', $pcc_vn);
    }

    public static function setCurrentPrefix($prefix)
    {
        self::removeCurrentPrefix();
        \Yii::$app->session->set('prefix', $prefix);
    }

    public static function setCurrentSex($sex)
    {
        self::removeCurrentSex();
        \Yii::$app->session->set('sex', $sex);
    }

    public static function setCurrentAge($date,$hn)
    {
        //คำนวนอายุ ปี เดือน วัน
        self::removeCurrentAge();
        $check_hn  = HisPatient::findOne(['hn' => $hn]);
        if($check_hn){
            $b_date = $check_hn->birthday_date;
        }else {
            $y = substr($date, 0, 4);
            $m = substr($date, 4, 2);
            $d = substr($date, 6, 2);
            $b_date = '0000-00-00';
        }
       
        // $b_date = $y.'-'.$m.'-'.$d;
        
        // $sql = "select EXTRACT(YEAR FROM age(cast('$b_date' as date))) as age";
        // $sql = "select (YEAR(NOW()) - YEAR('$b_date')) as age";
        $sql = "select '$b_date',curdate(),
        timestampdiff(year,'$b_date',curdate()) as age_year,
        timestampdiff(month,'$b_date',curdate())-(timestampdiff(year,'$b_date',curdate())*12) as age_month,
        timestampdiff(day,date_add('$b_date',interval (timestampdiff(month,'$b_date',curdate())) month),curdate()) as age_day";
        $data = DbHelper::queryOne('db', $sql);
        \Yii::$app->session->set('age_year', $data['age_year']);
        \Yii::$app->session->set('age_mounth', $data['age_month']);
        \Yii::$app->session->set('age_day', $data['age_day']);

    }

    public static function viewCurrentThaiDate($date)
    {
        $y1 = substr($date, 0, 4);
        $y = $y1 + 543;
        $m = substr($date, 4, 2);
        $d = substr($date, 6, 2);
        // return  $y.'-'.$m.'-'.$d;
        return $d.'/'.$m.'/'.$y;
    }

    public static function masterDateToThaiDate($date)
    {
       $data =  explode("-",$date);
        // return  $y.'-'.$m.'-'.$d;
        return $data[2].'/'.$data['1'].'/'.($data[0]+543);
    }


    public static function setCurrentFname($fname)
    {
        self::removeCurrentFname();
        \Yii::$app->session->set('fname', $fname);
    }

    public static function setCurrentlname($lname)
    {
        self::removeCurrentLname();
        \Yii::$app->session->set('lname', $lname);
    }

    public static function setCurrentDoctorPrefix($prefix)
    {
        self::removeCurrentDoctorPrefix();
        \Yii::$app->session->set('doctorprefix', $prefix);
    }

    public static function setCurrentDoctorName($fname, $lname)
    {
        self::removeCurrentDoctorName();
        $fullname = $fname.'  '.$lname;
        \Yii::$app->session->set('doctorname', $fullname);
    }


    public static function setCurrentCid($cid)
    {
        self::removeCurrentCid();
        \Yii::$app->session->set('cid', $cid);
    }

    public static function setCurrentHnVn($hn, $vn)
    {
        self::removeCurrentHnVn();
        \Yii::$app->session->set('hn', $hn);
        \Yii::$app->session->set('pcc_vn', $vn);
        // \Yii::$app->session->set('vn', $vn);
    }
    public static function setDepartment($department)
    {
        self::removeDepartment();
        \Yii::$app->session->set('department', $department);
        // \Yii::$app->session->set('vn', $vn);
    }

    public static function setCurrentPatient($hn, $pcc_vn, $vn, $fname, $lname, $cid, $prename, $sex, $birthday)
    {
        // self::removeCurrentHnVn();
        // self::clearCurrent();
        // \Yii::$app->session->set('hn', $hn);
        // \Yii::$app->session->set('pcc_vn', $pcc_vn);
        // \Yii::$app->session->set('vn', $vn);
        // \Yii::$app->session->set('fname', $fname);
        // \Yii::$app->session->set('lname', $lname);
        // \Yii::$app->session->set('cid', $cid);
    }

    public static function getCurrentHn()
    {
        return \Yii::$app->session->get('hn');
    }

    public static function getCurrentVn()
    {
        return \Yii::$app->session->get('vn');
    }

    public static function getCurrentPccVn()
    {
        return \Yii::$app->session->get('pcc_vn');
    }

    public static function getCurrentPrefix()
    {
        return \Yii::$app->session->get('prefix');
    }

    public static function getCurrentDoctorName()
    {
        return \Yii::$app->session->get('doctorname');
    }

    public static function getCurrentDoctorPrefix()
    {
        return \Yii::$app->session->get('doctorprefix');
    }

    public static function getCurrentAgeY()
    {
        return \Yii::$app->session->get('age_year');
    }
    public static function getCurrentAgeM()
    {
        return \Yii::$app->session->get('age_mounth');
    }
    public static function getCurrentAgeD()
    {
        return \Yii::$app->session->get('age_day');
    }

    public static function getCurrentSex()
    {
        $sex = \Yii::$app->session->get('sex');
        return $sex = 'M' ? 'ชาย' : 'หญิง';
    }

    public static function getCurrentFname()
    {
        return \Yii::$app->session->get('fname');
    }
    public static function getCurrentLname()
    {
        return \Yii::$app->session->get('lname');
    }

    public static function getDepartment()
    {
        return \Yii::$app->session->get('department');
    }

    public static function getDateVisitByVn($vn)
    {
        //vn=180822204836
        if (empty($vn) || strlen($vn) <> 12) {
            return '0000-00-00';
        }
        $date_visit = '20' . substr($vn, 0, 6);
        $date_visit = date_format(date_create($date_visit), 'Y-m-d');
        return $date_visit;
    }

    public static function getTimeVisitByVn($vn)
    {
        //vn=180822204836
        if (empty($vn) || strlen($vn) <> 12) {
            return '00:00:00';
        }
        $time_visit = substr($vn, -6);
        $time_visit = date_format(date_create($time_visit), 'H:i:s');
        return $time_visit;
    }

    public static function removeCurrentHn()
    {
        \Yii::$app->session->remove('hn');
    }

    public static function removeCurrentVn()
    {
        \Yii::$app->session->remove('vn');
    }

    public static function removeCurrentPrefix()
    {
        \Yii::$app->session->remove('prefix');
    }

    public static function removeCurrentSex()
    {
        \Yii::$app->session->remove('sex');
    }

    public static function removeCurrentAge()
    {
        \Yii::$app->session->remove('age_year');
        \Yii::$app->session->remove('age_month');
        \Yii::$app->session->remove('age_day');

    }

    public static function removeCurrentFname()
    {
        \Yii::$app->session->remove('fname');
    }


    public static function removeCurrentLname()
    {
        \Yii::$app->session->remove('lname');
    }
    public static function removeCurrentDoctorName()
    {
        \Yii::$app->session->remove('doctorname');
    }

    public static function removeCurrentDoctorPrefix()
    {
        \Yii::$app->session->remove('doctorprefix');
    }
    public static function removeDepartment()
    {
        \Yii::$app->session->remove('department');
    }




    public static function removeCurrentHnVn()
    {
        \Yii::$app->session->remove('hn');
        \Yii::$app->session->remove('vn');
    }

    public static function clearCurrent()
    {
        \Yii::$app->session->remove('hn');
        \Yii::$app->session->remove('pcc_vn');
        \Yii::$app->session->remove('vn');
        \Yii::$app->session->remove('fname');
        \Yii::$app->session->remove('lname');
        \Yii::$app->session->remove('cid');
        \Yii::$app->session->remove('CountDrugAllergy');
    }

    public static function getHnByVn($vn)
    {
        $sql = "select hn from s_opd_visit where pcc_vn = '$vn' limit 1";
        return \Yii::$app->db->createCommand($sql)->queryScalar();
    }

    public static function GetPatient($hn)
    {
        $url = self::getUrl().'PatientRpcS';
        $Client = new JsonRpc\Client($url);
        $success = false;
        $success = $Client->call('getByHn', [$hn]);
        if ($Client->result) {
            $data = $Client->result[0];
            if ($data) {
                return $data->fname.' '.$data->lname;
            } else {
                return '-';
            }
            PatientHelper::setCurrentPatient($data->fname, $data->lname);
        } else {
            return '-';
        }
    }

    public static function RequesterName($key)
    {
        $url = self::getUrl().'RequesterRpcS';
        $Client = new JsonRpc\Client($url);
        $success = false;
        $success = $Client->call('getById', [$key]);
        $data =  $Client->result;
        if ($data) {
            return $data[0]->name;
        } else {
            return '-';
        }
    }

    public static function getVisitCount()
    {
        $date_start =  Date('Y-m-d');
        $date_end =   Date('Y-m-d');
        $department = self::getDepartment();
        $doctor = UserHelper::getUser('doctor_id');
        return OpdVisit::find()
        ->where(['doctor_id' => $doctor,'department' => $department])
        ->andWhere(['between', 'service_start_date', $date_start, $date_end])
        ->count();
    }

  public static function DrugAllergy(){
    \Yii::$app->session->remove('CountDrugAllergy');
    $hn = PatientHelper::getCurrentHn();
    // $hn = '168348';
    $url = self::getUrl().'DrugAllergyRpcS';
    $Client = new JsonRpc\Client($url);
    $success = false;
    $success = $Client->call('getByHn', [$hn]);
    $data =  $Client->result;
    //นีับจำนวนการแพร้ยา
    \Yii::$app->session->set('CountDrugAllergy', count($data));
    return $data;
  }

  public static function getCurrentCountDrugAllergy()
  {
      return \Yii::$app->session->get('CountDrugAllergy');
  }

  public static function DrugAlert(){

    if(self::getCurrentCountDrugAllergy() > 0){
    Notification::widget([
      'options' => [
        "closeButton" => true,
        "debug" => false,
        "newestOnTop" => false,
        "progressBar" => false,
        "positionClass" => \lavrentiev\widgets\toastr\NotificationFlash::POSITION_TOP_RIGHT,
        "preventDuplicates" => false,
        "onclick" => null,
        "showDuration" => "300",
        "hideDuration" => "1000",
        "timeOut" => "5000",
        "extendedTimeOut" => "1000",
        "showEasing" => "swing",
        "hideEasing" => "linear",
        "showMethod" => "fadeIn",
        "hideMethod" => "fadeOut"
    ],
        'type' => 'error',
        'title' => 'แจ้งเตือน',
        'message' => 'ผู้ป่วยแพ้ยา'
    ]);
    }
  }

// 

public static function removeCurrentHnEmr()
{
    \Yii::$app->session->remove('hnemr');
}


  public static function setCurrentHnEmr($hn)
  {
      self::removeCurrentHnEmr();
      \Yii::$app->session->set('hnemr', $hn);
  }

  public static function getCurrentHnEmr(){
   return  \Yii::$app->session->get('hnemr');
  }

  }
