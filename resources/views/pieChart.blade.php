<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pie Graph</title>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
              <a class="navbar-brand" href="{{ route('pieChart.show')}}">Pie Chart</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('google-charts.show')}}">Google Bar Chart</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('graphs.show')}}">Bar Chart</a>
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


    <h1 style="text-align: center">User Creation Pie Graph</h1>

    <div style="width: 500px; height: 500px;margin:auto;">
        <canvas id="pieChartID"></canvas>
    </div>


    <script>
        const labels =  {!! json_encode($labelsPie)!!};
        const data = {!! json_encode($dataPie)!!};
        const colors = {!! json_encode($colorsPie) !!};


        var ctx = document.getElementById('pieChartID').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: colors,
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                    ],
                    borderWidth: 1
                }]
            },
        });
    </script>
</body>
</html>