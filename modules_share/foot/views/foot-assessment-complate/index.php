<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use phpnt\ICheck\ICheck;
use kartik\datecontrol\DateControl;
use app\components\PatientHelper;
use app\components\MessageHelper;
use app\components\loading\ShowLoading;
echo ShowLoading::widget();
$this->registerCss($this->render('../../dist/css/style.css'));
$this->registerJs($this->render('../../dist/js/script.js'));

$hn = PatientHelper::getCurrentHn();
$this->params['pt_title'] = PatientHelper::getPatientTitleByHn($hn);
?>
<style>
.field-sfootassessmentcomplate-evt_right{display: inline-block;}
.field-sfootassessmentcomplate-evt_note_right{display: inline-block;}
.field-sfootassessmentcomplate-evt_left{display: inline-block;}
.field-sfootassessmentcomplate-evt_note_left{display: inline-block;}
#sfootassessmentcomplate-vessel_palpation_dp_right{display: inline-block;}
#sfootassessmentcomplate-vessel_palpation_dp_left{display: inline-block;}
#sfootassessmentcomplate-vessel_palpation_pt_right{display: inline-block;}
#sfootassessmentcomplate-vessel_palpation_pt_left{display: inline-block;}
.field-sfootassessmentcomplate-abi1_right{display: inline-block;}
.field-sfootassessmentcomplate-abi2_right{display: inline-block;}
.field-sfootassessmentcomplate-abi3_right{display: inline-block;}
.field-sfootassessmentcomplate-abi1_left{display: inline-block;}
.field-sfootassessmentcomplate-abi2_left{display: inline-block;}
.field-sfootassessmentcomplate-abi3_left{display: inline-block;}

.field-sfootassessmentcomplate-tbi1_right{display: inline-block;}
.field-sfootassessmentcomplate-tbi2_right{display: inline-block;}
.field-sfootassessmentcomplate-tbi3_right{display: inline-block;}
.field-sfootassessmentcomplate-tbi1_left{display: inline-block;}
.field-sfootassessmentcomplate-tbi2_left{display: inline-block;}
.field-sfootassessmentcomplate-tbi3_left{display: inline-block;}

</style>
<?=$this->render('@app/modules_share/foot/views/default/panel_top',[
    'tabimage' => '',
    'tabsummary' => '',
    'tabcomplate' =>'active',
    'tabfirst' =>'',
    'tabfu'=>'' 
    ])?>
<h4 style='text-align: center;17px;color: #777;'>DIABETIC FOOT ASSESSMENT RECORD : COMPLETE </h4>
 <hr/>
<?php $form = ActiveForm::begin(['id' => 'form','action' => ['/foot/foot-assessment-complate']]); ?>
 
<?=$this->render('@app/modules_share/foot/views/foot-assessment-complate/complate_tab1',['form' => $form,'model' => $model])?>
<?=$this->render('@app/modules_share/foot/views/foot-assessment-complate/complate_tab2',['form' => $form,'model' => $model])?>
<?=$this->render('@app/modules_share/foot/views/foot-assessment-complate/complate_tab3',['form' => $form,'model' => $model])?>
<?=$this->render('@app/modules_share/foot/views/foot-assessment-complate/complate_tab4',['form' => $form,'model' => $model])?> 

<?php $form = ActiveForm::end(); ?>

<?=$this->render('@app/modules_share/foot/views/default/panel_foot')?>