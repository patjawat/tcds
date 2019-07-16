<?php
use yii\helpers\Html;

?>
<ul class="nav nav-tabs">
    <li class="<?=$opd?>">
    <?php echo Html::a('<i class="fa fa-check-square" aria-hidden="true"></i> OPD SUMMARY',['/foot/foot-assessment-summary-opd'])?>
</li>
    <li class="<?=$ipd?>">
    <?php echo Html::a('<i class="fa fa-check-square" aria-hidden="true"></i> IPD SUMMARY',['/foot/foot-assessment-summary-ipd'])?>
</li>
  </ul>

  <div class="tab-content">