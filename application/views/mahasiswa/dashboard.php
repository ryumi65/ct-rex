    <?php
    if (isset($_SESSION['uploadsuccess'])) {
        echo "<script>
            alert('Edit foto berhasil!');
        </script>";
        unset($_SESSION['uploadsuccess']);
    } elseif (isset($_SESSION['deletesuccess'])) {
        echo "<script>
            alert('Hapus foto berhasil!');
        </script>";
        unset($_SESSION['deletesuccess']);
    }

    $nama = explode(' ', $mahasiswa['nama']);
    $jumlah_mk = 0;

    foreach ($listj as $jadwal) {
        $jumlah_mk++;
    } ?>

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
                            <h5 class="mb-2"><?= $mahasiswa['nama'] ?></h5>
                            <p class="mb-0 font-weight-bold text-sm"><?= $mahasiswa['nim'] ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="row mt-3">

                <!-- Greeting -->
                <div class="col-12 col-lg-4 my-3">
                    <div class="card z-index-2">
                        <div class="card-header p-3 pb-0">
                            <?php if (isset($nama[1])) : ?>
                                <h5>Assalamu'alaikum, <?= "$nama[0] $nama[1]!" ?></h5>
                            <?php else : ?>
                                <h5>Assalamu'alaikum, <?= $mahasiswa['nama'] ?>!</h5>
                            <?php endif ?>
                        </div>
                        <div class="card-body p-3 pt-0">
                            <div class="progress-wrapper mx-auto">
                                <div class="progress-info">
                                    <div class="progress-percentage">
                                        <span class="text-xs font-weight-bold">60%</span>
                                    </div>
                                </div>
                                <div class="col mb-2">
                                    <div class="mb-2 progress-bar bg-gradient-info w-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <p>Saat ini kamu berada di Semester 8 dan telah berhasil menempuh 144 SKS dari 144 SKS.</p>
                            <p class="mb-0">Tetap semangat belajar ya!</p>
                        </div>
                    </div>

                    <!-- Grafik -->
                    <div class="card my-3">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="d-flex flex-column h-100">
                                    <h5>Indeks Prestasi Mahasiswa</h5>
                                    <div class="chart">
                                        <canvas id="chart1" class="chart-canvas" height="300"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Pengumuman -->
                <div class="col-12 col-lg-8 my-3">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="d-flex flex-column h-100">
                                    <h5>Pengumuman</h5>
                                    <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas et.</p>
                                    <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                                        Read More
                                        <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card my-3">
                        <div class="card-header p-3">
                            <h5>Jadwal Perkuliahan Hari <?= $hari ?></h5>
                            <p class="text-sm mb-0">
                                <?php if ($jumlah_mk === 0) : ?>
                                    <i class="fa fa-xmark text-danger" aria-hidden="true"></i>
                                    <span class="font-weight-bold ms-1">Tidak ada Mata Kuliah</span> hari ini
                                <?php else : ?>
                                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                                    <span class="font-weight-bold ms-1"><?= $jumlah_mk ?> Mata Kuliah</span> hari ini
                                <?php endif ?>
                            </p>
                        </div>
                        <div class="card-body p-3 pt-0">
                            <div class="table-responsive">
                                <table class="table table-striped align-items-center mb-0 ps-3" id="table">
                                    <thead>
                                        <tr>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                                No.</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Waktu</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Ruangan</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Nama MK</th>
                                            <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                Dosen Pengampu</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-sm">
                                        <?php foreach ($listj as $jadwal) : ?>
                                            <tr>
                                                <td></td>
                                                <td><?= $jadwal['waktu'] ?></td>
                                                <td><?= $jadwal['ruangan'] ?></td>
                                                <td><?= $jadwal['nama'] ?></td>
                                                <td><?= $jadwal['dosen'] ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Jadwal Kuliah -->
                <div class="col-12 my-3">

                </div>

                <!-- Pengumuman 1 -->
                <div class="col-12 col-lg-6 my-3">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-lg-5 text-center">
                                    <div class="bg-gradient-primary border-radius-lg h-100">
                                        <div class="position-relative d-flex align-items-center justify-content-center h-100">
                                            <img class="w-100 position-relative z-index-2 pt-4" src="<?= base_url() ?>assets/img/illustrations/rocket-white.png" alt="rocket">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-3 mt-lg-0">
                                    <div class="d-flex flex-column h-100">
                                        <h5>Pengumuman Akademik</h5>
                                        <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas et.</p>
                                        <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
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
                <div class="col-12 col-lg-6 my-3">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-lg-5 text-center">
                                    <div class="bg-gradient-primary border-radius-lg h-100">
                                        <div class="position-relative d-flex align-items-center justify-content-center h-100">
                                            <img class="w-100 position-relative z-index-2 pt-4" src="<?= base_url() ?>assets/img/illustrations/rocket-white.png" alt="rocket">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-3 mt-lg-0">
                                    <div class="d-flex flex-column h-100">
                                        <h5>Pengumuman Fakultas</h5>
                                        <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas et.</p>
                                        <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
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

        <!-- Footer -->
        <footer class="footer py-3">

            <!-- Logo Medsos -->
            <div class="container mx-auto text-center my-2">
                <a href="https://www.youtube.com/channel/UCdo5vics8bEFAd9h6aghLYQ" target="_blank" class="text-secondary mx-3">
                    <i class="text-lg fa-brands fa-youtube"></i>
                </a>
                <a href="https://id-id.facebook.com/universitasmuhammadiyahbandung" target="_blank" class="text-secondary mx-3">
                    <i class="text-lg fa-brands fa-facebook"></i>
                </a>
                <a href="https://www.instagram.com/umbandung" target="_blank" class="text-secondary mx-3">
                    <i class="text-lg fa-brands fa-instagram"></i>
                </a>
                <a href="https://www.twitter.com/umbandung" target="_blank" class="text-secondary mx-3">
                    <i class="text-lg fa-brands fa-twitter"></i>
                </a>
                <a href="https://www.tiktok.com/@umbandung" target="_blank" class="text-secondary mx-3">
                    <i class="text-lg fa-brands fa-tiktok"></i>
                </a>
            </div>

            <!-- Copyright -->
            <div class="container mx-auto text-center">
                <p class="mb-0 text-secondary text-xs">
                    Copyright ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script> Universitas Muhammadiyah Bandung. All Rights Reserved.
                </p>
            </div>
        </footer>
    </div>

    <!-- Chart -->
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
                labels: ["1", "2", "3", "4", "5", "6", "7", "8"],
                datasets: [{
                    label: "Indeks Prestasi Kumulatif",
                    tension: 0.1,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#2cb72c",
                    borderWidth: 3,
                    backgroundColor: gradientStroke1,
                    fill: true,
                    data: [3.55, 3.60, 3.45, 3.60, 3.55, 3.50, 3.40, 3.70],
                    maxBarThickness: 3

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

    <!-- JQuery -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/r-2.4.0/datatables.min.js"></script>
    <script>
        let table;

        $(document).ready(() => {

            table = $('#table').DataTable({

                dom: "",
                responsive: true,
                order: [1, 'asc'],

                columnDefs: [{
                    targets: [0],
                    orderable: false,
                    searchable: false,
                }],

            });

            table.on('order.dt search.dt', () => {
                let i = 1;

                table.cells(null, 0, {
                    order: 'applied',
                    search: 'applied',
                }).every(function(cell) {
                    this.data(i++);
                });
            }).draw();
        });
    </script>