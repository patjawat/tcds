<?php
use yii\helpers\Html;
use app\components\PatientHelper;

$qr = $model->hn.'-'.$model->vn;
?>
<?=Html::img(Yii::getAlias('@app/web/img/doc_foot/').'diabetic_foot_assessment_record_complete_1.png', ['width' => '600','style' => 'margin-left:90px;'])?>
<?=Html::img(Yii::getAlias('@app/web/img/doc_foot/').'diabetic_foot_assessment_record_complete_2.png', ['width' => '600','style' => 'margin-left:90px;'])?>
<?=Html::img(Yii::getAlias('@app/web/img/doc_foot/').'diabetic_foot_assessment_record_complete_3.png', ['width' => '600','style' => 'margin-left:90px;'])?>
<?=Html::img(Yii::getAlias('@app/web/img/doc_foot/').'diabetic_foot_assessment_record_complete_4.png', ['width' => '600','style' => 'margin-left:90px;'])?>
<?=Html::img(Yii::getAlias('@app/web/img/doc_foot/').'diabetic_foot_assessment_record_complete_5.png', ['width' => '600','style' => 'margin-left:90px;'])?>
<?=Html::img(Yii::getAlias('@app/web/img/doc_foot/').'diabetic_foot_assessment_record_complete_6.png', ['width' => '600','style' => 'margin-left:90px;'])?>

