<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\modules\queuemanage\models\CDoctorRoom;
?>

<?php
$array = ArrayHelper::map(CDoctorRoom::find()->orderBy('id ASC')->all(),'id','room_title');
echo Html::dropDownList('room', '0',$array, ['class' => 'form-control form-control-inline', 'id' => 'room','prompt'=>'เลือกห้องตรวจ','style' => 'width:241px;'])
?>
<span>
<?php echo Html::button('ตกลง',['class' => 'btn btn-success change-doctor-room','style' => 'margin-top: 10px;'])?>

<?=$hn;?>
<?php
$js = <<< JS

$('.change-doctor-room').click(function(){
 changsDoctorRoom();
//  alert();
})


function changsDoctorRoom(){
    $.ajax({
        type: "post",
        url: "index.php?r=queuemanage/default/doctor-room",
        data: {
            hn:'1122',
            pcc_vn:'22',
            room_id:$('#room').val(),
            department_id:'er'
        },
        dataType: "dataType",
        success: function (response) {           
        }
    });
}

JS;
$this->registerJS($js);
?>