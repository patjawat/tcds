<?php
use yii\helpers\Html;
use app\components\PatientHelper;

$qr = $model->hn.'-'.$model->vn;
?>
<?=Html::img(Yii::getAlias('@app/web/img/doc_hbot/').'opd_hyperbaric_oxygen_therapy_record_hbot.png', ['width' => '600','style' => 'margin-left:90px;'])?>
