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

    <h1 style="text-align: center">User Creation Pie Graph</h1>

    <div style="width: 1300px; margin: auto; text-align: center;"> {{-- This is to make the div centered --}}
        <div class="btn-group  mx-auto p-2">
            <a href="{{route('graphs.show')}}" class="btn btn-primary">Bar Chart</a>
            <a href="{{route('pieChart.show')}}" class="btn btn-primary active" aria-current="page">Pie Chart</a>
            <a href="{{route('lineChart.show')}}" class="btn btn-primary">Line Chart</a>
            <a href="{{route('google-charts.show')}}" class="btn btn-primary">Bar Chart Google</a>
          </div>
        </div>


    <div style="width: 700px; height: 700px;margin:auto;">
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
