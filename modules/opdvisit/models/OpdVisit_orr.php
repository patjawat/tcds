<?php

namespace app\modules\opdvisit\models;

use Yii;
//use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\AttributeBehavior;
//use yii\db\Expression;
use yii\db\ActiveRecord;
use app\components\DateTimeHelper;
//use app\components\PatientHelper;
//use yii\helpers\Json;
use app\modules\usermanager\models\User;

class OpdVisit extends \yii\db\ActiveRecord {

    public static function getDb() {
        return Yii::$app->get('tcds');
    }

    public static function tableName() {
        return 'opd_visit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id', 'vn', 'hn', 'service_start_date', 'service_start_time'], 'required'],
            [['created_at', 'updated_at', 'service_start_date', 'service_start_time', 'service_end_date', 'service_end_time', 'visit_date', 'print', 'checkout', 'no_med'], 'safe'],
            [['data_json'], 'string'],
            [['id', 'requester', 'created_by', 'updated_by', 'service_department', 'department'], 'string', 'max' => 255],
            [['vn', 'pcc_vn'], 'string', 'max' => 12],
            [['hn'], 'string', 'max' => 9],
            [['service_type'], 'string', 'max' => 1],
            [['doctor_id'], 'string', 'max' => 100],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'vn' => 'gen from timestamp',
            'hn' => 'Hn',
            'requester' => 'Requester',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'service_start_date' => 'วันที่รับบริการ',
            'service_start_time' => 'Service Start Time',
            'service_end_date' => 'Service End Date',
            'service_end_time' => 'Service End Time',
            'service_type' => 'Service Type',
            'service_department' => 'Service Department',
            'pcc_vn' => 'Pcc Vn',
            'department' => 'แผนก/คลินิก',
            'doctor_id' => 'Doctor ID',
            'data_json' => 'Data Json',
            'visit_date' => 'visit_date'
        ];
    }

    public function behaviors() {
        return [
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [ActiveRecord::EVENT_BEFORE_INSERT => ['id']],
                'value' => function() {
                    return DateTimeHelper::getDbDateTimeNow();
                }
            ],
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [ActiveRecord::EVENT_BEFORE_INSERT => ['vn']],
                'value' => function() {
                    return DateTimeHelper::getDbDateTimeNow();
                }
            ],
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [ActiveRecord::EVENT_BEFORE_INSERT => ['service_start_date']],
                'value' => function() {
                    return DateTimeHelper::getDbDate();
                }
            ],
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [ActiveRecord::EVENT_BEFORE_INSERT => ['service_start_time']],
                'value' => function() {
                    return DateTimeHelper::getDbTime();
                }
            ],
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at']],
                'value' => DateTimeHelper::getDbTimestramp()
            ],
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at'],
                'value' => DateTimeHelper::getDbTimestramp()
            ],
            // [
            //     'class' => AttributeBehavior::className(),
            //     'attributes' => [ActiveRecord::EVENT_BEFORE_UPDATE => 'data_json'],
            //     'value' => DateTimeHelper::getDbTimestramp()
            // ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ]
        ];
    }

// relation ข้อมูลผู้ป่วย
    public function getPatient() {
        return $this->hasOne(HisPatient::className(), ['hn' => 'hn']);
    }

    public function getVs() {
        return $this->hasOne(OpdVisit::className(), ['vn' => 'vn']);
    }

//ดึงชื่อ นามสกุลมาแสดง
    public function Patient($hn) {
        $model = HisPatient::findOne(['hn' => $hn]);
        if ($model) { // ถ้ามีข้อมูง
            return $model->prefix . $model->fname . ' ' . $model->lname;
        } else { // ถ้าำม่มีขจ้อมูลแสดงเป็น -
            return '';
        }
    }

    /**
     * แพทย์ที่ส่งตรวจ ตามรหัสแพทย์
     * @todo แก้ไขให้ใช้ข้อมูลจาก HIS
     * @param type $doctor_id
     * @return string ชื่อ นามสกุล แพทย์จากระบบ HIS
     */
    public function DoctorName($doctor_id) {
        $model = User::findOne(['doctor_id' => $doctor_id]);
        if ($model) {
            //return $model->fullname;
            return $doctor_id;
        } else {
            return '-';
        }
    }

}
