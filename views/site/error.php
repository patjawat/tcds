<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use app\components\loading\ShowLoading;
echo ShowLoading::widget();

$this->title = $name;
?>
<div class="site-error">

    <h3>การดำเนินการถูกปฏิเสธ</h3>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>


</div>
