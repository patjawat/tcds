<?php
use yii\helpers\Html;
use app\components\PatientHelper;

$qr = $model->hn.'-'.$model->vn;
?>
<?=Html::img(Yii::getAlias('@app/web/img/doc_dm/').'multidisciplinary_team_record_of_diabetic_education_1.png', ['width' => '600','style' => 'margin-left:90px;'])?>
<br>
<?=Html::img(Yii::getAlias('@app/web/img/doc_dm/').'multidisciplinary_team_record_of_diabetic_education_2.png', ['width' => '600','style' => 'margin-left:90px;'])?>
<br>
<?=Html::img(Yii::getAlias('@app/web/img/doc_dm/').'multidisciplinary_team_record_of_diabetic_education_3.png', ['width' => '600','style' => 'margin-left:90px;'])?>

