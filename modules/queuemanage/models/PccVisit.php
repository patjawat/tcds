<?php

namespace app\modules\queuemanage\models;

use Yii;

/**
 * This is the model class for table "pcc_visit".
 *
 * @property string $pcc_vn auto
 * @property string $jhcis_vn ดึงจาก vn ของ jhcis ในวันั้น
 * @property string $person_cid เลขบัตรประชาชน
 * @property string $jhcis_hn hn ของ jhcis
 * @property string $hos_hn
 * @property string $visit_date_begin ดึงจาก jhcis
 * @property string $visit_time_begin ดึงจาก jhcis
 * @property string $visit_type ดึงจาก jhcis
 * @property string $visit_department auto
 * @property string $visit_queue_code
 * @property string $current_station
 * @property string $visit_date_end
 * @property string $visit_time_end
 * @property string $admit_number
 * @property array $data_json
 */
class PccVisit extends \yii\db\ActiveRecord
{
   public $date1;
   public $date2;
    public static function tableName()
    {
        return 'pcc_visit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pcc_vn', 'person_cid', 'visit_date_begin'], 'required'],
            [['visit_date_begin', 'visit_time_begin', 'visit_date_end', 'visit_time_end', 'data_json','date1','date2'], 'safe'],
            [['pcc_vn'], 'string', 'max' => 12],
            [['jhcis_vn', 'person_cid', 'jhcis_hn', 'hos_hn', 'visit_type', 'visit_department', 'visit_queue_code', 'current_station', 'admit_number'], 'string', 'max' => 255],
            [['pcc_vn'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pcc_vn' => 'auto',
            'jhcis_vn' => 'ดึงจาก vn ของ jhcis ในวันั้น',
            'person_cid' => 'เลขบัตรประชาชน',
            'jhcis_hn' => 'hn ของ jhcis',
            'hos_hn' => 'Hos Hn',
            'visit_date_begin' => 'ดึงจาก jhcis',
            'visit_time_begin' => 'ดึงจาก jhcis',
            'visit_type' => 'ดึงจาก jhcis',
            'visit_department' => 'auto',
            'visit_queue_code' => 'Visit Queue Code',
            'current_station' => 'Current Station',
            'visit_date_end' => 'Visit Date End',
            'visit_time_end' => 'Visit Time End',
            'admit_number' => 'Admit Number',
            'data_json' => 'Data Json',
        ];
    }

    public function getPatient()
    {
        return $this->hasMany(GatewayEmrLab::className(), ['cid' => 'person_cid']);
    }



}
