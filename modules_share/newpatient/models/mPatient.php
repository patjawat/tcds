<?php

namespace app\modules_share\newpatient\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
//for join
use app\models\lookup\CPrename;
use app\models\lookup\CSex;

/**
 * This is the model class for table "m_patient".
 *
 * @property string $hn
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 * @property string $requester
 * @property array $data_json
 * @property string $pid
 * @property string $prename
 * @property string $fname
 * @property string $mname
 * @property string $lname
 * @property string $sex
 * @property string $birthday
 * @property int $agey
 * @property int $agem
 * @property int $aged
 */
class mPatient extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'm_patient';
    }

    public function behaviors() {
        return [
            //TimestampBehavior::className(),
            BlameableBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['hn', 'pid', 'fname', 'sex', 'birthday'], 'required', 'message' => ''],
            [['created_at', 'updated_at', 'data_json', 'birthday','cid'], 'safe'],
            [['agey', 'agem', 'aged'], 'default', 'value' => null],
            [['agey', 'agem', 'aged'], 'integer'],
            [['hn'], 'string', 'max' => 9,'min'=>9],
            [['created_by', 'updated_by', 'requester', 'fname', 'mname', 'lname'], 'string', 'max' => 255],
            [['pid'], 'string', 'max' => 13],
            [['prename'], 'string', 'max' => 3],
            [['sex'], 'string', 'max' => 1],
            [['hn', 'pid'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'hn' => 'Hn',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'requester' => 'Requester',
            'data_json' => 'Data Json',
            'pid' => 'เลขบัตร/หนังสือเดินทาง',
            'prename' => 'คำนำหน้า',
            'fname' => 'ชื่อ',
            'mname' => 'ชื่อกลาง',
            'lname' => 'นามสกุล',
            'sex' => 'เพศ',
            'birthday' => 'เกิด',
            'agey' => 'อายุ(ปี)',
            'agem' => 'เดือน',
            'aged' => 'วัน',
            'cid' => 'cid'
        ];
    }

    public function getC_prename() {
        return $this->hasOne(CPrename::className(), ['id' => 'prename']);
    }

    public function getC_sex() {
        return $this->hasOne(CSex::className(), ['id' => 'sex']);
    }

    public function afterSave($insert, $changedAttributes) {
        parent::afterSave($insert, $changedAttributes);
        $sql = "UPDATE m_patient SET agey = EXTRACT(YEAR FROM   AGE(birthday) )
                ,agem = EXTRACT(MONTH FROM  AGE(birthday) )
                ,aged = EXTRACT(DAY FROM  AGE(birthday) )
                WHERE hn = '$this->hn' ";
        \Yii::$app->db->createCommand($sql)->execute();
    }

// end after save
}
