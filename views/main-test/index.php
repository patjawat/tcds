<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<p><a href="xxx" data-confirm="ไป Link1">Link1</a></p>
<p><a href="<?= Url::to(['sss'])?>" data-confirm="ไป sss" >ไป sss</a></p>
<p><?=Html::a('ไป aaa', ['aaa'], ['data-confirm'=>'ไป aaa']);?></p>

