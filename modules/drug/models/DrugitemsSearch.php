<?php

namespace app\modules\drug\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\drug\models\Drugitems;

/**
 * DrugitemsSearch represents the model behind the search form of `app\modules\drug\models\Drugitems`.
 */
class DrugitemsSearch extends Drugitems
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['icode', 'name', 'strength', 'units', 'dosageform', 'drugaccount', 'drugcategory', 'drugnote', 'hintcode', 'istatus', 'lastupdatestdprice', 'lockprice', 'lockprint', 'stdtaken', 'therapeutic', 'therapeuticgroup', 'gpo_code', 'use_right', 'i_type', 'drugusage', 'high_cost', 'must_paid', 'sticker_short_name', 'paidst', 'antibiotic', 'empty', 'empty_text', 'gfmiscode', 'oldcode', 'habit_forming', 'did', 'stock_type', 'price_lock', 'pregnancy', 'generic_name', 'show_pregnancy_alert', 'icode_guid', 'na', 'invcode', 'check_user_group', 'check_user_name', 'show_notify', 'show_notify_text', 'income', 'print_sticker_pq', 'charge_service_opd', 'charge_service_ipd', 'ename', 'dose_type', 'no_discount', 'therapeutic_eng', 'hintcode_eng', 'limit_drugusage', 'print_sticker_header', 'calc_idr_qty', 'item_in_hospital', 'no_substock', 'usage_code', 'frequency_code', 'time_code', 'usage_unit_code', 'billcode', 'billnumber', 'lockprint_ipd', 'pregnancy_notify_text', 'show_breast_feeding_alert', 'breast_feeding_alert_text', 'show_child_notify', 'child_notify_text', 'continuous', 'substitute_icode', 'trade_name', 'use_right_allow', 'check_remed_qty', 'addict', 'fp_drug', 'usage_code_ipd', 'usage_unit_code_ipd', 'frequency_code_ipd', 'time_code_ipd', 'print_ipd_injection_sticker', 'provis_medication_unit_code', 'hos_guid', 'sks_drug_code', 'sks_dfs_code', 'sks_dfs_text', 'hos_guid_ext', 'check_druginteraction_history', 'nhso_adp_code', 'begin_date', 'finish_date', 'name_pr', 'name_eng', 'capacity_name', 'finish_reason', 'name_print', 'no_order_g6pd', 'gender_check', 'no_order_gender', 'prefer_opd_usage_code', 'need_order_reason', 'light_protect', 'tpu_code_list', 'inv_map_update', 'special_advice_text', 'precaution_advice_text', 'contra_advice_text', 'storage_advice_text', 'qr_code_url', 'acc_regist', 'use_paidst', 'thai_name', 'tmt_tp_code', 'tmt_gp_code', 'limit_pttype', 'noshow_narcotic', 'medication_machine_flag', 'print_sticker_by_frequency', 'print_sticker_pq_ipd', 'sub_income', 'prefer_ipd_usage_code', 'drugusage_ipd', 'no_popup_ipd_reason', 'specprep', 'send_line_notify', 'show_qrcode_trade', 'warn_g6pd', 'last_update', 'id'], 'safe'],
            [['unitprice', 'stdprice', 'unitcost', 'ipd_price', 'price2', 'price3', 'ipd_price2', 'ipd_price3', 'dispense_dose', 'dose_per_units', 'dispense_dose_ipd', 'sks_reimb_price', 'extra_unitcost', 'active_ingredient_mg', 'capacity_qty', 'vat_percent', 'sks_price'], 'number'],
            [['criticalpriority', 'maxlevel', 'minlevel', 'maxunitperdose', 'packqty', 'reorderqty', 'default_qty', 'alert_level', 'access_level', 'displaycolor', 'pharmacology_group1', 'pharmacology_group2', 'pharmacology_group3', 'habit_forming_type', 'volume_cc', 'ipd_default_pay', 'child_notify_min_age', 'child_notify_max_age', 'medication_machine_id', 'ipd_medication_machine_id', 'addict_type_id', 'medication_machine_opd_no', 'medication_machine_ipd_no', 'sks_product_category_id', 'sks_clain_control_type_id', 'check_druginteraction_history_day', 'nhso_adp_type_id', 'sks_claim_control_type_id', 'drug_control_type_id', 'max_qty', 'drugitems_due_type_id', 'drugeval_head_id', 'fwf_item_id', 'drugitems_em1_id', 'drugitems_em2_id', 'drugitems_em3_id', 'drugitems_em4_id', 'default_qty_ipd', 'max_qty_ipd', 'med_dose_calc_type_id', 'ipd_rx_freq_day', 'displaycolor_focus'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Drugitems::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'unitprice' => $this->unitprice,
            'criticalpriority' => $this->criticalpriority,
            'lastupdatestdprice' => $this->lastupdatestdprice,
            'maxlevel' => $this->maxlevel,
            'minlevel' => $this->minlevel,
            'maxunitperdose' => $this->maxunitperdose,
            'packqty' => $this->packqty,
            'reorderqty' => $this->reorderqty,
            'stdprice' => $this->stdprice,
            'default_qty' => $this->default_qty,
            'alert_level' => $this->alert_level,
            'access_level' => $this->access_level,
            'displaycolor' => $this->displaycolor,
            'unitcost' => $this->unitcost,
            'ipd_price' => $this->ipd_price,
            'price2' => $this->price2,
            'price3' => $this->price3,
            'ipd_price2' => $this->ipd_price2,
            'ipd_price3' => $this->ipd_price3,
            'pharmacology_group1' => $this->pharmacology_group1,
            'pharmacology_group2' => $this->pharmacology_group2,
            'pharmacology_group3' => $this->pharmacology_group3,
            'habit_forming_type' => $this->habit_forming_type,
            'volume_cc' => $this->volume_cc,
            'dispense_dose' => $this->dispense_dose,
            'dose_per_units' => $this->dose_per_units,
            'ipd_default_pay' => $this->ipd_default_pay,
            'child_notify_min_age' => $this->child_notify_min_age,
            'child_notify_max_age' => $this->child_notify_max_age,
            'medication_machine_id' => $this->medication_machine_id,
            'ipd_medication_machine_id' => $this->ipd_medication_machine_id,
            'addict_type_id' => $this->addict_type_id,
            'medication_machine_opd_no' => $this->medication_machine_opd_no,
            'medication_machine_ipd_no' => $this->medication_machine_ipd_no,
            'dispense_dose_ipd' => $this->dispense_dose_ipd,
            'sks_product_category_id' => $this->sks_product_category_id,
            'sks_clain_control_type_id' => $this->sks_clain_control_type_id,
            'sks_reimb_price' => $this->sks_reimb_price,
            'check_druginteraction_history_day' => $this->check_druginteraction_history_day,
            'nhso_adp_type_id' => $this->nhso_adp_type_id,
            'sks_claim_control_type_id' => $this->sks_claim_control_type_id,
            'begin_date' => $this->begin_date,
            'finish_date' => $this->finish_date,
            'extra_unitcost' => $this->extra_unitcost,
            'drug_control_type_id' => $this->drug_control_type_id,
            'active_ingredient_mg' => $this->active_ingredient_mg,
            'max_qty' => $this->max_qty,
            'capacity_qty' => $this->capacity_qty,
            'drugitems_due_type_id' => $this->drugitems_due_type_id,
            'drugeval_head_id' => $this->drugeval_head_id,
            'vat_percent' => $this->vat_percent,
            'fwf_item_id' => $this->fwf_item_id,
            'drugitems_em1_id' => $this->drugitems_em1_id,
            'drugitems_em2_id' => $this->drugitems_em2_id,
            'drugitems_em3_id' => $this->drugitems_em3_id,
            'drugitems_em4_id' => $this->drugitems_em4_id,
            'sks_price' => $this->sks_price,
            'default_qty_ipd' => $this->default_qty_ipd,
            'max_qty_ipd' => $this->max_qty_ipd,
            'med_dose_calc_type_id' => $this->med_dose_calc_type_id,
            'ipd_rx_freq_day' => $this->ipd_rx_freq_day,
            'displaycolor_focus' => $this->displaycolor_focus,
            'last_update' => $this->last_update,
        ]);

        $query->andFilterWhere(['like', 'icode', $this->icode])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'strength', $this->strength])
            ->andFilterWhere(['like', 'units', $this->units])
            ->andFilterWhere(['like', 'dosageform', $this->dosageform])
            ->andFilterWhere(['like', 'drugaccount', $this->drugaccount])
            ->andFilterWhere(['like', 'drugcategory', $this->drugcategory])
            ->andFilterWhere(['like', 'drugnote', $this->drugnote])
            ->andFilterWhere(['like', 'hintcode', $this->hintcode])
            ->andFilterWhere(['like', 'istatus', $this->istatus])
            ->andFilterWhere(['like', 'lockprice', $this->lockprice])
            ->andFilterWhere(['like', 'lockprint', $this->lockprint])
            ->andFilterWhere(['like', 'stdtaken', $this->stdtaken])
            ->andFilterWhere(['like', 'therapeutic', $this->therapeutic])
            ->andFilterWhere(['like', 'therapeuticgroup', $this->therapeuticgroup])
            ->andFilterWhere(['like', 'gpo_code', $this->gpo_code])
            ->andFilterWhere(['like', 'use_right', $this->use_right])
            ->andFilterWhere(['like', 'i_type', $this->i_type])
            ->andFilterWhere(['like', 'drugusage', $this->drugusage])
            ->andFilterWhere(['like', 'high_cost', $this->high_cost])
            ->andFilterWhere(['like', 'must_paid', $this->must_paid])
            ->andFilterWhere(['like', 'sticker_short_name', $this->sticker_short_name])
            ->andFilterWhere(['like', 'paidst', $this->paidst])
            ->andFilterWhere(['like', 'antibiotic', $this->antibiotic])
            ->andFilterWhere(['like', 'empty', $this->empty])
            ->andFilterWhere(['like', 'empty_text', $this->empty_text])
            ->andFilterWhere(['like', 'gfmiscode', $this->gfmiscode])
            ->andFilterWhere(['like', 'oldcode', $this->oldcode])
            ->andFilterWhere(['like', 'habit_forming', $this->habit_forming])
            ->andFilterWhere(['like', 'did', $this->did])
            ->andFilterWhere(['like', 'stock_type', $this->stock_type])
            ->andFilterWhere(['like', 'price_lock', $this->price_lock])
            ->andFilterWhere(['like', 'pregnancy', $this->pregnancy])
            ->andFilterWhere(['like', 'generic_name', $this->generic_name])
            ->andFilterWhere(['like', 'show_pregnancy_alert', $this->show_pregnancy_alert])
            ->andFilterWhere(['like', 'icode_guid', $this->icode_guid])
            ->andFilterWhere(['like', 'na', $this->na])
            ->andFilterWhere(['like', 'invcode', $this->invcode])
            ->andFilterWhere(['like', 'check_user_group', $this->check_user_group])
            ->andFilterWhere(['like', 'check_user_name', $this->check_user_name])
            ->andFilterWhere(['like', 'show_notify', $this->show_notify])
            ->andFilterWhere(['like', 'show_notify_text', $this->show_notify_text])
            ->andFilterWhere(['like', 'income', $this->income])
            ->andFilterWhere(['like', 'print_sticker_pq', $this->print_sticker_pq])
            ->andFilterWhere(['like', 'charge_service_opd', $this->charge_service_opd])
            ->andFilterWhere(['like', 'charge_service_ipd', $this->charge_service_ipd])
            ->andFilterWhere(['like', 'ename', $this->ename])
            ->andFilterWhere(['like', 'dose_type', $this->dose_type])
            ->andFilterWhere(['like', 'no_discount', $this->no_discount])
            ->andFilterWhere(['like', 'therapeutic_eng', $this->therapeutic_eng])
            ->andFilterWhere(['like', 'hintcode_eng', $this->hintcode_eng])
            ->andFilterWhere(['like', 'limit_drugusage', $this->limit_drugusage])
            ->andFilterWhere(['like', 'print_sticker_header', $this->print_sticker_header])
            ->andFilterWhere(['like', 'calc_idr_qty', $this->calc_idr_qty])
            ->andFilterWhere(['like', 'item_in_hospital', $this->item_in_hospital])
            ->andFilterWhere(['like', 'no_substock', $this->no_substock])
            ->andFilterWhere(['like', 'usage_code', $this->usage_code])
            ->andFilterWhere(['like', 'frequency_code', $this->frequency_code])
            ->andFilterWhere(['like', 'time_code', $this->time_code])
            ->andFilterWhere(['like', 'usage_unit_code', $this->usage_unit_code])
            ->andFilterWhere(['like', 'billcode', $this->billcode])
            ->andFilterWhere(['like', 'billnumber', $this->billnumber])
            ->andFilterWhere(['like', 'lockprint_ipd', $this->lockprint_ipd])
            ->andFilterWhere(['like', 'pregnancy_notify_text', $this->pregnancy_notify_text])
            ->andFilterWhere(['like', 'show_breast_feeding_alert', $this->show_breast_feeding_alert])
            ->andFilterWhere(['like', 'breast_feeding_alert_text', $this->breast_feeding_alert_text])
            ->andFilterWhere(['like', 'show_child_notify', $this->show_child_notify])
            ->andFilterWhere(['like', 'child_notify_text', $this->child_notify_text])
            ->andFilterWhere(['like', 'continuous', $this->continuous])
            ->andFilterWhere(['like', 'substitute_icode', $this->substitute_icode])
            ->andFilterWhere(['like', 'trade_name', $this->trade_name])
            ->andFilterWhere(['like', 'use_right_allow', $this->use_right_allow])
            ->andFilterWhere(['like', 'check_remed_qty', $this->check_remed_qty])
            ->andFilterWhere(['like', 'addict', $this->addict])
            ->andFilterWhere(['like', 'fp_drug', $this->fp_drug])
            ->andFilterWhere(['like', 'usage_code_ipd', $this->usage_code_ipd])
            ->andFilterWhere(['like', 'usage_unit_code_ipd', $this->usage_unit_code_ipd])
            ->andFilterWhere(['like', 'frequency_code_ipd', $this->frequency_code_ipd])
            ->andFilterWhere(['like', 'time_code_ipd', $this->time_code_ipd])
            ->andFilterWhere(['like', 'print_ipd_injection_sticker', $this->print_ipd_injection_sticker])
            ->andFilterWhere(['like', 'provis_medication_unit_code', $this->provis_medication_unit_code])
            ->andFilterWhere(['like', 'hos_guid', $this->hos_guid])
            ->andFilterWhere(['like', 'sks_drug_code', $this->sks_drug_code])
            ->andFilterWhere(['like', 'sks_dfs_code', $this->sks_dfs_code])
            ->andFilterWhere(['like', 'sks_dfs_text', $this->sks_dfs_text])
            ->andFilterWhere(['like', 'hos_guid_ext', $this->hos_guid_ext])
            ->andFilterWhere(['like', 'check_druginteraction_history', $this->check_druginteraction_history])
            ->andFilterWhere(['like', 'nhso_adp_code', $this->nhso_adp_code])
            ->andFilterWhere(['like', 'name_pr', $this->name_pr])
            ->andFilterWhere(['like', 'name_eng', $this->name_eng])
            ->andFilterWhere(['like', 'capacity_name', $this->capacity_name])
            ->andFilterWhere(['like', 'finish_reason', $this->finish_reason])
            ->andFilterWhere(['like', 'name_print', $this->name_print])
            ->andFilterWhere(['like', 'no_order_g6pd', $this->no_order_g6pd])
            ->andFilterWhere(['like', 'gender_check', $this->gender_check])
            ->andFilterWhere(['like', 'no_order_gender', $this->no_order_gender])
            ->andFilterWhere(['like', 'prefer_opd_usage_code', $this->prefer_opd_usage_code])
            ->andFilterWhere(['like', 'need_order_reason', $this->need_order_reason])
            ->andFilterWhere(['like', 'light_protect', $this->light_protect])
            ->andFilterWhere(['like', 'tpu_code_list', $this->tpu_code_list])
            ->andFilterWhere(['like', 'inv_map_update', $this->inv_map_update])
            ->andFilterWhere(['like', 'special_advice_text', $this->special_advice_text])
            ->andFilterWhere(['like', 'precaution_advice_text', $this->precaution_advice_text])
            ->andFilterWhere(['like', 'contra_advice_text', $this->contra_advice_text])
            ->andFilterWhere(['like', 'storage_advice_text', $this->storage_advice_text])
            ->andFilterWhere(['like', 'qr_code_url', $this->qr_code_url])
            ->andFilterWhere(['like', 'acc_regist', $this->acc_regist])
            ->andFilterWhere(['like', 'use_paidst', $this->use_paidst])
            ->andFilterWhere(['like', 'thai_name', $this->thai_name])
            ->andFilterWhere(['like', 'tmt_tp_code', $this->tmt_tp_code])
            ->andFilterWhere(['like', 'tmt_gp_code', $this->tmt_gp_code])
            ->andFilterWhere(['like', 'limit_pttype', $this->limit_pttype])
            ->andFilterWhere(['like', 'noshow_narcotic', $this->noshow_narcotic])
            ->andFilterWhere(['like', 'medication_machine_flag', $this->medication_machine_flag])
            ->andFilterWhere(['like', 'print_sticker_by_frequency', $this->print_sticker_by_frequency])
            ->andFilterWhere(['like', 'print_sticker_pq_ipd', $this->print_sticker_pq_ipd])
            ->andFilterWhere(['like', 'sub_income', $this->sub_income])
            ->andFilterWhere(['like', 'prefer_ipd_usage_code', $this->prefer_ipd_usage_code])
            ->andFilterWhere(['like', 'drugusage_ipd', $this->drugusage_ipd])
            ->andFilterWhere(['like', 'no_popup_ipd_reason', $this->no_popup_ipd_reason])
            ->andFilterWhere(['like', 'specprep', $this->specprep])
            ->andFilterWhere(['like', 'send_line_notify', $this->send_line_notify])
            ->andFilterWhere(['like', 'show_qrcode_trade', $this->show_qrcode_trade])
            ->andFilterWhere(['like', 'warn_g6pd', $this->warn_g6pd])
            ->andFilterWhere(['like', 'id', $this->id]);

        return $dataProvider;
    }
}
