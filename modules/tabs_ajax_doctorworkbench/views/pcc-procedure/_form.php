<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\web\JsExpression;
use yii\web\View;

$url = \yii\helpers\Url::to(['proced']);//กำหนด URL ที่จะไปโหลดข้อมูล
$prefix = empty($person->prefix_id) ? '' : BasePrefix::findOne($model->prefix_id)->prefix_name;//กำหนดค่าเริ่มต้น
$this->registerJs($this->render('../../dist/js/script.js'));

$formatJs = <<< 'JS'
var formatRepo = function (repo) {
    if (repo.loading) {
        return repo.text;
    }
    var markup =
'<div class="row">' + 
    '<div class="col-lg-2 col-md-2 col-sm-2">' +
        '<b style="margin-left:5px"><code>' + repo.id+'</code></b>' + 
    '</div>' +
    '<div class="col-lg-9 col-md-9 col-sm-9">' + repo.title + '</div>' +
'</div>';
    return '<div style="overflow:hidden;">' + markup + '</div>';
};

var formatRepoSelection = function (repo) {
    return repo.full_name || repo.text;
}

JS;
 
// Register the formatting script
$this->registerJs($formatJs, View::POS_HEAD);

// script to parse the results into the format expected by Select2
$resultsJs = <<< JS
function (data, params) {
    params.page = params.page || 1;
    return {
        results: data.items,
        pagination: {
            more: (params.page * 30) < data.total_count
        }
    };
}
JS;
?>
<br>
<div class="pcc-procedure-form">
<?php 
    $form = ActiveForm::begin([
        'id' => 'form',
        'action' => ['create'],
        'options' => [
            'data-pjax' => 1
        ],
    ]); 
    ?>
    <?= $form->field($model, 'hn')->hiddenInput(['value' => 0000001])->label(false);?>
    <?= $form->field($model, 'vn')->hiddenInput(['value' => 8888444])->label(false);?>

    <div class="row">
        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
<?= $form->field($model, 'procedure_code')->widget(Select2::className(), [
                    'initValueText'=>$prefix,//กำหนดค่าเริ่มต้น
                    'theme' => Select2::THEME_DEFAULT,
                    'options'=>['id' => 'procedure_code','placeholder'=>'Select Procedure...'],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'minimumInputLength' => 1,
                        'language' => [
                            'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                        ],
                        'ajax' => [
                            'url' => $url,
                            'dataType' => 'json',
                            'data' => new JsExpression('function(params) { return {q:params.term}; }')
                        ],
                        // 'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                        // 'templateResult' => new JsExpression('function(city) { return city.text; }'),
                        // 'templateSelection' => new JsExpression('function (city) { return city.text; }'),
                
                        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                        'templateResult' => new JsExpression('formatRepo'),
                        // 'templateSelection' => new JsExpression('formatRepoSelection'),
                    ],
                ])->label(false);
                ?>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
       
        <?php echo Html::submitButton('<i class="fa fa-plus"></i>', ['class' => 'btn btn-success']) ?>
</div>       
    </div>
    <?php ActiveForm::end(); ?>
</div>
<br>