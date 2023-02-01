    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <!-- Header -->
            <div class="page-header height-200 border-radius-xl mt-3" style="background-image: url('<?= base_url(); ?>assets/img/uploads/header/<?= $header ?>')"></div>
            <div class="card card-body blur shadow-blur mx-4 p-1 mt-n5 overflow-hidden">
                <div class="d-flex align-content-center justify-content-between">
                    <div class="row gx-3">
                        <div class="col-auto my-auto">
                            <div class="avatar avatar-xl position-relative">
                                <img src="<?= base_url(); ?>assets/img/uploads/profile/<?= $profil ?>" alt="profile_image" class="w-75 h-75 border-radius-lg shadow-sm">
                            </div>
                        </div>
                        <div class="col-auto m-2 m-md-auto">
                            <h5 class="mb-2"><?= $prodi['nama'] ?></h5>
                            <p class="mb-0 font-weight-bold text-sm"><?= $prodi['id_prodi'] ?></p>
                        </div>
                    </div>
                    <div class="d-flex d-inline ms-auto my-3 my-md-0">
                        <div class="fs-6 fs-md-5">
                            <h6 class="mx-3 my-0"><u>Mahasiswa Aktif</u></h6>
                            <h3 class="text-center my-0"><?= $mhsaktif ?></h3>
                            <h6 class="font-weight- text-center my-0">Mahasiswa</h6>
                        </div>
                        <div>
                            <h6 class="mx-3 my-0"><u>Dosen Aktif</u></h6>
                            <h3 class="text-center my-0"><?= $dsnaktif ?></h3>
                            <h6 class="font-weight- text-center my-0">Dosen</h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-3 mt-3">

                <!-- Grafik 1 -->
                <div class="col-12 mt-0 mb-3">
                    <div class="card z-index-2">
                        <div class="card-header pb-0">
                            <h5>Jumlah Mahasiswa dan Dosen Prodi</h5>
                        </div>
                        <div class="card-body p-2">
                            <div class="chart">
                                <canvas id="chart1" class="chart-canvas" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Grafik 2 -->
                <div class="col-12 mt-0 mb-3">
                    <div class="card z-index-2">
                        <div class="card-header pb-0">
                            <h5>Rerata Indeks Perkuliahan Kumulatif</h5>
                        </div>
                        <div class="card-body p-2">
                            <div class="chart">
                                <canvas id="chart2" class="chart-canvas1" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Grafik 3 -->
                <div class="col-12 mt-0 mb-3">
                    <div class="card z-index-2">
                        <div class="card-header pb-0">
                            <h5>Penghasilan Orang Tua Mahasiswa</h5>
                        </div>
                        <div class="card-body p-2">
                            <div class="chart">
                                <canvas id="chart3" class="chart-canvas2" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pengumuman Universitas -->
                <div class="col-12 col-md-6 mt-0 mb-3">
                    <div class="card" id="card-pop">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-lg-5 text-center">
                                    <div class="bg-gradient-primary border-radius-lg h-100">
                                        <div class="position-relative d-flex align-items-center justify-content-center h-100">
                                            <img class="w-100 position-relative pt-4" src="<?= base_url() ?>assets/img/illustrations/rocket-white.png" alt="rocket">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-3 mt-lg-0">
                                    <div class="d-flex flex-column h-100">
                                        <h5>Pengumuman Universitas</h5>
                                        <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas et.</p>
                                        <a class="stretched-link text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                                            Read More
                                            <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pengumuman Fakultas -->
                <div class="col-12 col-md-6 mt-0 mb-3">
                    <div class="card" id="card-pop">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-lg-5 text-center">
                                    <div class="bg-gradient-primary border-radius-lg h-100">
                                        <div class="position-relative d-flex align-items-center justify-content-center h-100">
                                            <img class="w-100 position-relative pt-4" src="<?= base_url() ?>assets/img/illustrations/rocket-white.png" alt="rocket">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-3 mt-lg-0">
                                    <div class="d-flex flex-column h-100">
                                        <h5>Pengumuman Fakultas</h5>
                                        <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas et.</p>
                                        <a class="stretched-link text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                                            Read More
                                            <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('_partials/footer') ?>
    </div>

    <!--   Core JS Files   -->
    <script src="<?= base_url(); ?>assets/js/plugins/chartjs.min.js"></script>
    <script>
        var ctx2 = document.getElementById("chart1").getContext("2d");

        var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(88, 219, 88, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(119, 230, 119, 0.1)');
        gradientStroke1.addColorStop(0.1, 'rgba(154, 230, 154, 0 )'); //purple colors

        var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke2.addColorStop(1, 'rgba(66, 135, 245,0.2)');
        gradientStroke2.addColorStop(0.2, 'rgba(96, 151, 240,0.1)');
        gradientStroke2.addColorStop(0, 'rgba(195, 215, 247,0)'); //purple colors

        new Chart(ctx2, {
            type: "line",
            data: {
                labels: ["2016", "2017", "2018", "2019", "2020", "2021", "2022", "2023", "2024"],
                datasets: [{
                        label: "Perempuan",
                        tension: 0.3,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "#2cb72c",
                        borderWidth: 3,
                        backgroundColor: gradientStroke1,
                        fill: true,
                        data: [10, 40, 300, 220, 500, 250, 400, 230, 500],
                        maxBarThickness: 6

                    },
                    {
                        label: "Laki-Laki",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "#3a416f",
                        borderWidth: 3,
                        backgroundColor: gradientStroke2,
                        fill: true,
                        data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
                        maxBarThickness: 6
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#b2b9bf',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#b2b9bf',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>

    <script>
        var ctx3 = document.getElementById("chart2").getContext("2d");

        var gradientStroke1 = ctx3.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(88, 219, 88, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(119, 230, 119, 0.1)');
        gradientStroke1.addColorStop(0.1, 'rgba(154, 230, 154, 0 )'); //purple colors

        var gradientStroke2 = ctx3.createLinearGradient(0, 230, 0, 50);

        gradientStroke2.addColorStop(1, 'rgba(66, 135, 245,0.2)');
        gradientStroke2.addColorStop(0.2, 'rgba(96, 151, 240,0.1)');
        gradientStroke2.addColorStop(0, 'rgba(195, 215, 247,0)'); //purple colors

        new Chart(ctx3, {
            type: "bar",
            data: {
                labels: ["2016", "2017", "2018", "2019", "2020", "2021", "2022", "2023", "2024"],
                datasets: [{
                    label: "Rerata IPK",
                    tension: 0.3,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#2cb72c",
                    borderWidth: 3,
                    backgroundColor: gradientStroke1,
                    fill: true,
                    data: [3.55, 4.00, 2.35, 3.00, 3.55, 2.50, 4.00, 2.30, 4.00],
                    maxBarThickness: 6

                }, ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#b2b9bf',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#b2b9bf',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>

    <script>
        var ctx4 = document.getElementById("chart3").getContext("2d");

        var gradientStroke1 = ctx3.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(88, 219, 88, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(119, 230, 119, 0.1)');
        gradientStroke1.addColorStop(0.1, 'rgba(154, 230, 154, 0 )'); //purple colors

        var gradientStroke2 = ctx4.createLinearGradient(0, 230, 0, 50);

        gradientStroke2.addColorStop(1, 'rgba(66, 135, 245,0.2)');
        gradientStroke2.addColorStop(0.2, 'rgba(96, 151, 240,0.1)');
        gradientStroke2.addColorStop(0, 'rgba(195, 215, 247,0)'); //purple colors

        new Chart(ctx4, {
            type: "polarArea",
            data: {
                labels: ["2016", "May", "Jun", "Jul,"],
                datasets: [{
                        label: "Perempuan",
                        tension: 0.3,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "#2cb72c",
                        borderWidth: 3,
                        backgroundColor: gradientStroke1,
                        fill: true,
                        data: [10, ],
                        maxBarThickness: 6

                    },
                    {
                        label: "Laki-Laki",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "#3a416f",
                        borderWidth: 3,
                        backgroundColor: gradientStroke2,
                        fill: true,
                        data: [30, ],
                        maxBarThickness: 6
                    },
                    {
                        label: "Laki-Laki",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "#9c0606",
                        borderWidth: 3,
                        backgroundColor: gradientStroke2,
                        fill: true,
                        data: [30, ],
                        maxBarThickness: 6
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#b2b9bf',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#b2b9bf',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>