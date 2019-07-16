<?php
use yii\helpers\Html;
use app\components\PatientHelper;

$qr = $model->hn.'-'.$model->vn;
?>
<?=Html::img(Yii::getAlias('@app/web/img/doc_dietitian/').'opd_nutrition_visit_record_for_health_check-up.png', ['width' => '600','style' => 'margin-left:90px;'])?>

