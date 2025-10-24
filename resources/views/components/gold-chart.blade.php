<!-- resources/views/components/gold-price.blade.php -->
<section id="harga-emas" class="bg-white py-8">
    <div class="max-w-6xl mx-auto px-4">
        <!-- Chart Container -->
        <div class="h-56 relative">
            <canvas id="goldPriceChart"></canvas>
        </div>

        <!-- Date Labels -->
        <div class="flex justify-between mt-4 px-2">
            <div class="text-xs text-gray-600 text-center" style="width: 14.28%">11 Agustus</div>
            <div class="text-xs text-gray-600 text-center" style="width: 14.28%">12 Agustus</div>
            <div class="text-xs text-gray-600 text-center" style="width: 14.28%">13 Agustus</div>
            <div class="text-xs text-gray-600 text-center" style="width: 14.28%">14 Agustus</div>
            <div class="text-xs text-gray-600 text-center" style="width: 14.28%">15 Agustus</div>
            <div class="text-xs text-gray-600 text-center" style="width: 14.28%">16 Agustus</div>
            <div class="text-xs text-gray-600 text-center" style="width: 14.28%">17 Agustus</div>
        </div>
    </div>
</section>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('goldPriceChart').getContext('2d');
        
        // Data untuk 7 hari terakhir
        const dates = ['11', '12', '13', '14', '15', '16', '17'];
        const fullDates = ['11 Agustus', '12 Agustus', '13 Agustus', '14 Agustus', '15 Agustus', '16 Agustus', '17 Agustus'];
        const prices = [1590000, 1605000, 1598000, 1610000, 1602000, 1595000, 1600000];

        const goldPriceChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                    label: 'Harga Emas',
                    data: prices,
                    borderColor: '#100F0F',
                    backgroundColor: 'rgba(11, 36, 58, 0.1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0,
                    pointBackgroundColor: '#100F0F',
                    pointBorderColor: '#FFFFFF',
                    pointBorderWidth: 2,
                    pointRadius: 0,
                    pointHoverRadius: 4,
                    pointHoverBackgroundColor: '#100F0F',
                    pointHoverBorderColor: '#FFFFFF',
                    pointHoverBorderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        enabled: true, // Pastikan tooltip diaktifkan
                        mode: 'nearest',
                        intersect: false,
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        padding: 10,
                        displayColors: false,
                        callbacks: {
                            title: function(tooltipItems) {
                                // Gunakan fullDates untuk tooltip
                                return fullDates[tooltipItems[0].dataIndex];
                            },
                            label: function(context) {
                                return 'Rp ' + context.parsed.y.toLocaleString('id-ID');
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            display: false
                        }
                    },
                    y: {
                        display: false,
                        grid: {
                            display: false
                        }
                    }
                },
                interaction: {
                    mode: 'nearest',
                    axis: 'x',
                    intersect: false
                },
                hover: {
                    mode: 'nearest',
                    intersect: false
                },
                elements: {
                    point: {
                        radius: 0,
                        hoverRadius: 4
                    },
                    line: {
                        tension: 0
                    }
                },
                layout: {
                    padding: {
                        left: 0,
                        right: 0,
                        top: 10,
                        bottom: 10
                    }
                }
            }
        });
    });
</script>
@endpush