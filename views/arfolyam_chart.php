<?php

$currencyData = [
    ['date' => '2024-11-20', 'rate' => 280.95],
    ['date' => '2024-11-21', 'rate' => 281.15],
    ['date' => '2024-11-22', 'rate' => 279.75],
    ['date' => '2024-11-23', 'rate' => 282.30],
    ['date' => '2024-11-24', 'rate' => 280.50]
];

$dates = array_column($currencyData, 'date');
$rates = array_column($currencyData, 'rate');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Árfolyam</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Árfolyam</h2>
        <div class="card">
            <div class="card-body">
                <canvas id="currencyChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>

    <script>
        // const dates_test = echo json_encode(Arfolyam::getCurrencyRates($viewData['vars'], 'dates')); ?>;
        // const rates_test =  echo json_encode(Arfolyam::getCurrencyRates($viewData['render'], 'rates'));?>;

        const dates = <?php echo json_encode($dates); ?>;
        const rates = <?php echo json_encode($rates); ?>;

        const ctx = document.getElementById('currencyChart').getContext('2d');
        const currencyChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: dates, 
                datasets: [{
                    label: 'Currency Rate',
                    data: rates, 
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Date'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Rate'
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
