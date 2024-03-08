<!-- google-chart.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title class="text-bg-dark p-3">User Creation Chart</title>

</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <h1 class="text-bg-dark p-3" style="margin: auto; text-align: center;">
        User Creation Chart
    </h1>


    <div style="width: 1300px; margin: auto; text-align: center;"> {{-- This is to make the div centered --}}
        <div class="btn-group  mx-auto p-2">
            <a href="{{route('graphs.show')}}" class="btn btn-primary" >Bar Chart</a>
            <a href="{{route('pieChart.show')}}" class="btn btn-primary">Pie Chart</a>
            <a href="{{route('lineChart.show')}}" class="btn btn-primary">Line Chart</a>
            <a href="{{route('google-charts.show')}}" class="btn btn-primary active" aria-current="page">Bar Chart Google</a>
          </div>
        </div>
    <!-- Container for the chart -->
    <div id="chart_div" style="width:1300px; height:800px"></div>

    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable(@json($data));

            var options = {
                title: 'User Creation by Month',
                legend: { position: 'bottom' },
                hAxis: { title: 'Month' },
                vAxis: { title: 'Number of Users' }
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
</body>
</html>
