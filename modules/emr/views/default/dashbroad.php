<?php
use miloschuman\highcharts\Highcharts;
use dosamigos\chartjs\ChartJs;
use miloschuman\highcharts\HighchartsAsset;

HighchartsAsset::register($this)->withScripts(['highstock', 'modules/exporting', 'modules/drilldown']);
?>

<div class="row">
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
<div id="container-line" style="position: absolute;left: 100%;"></div>

   </div>

      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

      <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

      </div>
  
</div>

<?php
$js = <<< JS

Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Browser market shares in January, 2018'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: 'Chrome',
            y: 61.41,
            sliced: true,
            selected: true
        }, {
            name: 'Internet Explorer',
            y: 11.84
        }, {
            name: 'Firefox',
            y: 10.85
        }, {
            name: 'Edge',
            y: 4.67
        }, {
            name: 'Safari',
            y: 4.18
        }, {
            name: 'Sogou Explorer',
            y: 1.64
        }, {
            name: 'Opera',
            y: 1.6
        }, {
            name: 'QQ',
            y: 1.2
        }, {
            name: 'Other',
            y: 2.61
        }]
    }]
});



Highcharts.chart('container-line', {

title: {
    text: 'Confirm BP'
},

subtitle: {
   //  text: 'Source: thesolarfoundation.com'
},

yAxis: {
    title: {
        text: 'Number of Employees'
    }
},
legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'middle'
},

plotOptions: {
    series: {
        label: {
            connectorAllowed: false
        },
        pointStart: 2010
    }
},

series: [{
    name: 'BP1',
    data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
}, {
    name: 'BP2',
    data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
}],

responsive: {
    rules: [{
        condition: {
            maxWidth: 500
        },
        chartOptions: {
            legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom'
            }
        }
    }]
}

});


JS;
$this->registerJS($js);
?>
