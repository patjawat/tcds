<?php
use yii\helpers\Html;
use app\components\PatientHelper;

$qr = $model->hn.'-'.$model->vn;
?>
<?=Html::img(Yii::getAlias('@app/web/img/doc_dietitian/').'Theptarin_prenatal_weight_gain_chart_for_overweight_mother.png', ['width' => '600','style' => 'margin-left:90px;'])?>

