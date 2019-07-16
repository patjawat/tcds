<?php
use yii\helpers\Html;

$this->registerJsFile('@web/../modules_pm/eform/assets/split.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
/////////////////////////// D:\xampp\htdocs\medico_hrms\modules_pm\eform\assets
$this->registerCss("
.split {
    -webkit-box-sizing: border-box;
       -moz-box-sizing: border-box;
            box-sizing: border-box;
            overflow-y: auto;
            overflow-x: hidden;
  }

.gutter {
    background-color: #eee;

    background-repeat: no-repeat;
    background-position: 50%;
}

.split, .gutter.gutter-horizontal {
    float: left;
}
.gutter.gutter-horizontal {
    cursor: ew-resize;
}
.flex {
    display: flex;
    flex-direction: row;
}
.gutter.gutter-horizontal {
    cursor: ew-resize;
}

.tab-content{
    margin:5px; 
    padding:5px;
}
");

///////////////
$this->registerJs("
Split(['#main', '#custom'], {
    sizes: [55,45],
    minSize: [300,0],
    expanedToMin: true,
},
)
");
?>
<div class="Eform-default-index">
<div class="page-header">
<center>
    <h1>E-FORM
        <small>
        <object align="right">
            <?= Html::a('จดหมายเข้า <span class="badge">5</span>', ['#', 'id' => '1'], ['class' => 'btn  btn-info']) ?>
            <?= Html::a('จดหมายออก <span class="badge">3</span>', ['#', 'id' => '1'], ['class' => 'btn  btn-warning']) ?>
            </object>
        </small>
    </h1>
</center> 
  
</div>
<div class="flex">
    <div class="split" id="main">
    ​<picture>
    <source srcset="./employee_image/A4.jpg" type="image/svg+xml">
        <img src="./employee_image/A4.jpg" class="img-fluid img-thumbnail" alt="FORM">
    </picture>
    </div>
    <div class="split" id="custom">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation"><a href="#home" aria-controls="home" role="tab" data-toggle="tab" title="ข้อมูลส่วนบุคคล"> <span><i class="fas fa-2x fa-address-card"></i></span></a></li>
            <li role="presentation"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab" title="CALENDAR">  <span><i class="fas fa-2x fa-calendar-alt" ></i></span></a></li>
            <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab" title="Calculator">  <span><i class="fas fa-2x fa-calculator" ></i></span></a></li>
            <li role="presentation"><a href="#tab7" aria-controls="tab7" role="tab" data-toggle="tab" title="Expandsion">  <span><i class="fas fa-2x fa-expand-arrows-alt"></i></span></a></li>
            <li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab" title="GPS. MAP">  <span><i class="fas fa-2x fa-map-marked-alt" ></i></span></a></li>
            <li role="presentation"><a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab" title="BROWSE">  <span><i class="fas fa-2x fa-search-plus" ></i></span></a></li>
            <li role="presentation"><a href="#tab5" aria-controls="tab5" role="tab" data-toggle="tab" title="SEND-TO & KEEP IN LIST">  <span><i class="fas fa-2x fa-envelope-square" ></i></span></a></li>
            <li role="presentation"><a href="#tab6" aria-controls="tab6" role="tab" data-toggle="tab" title="SAVE PRINT EXPORT">  <span><i class="fas fa-2x fa-file-export" ></i></span></a></li>
        </ul>

<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
        <div class="row">
            <div class="col-md-6">
                <label>User Id</label>
            </div>
            <div class="col-md-6">
                <p>Kshiti123</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label>Name</label>
            </div>
            <div class="col-md-6">
                <p>Kshiti Ghelani</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label>Email</label>
            </div>
            <div class="col-md-6">
                <p>kshitighelani@gmail.com</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label>Phone</label>
            </div>
            <div class="col-md-6">
                <p>123 456 7890</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label>Profession</label>
            </div>
            <div class="col-md-6">
                <p>Web Developer and Designer</p>
            </div>
        </div>
    </div>

    <div role="tabpanel" class="tab-pane" id="tab1">
        <?php
            $events = array();
            //Testing
            $Event = new \yii2fullcalendar\models\Event();
            $Event->id = 1;
            $Event->title = 'Testing';
            $Event->start = date('Y-m-d\Th:m:s\Z');
            $events[] = $Event;

            $Event = new \yii2fullcalendar\models\Event();
            $Event->id = 2;
            $Event->title = 'Testing';
            $Event->start = date('Y-m-d\Th:m:s\Z',strtotime('tomorrow 6am'));
            $events[] = $Event;

            ?>
  
            <?= \yii2fullcalendar\yii2fullcalendar::widget(array(
                'events'=> $events,
            ));?>
     </div>
     <div role="tabpanel" class="tab-pane" id="tab2">
        <div class="row">
            <div class="col-md-3">
                <label>รายการ</label>
                    <select name="form" id="form" class="form-control">
                            <option value="ค่าเดินทาง">ค่าเดินทาง</option>
                            <option value="1">ค่าเบี้ยเลี้ยง</option>
                            <option value="3">ค่าที่พัก</option>
                            <option value="3">ค่าลงทะเบียน</option>
                        </select>
            </div>
            <div class="col-md-4">
                <label>รายละเอียด</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-md-3">
                <label>เป็นเงิน</label>
                <input type="number" class="form-control">
            </div>
            <div class="col-md-1">
                <label>Action</label>
                <button type="button" class="btn btn-large btn-block btn-success"><i class="fas fa-plus-square"></i></button>
            </div>

        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>รายการ</th>
                        <th>รายละเอียด</th>
                        <th>เป็นเงิน</th>
                        <th>หมายเหตุ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>ค่าเบี้ยเลี้ยง</td>
                        <td>จำนวน 3 วัน</td>
                        <td>960</td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td>ค่าเดินทาง</td>
                        <td>จำนวน 3 วัน</td>
                        <td>1,480</td>
                        <td><input type="text"></td>
                    </tr>
                    <tr>
                        <td>ค่าที่พัก</td>
                        <td>จำนวน 2 วัน</td>
                        <td>1,000</td>
                        <td><input type="text"></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2">เป็นเงิน</td>
                        <td>( สามพันสี่ร้อยสีสิบบาทถ้วน )</td>
                        <td>3,440</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        
    </div>
     <div role="tabpanel" class="tab-pane" id="tab3">
        <br><h1> GPS. MAP	</h1><br>
     </div>
     <div role="tabpanel" class="tab-pane" id="tab4">
        <div class="row">
            <div class="col-md-12">
                <label for="form">ประเภทเอกสาร</label>
                    <select name="form" id="form" class="form-control">
                        <option value="1">ใบลา</option>
                        <option value="2">สลิปเงินเดือน</option>
                        <option value="3">ขออนุญาติไปราชการ</option>
                        <option value="3">ขอใช้รถ</option>
                        <option value="3">ขอใช้ห้องประชุม</option>
                        <option value="3">ใบรับรองเงินเดือน</option>
                    </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <label for="form"></label>
                    <ul>
                        <li><i class="fas fa-file-word"></i> เอกสาร:ใบลา วันที่แก้ไข:01/11/61 <a href="#"><i class="fas fa-edit"></i></a></li>
                        <li><i class="fas fa-file-word"></i> เอกสาร:ขออนุญาติไปราชการ วันที่แก้ไข:05/10/61 <a href="#"><i class="fas fa-edit"></i></a></li>
                        <li><i class="fas fa-file-word"></i> เอกสาร:ขอใช้รถ วันที่แก้ไข:05/10/61 <a href="#"><i class="fas fa-edit"></i></a></li>
                        <li><i class="fas fa-file-word"></i> เอกสาร:ใบลา วันที่แก้ไข:02/07/61 <a href="#"><i class="fas fa-edit"></i></a></li>
                        <li><i class="fas fa-file-word"></i> เอกสาร:ใบลา วันที่แก้ไข:20/05/61 <a href="#"><i class="fas fa-edit"></i></a></li>
                        <li><i class="fas fa-file-word"></i> เอกสาร:ใบลา วันที่แก้ไข:15/03/61 <a href="#"><i class="fas fa-edit"></i></a></li>
                    </ul>
            </div>
        </div>

     </div>
     <div role="tabpanel" class="tab-pane" id="tab5">
            <div class="row">
                <div class="col-md-8">
                <label for="user_id">ส่งให้</label>
                        <select name="user_id" id="user_id" class="form-control">
                            <option value="1">นาย ทดสอบ ระบบ</option>
                            <option value="2">นาง พยาบาล วิชาชีพ</option>
                            <option value="3">นพ. แพทย์ ห้องตรวจ</option>
                        </select>
                </div>
                <div class="col-md-4">
                <label> </label>
                    <button type="button" class="btn btn-large btn-block btn-success">SEND >>>>></button>  
                </div>
            </div>
     </div>
     <div role="tabpanel" class="tab-pane" id="tab6">
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-large btn-block btn-default" href="#" role="button">Excel</a>
                <a class="btn btn-large btn-block btn-default" href="#" role="button">Word</a>
                <a class="btn btn-large btn-block btn-default" href="#" role="button">PDF</a>
                <a class="btn btn-large btn-block btn-default" href="#" role="button">PRINT</a>
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="tab7">
    <div class="row">
            <div class="col-md-4">
                <label>รายการ</label>
                    <select name="form" id="form" class="form-control">
                            <option value="1">รายการที่ 1</option>
                            <option value="2">รายการที่ 2</option>
                            <option value="3">รายการที่ 3</option>
                            <option value="4">รายการที่ 4</option>
                        </select>
            </div>
            <div class="col-md-7">
                <label>รายละเอียด</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-md-1">
                <label>Action</label>
                <button type="button" class="btn btn-large btn-block btn-success"><i class="fas fa-plus-square"></i></button>
            </div>

        </div>
    </div>
 
    </div>
</div>



</div>
<?php 
/* 
ข้อมูลส่วนบุคคล-สถานที่ (editable)	
CALENDAR (Date/time To Date/Time)	
Calculator	
GPS. MAP	
BROWSE	
SEND-TO & KEEP IN LIST	
SAVE PRINT EXPORT
*/
?>

