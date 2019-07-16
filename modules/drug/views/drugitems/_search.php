<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\drug\models\DrugitemsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="drugitems-search">

    <?php $form = ActiveForm::begin([
        'action' => ['/drug/drugitems/show-drugitems'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'icode') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'strength') ?>

    <?= $form->field($model, 'units') ?>

    <?= $form->field($model, 'unitprice') ?>

    <?php // echo $form->field($model, 'dosageform') ?>

    <?php // echo $form->field($model, 'criticalpriority') ?>

    <?php // echo $form->field($model, 'drugaccount') ?>

    <?php // echo $form->field($model, 'drugcategory') ?>

    <?php // echo $form->field($model, 'drugnote') ?>

    <?php // echo $form->field($model, 'hintcode') ?>

    <?php // echo $form->field($model, 'istatus') ?>

    <?php // echo $form->field($model, 'lastupdatestdprice') ?>

    <?php // echo $form->field($model, 'lockprice') ?>

    <?php // echo $form->field($model, 'lockprint') ?>

    <?php // echo $form->field($model, 'maxlevel') ?>

    <?php // echo $form->field($model, 'minlevel') ?>

    <?php // echo $form->field($model, 'maxunitperdose') ?>

    <?php // echo $form->field($model, 'packqty') ?>

    <?php // echo $form->field($model, 'reorderqty') ?>

    <?php // echo $form->field($model, 'stdprice') ?>

    <?php // echo $form->field($model, 'stdtaken') ?>

    <?php // echo $form->field($model, 'therapeutic') ?>

    <?php // echo $form->field($model, 'therapeuticgroup') ?>

    <?php // echo $form->field($model, 'default_qty') ?>

    <?php // echo $form->field($model, 'gpo_code') ?>

    <?php // echo $form->field($model, 'use_right') ?>

    <?php // echo $form->field($model, 'i_type') ?>

    <?php // echo $form->field($model, 'drugusage') ?>

    <?php // echo $form->field($model, 'high_cost') ?>

    <?php // echo $form->field($model, 'must_paid') ?>

    <?php // echo $form->field($model, 'alert_level') ?>

    <?php // echo $form->field($model, 'access_level') ?>

    <?php // echo $form->field($model, 'sticker_short_name') ?>

    <?php // echo $form->field($model, 'paidst') ?>

    <?php // echo $form->field($model, 'antibiotic') ?>

    <?php // echo $form->field($model, 'displaycolor') ?>

    <?php // echo $form->field($model, 'empty') ?>

    <?php // echo $form->field($model, 'empty_text') ?>

    <?php // echo $form->field($model, 'unitcost') ?>

    <?php // echo $form->field($model, 'gfmiscode') ?>

    <?php // echo $form->field($model, 'ipd_price') ?>

    <?php // echo $form->field($model, 'oldcode') ?>

    <?php // echo $form->field($model, 'habit_forming') ?>

    <?php // echo $form->field($model, 'did') ?>

    <?php // echo $form->field($model, 'stock_type') ?>

    <?php // echo $form->field($model, 'price2') ?>

    <?php // echo $form->field($model, 'price3') ?>

    <?php // echo $form->field($model, 'ipd_price2') ?>

    <?php // echo $form->field($model, 'ipd_price3') ?>

    <?php // echo $form->field($model, 'price_lock') ?>

    <?php // echo $form->field($model, 'pregnancy') ?>

    <?php // echo $form->field($model, 'pharmacology_group1') ?>

    <?php // echo $form->field($model, 'pharmacology_group2') ?>

    <?php // echo $form->field($model, 'pharmacology_group3') ?>

    <?php // echo $form->field($model, 'generic_name') ?>

    <?php // echo $form->field($model, 'show_pregnancy_alert') ?>

    <?php // echo $form->field($model, 'icode_guid') ?>

    <?php // echo $form->field($model, 'na') ?>

    <?php // echo $form->field($model, 'invcode') ?>

    <?php // echo $form->field($model, 'check_user_group') ?>

    <?php // echo $form->field($model, 'check_user_name') ?>

    <?php // echo $form->field($model, 'show_notify') ?>

    <?php // echo $form->field($model, 'show_notify_text') ?>

    <?php // echo $form->field($model, 'income') ?>

    <?php // echo $form->field($model, 'print_sticker_pq') ?>

    <?php // echo $form->field($model, 'charge_service_opd') ?>

    <?php // echo $form->field($model, 'charge_service_ipd') ?>

    <?php // echo $form->field($model, 'ename') ?>

    <?php // echo $form->field($model, 'dose_type') ?>

    <?php // echo $form->field($model, 'habit_forming_type') ?>

    <?php // echo $form->field($model, 'no_discount') ?>

    <?php // echo $form->field($model, 'therapeutic_eng') ?>

    <?php // echo $form->field($model, 'hintcode_eng') ?>

    <?php // echo $form->field($model, 'limit_drugusage') ?>

    <?php // echo $form->field($model, 'print_sticker_header') ?>

    <?php // echo $form->field($model, 'calc_idr_qty') ?>

    <?php // echo $form->field($model, 'item_in_hospital') ?>

    <?php // echo $form->field($model, 'no_substock') ?>

    <?php // echo $form->field($model, 'volume_cc') ?>

    <?php // echo $form->field($model, 'usage_code') ?>

    <?php // echo $form->field($model, 'frequency_code') ?>

    <?php // echo $form->field($model, 'time_code') ?>

    <?php // echo $form->field($model, 'dispense_dose') ?>

    <?php // echo $form->field($model, 'usage_unit_code') ?>

    <?php // echo $form->field($model, 'dose_per_units') ?>

    <?php // echo $form->field($model, 'ipd_default_pay') ?>

    <?php // echo $form->field($model, 'billcode') ?>

    <?php // echo $form->field($model, 'billnumber') ?>

    <?php // echo $form->field($model, 'lockprint_ipd') ?>

    <?php // echo $form->field($model, 'pregnancy_notify_text') ?>

    <?php // echo $form->field($model, 'show_breast_feeding_alert') ?>

    <?php // echo $form->field($model, 'breast_feeding_alert_text') ?>

    <?php // echo $form->field($model, 'show_child_notify') ?>

    <?php // echo $form->field($model, 'child_notify_text') ?>

    <?php // echo $form->field($model, 'child_notify_min_age') ?>

    <?php // echo $form->field($model, 'child_notify_max_age') ?>

    <?php // echo $form->field($model, 'continuous') ?>

    <?php // echo $form->field($model, 'substitute_icode') ?>

    <?php // echo $form->field($model, 'trade_name') ?>

    <?php // echo $form->field($model, 'use_right_allow') ?>

    <?php // echo $form->field($model, 'medication_machine_id') ?>

    <?php // echo $form->field($model, 'ipd_medication_machine_id') ?>

    <?php // echo $form->field($model, 'check_remed_qty') ?>

    <?php // echo $form->field($model, 'addict') ?>

    <?php // echo $form->field($model, 'addict_type_id') ?>

    <?php // echo $form->field($model, 'medication_machine_opd_no') ?>

    <?php // echo $form->field($model, 'medication_machine_ipd_no') ?>

    <?php // echo $form->field($model, 'fp_drug') ?>

    <?php // echo $form->field($model, 'usage_code_ipd') ?>

    <?php // echo $form->field($model, 'dispense_dose_ipd') ?>

    <?php // echo $form->field($model, 'usage_unit_code_ipd') ?>

    <?php // echo $form->field($model, 'frequency_code_ipd') ?>

    <?php // echo $form->field($model, 'time_code_ipd') ?>

    <?php // echo $form->field($model, 'print_ipd_injection_sticker') ?>

    <?php // echo $form->field($model, 'provis_medication_unit_code') ?>

    <?php // echo $form->field($model, 'hos_guid') ?>

    <?php // echo $form->field($model, 'sks_product_category_id') ?>

    <?php // echo $form->field($model, 'sks_clain_control_type_id') ?>

    <?php // echo $form->field($model, 'sks_drug_code') ?>

    <?php // echo $form->field($model, 'sks_dfs_code') ?>

    <?php // echo $form->field($model, 'sks_dfs_text') ?>

    <?php // echo $form->field($model, 'sks_reimb_price') ?>

    <?php // echo $form->field($model, 'hos_guid_ext') ?>

    <?php // echo $form->field($model, 'check_druginteraction_history') ?>

    <?php // echo $form->field($model, 'check_druginteraction_history_day') ?>

    <?php // echo $form->field($model, 'nhso_adp_type_id') ?>

    <?php // echo $form->field($model, 'nhso_adp_code') ?>

    <?php // echo $form->field($model, 'sks_claim_control_type_id') ?>

    <?php // echo $form->field($model, 'begin_date') ?>

    <?php // echo $form->field($model, 'finish_date') ?>

    <?php // echo $form->field($model, 'name_pr') ?>

    <?php // echo $form->field($model, 'name_eng') ?>

    <?php // echo $form->field($model, 'capacity_name') ?>

    <?php // echo $form->field($model, 'finish_reason') ?>

    <?php // echo $form->field($model, 'extra_unitcost') ?>

    <?php // echo $form->field($model, 'drug_control_type_id') ?>

    <?php // echo $form->field($model, 'name_print') ?>

    <?php // echo $form->field($model, 'active_ingredient_mg') ?>

    <?php // echo $form->field($model, 'no_order_g6pd') ?>

    <?php // echo $form->field($model, 'gender_check') ?>

    <?php // echo $form->field($model, 'no_order_gender') ?>

    <?php // echo $form->field($model, 'max_qty') ?>

    <?php // echo $form->field($model, 'prefer_opd_usage_code') ?>

    <?php // echo $form->field($model, 'capacity_qty') ?>

    <?php // echo $form->field($model, 'need_order_reason') ?>

    <?php // echo $form->field($model, 'drugitems_due_type_id') ?>

    <?php // echo $form->field($model, 'drugeval_head_id') ?>

    <?php // echo $form->field($model, 'light_protect') ?>

    <?php // echo $form->field($model, 'tpu_code_list') ?>

    <?php // echo $form->field($model, 'inv_map_update') ?>

    <?php // echo $form->field($model, 'special_advice_text') ?>

    <?php // echo $form->field($model, 'precaution_advice_text') ?>

    <?php // echo $form->field($model, 'contra_advice_text') ?>

    <?php // echo $form->field($model, 'storage_advice_text') ?>

    <?php // echo $form->field($model, 'qr_code_url') ?>

    <?php // echo $form->field($model, 'vat_percent') ?>

    <?php // echo $form->field($model, 'acc_regist') ?>

    <?php // echo $form->field($model, 'use_paidst') ?>

    <?php // echo $form->field($model, 'thai_name') ?>

    <?php // echo $form->field($model, 'fwf_item_id') ?>

    <?php // echo $form->field($model, 'drugitems_em1_id') ?>

    <?php // echo $form->field($model, 'drugitems_em2_id') ?>

    <?php // echo $form->field($model, 'drugitems_em3_id') ?>

    <?php // echo $form->field($model, 'drugitems_em4_id') ?>

    <?php // echo $form->field($model, 'tmt_tp_code') ?>

    <?php // echo $form->field($model, 'tmt_gp_code') ?>

    <?php // echo $form->field($model, 'limit_pttype') ?>

    <?php // echo $form->field($model, 'noshow_narcotic') ?>

    <?php // echo $form->field($model, 'medication_machine_flag') ?>

    <?php // echo $form->field($model, 'sks_price') ?>

    <?php // echo $form->field($model, 'print_sticker_by_frequency') ?>

    <?php // echo $form->field($model, 'print_sticker_pq_ipd') ?>

    <?php // echo $form->field($model, 'sub_income') ?>

    <?php // echo $form->field($model, 'prefer_ipd_usage_code') ?>

    <?php // echo $form->field($model, 'default_qty_ipd') ?>

    <?php // echo $form->field($model, 'max_qty_ipd') ?>

    <?php // echo $form->field($model, 'drugusage_ipd') ?>

    <?php // echo $form->field($model, 'no_popup_ipd_reason') ?>

    <?php // echo $form->field($model, 'specprep') ?>

    <?php // echo $form->field($model, 'med_dose_calc_type_id') ?>

    <?php // echo $form->field($model, 'send_line_notify') ?>

    <?php // echo $form->field($model, 'show_qrcode_trade') ?>

    <?php // echo $form->field($model, 'warn_g6pd') ?>

    <?php // echo $form->field($model, 'ipd_rx_freq_day') ?>

    <?php // echo $form->field($model, 'displaycolor_focus') ?>

    <?php // echo $form->field($model, 'last_update') ?>

    <?php // echo $form->field($model, 'id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
