<?php
use yii\helpers\Html;
use kartik\widgets\Select2;
?>
หน่วยการวัด
<?php
echo Select2::widget([
        'name' => 'unit',
        'data' => ['cm' => "cm", 'in' => "in"],
        'options' => [
            'placeholder' => 'หนวดวัด',
            'id' => 'change-unit',
        ],
        'pluginEvents' => [
            "change" => "function() { 
                localStorage.setItem('unit',$(this).val());
                loadChiefcomplaint();
            }",
        ],
    ]);
?>

อุณหภูมิ
<?php
echo Select2::widget([
        'name' => 'temperature',
        'data' => ['c' => "C", 'f' => "F"],
        'options' => [
            'placeholder' => 'อุณหภูมิ',
            'id' => 'change-temperature',
            'options' => [],   
        ],
        'pluginEvents' => [
            "change" => "function() { 
                console.log($(this).val());
                localStorage.setItem('temperature',$(this).val());
                loadChiefcomplaint();
            }",
        ],
    ]);
?>

BW
<?php
echo Select2::widget([
        'name' => 'bw',
        'data' => ['kg' => "kg", 'kb' => "kb",'lb' => 'lb'],
        'options' => [
            'placeholder' => 'kg,kb,lb',
            'id' => 'bw-setting',
            'options' => [],   
        ],
        'pluginEvents' => [
            "change" => "function() { 
                console.log($(this).val());
                localStorage.setItem('bw',$(this).val());
                loadChiefcomplaint();
            }",
        ],
    ]);
?>

<?php
$js  = <<< JS
// $(function(){
    var unit = localStorage.getItem("unit");
    var temperature = localStorage.getItem("temperature");
    var bw = localStorage.getItem("bw");
    $('#change-unit').val(unit).trigger('change');
    $('#change-temperature').val(temperature).trigger('change');
    $('#bw-setting').val(bw).trigger('change');
// })

JS;
$this->registerJS($js);
?>
