<div class="chart-container-1">
    <canvas id="chart1"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('chart1').getContext('2d');
        const chart1 = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($months) !!},
                datasets: [{
                    label: 'Students Enrolled ({{ now()->year }})',
                    data: {!! json_encode($studentCounts) !!},
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, // let container control height
                plugins: {
                    legend: {
                        display: true
                    }
                },
                scales: {
                    x: {
                        ticks: {
                            autoSkip: false, // show all months
                            maxRotation: 45, // rotate if space is tight
                            minRotation: 0
                        }
                    },
                    y: {
                        beginAtZero: true,
                        precision: 0,
                        title: {
                            display: true,
                            text: 'Number of Students'
                        }
                    }
                }
            }
        });
    });
</script>
