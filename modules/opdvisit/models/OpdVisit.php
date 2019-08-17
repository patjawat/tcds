<?php

namespace app\modules\opdvisit\models;

use app\components\DateTimeHelper;
use app\modules\usermanager\models\User;
use Yii;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;

class OpdVisit extends \yii\db\ActiveRecord {

    public $items;

    public static function getDb() {
        return Yii::$app->get('tcds');
    }

<<<<<<< HEAD
    public static function tableName()
    {
=======
    public static function tableName() {
>>>>>>> 1d51af811ef7222d83dbc0c7356808c45bf67e48
        return 'opd_visit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id', 'vn', 'hn', 'service_start_date', 'service_start_time'], 'required'],
            [
                [
                    'created_at',
                    'updated_at',
                    'service_start_date',
                    'service_start_time',
                    'service_end_date',
                    'service_end_time',
                    'visit_date', 'print',
                    'checkout', 'no_med',
                    'checkout_date',
                    'checkout_time',
                    'items',
                    'med_accept',
<<<<<<< HEAD
                    'med_accept_time',
=======
                    'med_accetp_time',
>>>>>>> 1d51af811ef7222d83dbc0c7356808c45bf67e48
                    'med_accept_requester',
                    'med_arrange',
                    'med_arrange_time',
                    'med_arrange_requester',
                    'med_check',
                    'med_check_time',
                    'med_check_requester',
                    'med_success',
                    'med_success_time',
                    'med_success_requester',
                ],
                'safe'],
<<<<<<< HEAD

=======
>>>>>>> 1d51af811ef7222d83dbc0c7356808c45bf67e48
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
            'visit_date' => 'visit_date',
            'checkout_date' => 'วันที่ Checkout',
            'checkout_time' => 'เวลา checkout',
            'med_accept_time' => 'เวลาคีย์',
            'med_accept_requester' => 'ผู้คีย์ยา',
            'med_arrange' => 'สถานะจัดยา',
            'med_arrange_time' => 'เวลาจัดยา',
            'med_arrange_requester' => 'ผู้จัดยา',
            'med_check' => 'สถานะตรวจสอบยา',
            'med_check_time' => 'เวลาตรวจสอบยา',
            'med_check_requester' => 'ผู้ตรวจสอบยา',
            'med_success' => 'สถานะจ่ายยา',
            'med_success_time' => 'เวลาจ่ายยา',
            'med_success_requester' => 'ผู้จ่ายยา',
        ];
    }
<<<<<<< HEAD
    public function behaviors()
    {
=======

    public function behaviors() {
>>>>>>> 1d51af811ef7222d83dbc0c7356808c45bf67e48
        return [
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [ActiveRecord::EVENT_BEFORE_INSERT => ['id']],
<<<<<<< HEAD
                'value' => function () {
                    return DateTimeHelper::getDbDateTimeNow();
                },
=======
                'value' => function() {
                    return DateTimeHelper::getDbDateTimeNow();
                }
>>>>>>> 1d51af811ef7222d83dbc0c7356808c45bf67e48
            ],
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [ActiveRecord::EVENT_BEFORE_INSERT => ['vn']],
<<<<<<< HEAD
                'value' => function () {
                    return DateTimeHelper::getDbDateTimeNow();
                },
=======
                'value' => function() {
                    return DateTimeHelper::getDbDateTimeNow();
                }
>>>>>>> 1d51af811ef7222d83dbc0c7356808c45bf67e48
            ],
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [ActiveRecord::EVENT_BEFORE_INSERT => ['service_start_date']],
<<<<<<< HEAD
                'value' => function () {
                    return DateTimeHelper::getDbNow();
                },
=======
                'value' => function() {
                    return DateTimeHelper::getDbNow();
                }
>>>>>>> 1d51af811ef7222d83dbc0c7356808c45bf67e48
            ],
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [ActiveRecord::EVENT_BEFORE_INSERT => ['service_start_time']],
<<<<<<< HEAD
                'value' => function () {
                    return DateTimeHelper::getDbNow();
                },
=======
                'value' => function() {
                    return DateTimeHelper::getDbNow();
                }
>>>>>>> 1d51af811ef7222d83dbc0c7356808c45bf67e48
            ],
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at']],
<<<<<<< HEAD
                'value' => DateTimeHelper::getDbNow(),

=======
                'value' => DateTimeHelper::getDbNow()
>>>>>>> 1d51af811ef7222d83dbc0c7356808c45bf67e48
            ],
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at'],
<<<<<<< HEAD
                'value' => DateTimeHelper::getDbNow(),

=======
                'value' => DateTimeHelper::getDbNow()
>>>>>>> 1d51af811ef7222d83dbc0c7356808c45bf67e48
            ],
            // [
            //     'class' => AttributeBehavior::className(),
            //     'attributes' => [ActiveRecord::EVENT_BEFORE_UPDATE => 'data_json'],
            //     'value' => DateTimeHelper::getDbTimestramp()
<<<<<<< HEAD

            // ],

=======
            // ],
>>>>>>> 1d51af811ef7222d83dbc0c7356808c45bf67e48
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
<<<<<<< HEAD
            ],

=======
            ]
>>>>>>> 1d51af811ef7222d83dbc0c7356808c45bf67e48
        ];
    }

// relation ข้อมูลผู้ป่วย
<<<<<<< HEAD
    public function getPatient()
    {
=======
    public function getPatient() {
>>>>>>> 1d51af811ef7222d83dbc0c7356808c45bf67e48
        return $this->hasOne(HisPatient::className(), ['hn' => 'hn']);
    }

    public function getVs() {
        return $this->hasOne(OpdVisit::className(), ['vn' => 'vn']);
    }

//ดึงชื่อ นามสกุลมาแสดง
<<<<<<< HEAD
    public function Patient($hn)
    {
=======
    public function Patient($hn) {
>>>>>>> 1d51af811ef7222d83dbc0c7356808c45bf67e48
        $model = HisPatient::findOne(['hn' => $hn]);
        if ($model) { // ถ้ามีข้อมูง
            return $model->prefix . $model->fname . ' ' . $model->lname;
        } else { // ถ้าำม่มีขจ้อมูลแสดงเป็น -
            return '';
        }
    }

<<<<<<< HEAD
    public function DoctorName($doctor_id)
    {
=======
    /**
     * แพทย์ที่ส่งตรวจ ตามรหัสแพทย์
     * @todo ให้แสดงตามรหัสแพทย์ HIS ก่อน เพื่อใช้ตรวจสอบรหัสแพทย์ระหว่างทดสอบ
     * @param string $doctor_id รหัสแพทย์ที่ส่งตรวจ
     * @return string ชื่อ นามสกุล แพทย์จากระบบ HIS
     */
    public function DoctorName($doctor_id) {
        return $doctor_id;
        /**
>>>>>>> 1d51af811ef7222d83dbc0c7356808c45bf67e48
        $model = User::findOne(['doctor_id' => $doctor_id]);
        if ($model) {
            return $model->fullname;
        } else {
            return '-';
        }
        **/
    }

}
