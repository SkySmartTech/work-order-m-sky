<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Line Chart Example</title>
    <!-- Include Chart.js library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
</head>
<body>
    <div id="Id_DivBarChart_1">
        <!-- Chart will be rendered here -->
    </div>

    <script>
        // Sample dummy data for varDate, varWoCount1, varWoCount2, varWoCount3
        var varDate = ['2022-01-01', '2022-01-02', '2022-01-03', '2022-01-04', '2022-01-05'];
        var varWoCount1 = [10, 25, 15, 25, 70]; // Example data for chart 1
        var varWoCount2 = [15, 50, 30, 40, 55]; // Example data for chart 2
        var varWoCount3 = [20, 30, 25, 35, 40]; // Example data for chart 3

        document.getElementById("Id_DivBarChart_1").innerHTML = '&nbsp;';
        document.getElementById("Id_DivBarChart_1").innerHTML = '<canvas id="id_barChart_1" style="max-height: 420px; max-width: 120%;"></canvas>';
        var barChartCanvas = document.getElementById('id_barChart_1').getContext('2d');

        var barChart1_Data = {
            labels: varDate,
            datasets: [{
                label: 'Break Down Progress 1',
                backgroundColor: 'rgba(60,141,188,0.9)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: varWoCount1
            }, {
                label: 'Break Down Progress 2',
                backgroundColor: 'rgba(210, 44, 44, 0.9)',
                borderColor: 'rgba(210, 44, 44, 0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(210, 44, 44, 1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(210, 44, 44, 1)',
                data: varWoCount2
            }, {
                label: 'Break Down Progress 3',
                backgroundColor: 'rgba(255, 153, 0, 0.9)',
                borderColor: 'rgba(255, 153, 0, 0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(255, 153, 0, 1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(255, 153, 0, 1)',
                data: varWoCount3
            }]
        };

        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false,
            chartArea: { backgroundColor: 'rgba(255, 0, 0, 0.1)' } // Change the background color of the chart area
        };

        new Chart(barChartCanvas, {
            type: 'line',
            data: barChart1_Data,
            options: barChartOptions
        });
    </script>
</body>
</html>
