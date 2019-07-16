<?php

use yii\web\View;
use yii\helpers\Html;

$this->registerCss($this->render('./load.css'));
$this->registerJs($this->render('./load_end.js'), View::POS_LOAD);
//$img = $this->render();
?>
<div id='tehnnn_load_screen' >
    <div id='tehnnn_loading'>
        <?= Html::img('@web/img/loader.gif')?>
    </div>
</div>