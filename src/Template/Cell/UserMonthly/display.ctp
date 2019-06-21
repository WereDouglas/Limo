<?php

/*echo '<pre>';
var_dump($information);*/

?>


<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Highcharts Example</title>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <style type="text/css">
        ${demo.css}
    </style>
    <script type="text/javascript">
        $(function () {
            Highcharts.chart('container_user', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Monthly trips/Driver'
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    categories: [
                        'Jan',
                        'Feb',
                        'Mar',
                        'Apr',
                        'May',
                        'Jun',
                        'Jul',
                        'Aug',
                        'Sep',
                        'Oct',
                        'Nov',
                        'Dec'
                    ],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Trips'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [
                    <?php foreach ($information as $ct): ?>
                    {
                        name: '<?= $ct->name ?>',
                        data: [<?= $ct->data[0] ?>, <?= $ct->data[1] ?>, <?= $ct->data[2] ?>, <?= $ct->data[3] ?>, <?= $ct->data[4] ?>, <?= $ct->data[5] ?>, <?= $ct->data[6] ?>, <?= $ct->data[7] ?>, <?= $ct->data[8] ?>, <?= $ct->data[9] ?>,  <?= $ct->data[10] ?>, <?= $ct->data[11] ?>]

                    },
                    <?php endforeach; ?>]
            });
        });
    </script>
</head>
<body>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<div id="container_user" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

</body>
</html>
