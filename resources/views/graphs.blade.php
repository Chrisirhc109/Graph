<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Creation Graph</title>

    <!-- Chart.js CDN script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1 style="text-align: center">User Creation Bar Graph</h1>

    <div style="width: 1300px;margin:auto;">
        <canvas id="userChart"></canvas>
    </div>

    <script>
        const labels = {!! json_encode($labels) !!};
        const data = {!! json_encode($data) !!};
        const colors = {!! json_encode($colors) !!};

        // Chart.js code to render the graph
        const ctx = document.getElementById('userChart').getContext('2d');
        const userChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Number of Users Created',
                    data: data,
                    backgroundColor: colors,
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
