<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <h1 style="text-align: center">User Creation Line Graph</h1>

    <div style="width: 1300px; margin: auto; text-align: center;"> {{-- This is to make the div centered --}}
    <div class="btn-group  mx-auto p-2">
        <a href="{{route('graphs.show')}}" class="btn btn-primary">Bar Chart</a>
        <a href="{{route('pieChart.show')}}" class="btn btn-primary">Pie Chart</a>
        <a href="{{route('lineChart.show')}}" class="btn btn-primary active" aria-current="page">Line Chart</a>
        <a href="{{route('google-charts.show')}}" class="btn btn-primary">Bar Chart Google</a>
      </div>
        </div>
    </div>  

    <div style="width: 1300px; margin:auto;">
        <canvas id="userChart"></canvas>
    </div>

    <script>

        const labels = {!! json_encode($labelsLine) !!};
        const data = {!! json_encode($dataLine) !!};
        const colors = {!! json_encode($colorsLine)!!};


        const ctx = document.getElementById('userChart').getContext('2d');
        const userChart = new Chart(ctx, {

            type: 'line',
            data: {
                labels:labels,
                datasets: [{
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
