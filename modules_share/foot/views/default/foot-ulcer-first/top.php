<?php
use yii\helpers\Html;

?>
<ul class="nav nav-tabs">
    <li class="<?=$opd?>">
    <?php echo Html::a('<i class="fa fa-check-square" aria-hidden="true"></i> OPD ULCER FIRST VISIT',['/foot/foot-ulcer-first-opd'])?>
</li>
    <li class="<?=$ipd?>">
    <?php echo Html::a('<i class="fa fa-check-square" aria-hidden="true"></i>  IPD ULCER FIRST VISIT',['/foot/foot-ulcer-first-ipd'])?>
</li>
  </ul>

  <div class="tab-content">