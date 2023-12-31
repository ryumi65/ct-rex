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

    $jumlah_mk = 0;

    foreach ($listj as $jadwal) {
        $jumlah_mk++;
    } ?>

    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-6 pt-xl-0">

            <!-- Header -->
            <div class="page-header height-200 border-radius-xl mt-3" style="background-image: url('<?= base_url('assets/img/uploads/header/' . $header) ?>')"></div>
            <div class="card card-body blur shadow-blur mx-4 p-1 mt-n5 overflow-hidden">
                <div class="d-flex align-content-center justify-content-between">
                    <div class="row gx-3">
                        <div class="col-auto my-auto">
                            <div class="avatar avatar-xl position-relative">
                                <img src="<?= base_url('assets/img/uploads/profile/' . $profil) ?>" alt="profile_image" class="w-75 h-75 border-radius-lg shadow-sm">
                            </div>
                        </div>
                        <div class="col-auto m-2 m-md-auto">
                            <div>
                                <h5 class="mb-2"><?= $dosen['nama'] ?></h5>
                                <p class="mb-0 font-weight-bold text-sm"><?= $dosen['nik'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="d-none d-md-block">
                        <div class="d-flex d-inline ms-auto my-3 my-md-0">
                            <a href="<?= site_url('dosen/bimbingan/mahasiswa-wali') ?>">
                                <h6 class="mx-3 my-0"><u>Mahasiswa Wali</u></h6>
                                <h3 class="text-center my-0"><?= $mhswali ?></h3>
                                <h6 class="text-center my-0">Mahasiswa</h6>
                            </a>
                            <a href="<?= site_url('dosen/perkuliahan/mata-kuliah') ?>">
                                <h6 class="mx-3 my-0"><u>sks Mengajar</u></h6>
                                <h3 class="text-center my-0"><?= $sks ?></h3>
                                <h6 class="text-center my-0">sks</h6>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Info Small -->
            <div class="col-12 my-3 d-block d-md-none">
                <div class="card z-index-2 flex-wrap">
                    <div class="card-body d-flex d-inline justify-content-around p-1">
                        <a href="<?= site_url('dosen/bimbingan/mahasiswa-wali') ?>" class="text-center text-dark">
                            <p class="fs-6 fw-bold my-0"><u>Mahasiswa Wali</u></p>
                            <h3 class="text-center my-0"><?= $mhswali ?></h3>
                            <p class="fs-6 fw-bold my-0">Mahasiswa</p>
                        </a>
                        <a href="<?= site_url('dosen/perkuliahan/mata-kuliah') ?>" class="text-center text-dark">
                            <p class="fs-6 fw-bold my-0"><u>sks Mengajar</u></p>
                            <h3 class="text-center my-0"><?= $sks ?></h3>
                            <p class="fs-6 fw-bold my-0">sks</p>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="row g-3 mt-3">

                <!-- Jadwal Kuliah -->
                <div class="col-12 mt-0 mb-3">
                    <div class="card">
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
                            <table class="table align-items-center w-100" id="table">
                                <thead>
                                    <tr class="bg-gradient-primary text-white">
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Waktu</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Kode MK</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Nama MK</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Ruangan</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-gray-100 text-dark text-sm">
                                    <?php foreach ($listj as $jadwal) : ?>
                                        <tr>
                                            <td><?= $jadwal['waktu'] ?></td>
                                            <td><?= $jadwal['kode'] ?></td>
                                            <td><?= $jadwal['nama'] ?></td>
                                            <td><?= $jadwal['ruangan'] ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Riwayat sks -->
                <div class="col-12 mt-0 mb-3">
                    <div class="card">
                        <div class="card-header p-3 pb-0">
                            <h5>Riwayat sks yang Diampu</h5>
                        </div>
                        <div class="card-body p-3 pt-0">
                            <div class="chart">
                                <canvas id="chart1" class="chart-canvas" height="300"></canvas>
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
                                            <img class="w-100 position-relative pt-4" src="<?= base_url('assets/img/illustrations/rocket-white.png') ?>" alt="rocket">
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
                                            <img class="w-100 position-relative pt-4" src="<?= base_url('assets/img/illustrations/rocket-white.png') ?>" alt="rocket">
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

    <!-- Chart -->
    <script src="<?= base_url('assets/js/plugins/chartjs.min.js') ?>"></script>
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
                    label: "sks",
                    tension: 0.3,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#2cb72c",
                    borderWidth: 3,
                    backgroundColor: gradientStroke1,
                    fill: true,
                    data: [10, 40, 300, 220, 500, 250, 400, 230, 500],
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

    <!-- JQuery -->
    <script src="<?= base_url('assets/DataTables/datatables.min.js') ?>"></script>
    <script>
        $(document).ready(() => {

            $('#table').DataTable({
                columnDefs: [{
                    targets: [],
                    orderable: false,
                    searchable: false,
                }],
                dom: "",
                order: [0, 'asc'],
                paging: false,
                responsive: true,
            });
        });
    </script>