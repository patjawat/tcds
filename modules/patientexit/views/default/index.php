<?php 
use yii\helpers\Url;
?>
<div class="patientexit-default-index">
    
    <a href="<?= Url::to(['exit-current-patient'])?>" class="btn btn-success"> จบการตรวจ</a>
    <a href="<?= Url::to(['remove-current-patient'])?>" class="btn btn-danger"> ยกเลิกการตรวจ</a>
    <div style="margin-bottom: 5px"></div>
    <button class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</button>
   
</div>
