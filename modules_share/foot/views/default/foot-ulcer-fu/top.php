<?php
use yii\helpers\Html;

?>
<ul class="nav nav-tabs">
    <li class="<?=$opd?>">
    <?php echo Html::a('<i class="fa fa-check-square" aria-hidden="true"></i> OPD ULCER F/U VISIT',['/foot/foot-ulcer-fu-opd'])?>
</li>
    <li class="<?=$ipd?>">
    <?php echo Html::a('<i class="fa fa-check-square" aria-hidden="true"></i>  IPD ULCER F/U VISIT',['/foot/foot-ulcer-fu-ipd'])?>
</li>
  </ul>

  <div class="tab-content">