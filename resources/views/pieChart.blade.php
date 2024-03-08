<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

    <h1 style="text-align: center">User Creation Pie Graph</h1>

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