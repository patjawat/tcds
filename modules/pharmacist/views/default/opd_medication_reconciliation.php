<?php
use yii\helpers\Html;
use app\components\PatientHelper;

$qr = $model->hn.'-'.$model->vn;
?>
<?=Html::img(Yii::getAlias('@app/web/img/doc_med/').'opd_medication_reconciliation.png', ['width' => '100%','style' => 'margin-left:90px;'])?>
