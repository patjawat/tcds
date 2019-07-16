
<?php
use kartik\tabs\TabsX;
use yii\helpers\Url;
use kartik\widgets\Select2;
use yii\web\JsExpression;
$content = $this->render('@app/modules/doctorworkbench/views/pcc-diagnosis/index',[
    'searchModel' => $searchModel,
                     'dataProvider' => $dataProvider,
                     'model' => $model
])
?>

<h1>demo-order/index</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>

<style>
.navbar-default .navbar-nav > li.dropdown:hover > a, 
.navbar-default .navbar-nav > li.dropdown:hover > a:hover,
.navbar-default .navbar-nav > li.dropdown:hover > a:focus {
    background-color: rgb(231, 231, 231);
    color: rgb(85, 85, 85);
}
li.dropdown:hover > .dropdown-menu {
    display: block;
	background-color: #eee;
}
.nav-tabs > li {
    background-color: #c7c7c7c7;
}
.nav-tabs > li > a {
    color:#353535;
}

</style>

<?php
echo TabsX::widget([
    'items' => [
        [
            'label' => 'EMR',
            'linkOptions' => ['data-url' => Url::to(['/emr/emrdetail/index'])],
            'options' => ['id' => 'tabs1'],
            'encode'=>true,
            'encodeLabels'=>true
        ],
        [
            'label' => 'Lab History',
            'linkOptions' => ['data-url' => Url::to(['/lab/hoslab/index'])],
            'options' => ['id' => 'tabs2'],
        ],
        [
            'label' => 'Drug History',
            'linkOptions' => ['data-url' => Url::to(['/drug/hosdrug/index'])],
            'options' => ['id' => 'tabs2'],
        ],
        [
            'label' => 'CC',
            'linkOptions' => ['data-url' => Url::to(['/chiefcomplaint/pccservicecc/create'])],
            'options' => ['id' => 'cc'],
        ],
        [
            'label' => 'Diganosis',
            'active' => true,
            // 'linkOptions' => ['data-url' => Url::to(['/doctorworkbench/pcc-diagnosis'])],
            'content' => $content,
            'options' => ['id' => 'diagnosis'],
        ],
        [
            'label' => 'Medication',
           'linkOptions' => ['data-url' => Url::to(['/doctorworkbench/pcc-medication'])],
            'options' => ['id' => 'medication'],
        ],
        [
            'label' => 'Procedure',
           'linkOptions' => ['data-url' => Url::to(['/doctorworkbench/pcc-procedure'])],
            'options' => ['id' => 'procedure'],
        ],
        [
            'label' => 'Pre-Order Lab',
            'linkOptions' => ['data-url' => Url::to(['/chiefcomplaint/pccservicecc/create'])],
            'options' => ['id' => 'pre-order-lab'],
        ],
        [
            'label' => 'Appointment',
            'linkOptions' => ['data-url' => Url::to(['tabs3'])],
            'options' => ['id' => 'tabs3'],
        ],
        [
            'label' => 'Treatmment Plan',
            'linkOptions' => ['data-url' => Url::to(['/treatment/treatmentplan/create'])],
            'options' => ['id' => 'treatment'],
        ],
    ],
    'position' => TabsX::POS_ABOVE,
    'encodeLabels' => false,
    'bordered' => true,
    'encodeLabels'=>false,
    'pluginOptions' => [
        'enableCache' => true,
    ],
    'pluginEvents' => [
        'tabsX.success' => 'function() {
            $("[data-krajee-select2]").each(function(data) {
               // this.select2({});
                console.log(data)
            })
        }',
    ]
]) ?>
