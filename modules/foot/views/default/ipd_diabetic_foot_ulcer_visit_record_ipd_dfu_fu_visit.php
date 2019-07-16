<?php
use yii\helpers\Html;
use app\components\PatientHelper;

$qr = $model->hn.'-'.$model->vn;
?>
<?=Html::img(Yii::getAlias('@app/web/img/doc_foot/').'opd_diabetic_foot_ulcer_visit_record_opd_dfu_fu_visit.png', ['width' => '600','style' => 'margin-left:90px;'])?>

