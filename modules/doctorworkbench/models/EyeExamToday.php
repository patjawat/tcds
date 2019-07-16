<?php

namespace app\modules\doctorworkbench\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\AttributeBehavior;
use yii\db\Expression;
use yii\db\ActiveRecord;
use app\components\DateTimeHelper;
use app\components\PatientHelper;
use yii\helpers\Json;


class EyeExamToday extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'eye_exam_today';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['last_update'], 'safe'],
            [['data_json', 'form_service'], 'string'],
            [['hn'], 'string', 'max' => 9],
            [['vn', 'pcc_vn'], 'string', 'max' => 15],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hn' => 'Hn',
            'vn' => 'Vn',
            'last_update' => 'Last Update',
            'pcc_vn' => 'Pcc Vn',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'data_json' => 'Data Json',
            'form_service' => 'Form Service',
        ];
    }


    public function behaviors()
{
    return [
        [
            'class' => AttributeBehavior::className(),
            'attributes' => [ActiveRecord::EVENT_BEFORE_INSERT => ['created_at','updated_at']],
            'value' => DateTimeHelper::getDbNow()
            
        ],
        [
            'class' => AttributeBehavior::className(),
            'attributes' => [ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at'],
            'value' => DateTimeHelper::getDbNow()            
            
        ],
        // [
        //     'class' => AttributeBehavior::className(),
        //     'attributes' => [ActiveRecord::EVENT_BEFORE_UPDATE => 'data_json'],
        //     'value' => DateTimeHelper::getDbTimestramp()
            
        // ],

        [
            'class' => BlameableBehavior::className(),
            'createdByAttribute'=>'created_by',
            'updatedByAttribute' => 'updated_by',
        ]

    ];
}

}
