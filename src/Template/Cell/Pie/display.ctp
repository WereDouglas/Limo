
<?php

/*echo '<pre>';
var_dump($information);*/

?>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

    <script type="text/javascript">
        $(function () {
            Highcharts.chart('container_pie', {
                chart: {
                    type: 'pie',
                    options3d: {
                        enabled: true,
                        alpha: 45
                    }
                },
                title: {
                    text: 'Todays trips'
                },
                subtitle: {
                    text: 'Trip Share'
                },
                plotOptions: {
                    pie: {
                        innerSize: 100,
                        depth: 45
                    }
                },
                series: [{
                    name: 'Trip count amount',
                    data: [
                        <?php foreach ($information as $ct): ?>

                        ['<?= $ct->name ?>', <?= $ct->count ?>],
                        <?php endforeach; ?>

                    ]
                }]
            });
        });
    </script>
</head>
<body>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<div id="container_pie" style="height: 400px"></div>

