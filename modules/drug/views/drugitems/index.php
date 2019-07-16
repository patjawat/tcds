<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\drug\models\DrugitemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Drugitems';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="drugitems-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Drugitems', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'id' => 'drugItems',
        'pjax' => true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'icode',
            'name',
            'strength',
            'units',
            'unitprice',
            //'dosageform',
            //'criticalpriority',
            //'drugaccount',
            //'drugcategory',
            //'drugnote',
            //'hintcode',
            //'istatus',
            //'lastupdatestdprice',
            //'lockprice',
            //'lockprint',
            //'maxlevel',
            //'minlevel',
            //'maxunitperdose',
            //'packqty',
            //'reorderqty',
            //'stdprice',
            //'stdtaken',
            //'therapeutic',
            //'therapeuticgroup',
            //'default_qty',
            //'gpo_code',
            //'use_right',
            //'i_type',
            //'drugusage',
            //'high_cost',
            //'must_paid',
            //'alert_level',
            //'access_level',
            //'sticker_short_name',
            //'paidst',
            //'antibiotic',
            //'displaycolor',
            //'empty',
            //'empty_text:ntext',
            //'unitcost',
            //'gfmiscode',
            //'ipd_price',
            //'oldcode',
            //'habit_forming',
            //'did',
            //'stock_type',
            //'price2',
            //'price3',
            //'ipd_price2',
            //'ipd_price3',
            //'price_lock',
            //'pregnancy',
            //'pharmacology_group1',
            //'pharmacology_group2',
            //'pharmacology_group3',
            //'generic_name',
            //'show_pregnancy_alert',
            //'icode_guid',
            //'na',
            //'invcode',
            //'check_user_group',
            //'check_user_name',
            //'show_notify',
            //'show_notify_text:ntext',
            //'income',
            //'print_sticker_pq',
            //'charge_service_opd',
            //'charge_service_ipd',
            //'ename',
            //'dose_type',
            //'habit_forming_type',
            //'no_discount',
            //'therapeutic_eng',
            //'hintcode_eng',
            //'limit_drugusage',
            //'print_sticker_header',
            //'calc_idr_qty',
            //'item_in_hospital',
            //'no_substock',
            //'volume_cc',
            //'usage_code',
            //'frequency_code',
            //'time_code',
            //'dispense_dose',
            //'usage_unit_code',
            //'dose_per_units',
            //'ipd_default_pay',
            //'billcode',
            //'billnumber',
            //'lockprint_ipd',
            //'pregnancy_notify_text:ntext',
            //'show_breast_feeding_alert',
            //'breast_feeding_alert_text:ntext',
            //'show_child_notify',
            //'child_notify_text:ntext',
            //'child_notify_min_age',
            //'child_notify_max_age',
            //'continuous',
            //'substitute_icode',
            //'trade_name',
            //'use_right_allow',
            //'medication_machine_id',
            //'ipd_medication_machine_id',
            //'check_remed_qty',
            //'addict',
            //'addict_type_id',
            //'medication_machine_opd_no',
            //'medication_machine_ipd_no',
            //'fp_drug',
            //'usage_code_ipd',
            //'dispense_dose_ipd',
            //'usage_unit_code_ipd',
            //'frequency_code_ipd',
            //'time_code_ipd',
            //'print_ipd_injection_sticker',
            //'provis_medication_unit_code',
            //'hos_guid',
            //'sks_product_category_id',
            //'sks_clain_control_type_id',
            //'sks_drug_code',
            //'sks_dfs_code',
            //'sks_dfs_text',
            //'sks_reimb_price',
            //'hos_guid_ext',
            //'check_druginteraction_history',
            //'check_druginteraction_history_day',
            //'nhso_adp_type_id',
            //'nhso_adp_code',
            //'sks_claim_control_type_id',
            //'begin_date',
            //'finish_date',
            //'name_pr',
            //'name_eng',
            //'capacity_name',
            //'finish_reason',
            //'extra_unitcost',
            //'drug_control_type_id',
            //'name_print',
            //'active_ingredient_mg',
            //'no_order_g6pd',
            //'gender_check',
            //'no_order_gender',
            //'max_qty',
            //'prefer_opd_usage_code',
            //'capacity_qty',
            //'need_order_reason',
            //'drugitems_due_type_id',
            //'drugeval_head_id',
            //'light_protect',
            //'tpu_code_list',
            //'inv_map_update',
            //'special_advice_text:ntext',
            //'precaution_advice_text:ntext',
            //'contra_advice_text:ntext',
            //'storage_advice_text:ntext',
            //'qr_code_url:url',
            //'vat_percent',
            //'acc_regist',
            //'use_paidst',
            //'thai_name',
            //'fwf_item_id',
            //'drugitems_em1_id',
            //'drugitems_em2_id',
            //'drugitems_em3_id',
            //'drugitems_em4_id',
            //'tmt_tp_code',
            //'tmt_gp_code',
            //'limit_pttype',
            //'noshow_narcotic',
            //'medication_machine_flag',
            //'sks_price',
            //'print_sticker_by_frequency',
            //'print_sticker_pq_ipd',
            //'sub_income',
            //'prefer_ipd_usage_code',
            //'default_qty_ipd',
            //'max_qty_ipd',
            //'drugusage_ipd',
            //'no_popup_ipd_reason',
            //'specprep',
            //'med_dose_calc_type_id',
            //'send_line_notify',
            //'show_qrcode_trade',
            //'warn_g6pd',
            //'ipd_rx_freq_day',
            //'displaycolor_focus',
            //'last_update',
            //'id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
