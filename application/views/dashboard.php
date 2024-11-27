<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("template/head.php") ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <style>
        .btn:hover .icon {
            stroke: white;
        }

        .chart-container {
            background: white;
            border-radius: 8px;
            padding: 10px;
            /* height: 291px; */
            width: auto;
        }

        .indicator-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .indicator-list li {
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
        }

        .indicator-symbol {
            margin: 0 0.5rem;
            color: #0d6efd;
            font-weight: bold;
        }

        .txtsmall {
            font-size: 12px;
        }
    </style>
</head>

<body>
    <?php $this->load->view("template/sidebar.php") ?>

    <div class="page-wrapper">
        <div class="mt-3" style="display: flex; align-items: center; justify-content: center;">
            <div class="row row-cards">
                <!-- First Card - Liquidity Chart -->
                <div style="width: 291px;">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title">LIKUIDITAS USAHA</h3>
                        </div>
                        <div class="card-body">
                            <div class="chart-container" style="margin-top: 10px;">
                                <canvas id="liquidityChart1"></canvas>
                            </div>
                            <div style="display: flex; align-items: center; justify-content: space-between; gap: 8px;">
                                <div style="display: flex; align-items: center; gap: 8px;">
                                    <div style="width: 10px; height: 10px; background-color: #3b82f6; border-radius: 3px;"></div>
                                    <span style="font-size: 10px;">Aset Lancar</span>
                                </div>
                                <span style="font-size: 10px;">Rp.00000000</span>
                            </div>
                            <div style="display: flex; align-items: center; justify-content: space-between; gap: 8px;">
                                <div style="display: flex; align-items: center; gap: 8px;">
                                    <div style="width: 10px; height: 10px; background-color: #ef4444; border-radius: 3px;"></div>
                                    <span style="font-size: 10px;">Kewajiban Lancar</span>
                                </div>
                                <span style="font-size: 10px;">Rp.0000000</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Second Card - Liquidity Chart -->
                <div style="width: 300px;">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title">LABA BERSIH</h3>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="liquidityChart2"></canvas>
                            </div>
                            <div style="display: flex; align-items: center; justify-content: space-between; gap: 8px;">
                                <div style="display: flex; align-items: center; gap: 8px;">
                                    <div style="width: 10px; height: 10px; background-color: #10b981; border-radius: 3px;"></div>
                                    <span style="font-size: 10px;">Pendapatan</span>
                                </div>
                                <span style="font-size: 10px;">Rp.00000000</span>
                            </div>
                            <div style="display: flex; align-items: center; justify-content: space-between; gap: 8px;">
                                <div style="display: flex; align-items: center; gap: 8px;">
                                    <div style="width: 10px; height: 10px; background-color: #f97316; border-radius: 3px;"></div>
                                    <span style="font-size: 10px;">Harga Pokok Penjualan</span>
                                </div>
                                <span style="font-size: 10px;">Rp.0000000</span>
                            </div>
                            <div style="display: flex; align-items: center; justify-content: space-between; gap: 8px;">
                                <div style="display: flex; align-items: center; gap: 8px;">
                                    <div style="width: 10px; height: 10px; background-color: #6b7280; border-radius: 3px;"></div>
                                    <span style="font-size: 10px;">Biaya Penyimpanan</span>
                                </div>
                                <span style="font-size: 10px;">Rp.0000000</span>
                            </div>
                            <div style="display: flex; align-items: center; justify-content: space-between; gap: 8px;">
                                <div style="display: flex; align-items: center; gap: 8px;">
                                    <div style="width: 10px; height: 10px; background-color: #eab308; border-radius: 3px;"></div>
                                    <span style="font-size: 10px;">Beban Operasional</span>
                                </div>
                                <span style="font-size: 10px;">Rp.0000000</span>
                            </div>
                            <div style="display: flex; align-items: center; justify-content: space-between; gap: 8px;">
                                <div style="display: flex; align-items: center; gap: 8px;">
                                    <div style="width: 10px; height: 10px; background-color: #ec4899; border-radius: 3px;"></div>
                                    <span style="font-size: 10px;">Laba Bersih</span>
                                </div>
                                <span style="font-size: 10px;">Rp.0000000</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Third Card - Liquidity Chart -->
                <div style="width: 291px;">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title">PERUBAHAN EKUITAS</h3>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="liquidityChart3"></canvas>
                            </div>
                            <div style="display: flex; align-items: center; justify-content: space-between; gap: 8px;">
                                <div style="display: flex; align-items: center; gap: 8px;">
                                    <div style="width: 10px; height: 10px; background-color: #f59e0b; border-radius: 3px;"></div>
                                    <span style="font-size: 10px;">Modal Awal</span>
                                </div>
                                <span style="font-size: 10px;">Rp.0000000</span>
                            </div>
                            <div style="display: flex; align-items: center; justify-content: space-between; gap: 8px;">
                                <div style="display: flex; align-items: center; gap: 8px;">
                                    <div style="width: 10px; height: 10px; background-color: #8b5cf6; border-radius: 3px;"></div>
                                    <span style="font-size: 10px;">Modal Akhir</span>
                                </div>
                                <span style="font-size: 10px;">Rp.0000000</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="width: 291px;">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title">UTANG PIUTANG</h3>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="liquidityChart4"></canvas>
                            </div>
                            <div style="display: flex; align-items: center; justify-content: space-between; gap: 8px;">
                                <div style="display: flex; align-items: center; gap: 8px;">
                                    <div style="width: 10px; height: 10px; background-color: #34D399; border-radius: 3px;"></div>
                                    <span style="font-size: 10px;">Total Utang</span>
                                </div>
                                <span style="font-size: 10px;">Rp.0000000</span>
                            </div>
                            <div style="display: flex; align-items: center; justify-content: space-between; gap: 8px;">
                                <div style="display: flex; align-items: center; gap: 8px;">
                                    <div style="width: 10px; height: 10px; background-color: #60A5FA; border-radius: 3px;"></div>
                                    <span style="font-size: 10px;">Total Piutang    </span>
                                </div>
                                <span style="font-size: 10px;">Rp.0000000</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Fourth Card - Indicators -->
                <div style="width: 315px;">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3 style="font-weight: bold;" class="card-title">INDIKATOR</h3>
                        </div>
                        <div class="card-body">
                            <ul class="indicator-list">
                                <li>
                                    <span class="txtsmall">Margin tahun berjalan</span>
                                    <span class="indicator-symbol">></span>
                                    <span class="txtsmall">Kewajiban Lancar</span>
                                </li>
                                <li>
                                    <span class="txtsmall">Aset Lancar</span>
                                    <span class="indicator-symbol"> > </span>
                                    <span class="txtsmall">Kewajiban Lancar</span>
                                </li>
                                <li>
                                    <span class="txtsmall">Laba Bersih</span>
                                    <span class="indicator-symbol">
                                        < </span>
                                            <span class="txtsmall">Beban Operasional</span>
                                </li>
                                <li>
                                    <span>Nilai Ekuitas berkurang</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view("template/footer.php") ?>

    <script>
        function formatToRupiah(value) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(value);
        }

        // Data for the first chart
        const liquidityData1 = {
            labels: ['', ''],
            datasets: [{
                data: [27588850, 20000000],
                backgroundColor: ['#3b82f6', '#ef4444'],
                borderColor: ['#2563eb', '#dc2626'],
                borderWidth: 1
            }]
        };

        // Data for the second chart
        const liquidityData2 = {
            labels: ['', '', '', '', ''],
            datasets: [{
                data: [50000000, 30000000, 27368794, 52367843, 2019020],
                backgroundColor: ['#10b981', '#f97316', '#6b7280', '#eab308', '#ec4899'],
                borderColor: ['#059669', '#ea580c', '#4b5563', '#ca8a04', '#db2777'],
                borderWidth: 1
            }]
        };

        // Data for the third chart
        const liquidityData3 = {
            labels: ['', ''],
            datasets: [{
                data: [40000000, 60000000],
                backgroundColor: ['#f59e0b', '#8b5cf6'],
                borderColor: ['#d97706', '#7c3aed'],
                borderWidth: 1
            }]
        };

        const liquidityData4 = {
            labels: ['', ''],
            datasets: [{
                data: [40000000, 60000000],
                backgroundColor: ['#34D399', '#60A5FA'], 
                borderColor: ['#059669', '#2563EB'],
                borderWidth: 1
            }]
        };


        // Configuration for all charts
        const liquidityConfig = (data) => ({
            type: 'bar',
            data: data,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: 'white',
                        titleColor: 'black',
                        bodyColor: 'black',
                        bodyFont: {
                            weight: 500
                        },
                        borderColor: '#e5e7eb',
                        borderWidth: 1,
                        padding: 12,
                        cornerRadius: 4,
                        callbacks: {
                            label: function(context) {
                                return formatToRupiah(context.raw);
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            display: false
                        }
                    }
                }
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Initialize the three charts with different datasets
            const liquidityCtx1 = document.getElementById('liquidityChart1').getContext('2d');
            new Chart(liquidityCtx1, liquidityConfig(liquidityData1));

            const liquidityCtx2 = document.getElementById('liquidityChart2').getContext('2d');
            new Chart(liquidityCtx2, liquidityConfig(liquidityData2));

            const liquidityCtx3 = document.getElementById('liquidityChart3').getContext('2d');
            new Chart(liquidityCtx3, liquidityConfig(liquidityData3));

            const liquidityCtx4 = document.getElementById('liquidityChart4').getContext('2d');
            new Chart(liquidityCtx4, liquidityConfig(liquidityData4));
        });
    </script>

</body>

</html>