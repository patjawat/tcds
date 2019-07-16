<?php

namespace app\modules\queuemanage\models;

use Yii;

/**
 * This is the model class for table "pcc_doctor_room_queue".
 *
 * @property string $id
 * @property string $pcc_vn
 * @property int $room_id
 * @property string $nurse_send_date
 * @property string $nurse_send_time
 * @property string $call_status
 * @property int $order_number ลำดับ
 * @property string $cid
 */
class PccDoctorRoomQueue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pcc_doctor_room_queue';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['id'], 'required'],
            [['id'], 'string'],
            [['room_id', 'order_number'], 'default', 'value' => null],
            [['room_id', 'order_number'], 'integer'],
            [['nurse_send_date', 'nurse_send_time'], 'safe'],
            [['pcc_vn', 'cid'], 'string', 'max' => 15],
            [['call_status'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pcc_vn' => 'Pcc Vn',
            'room_id' => 'Room ID',
            'nurse_send_date' => 'Nurse Send Date',
            'nurse_send_time' => 'Nurse Send Time',
            'call_status' => 'Call Status',
            'order_number' => 'ลำดับ',
            'cid' => 'Cid',
        ];
    }
}
