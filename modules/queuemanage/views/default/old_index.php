<?php

use app\components\MessageHelper;
use app\assets\DataTableAsset;
use yii\widgets\ActiveForm;
use kartik\helpers\Html;

DataTableAsset::register($this);
?>
<?= MessageHelper::Note(" คลิกแล้วเรียกลำดับ ตัวเลขลำดับส่งเข้าตรวจเปลี่ยนตามคลิก ก่อน/หลัง ") ?>       

<div class="panel panel-info">


    <div class="panel-heading">
        <div class="panel-title">
            <i class="fa fa-clock-o" aria-hidden="true"></i> ผู้ป่วยรอส่งเข้าพบแพทย์ 
            <object align='right'><a class="btn btn-lbrown">ทั้งหมด</a></object>
        </div>
    </div>
    <div class="panel-body">
        <?php
        ActiveForm::begin([
            'id' => 'form-add-q'
        ]);
        ?>


        <div style="margin-bottom: 3px">
            <?php
            $array = [
                '0' => '-- เลือก --',
                '1' => 'ห้องตรวจ-1',
                '2' => 'ห้องตรวจ-2',
                '3' => 'ห้องตรวจ-3'
            ];
            echo Html::dropDownList('room', '0', $array, ['class' => 'form-control form-control-inline', 'id' => 'room'])
            ?>

            <button id='btn_add_q' type="submit" class="btn btn-pink"><i class="fa fa-check"></i> ส่งพบแพทย์</button>
             <?=Html::a('<i class="fa fa-user-md" aria-hidden="true"></i> ตั้งค่า',['/queuemanage/room'], ['class' => 'btn btn-light-green pull-right'])?>
        </div>

        <div class="row">
            <div class="col-lg-7">
                <div id="grid-view-data-table" class="grid-view">
                    <table class="table  table-bordered">
                        <thead>
                            <tr>
                                <th></th>                                
                                <th>Hn</th>
                                <th >ลำดับส่ง</th>
                                <th >เวลามา</th>                                
                                <th>ชื่อ นามสกุล</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($raw as $key => $value): ?>
                                <tr data-cid="<?= $value['cid'] ?>" class="tr-vn">
                                    <td>
                                        <input class="chk_pt" type="checkbox" name="pt[]" value="<?= $value['pcc_vn'] ?>" />
                                    </td>

                                    <td><?= $value['hn'] ?></td>
                                    <td><div class="send_no"></div></td>
                                    <td><?= $value['visit_date_begin'] . ' ' . $value['visit_time_begin'] ?></td>                                    
                                    <td><?= $value['fullname'] ?></td>

                                </tr>                                
                            <?php endforeach; ?>



                        </tbody>

                    </table>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">
                            ผลตรวจทางห้องปฏิบัติการ
                        </div>                        
                    </div>
                    <div class="panel-body">
                        <!-- <div id="lab-view"></div> -->

                        <table class="table">
                        <thead>
                        <tr>
                        <th>ลำดับ</th>
                        <th>รายการ</th>
                        <th>ผล</th>
                        <th>มาตรฐาน</th>
                        </tr>
                        </thead>
                        <tbody id="lab-view">
    
                    </tbody>
                </table>
                        
                    </div>

                </div>


            </div>
        </div>
        <?php ActiveForm::end(); ?>      

    </div>
</div>

<?php
$this->registerJs($this->render('script.js'));
?>



