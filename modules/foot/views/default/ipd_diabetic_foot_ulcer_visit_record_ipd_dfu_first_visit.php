<?php
use yii\helpers\Html;
use app\components\PatientHelper;

$qr = $model->hn.'-'.$model->vn;
?>
<?=Html::img(Yii::getAlias('@app/web/img/doc_foot/').'ipd_diabetic_foot_ulcer_visit_record_ipd_dfu_first_visit.png', ['width' => '600','style' => 'margin-left:90px;'])?>

