
<?php
use kartik\tabs\TabsX;
use yii\helpers\Url;
$content = 'xxxx';
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
            'linkOptions' => ['data-url' => Url::to(['tabs1'])],
            'active' => true,
            'content' => $content, // $content is your initial tab content to show on load (you can use renderPartial or whatever to generate this in the view)
            'options' => ['id' => 'tabs1'],
            'encode'=>true,
            'encodeLabels'=>true
        ],
        [
            'label' => 'Lab History',
            'linkOptions' => ['data-url' => Url::to(['tabs2'])],
            'options' => ['id' => 'tabs2'],
        ],
        [
            'label' => 'Diganosis',
            'linkOptions' => ['data-url' => Url::to(['/doctorworkbench/pcc-diagnosis'])],
            'options' => ['id' => 'tabs3'],
        ],
        [
            'label' => 'Medication',
            'linkOptions' => ['data-url' => Url::to(['tabs3'])],
            'options' => ['id' => 'tabs3'],
        ],
        [
            'label' => 'Procedure',
            'linkOptions' => ['data-url' => Url::to(['tabs3'])],
            'options' => ['id' => 'tabs3'],
        ],
        [
            'label' => 'Pre-Order Lab',
            'linkOptions' => ['data-url' => Url::to(['tabs3'])],
            'options' => ['id' => 'tabs3'],
        ],
        [
            'label' => 'Appointment',
            'linkOptions' => ['data-url' => Url::to(['tabs3'])],
            'options' => ['id' => 'tabs3'],
        ],
        [
            'label' => 'Treatmment Plan',
            'linkOptions' => ['data-url' => Url::to(['tabs3'])],
            'options' => ['id' => 'tabs3'],
        ],
    ],
    'position' => TabsX::POS_ABOVE,
    'encodeLabels' => false,
    'bordered' => true,
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
