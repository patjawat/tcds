<?php

namespace app\modules_share\foot\models;

use Yii;
class SFootUlcerFuOpd extends \yii\db\ActiveRecord
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
        return 's_foot_ulcer_fu_opd';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['requester','hn', 'date_start_service', 'time_start_service'], 'required'],
            [['id'], 'string'],
            [['data_json', 'created_at', 'updated_at', 'date_start_service', 'time_start_service', 'date_end_service', 'time_end_service', 'visit_date', 'visit_recorder', 'wagner', 'ut_grade', 'ut_stage', 'type_of_duf', 'date_of_onset', 'duration_of_days', 'duration_of_months', 'cause_of_dfu', 'foot_wear', 'recurrent_ulcer', 'location_of_ulcer_right', 'location_of_ulcer_left', 'bone_test_right', 'bone_test_left', 'characteristics_of_ulcer_right', 'characteristics_of_ulcer_left', 'drainage_amount_right', 'drainage_amount_left', 'drainage_type_right', 'drainage_type_left', 'drainage_odor_right', 'drainage_odor_left', 'infection_right', 'infection_left', 'infection_y_right', 'infection_y_left', 'monofilament_right', 'monofilament_left', 'tuning_fork_right', 'tuning_fork_left', 'vessel_palpation_dp_right', 'vessel_palpation_dp_left', 'vessel_palpation_pt_right', 'vessel_palpation_pt_left', 'doppler_right', 'doppler_left', 'abi1_right', 'abi1_left', 'toe_pressure_right', 'toe_pressure_left', 'tbi_right', 'tbi_left', 'off_loading_technique', 'off_loading_technique_y', 'local_procedure_performed', 'local_dressing_performed', 'post_revascularization', 'post_hbot', 'post_amputation', 'first_visit', 'abi2_right', 'abi3_right', 'abi3_left', 'abi_right_non_compressible', 'abi_left_non_compressible', 'ulcer_width_right', 'ulcer_length_right', 'ulcer_depth_left', 'ulcer_width_left', 'ulcer_length_left'], 'safe'],
            [['size_of_ulcer_width_right', 'size_of_ulcer_left', 'size_of_ulcer_length_right', 'size_of_ulcer_depth_right', 'size_of_ulcer_length_left', 'size_of_ulcer_depth_left', 'size_of_ulcer_width_left'], 'number'],
            [['period_number'], 'default', 'value' => null],
            [['period_number'], 'integer'],
            [['vn'], 'string', 'max' => 12],
            [['hn'], 'string', 'max' => 9],
            [['requester', 'created_by', 'updated_by', 'abi2_left', 'type_other_right', 'type_other_left', 'location_of_ulcer_other_right', 'location_of_ulcer_other_left', 'drainage_type_other_right', 'drainage_type_other_left', 'local_dressing_performed_other', 'cause_of_dfu_other', 'foot_wear_other', 'post_amputation_type', 'post_amputation_duration', 'post_amputation_months', 'post_amputation_year', 'post_revascularization_type', 'post_revascularization_duration', 'post_revascularization_months', 'post_revascularization_year', 'progress_note'], 'string', 'max' => 255],
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
            'visit_date' => 'Visit Date',
            'visit_recorder' => 'Visit Recorder',
            'wagner' => 'Wagner',
            'ut_grade' => 'Ut Grade',
            'ut_stage' => 'Ut Stage',
            'type_of_duf' => 'Type Of Duf',
            'date_of_onset' => 'Date Of Onset',
            'duration_of_days' => 'Duration Of Days',
            'duration_of_months' => 'Duration Of Months',
            'cause_of_dfu' => 'Cause Of Dfu',
            'foot_wear' => 'Foot Wear',
            'recurrent_ulcer' => 'Recurrent Ulcer',
            'location_of_ulcer_right' => 'Location Of Ulcer Right',
            'location_of_ulcer_left' => 'Location Of Ulcer Left',
            'size_of_ulcer_width_right' => 'Size Of Ulcer Width Right',
            'size_of_ulcer_left' => 'Size Of Ulcer Left',
            'bone_test_right' => 'Bone Test Right',
            'bone_test_left' => 'Bone Test Left',
            'characteristics_of_ulcer_right' => 'Characteristics Of Ulcer Right',
            'characteristics_of_ulcer_left' => 'Characteristics Of Ulcer Left',
            'drainage_amount_right' => 'Drainage Amount Right',
            'drainage_amount_left' => 'Drainage Amount Left',
            'drainage_type_right' => 'Drainage Type Right',
            'drainage_type_left' => 'Drainage Type Left',
            'drainage_odor_right' => 'Drainage Odor Right',
            'drainage_odor_left' => 'Drainage Odor Left',
            'infection_right' => 'Infection Right',
            'infection_left' => 'Infection Left',
            'infection_y_right' => 'Infection Y Right',
            'infection_y_left' => 'Infection Y Left',
            'monofilament_right' => 'Monofilament Right',
            'monofilament_left' => 'Monofilament Left',
            'tuning_fork_right' => 'Tuning Fork Right',
            'tuning_fork_left' => 'Tuning Fork Left',
            'vessel_palpation_dp_right' => 'Vessel Palpation Dp Right',
            'vessel_palpation_dp_left' => 'Vessel Palpation Dp Left',
            'vessel_palpation_pt_right' => 'Vessel Palpation Pt Right',
            'vessel_palpation_pt_left' => 'Vessel Palpation Pt Left',
            'doppler_right' => 'Doppler Right',
            'doppler_left' => 'Doppler Left',
            'abi1_right' => 'Abi1 Right',
            'abi1_left' => 'Abi1 Left',
            'toe_pressure_right' => 'Toe Pressure Right',
            'toe_pressure_left' => 'Toe Pressure Left',
            'tbi_right' => 'Tbi Right',
            'tbi_left' => 'Tbi Left',
            'off_loading_technique' => 'Off Loading Technique',
            'off_loading_technique_y' => 'Off Loading Technique Y',
            'local_procedure_performed' => 'Local Procedure Performed',
            'local_dressing_performed' => 'Local Dressing Performed',
            'post_revascularization' => 'Post Revascularization',
            'post_hbot' => 'Post Hbot',
            'period_number' => 'Period Number',
            'post_amputation' => 'Post Amputation',
            'first_visit' => 'First Visit',
            'abi2_right' => 'Abi2 Right',
            'abi3_right' => 'Abi3 Right',
            'abi2_left' => 'Abi2 Left',
            'abi3_left' => 'Abi3 Left',
            'abi_right_non_compressible' => 'Abi Right Non Compressible',
            'abi_left_non_compressible' => 'Abi Left Non Compressible',
            'size_of_ulcer_length_right' => 'Size Of Ulcer Length Right',
            'size_of_ulcer_depth_right' => 'Size Of Ulcer Depth Right',
            'size_of_ulcer_length_left' => 'Size Of Ulcer Length Left',
            'size_of_ulcer_depth_left' => 'Size Of Ulcer Depth Left',
            'size_of_ulcer_width_left' => 'Size Of Ulcer Width Left',
            'ulcer_width_right' => 'Ulcer Width Right',
            'ulcer_length_right' => 'Ulcer Length Right',
            'ulcer_depth_left' => 'Ulcer Depth Left',
            'ulcer_width_left' => 'Ulcer Width Left',
            'ulcer_length_left' => 'Ulcer Length Left',
            'type_other_right' => 'Type Other Right',
            'type_other_left' => 'Type Other Left',
            'location_of_ulcer_other_right' => 'Location Of Ulcer Other Right',
            'location_of_ulcer_other_left' => 'Location Of Ulcer Other Left',
            'drainage_type_other_right' => 'Drainage Type Other Right',
            'drainage_type_other_left' => 'Drainage Type Other Left',
            'local_dressing_performed_other' => 'Local Dressing Performed Other',
            'cause_of_dfu_other' => 'Cause Of Dfu Other',
            'foot_wear_other' => 'Foot Wear Other',
            'post_amputation_type' => 'Post Amputation Type',
            'post_amputation_duration' => 'Post Amputation Duration',
            'post_amputation_months' => 'Post Amputation Months',
            'post_amputation_year' => 'Post Amputation Year',
            'post_revascularization_type' => 'Post Revascularization Type',
            'post_revascularization_duration' => 'Post Revascularization Duration',
            'post_revascularization_months' => 'Post Revascularization Months',
            'post_revascularization_year' => 'Post Revascularization Year',
            'progress_note' => 'Progress Note',
        ];
    }
}
