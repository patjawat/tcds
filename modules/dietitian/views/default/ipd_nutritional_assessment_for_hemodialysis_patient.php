<?php
use yii\helpers\Html;
use app\components\PatientHelper;

$qr = $model->hn.'-'.$model->vn;
?>
<?=Html::img(Yii::getAlias('@app/web/img/doc_dietitian/').'iopd_nutritional_assessment_for_hemodialysis_patient.png', ['width' => '600','style' => 'margin-left:90px;'])?>

