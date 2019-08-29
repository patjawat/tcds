<?php

namespace app\modules\hispatient\models;

use Yii;
use yii\bootstrap4\Html;
use app\components\DbHelper;
class HisPatient extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'his_patient';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('tcds');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hn', 'fname', 'idcard'], 'required'],
            [['hn'], 'integer'],
            [['birthday_date', 'UPDATE_TIME'], 'safe'],
            [['doctor_history'], 'string'],
            [['prefix', 'fname', 'lname'], 'string', 'max' => 50],
            [['sex'], 'string', 'max' => 1],
            [['idcard'], 'string', 'max' => 20],
            [['doctor_id'], 'string', 'max' => 100],
            [['hn'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'hn' => 'ข้อมูลผู้ป่วย',
            'prefix' => 'Prefix',
            'fname' => 'Fname',
            'lname' => 'Lname',
            'sex' => 'Sex',
            'birthday_date' => 'Birthday Date',
            'idcard' => 'Idcard',
            'UPDATE_TIME' => 'Update Time',
            'doctor_id' => 'Doctor ID',
            'doctor_history' => 'Doctor History',
        ];
    }

    public function patientTitle($hn){
        $model = HisPatient::findOne(['hn' => $hn]);
        $age = $this->Age($model->birthday_date);

        return 'HN ' .$model->hn .' '. $model->prefix.$model->fname.'  '.$model->lname.' เพศ '.($model->sex == 'M' ? 'ชาย' : 'หญิง').' อายุ '.$age['age_year'].'-'.$age['age_month'].'-'.$age['age_day']. ' <i class="fas fa-user-md"></i> '.($model->doctor_id ? $model->doctor_id : '-').' | '.Html::a('<i class="fas fa-power-off"></i>',['/emr'],['class' => 'btn btn-sm btn-default']); 
    }

    private function Age($birthday_date){
        $b_date = $birthday_date;

        $sql = "select '$b_date',curdate(),
        timestampdiff(year,'$b_date',curdate()) as age_year,
        timestampdiff(month,'$b_date',curdate())-(timestampdiff(year,'$b_date',curdate())*12) as age_month,
        timestampdiff(day,date_add('$b_date',interval (timestampdiff(month,'$b_date',curdate())) month),curdate()) as age_day";
        return  DbHelper::queryOne('db', $sql);
        
    }
}
