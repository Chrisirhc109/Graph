<!-- google-chart.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bar Chart Google</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>

    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
              <a class="navbar-brand" href="{{ route('google-charts.show')}}">Google Bar Chart</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('graphs.show')}}">Bar Chart</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('pieChart.show')}}">Pie Chart</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('lineChart.show')}}">Line Chart</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('donutChart.show')}}">Donut Chart</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    </header>
    
    <h1 style="text-align: center">User Creation Bar Chart</h1>

    <!-- Container for the chart -->
    <div id="chart_div" style="width: 1700px; height: 500px; margin:auto;">

    </div>

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
