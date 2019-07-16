<?php

namespace app\models\sys_models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "sys_routing_log".
 *
 * @property string $id
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 * @property string $routing_id
 * @property array $data_json
 */
class SysRoutingLog extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'sys_routing_log';
    }

    public function behaviors() {
        parent::behaviors();
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className()
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id'], 'safe'],
            [['created_at', 'updated_at', 'data_json'], 'safe'],
            [['created_by', 'updated_by', 'routing_id'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'routing_id' => 'Routing ID',
            'data_json' => 'Data Json',
        ];
    }

}
