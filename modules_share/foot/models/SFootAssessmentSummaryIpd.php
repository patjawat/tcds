<?php

namespace app\modules_share\foot\models;

use Yii;

class SFootAssessmentSummaryIpd extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => \yii\behaviors\TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
               'value' => date('Y-m-d H:i:s')
            ],
        ];
    }
    
    public static function tableName()
    {
        return 's_foot_assessment_summary_ipd';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hn', 'date_start_service', 'time_start_service'], 'required'],
            [['id'], 'string'],
            [['data_json', 'created_at', 'updated_at', 'date_start_service', 'time_start_service', 'date_end_service', 'time_end_service', 'risk_of_foot_ulceration', 'right_monofilament', 'right_tuning_fork', 'right_dp', 'right_pt', 'right_abi', 'right_abi_non', 'right_claw_toe', 'right_hammer_toe', 'right_maillet_toe', 'right_hallux_algus', 'right_flat_foot', 'right_charcot_foot', 'right_post_surgical_deformity', 'right_callus', 'right_corn', 'right_nails', 'right_previon_foot_ulcer', 'right_previon_amputation', 'left_monofilament', 'left_tuning_fork', 'left_dp', 'left_pt', 'left_abi', 'left_abi_non', 'left_claw_toe', 'left_hammer_toe', 'left_maillet_toe', 'left_hallux_algus', 'left_flat_foot', 'left_charcot_foot', 'left_post_surgical_deformity', 'left_callus', 'left_corn', 'left_nails', 'left_previon_foot_ulcer', 'left_previon_amputation', 'suggestion_for_prevention'], 'safe'],
            [['vn'], 'string', 'max' => 12],
            [['hn'], 'string', 'max' => 9],
            [['requester', 'created_by', 'updated_by'], 'string', 'max' => 255],
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
            'vn' => 'Vn',
            'hn' => 'Hn',
            'data_json' => 'Data Json',
            'requester' => 'Requester',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'date_start_service' => 'Date Start Service',
            'time_start_service' => 'Time Start Service',
            'date_end_service' => 'Date End Service',
            'time_end_service' => 'Time End Service',
            'risk_of_foot_ulceration' => 'Risk Of Foot Ulceration',
            'right_monofilament' => 'Right Monofilament',
            'right_tuning_fork' => 'Right Tuning Fork',
            'right_dp' => 'Right Dp',
            'right_pt' => 'Right Pt',
            'right_abi' => 'Right Abi',
            'right_abi_non' => 'Right Abi Non',
            'right_claw_toe' => 'Right Claw Toe',
            'right_hammer_toe' => 'Right Hammer Toe',
            'right_maillet_toe' => 'Right Maillet Toe',
            'right_hallux_algus' => 'Right Hallux Algus',
            'right_flat_foot' => 'Right Flat Foot',
            'right_charcot_foot' => 'Right Charcot Foot',
            'right_post_surgical_deformity' => 'Right Post Surgical Deformity',
            'right_callus' => 'Right Callus',
            'right_corn' => 'Right Corn',
            'right_nails' => 'Right Nails',
            'right_previon_foot_ulcer' => 'Right Previon Foot Ulcer',
            'right_previon_amputation' => 'Right Previon Amputation',
            'left_monofilament' => 'Left Monofilament',
            'left_tuning_fork' => 'Left Tuning Fork',
            'left_dp' => 'Left Dp',
            'left_pt' => 'Left Pt',
            'left_abi' => 'Left Abi',
            'left_abi_non' => 'Left Abi Non',
            'left_claw_toe' => 'Left Claw Toe',
            'left_hammer_toe' => 'Left Hammer Toe',
            'left_maillet_toe' => 'Left Maillet Toe',
            'left_hallux_algus' => 'Left Hallux Algus',
            'left_flat_foot' => 'Left Flat Foot',
            'left_charcot_foot' => 'Left Charcot Foot',
            'left_post_surgical_deformity' => 'Left Post Surgical Deformity',
            'left_callus' => 'Left Callus',
            'left_corn' => 'Left Corn',
            'left_nails' => 'Left Nails',
            'left_previon_foot_ulcer' => 'Left Previon Foot Ulcer',
            'left_previon_amputation' => 'Left Previon Amputation',
            'suggestion_for_prevention' => 'Suggestion For Prevention',
        ];
    }
}
