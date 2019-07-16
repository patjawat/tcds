<?php
use yii\helpers\Html;
use app\components\PatientHelper;

$qr = $model->hn.'-'.$model->vn;
?>
<?=Html::img(Yii::getAlias('@app/web/img/doc_dm/').'new_dm_history_1.png', ['width' => '600','style' => 'margin-left:90px;'])?>

<?=Html::img(Yii::getAlias('@app/web/img/doc_dm/').'new_dm_history_2.png', ['width' => '600','style' => 'margin-left:90px;'])?>

<?=Html::img(Yii::getAlias('@app/web/img/doc_dm/').'new_dm_history_3.png', ['width' => '600','style' => 'margin-left:90px;'])?>
