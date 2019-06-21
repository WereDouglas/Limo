<?php
//echo '<pre>';

//var_dump($trips);

?>

<style>
    #container {
        min-width: 320px;
        height: 400px;
        margin: 0 auto;
    }

</style>
<div id="container"></div>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script>

    Highcharts.chart('container', {
        chart: {
            zoomType: 'xy'
        },
        title: {
            text: 'Monthly trip counts'
        },
        subtitle: {
            text: 'Source: elimo.app'
        },
        xAxis: [{
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            crosshair: true
        }],
        yAxis: [{ // Primary yAxis
            labels: {
                format: '{value) No',
                style: {
                    color: Highcharts.getOptions().colors[2]
                }
            }


        }, { // Secondary yAxis
            gridLineWidth: 0,
            title: {
                text: 'Trips',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            },
            labels: {
                format: '{value} No.',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            }

        },],
        tooltip: {
            shared: true
        },
        legend: {
            layout: 'vertical',
            align: 'left',
            x: 80,
            verticalAlign: 'top',
            y: 55,
            floating: true,
            backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || 'rgba(255,255,255,0.25)'
        },
        series: [{
            name: 'Trip Counts',
            type: 'column',
            yAxis: 1,
            data: [
                <?php foreach ($trips as $ct): ?>
                <?= $ct->count.',' ?>
                <?php endforeach; ?>
            ],
            tooltip: {
                valueSuffix: ''
            }

        }]
    });



</script>
