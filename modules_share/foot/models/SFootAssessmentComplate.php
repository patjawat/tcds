<?php

namespace app\modules_share\foot\models;

use Yii;

/**
 * This is the model class for table "s_foot_assessment_complate".
 *
 * @property string $id
 * @property string $vn
 * @property string $hn
 * @property array $data_json
 * @property string $requester
 * @property string $created_at
 * @property string $created_by
 * @property string $updated_at
 * @property string $updated_by
 * @property string $date_start_service
 * @property string $time_start_service
 * @property string $date_end_service
 * @property string $time_end_service
 * @property array $occupation
 * @property array $smoking
 * @property array $activity
 * @property array $using_ambulation
 * @property array $previous_foot_ulcer
 * @property array $previous_foot_ulcer_right
 * @property array $previous_foot_ulcer_left
 * @property array $previous_amputation
 * @property array $previous_amputation_right
 * @property array $previous_amputation_left
 * @property array $prosthesis
 * @property array $prosthesis_right
 * @property array $prosthesis_left
 * @property array $previous_revascularization
 * @property array $previous_revascularization_right
 * @property array $previous_revascularization_left
 * @property array $evt_right
 * @property string $evt_note_right
 * @property string $evt_date_right
 * @property array $bypass_right
 * @property string $bypass_date_right
 * @property array $hybrid_right
 * @property string $hybrid_date_right
 * @property array $evt_left
 * @property string $evt_note_left
 * @property string $evt_date_left
 * @property array $bypass_left
 * @property string $bypass_date_left
 * @property array $hybrid_left
 * @property string $hybrid_date_left
 * @property string $chief_complaint
 * @property array $hair_loss_right
 * @property array $hair_loss_left
 * @property array $fungal_infection_right
 * @property array $fungal_infection_left
 * @property array $color_change_right
 * @property array $color_change_left
 * @property array $skin_condition_right
 * @property array $skin_condition_left
 * @property array $interspace_right
 * @property array $interspace_left
 * @property array $temperature_change_right
 * @property array $temperature_change_left
 * @property array $toenail_problem
 * @property array $fungal_nail_right
 * @property array $hypertrophic_right
 * @property array $distrophic_right
 * @property array $discolored_right
 * @property array $elongated_right
 * @property array $ingrown_right
 * @property array $involuted_right
 * @property array $fungal_nail_left
 * @property array $hypertrophic_left
 * @property array $distrophic_left
 * @property array $discolored_left
 * @property array $elongated_left
 * @property array $ingrown_left
 * @property array $involuted_left
 * @property array $splitting_right
 * @property array $splitting_left
 * @property array $skin_lesion
 * @property array $skin_lesion_type_right
 * @property array $skin_lesion_type_left
 * @property array $foot_type_right
 * @property array $foot_type_left
 * @property array $silfverskiold_test_right
 * @property array $silfverskiold_test_left
 * @property array $deformities
 * @property array $claw_toe_right
 * @property array $hammer_toe_right
 * @property array $mallet_toe_right
 * @property array $hallux_valgus_right
 * @property array $hallux_varus_right
 * @property array $hallux_rigidus_limitus_right
 * @property array $bunion_right
 * @property array $bunionette_right
 * @property array $charcot_foot_right
 * @property array $post_surgical_deformity_right
 * @property array $claw_toe_left
 * @property array $hammer_toe_left
 * @property array $mallet_toe_left
 * @property array $hallux_valgus_left
 * @property array $hallux_varus_left
 * @property array $hallux_rigidus_limitus_left
 * @property array $bunion_left
 * @property array $bunionette_left
 * @property array $charcot_foot_left
 * @property array $post_surgical_deformity_left
 * @property array $neuropathic_symptom
 * @property array $neuropathic_symptom_right
 * @property array $neuropathic_symptom_left
 * @property array $monofilament_right
 * @property array $monofilament_left
 * @property array $tuning_fork_right
 * @property array $tuning_fork_left
 * @property double $foot_size_right
 * @property double $foot_size_left
 * @property array $type_of_footwear_indoor
 * @property array $type_of_footwear_outdoor
 * @property array $type_of_footwear_exercise
 * @property array $sock
 * @property array $foot_take_care
 * @property array $foot_general_footcare
 * @property array $foot_take_care_his
 * @property array $foot_take_check_his
 * @property array $risk_categorization_diabetic
 * @property array $suggestion_for_prevention
 * @property string $record_number
 * @property string $record_date
 * @property string $recorder
 * @property string $occupation_other
 * @property array $intermittent_claudication_right
 * @property array $intermittent_claudication_left
 * @property array $rest_pain_right
 * @property array $rest_pain_left
 * @property array $gangrene_right
 * @property array $gangrene_left
 * @property array $pitting_edema_right
 * @property array $pitting_edema_left
 * @property array $non_pitting_edema_right
 * @property array $non_pitting_edema_left
 * @property array $vessel_palpation_dp_right
 * @property array $vessel_palpation_dp_left
 * @property array $vessel_palpation_pt_right
 * @property array $vessel_palpation_pt_left
 * @property array $doppler_right
 * @property array $doppler_left
 * @property array $vascular_symptom
 * @property double $abi1_right
 * @property double $abi2_right
 * @property double $abi3_right
 * @property array $abi4_right
 * @property double $abi1_left
 * @property double $abi2_left
 * @property double $abi3_left
 * @property array $abi4_left
 * @property string $mmhg_right
 * @property string $mmhg_left
 * @property double $tbi1_right
 * @property double $tbi2_right
 * @property double $tbi3_right
 * @property double $tbi1_left
 * @property double $tbi2_left
 * @property double $tbi3_left
 * @property double $smoking_pack
 * @property double $smoking_whene
 * @property int $callus_right_number
 * @property int $com_right_number
 * @property int $wart_right_number
 * @property int $callus_left_number
 * @property int $com_left_number
 * @property int $wart_left_number
 * @property string $type_of_footwear_indoor_other
 * @property string $type_of_footwear_exercise_other
 * @property string $type_of_footwear_outdoor_other
 */
class SFootAssessmentComplate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's_foot_assessment_complate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hn', 'date_start_service', 'time_start_service'], 'required'],
            [['id'], 'string'],
            [['data_json', 'created_at', 'updated_at', 'date_start_service', 'time_start_service', 'date_end_service', 'time_end_service', 'occupation', 'smoking', 'activity', 'using_ambulation', 'previous_foot_ulcer', 'previous_foot_ulcer_right', 'previous_foot_ulcer_left', 'previous_amputation', 'previous_amputation_right', 'previous_amputation_left', 'prosthesis', 'prosthesis_right', 'prosthesis_left', 'previous_revascularization', 'previous_revascularization_right', 'previous_revascularization_left', 'evt_right', 'evt_date_right', 'bypass_right', 'bypass_date_right', 'hybrid_right', 'hybrid_date_right', 'evt_left', 'evt_date_left', 'bypass_left', 'bypass_date_left', 'hybrid_left', 'hybrid_date_left', 'hair_loss_right', 'hair_loss_left', 'fungal_infection_right', 'fungal_infection_left', 'color_change_right', 'color_change_left', 'skin_condition_right', 'skin_condition_left', 'interspace_right', 'interspace_left', 'temperature_change_right', 'temperature_change_left', 'toenail_problem', 'fungal_nail_right', 'hypertrophic_right', 'distrophic_right', 'discolored_right', 'elongated_right', 'ingrown_right', 'involuted_right', 'fungal_nail_left', 'hypertrophic_left', 'distrophic_left', 'discolored_left', 'elongated_left', 'ingrown_left', 'involuted_left', 'splitting_right', 'splitting_left', 'skin_lesion', 'skin_lesion_type_right', 'skin_lesion_type_left', 'foot_type_right', 'foot_type_left', 'silfverskiold_test_right', 'silfverskiold_test_left', 'deformities', 'claw_toe_right', 'hammer_toe_right', 'mallet_toe_right', 'hallux_valgus_right', 'hallux_varus_right', 'hallux_rigidus_limitus_right', 'bunion_right', 'bunionette_right', 'charcot_foot_right', 'post_surgical_deformity_right', 'claw_toe_left', 'hammer_toe_left', 'mallet_toe_left', 'hallux_valgus_left', 'hallux_varus_left', 'hallux_rigidus_limitus_left', 'bunion_left', 'bunionette_left', 'charcot_foot_left', 'post_surgical_deformity_left', 'neuropathic_symptom', 'neuropathic_symptom_right', 'neuropathic_symptom_left', 'monofilament_right', 'monofilament_left', 'tuning_fork_right', 'tuning_fork_left', 'type_of_footwear_indoor', 'type_of_footwear_outdoor', 'type_of_footwear_exercise', 'sock', 'foot_take_care', 'foot_general_footcare', 'foot_take_care_his', 'foot_take_check_his', 'risk_categorization_diabetic', 'suggestion_for_prevention', 'record_date', 'intermittent_claudication_right', 'intermittent_claudication_left', 'rest_pain_right', 'rest_pain_left', 'gangrene_right', 'gangrene_left', 'pitting_edema_right', 'pitting_edema_left', 'non_pitting_edema_right', 'non_pitting_edema_left', 'vessel_palpation_dp_right', 'vessel_palpation_dp_left', 'vessel_palpation_pt_right', 'vessel_palpation_pt_left', 'doppler_right', 'doppler_left', 'vascular_symptom', 'abi4_right', 'abi4_left'], 'safe'],
            [['foot_size_right', 'foot_size_left', 'abi1_right', 'abi2_right', 'abi3_right', 'abi1_left', 'abi2_left', 'abi3_left', 'tbi1_right', 'tbi2_right', 'tbi3_right', 'tbi1_left', 'tbi2_left', 'tbi3_left', 'smoking_pack', 'smoking_whene'], 'number'],
            [['callus_right_number', 'com_right_number', 'wart_right_number', 'callus_left_number', 'com_left_number', 'wart_left_number'], 'default', 'value' => null],
            [['callus_right_number', 'com_right_number', 'wart_right_number', 'callus_left_number', 'com_left_number', 'wart_left_number'], 'integer'],
            [['vn'], 'string', 'max' => 12],
            [['hn'], 'string', 'max' => 9],
            [['requester', 'created_by', 'updated_by', 'evt_note_right', 'evt_note_left', 'chief_complaint', 'record_number', 'recorder', 'occupation_other', 'mmhg_right', 'mmhg_left', 'type_of_footwear_indoor_other', 'type_of_footwear_exercise_other', 'type_of_footwear_outdoor_other'], 'string', 'max' => 255],
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
            'occupation' => 'Occupation',
            'smoking' => 'Smoking',
            'activity' => 'Activity',
            'using_ambulation' => 'Using Ambulation',
            'previous_foot_ulcer' => 'Previous Foot Ulcer',
            'previous_foot_ulcer_right' => 'Previous Foot Ulcer Right',
            'previous_foot_ulcer_left' => 'Previous Foot Ulcer Left',
            'previous_amputation' => 'Previous Amputation',
            'previous_amputation_right' => 'Previous Amputation Right',
            'previous_amputation_left' => 'Previous Amputation Left',
            'prosthesis' => 'Prosthesis',
            'prosthesis_right' => 'Prosthesis Right',
            'prosthesis_left' => 'Prosthesis Left',
            'previous_revascularization' => 'Previous Revascularization',
            'previous_revascularization_right' => 'Previous Revascularization Right',
            'previous_revascularization_left' => 'Previous Revascularization Left',
            'evt_right' => 'Evt Right',
            'evt_note_right' => 'Evt Note Right',
            'evt_date_right' => 'Evt Date Right',
            'bypass_right' => 'Bypass Right',
            'bypass_date_right' => 'Bypass Date Right',
            'hybrid_right' => 'Hybrid Right',
            'hybrid_date_right' => 'Hybrid Date Right',
            'evt_left' => 'Evt Left',
            'evt_note_left' => 'Evt Note Left',
            'evt_date_left' => 'Evt Date Left',
            'bypass_left' => 'Bypass Left',
            'bypass_date_left' => 'Bypass Date Left',
            'hybrid_left' => 'Hybrid Left',
            'hybrid_date_left' => 'Hybrid Date Left',
            'chief_complaint' => 'Chief Complaint',
            'hair_loss_right' => 'Hair Loss Right',
            'hair_loss_left' => 'Hair Loss Left',
            'fungal_infection_right' => 'Fungal Infection Right',
            'fungal_infection_left' => 'Fungal Infection Left',
            'color_change_right' => 'Color Change Right',
            'color_change_left' => 'Color Change Left',
            'skin_condition_right' => 'Skin Condition Right',
            'skin_condition_left' => 'Skin Condition Left',
            'interspace_right' => 'Interspace Right',
            'interspace_left' => 'Interspace Left',
            'temperature_change_right' => 'Temperature Change Right',
            'temperature_change_left' => 'Temperature Change Left',
            'toenail_problem' => 'Toenail Problem',
            'fungal_nail_right' => 'Fungal Nail Right',
            'hypertrophic_right' => 'Hypertrophic Right',
            'distrophic_right' => 'Distrophic Right',
            'discolored_right' => 'Discolored Right',
            'elongated_right' => 'Elongated Right',
            'ingrown_right' => 'Ingrown Right',
            'involuted_right' => 'Involuted Right',
            'fungal_nail_left' => 'Fungal Nail Left',
            'hypertrophic_left' => 'Hypertrophic Left',
            'distrophic_left' => 'Distrophic Left',
            'discolored_left' => 'Discolored Left',
            'elongated_left' => 'Elongated Left',
            'ingrown_left' => 'Ingrown Left',
            'involuted_left' => 'Involuted Left',
            'splitting_right' => 'Splitting Right',
            'splitting_left' => 'Splitting Left',
            'skin_lesion' => 'Skin Lesion',
            'skin_lesion_type_right' => 'Skin Lesion Type Right',
            'skin_lesion_type_left' => 'Skin Lesion Type Left',
            'foot_type_right' => 'Foot Type Right',
            'foot_type_left' => 'Foot Type Left',
            'silfverskiold_test_right' => 'Silfverskiold Test Right',
            'silfverskiold_test_left' => 'Silfverskiold Test Left',
            'deformities' => 'Deformities',
            'claw_toe_right' => 'Claw Toe Right',
            'hammer_toe_right' => 'Hammer Toe Right',
            'mallet_toe_right' => 'Mallet Toe Right',
            'hallux_valgus_right' => 'Hallux Valgus Right',
            'hallux_varus_right' => 'Hallux Varus Right',
            'hallux_rigidus_limitus_right' => 'Hallux Rigidus Limitus Right',
            'bunion_right' => 'Bunion Right',
            'bunionette_right' => 'Bunionette Right',
            'charcot_foot_right' => 'Charcot Foot Right',
            'post_surgical_deformity_right' => 'Post Surgical Deformity Right',
            'claw_toe_left' => 'Claw Toe Left',
            'hammer_toe_left' => 'Hammer Toe Left',
            'mallet_toe_left' => 'Mallet Toe Left',
            'hallux_valgus_left' => 'Hallux Valgus Left',
            'hallux_varus_left' => 'Hallux Varus Left',
            'hallux_rigidus_limitus_left' => 'Hallux Rigidus Limitus Left',
            'bunion_left' => 'Bunion Left',
            'bunionette_left' => 'Bunionette Left',
            'charcot_foot_left' => 'Charcot Foot Left',
            'post_surgical_deformity_left' => 'Post Surgical Deformity Left',
            'neuropathic_symptom' => 'Neuropathic Symptom',
            'neuropathic_symptom_right' => 'Neuropathic Symptom Right',
            'neuropathic_symptom_left' => 'Neuropathic Symptom Left',
            'monofilament_right' => 'Monofilament Right',
            'monofilament_left' => 'Monofilament Left',
            'tuning_fork_right' => 'Tuning Fork Right',
            'tuning_fork_left' => 'Tuning Fork Left',
            'foot_size_right' => 'Foot Size Right',
            'foot_size_left' => 'Foot Size Left',
            'type_of_footwear_indoor' => 'Type Of Footwear Indoor',
            'type_of_footwear_outdoor' => 'Type Of Footwear Outdoor',
            'type_of_footwear_exercise' => 'Type Of Footwear Exercise',
            'sock' => 'Sock',
            'foot_take_care' => 'Foot Take Care',
            'foot_general_footcare' => 'Foot General Footcare',
            'foot_take_care_his' => 'Foot Take Care His',
            'foot_take_check_his' => 'Foot Take Check His',
            'risk_categorization_diabetic' => 'Risk Categorization Diabetic',
            'suggestion_for_prevention' => 'Suggestion For Prevention',
            'record_number' => 'Record Number',
            'record_date' => 'Record Date',
            'recorder' => 'Recorder',
            'occupation_other' => 'Occupation Other',
            'intermittent_claudication_right' => 'Intermittent Claudication Right',
            'intermittent_claudication_left' => 'Intermittent Claudication Left',
            'rest_pain_right' => 'Rest Pain Right',
            'rest_pain_left' => 'Rest Pain Left',
            'gangrene_right' => 'Gangrene Right',
            'gangrene_left' => 'Gangrene Left',
            'pitting_edema_right' => 'Pitting Edema Right',
            'pitting_edema_left' => 'Pitting Edema Left',
            'non_pitting_edema_right' => 'Non Pitting Edema Right',
            'non_pitting_edema_left' => 'Non Pitting Edema Left',
            'vessel_palpation_dp_right' => 'Vessel Palpation Dp Right',
            'vessel_palpation_dp_left' => 'Vessel Palpation Dp Left',
            'vessel_palpation_pt_right' => 'Vessel Palpation Pt Right',
            'vessel_palpation_pt_left' => 'Vessel Palpation Pt Left',
            'doppler_right' => 'Doppler Right',
            'doppler_left' => 'Doppler Left',
            'vascular_symptom' => 'Vascular Symptom',
            'abi1_right' => 'Abi1 Right',
            'abi2_right' => 'Abi2 Right',
            'abi3_right' => 'Abi3 Right',
            'abi4_right' => 'Abi4 Right',
            'abi1_left' => 'Abi1 Left',
            'abi2_left' => 'Abi2 Left',
            'abi3_left' => 'Abi3 Left',
            'abi4_left' => 'Abi4 Left',
            'mmhg_right' => 'Mmhg Right',
            'mmhg_left' => 'Mmhg Left',
            'tbi1_right' => 'Tbi1 Right',
            'tbi2_right' => 'Tbi2 Right',
            'tbi3_right' => 'Tbi3 Right',
            'tbi1_left' => 'Tbi1 Left',
            'tbi2_left' => 'Tbi2 Left',
            'tbi3_left' => 'Tbi3 Left',
            'smoking_pack' => 'Smoking Pack',
            'smoking_whene' => 'Smoking Whene',
            'callus_right_number' => 'Callus Right Number',
            'com_right_number' => 'Com Right Number',
            'wart_right_number' => 'Wart Right Number',
            'callus_left_number' => 'Callus Left Number',
            'com_left_number' => 'Com Left Number',
            'wart_left_number' => 'Wart Left Number',
            'type_of_footwear_indoor_other' => 'Type Of Footwear Indoor Other',
            'type_of_footwear_exercise_other' => 'Type Of Footwear Exercise Other',
            'type_of_footwear_outdoor_other' => 'Type Of Footwear Outdoor Other',
        ];
    }
}
