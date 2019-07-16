

<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\web\JsExpression;
use yii\web\View;


$formatJs = <<< 'JS'
var formatRepo = function (repo) {
    if (repo.loading) {
        return repo.text;
    }
    var markup =
'<div class="row">' + 
    '<div class="col-sm-5">' +
        '<img src="' + repo.owner.avatar_url + '" class="img-rounded" style="width:30px" />' +
        '<b style="margin-left:5px">' + repo.full_name + '</b>' + 
    '</div>' +
    '<div class="col-sm-3"><i class="fa fa-code-fork"></i> ' + repo.forks_count + '</div>' +
    '<div class="col-sm-3"><i class="fa fa-star"></i> ' + repo.stargazers_count + '</div>' +
'</div>';
    if (repo.description) {
      markup += '<h5>' + repo.description + '</h5>';
    }
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


<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">


<?php
// render your widget
echo Select2::widget([
    'name' => 'kv-repo-template',
    'value' => '14719648',
    'initValueText' => 'kartik-v/yii2-widgets',
    'options' => ['placeholder' => 'Search for a repo ...'],
    'pluginOptions' => [
        'allowClear' => true,
        'minimumInputLength' => 1,
        'ajax' => [
            'url' => "https://api.github.com/search/repositories",
            'dataType' => 'json',
            'delay' => 250,
            'data' => new JsExpression('function(params) { return {q:params.term, page: params.page}; }'),
            'processResults' => new JsExpression($resultsJs),
            'cache' => true
        ],
        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
        'templateResult' => new JsExpression('formatRepo'),
        'templateSelection' => new JsExpression('formatRepoSelection'),
    ],
]);
?>
        
        </div>
</div>
