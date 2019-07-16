<?php

namespace app\modules\doctorworkbench\models;

use Yii;

/**
 * This is the model class for table "c_drugusage".
 *
 * @property string $drugusage
 * @property string $code
 * @property string $name1
 * @property string $name2
 * @property string $name3
 * @property string $shortlist
 * @property string $idrlink
 * @property string $status
 * @property string $interval1
 * @property string $interval2
 * @property string $interval3
 * @property string $interval4
 * @property string $interval5
 * @property string $interval6
 * @property int $iperday
 * @property string $dosageform
 * @property string $ename1
 * @property string $ename2
 * @property string $ename3
 * @property double $iperdose
 * @property string $drugusage_guid
 * @property int $divide_amount
 * @property string $common_name
 * @property string $drugusage_active
 * @property int $opi_acpc_id
 * @property string $opi_usage_code
 * @property double $opi_dose
 * @property string $opi_unit_name
 * @property string $opi_frequency_code
 * @property string $opi_usage_unit_code
 * @property string $opi_time_code
 * @property int $ipt_injection_sticker_count
 * @property string $hos_guid
 * @property string $hos_guid_ext
 * @property string $no_disp_machine
 * @property string $use_opi_mode2
 * @property int $display_order
 * @property string $doctor_use
 * @property string $id
 */
class CDrugusage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'c_drugusage';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['drugusage', 'id'], 'required'],
            [['iperday', 'divide_amount', 'opi_acpc_id', 'ipt_injection_sticker_count', 'display_order'], 'default', 'value' => null],
            [['iperday', 'divide_amount', 'opi_acpc_id', 'ipt_injection_sticker_count', 'display_order'], 'integer'],
            [['iperdose', 'opi_dose'], 'number'],
            [['id'], 'string'],
            [['drugusage'], 'string', 'max' => 7],
            [['code'], 'string', 'max' => 200],
            [['name1', 'name2', 'name3', 'ename1', 'ename2', 'ename3'], 'string', 'max' => 150],
            [['shortlist', 'dosageform', 'common_name'], 'string', 'max' => 250],
            [['idrlink'], 'string', 'max' => 100],
            [['status', 'interval1', 'interval2', 'interval3', 'interval4', 'interval5', 'interval6', 'drugusage_active', 'no_disp_machine', 'use_opi_mode2', 'doctor_use'], 'string', 'max' => 1],
            [['drugusage_guid', 'hos_guid'], 'string', 'max' => 38],
            [['opi_usage_code', 'opi_frequency_code', 'opi_usage_unit_code', 'opi_time_code'], 'string', 'max' => 10],
            [['opi_unit_name'], 'string', 'max' => 25],
            [['hos_guid_ext'], 'string', 'max' => 64],
            [['drugusage', 'id'], 'unique', 'targetAttribute' => ['drugusage', 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'drugusage' => 'Drugusage',
            'code' => 'Code',
            'name1' => 'Name1',
            'name2' => 'Name2',
            'name3' => 'Name3',
            'shortlist' => 'Shortlist',
            'idrlink' => 'Idrlink',
            'status' => 'Status',
            'interval1' => 'Interval1',
            'interval2' => 'Interval2',
            'interval3' => 'Interval3',
            'interval4' => 'Interval4',
            'interval5' => 'Interval5',
            'interval6' => 'Interval6',
            'iperday' => 'Iperday',
            'dosageform' => 'Dosageform',
            'ename1' => 'Ename1',
            'ename2' => 'Ename2',
            'ename3' => 'Ename3',
            'iperdose' => 'Iperdose',
            'drugusage_guid' => 'Drugusage Guid',
            'divide_amount' => 'Divide Amount',
            'common_name' => 'Common Name',
            'drugusage_active' => 'Drugusage Active',
            'opi_acpc_id' => 'Opi Acpc ID',
            'opi_usage_code' => 'Opi Usage Code',
            'opi_dose' => 'Opi Dose',
            'opi_unit_name' => 'Opi Unit Name',
            'opi_frequency_code' => 'Opi Frequency Code',
            'opi_usage_unit_code' => 'Opi Usage Unit Code',
            'opi_time_code' => 'Opi Time Code',
            'ipt_injection_sticker_count' => 'Ipt Injection Sticker Count',
            'hos_guid' => 'Hos Guid',
            'hos_guid_ext' => 'Hos Guid Ext',
            'no_disp_machine' => 'No Disp Machine',
            'use_opi_mode2' => 'Use Opi Mode2',
            'display_order' => 'Display Order',
            'doctor_use' => 'Doctor Use',
            'id' => 'ID',
        ];
    }
}
