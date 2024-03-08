<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Line Chart</title>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>

    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
              <a class="navbar-brand" href="{{ route('lineChart.show')}}">Line Chart</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button> 
                ,d
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('google-charts.show')}}">Google Bar Chart</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('graphs.show')}}">Bar Chart</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('pieChart.show')}}">Pie Chart</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('donutChart.show')}}">Donut Chart</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    </header>

    <h1 style="text-align: center">User Creation Line Graph</h1>

    <div style="width: 1000px; height: 1000px; margin:auto;">
        <canvas id="userChart"></canvas>
    </div>

    <script>

        const labels = {!! json_encode($labelsLine) !!};
        const data = {!! json_encode($dataLine) !!};
        const colors = {!! json_encode($colorsLine)!!};


        const ctx = document.getElementById('userChart').getContext('2d');
        const userChart = new Chart(ctx, {

            type: 'line',
            data:   {
                        labels:labels,
                        datasets: 
                        [{
                            label: 'Number of Users Created',
                            data:data,
                            backgroundColor : colors ,
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 2
                        }]
                    },
            options: {
                scales:{
                    y:{
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    
</body>
</html>