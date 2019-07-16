<?php
use yii\helpers\Html;
use app\components\PatientHelper;

$qr = $model->hn.'-'.$model->vn;
?>
<?=Html::img(Yii::getAlias('@app/web/img/doc_dm/').'seven_self_care_behavior_assessment_and_evaluation.png', ['width' => '600','style' => 'margin-left:90px;'])?>

