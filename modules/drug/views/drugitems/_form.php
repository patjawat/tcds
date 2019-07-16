<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\drug\models\Drugitems */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="drugitems-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'icode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'strength')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'units')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'unitprice')->textInput() ?>

    <?= $form->field($model, 'dosageform')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'criticalpriority')->textInput() ?>

    <?= $form->field($model, 'drugaccount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'drugcategory')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'drugnote')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hintcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'istatus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastupdatestdprice')->textInput() ?>

    <?= $form->field($model, 'lockprice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lockprint')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'maxlevel')->textInput() ?>

    <?= $form->field($model, 'minlevel')->textInput() ?>

    <?= $form->field($model, 'maxunitperdose')->textInput() ?>

    <?= $form->field($model, 'packqty')->textInput() ?>

    <?= $form->field($model, 'reorderqty')->textInput() ?>

    <?= $form->field($model, 'stdprice')->textInput() ?>

    <?= $form->field($model, 'stdtaken')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'therapeutic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'therapeuticgroup')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'default_qty')->textInput() ?>

    <?= $form->field($model, 'gpo_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'use_right')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'i_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'drugusage')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'high_cost')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'must_paid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alert_level')->textInput() ?>

    <?= $form->field($model, 'access_level')->textInput() ?>

    <?= $form->field($model, 'sticker_short_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paidst')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'antibiotic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'displaycolor')->textInput() ?>

    <?= $form->field($model, 'empty')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'empty_text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'unitcost')->textInput() ?>

    <?= $form->field($model, 'gfmiscode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ipd_price')->textInput() ?>

    <?= $form->field($model, 'oldcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'habit_forming')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'did')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stock_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price2')->textInput() ?>

    <?= $form->field($model, 'price3')->textInput() ?>

    <?= $form->field($model, 'ipd_price2')->textInput() ?>

    <?= $form->field($model, 'ipd_price3')->textInput() ?>

    <?= $form->field($model, 'price_lock')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pregnancy')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pharmacology_group1')->textInput() ?>

    <?= $form->field($model, 'pharmacology_group2')->textInput() ?>

    <?= $form->field($model, 'pharmacology_group3')->textInput() ?>

    <?= $form->field($model, 'generic_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'show_pregnancy_alert')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'icode_guid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'na')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'invcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'check_user_group')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'check_user_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'show_notify')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'show_notify_text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'income')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'print_sticker_pq')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'charge_service_opd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'charge_service_ipd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dose_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'habit_forming_type')->textInput() ?>

    <?= $form->field($model, 'no_discount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'therapeutic_eng')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hintcode_eng')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'limit_drugusage')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'print_sticker_header')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'calc_idr_qty')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'item_in_hospital')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_substock')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'volume_cc')->textInput() ?>

    <?= $form->field($model, 'usage_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'frequency_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'time_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dispense_dose')->textInput() ?>

    <?= $form->field($model, 'usage_unit_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dose_per_units')->textInput() ?>

    <?= $form->field($model, 'ipd_default_pay')->textInput() ?>

    <?= $form->field($model, 'billcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'billnumber')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lockprint_ipd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pregnancy_notify_text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'show_breast_feeding_alert')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'breast_feeding_alert_text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'show_child_notify')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'child_notify_text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'child_notify_min_age')->textInput() ?>

    <?= $form->field($model, 'child_notify_max_age')->textInput() ?>

    <?= $form->field($model, 'continuous')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'substitute_icode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'trade_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'use_right_allow')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'medication_machine_id')->textInput() ?>

    <?= $form->field($model, 'ipd_medication_machine_id')->textInput() ?>

    <?= $form->field($model, 'check_remed_qty')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'addict')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'addict_type_id')->textInput() ?>

    <?= $form->field($model, 'medication_machine_opd_no')->textInput() ?>

    <?= $form->field($model, 'medication_machine_ipd_no')->textInput() ?>

    <?= $form->field($model, 'fp_drug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usage_code_ipd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dispense_dose_ipd')->textInput() ?>

    <?= $form->field($model, 'usage_unit_code_ipd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'frequency_code_ipd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'time_code_ipd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'print_ipd_injection_sticker')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'provis_medication_unit_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hos_guid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sks_product_category_id')->textInput() ?>

    <?= $form->field($model, 'sks_clain_control_type_id')->textInput() ?>

    <?= $form->field($model, 'sks_drug_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sks_dfs_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sks_dfs_text')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sks_reimb_price')->textInput() ?>

    <?= $form->field($model, 'hos_guid_ext')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'check_druginteraction_history')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'check_druginteraction_history_day')->textInput() ?>

    <?= $form->field($model, 'nhso_adp_type_id')->textInput() ?>

    <?= $form->field($model, 'nhso_adp_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sks_claim_control_type_id')->textInput() ?>

    <?= $form->field($model, 'begin_date')->textInput() ?>

    <?= $form->field($model, 'finish_date')->textInput() ?>

    <?= $form->field($model, 'name_pr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_eng')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'capacity_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'finish_reason')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'extra_unitcost')->textInput() ?>

    <?= $form->field($model, 'drug_control_type_id')->textInput() ?>

    <?= $form->field($model, 'name_print')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'active_ingredient_mg')->textInput() ?>

    <?= $form->field($model, 'no_order_g6pd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender_check')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_order_gender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'max_qty')->textInput() ?>

    <?= $form->field($model, 'prefer_opd_usage_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'capacity_qty')->textInput() ?>

    <?= $form->field($model, 'need_order_reason')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'drugitems_due_type_id')->textInput() ?>

    <?= $form->field($model, 'drugeval_head_id')->textInput() ?>

    <?= $form->field($model, 'light_protect')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tpu_code_list')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inv_map_update')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'special_advice_text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'precaution_advice_text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'contra_advice_text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'storage_advice_text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'qr_code_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vat_percent')->textInput() ?>

    <?= $form->field($model, 'acc_regist')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'use_paidst')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'thai_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fwf_item_id')->textInput() ?>

    <?= $form->field($model, 'drugitems_em1_id')->textInput() ?>

    <?= $form->field($model, 'drugitems_em2_id')->textInput() ?>

    <?= $form->field($model, 'drugitems_em3_id')->textInput() ?>

    <?= $form->field($model, 'drugitems_em4_id')->textInput() ?>

    <?= $form->field($model, 'tmt_tp_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tmt_gp_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'limit_pttype')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'noshow_narcotic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'medication_machine_flag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sks_price')->textInput() ?>

    <?= $form->field($model, 'print_sticker_by_frequency')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'print_sticker_pq_ipd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sub_income')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prefer_ipd_usage_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'default_qty_ipd')->textInput() ?>

    <?= $form->field($model, 'max_qty_ipd')->textInput() ?>

    <?= $form->field($model, 'drugusage_ipd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_popup_ipd_reason')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'specprep')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'med_dose_calc_type_id')->textInput() ?>

    <?= $form->field($model, 'send_line_notify')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'show_qrcode_trade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'warn_g6pd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ipd_rx_freq_day')->textInput() ?>

    <?= $form->field($model, 'displaycolor_focus')->textInput() ?>

    <?= $form->field($model, 'last_update')->textInput() ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
