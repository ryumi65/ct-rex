<div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <div class="container-fluid py-3">
        <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('<?= base_url(); ?>assets/img/gedungdash.jpg'); background-position-y: 100%;">
            <span class="mask bg-gradient-info opacity-5"></span>
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
            <div class="d-flex justify-content-between">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="<?= base_url(); ?>assets/img/mahalini.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1"><?= $_SESSION['nama'] ?></h5>
                            <p class="mb-0 font-weight-bold text-sm"><?= $_SESSION['access'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="d-flex d-inlinems-auto">
                    <p class="mx-2">Mahasiswa Wali</p>
                    <p class="mx-2">Data Mengajar</p>
                    <p class="mx-2">SKS Mengajar</p>
                    <a href="<?= site_url('akun/logout'); ?>"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
                </div>
            </div>
        </div>

        <!-- tabel perkuliahan -->
        <div class="col-12 mb-md-0 my-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>Jadwal Perkuliahan Yang Di Ampu Sebagai Dosen Pertama</h6>
                            <p class="text-sm mb-0">
                                <i class="fa fa-check text-info" aria-hidden="true"></i>
                                <span class="font-weight-bold ms-1">2 Mata Kuliah</span> hari ini
                            </p>
                        </div>
                        <div class="col-lg-6 col-5 my-auto text-end">
                            <div class="dropdown float-lg-end pe-4">
                                <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v text-secondary"></i>
                                </a>
                                <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Edit</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Mata Kuliah</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Mengajar Di</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Waktu</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Jumlah Pertemuan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Arsitektur Komputer</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Lantai 6 Ruangan 7</h6>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold">08:00-10:00</span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-wrapper w-75 mx-auto">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">60%</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-info w-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- tabel perkuliahan 2 -->
        <div class="col-12 mb-md-0 my-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>Jadwal Perkuliahan Yang Di Ampu Sebagai Dosen Kedua</h6>
                            <p class="text-sm mb-0">
                                <i class="fa fa-check text-info" aria-hidden="true"></i>
                                <span class="font-weight-bold ms-1">2 Mata Kuliah</span> hari ini
                            </p>
                        </div>
                        <div class="col-lg-6 col-5 my-auto text-end">
                            <div class="dropdown float-lg-end pe-4">
                                <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v text-secondary"></i>
                                </a>
                                <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Edit</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Mata Kuliah</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Mengajar Di</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Waktu</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Jumlah Pertemuan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Arsitektur Komputer</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Lantai 6 Ruangan 7</h6>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold">08:00-10:00</span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-wrapper w-75 mx-auto">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">60%</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-info w-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="row mt-4">

            <!-- Dashboard -->
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="d-flex flex-column h-100">
                                    <h5 class="font-weight-bolder">Pengumuman</h5>
                                    <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas et.</p>
                                    <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                                        Read More
                                        <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                                <div class="bg-gradient-primary border-radius-lg h-100">
                                    <img src="<?= base_url() ?>assets/img/shapes/waves-white.svg" class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
                                    <div class="position-relative d-flex align-items-center justify-content-center h-100">
                                        <img class="w-100 position-relative z-index-2 pt-4" src="<?= base_url() ?>assets/img/illustrations/rocket-white.png" alt="rocket">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rockets -->
            <div class="col-lg-6 mb-lg-0 mb-7">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="d-flex flex-column h-100">
                                    <h5 class="font-weight-bolder">Pengumuman</h5>
                                    <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas et.</p>
                                    <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                                        Read More
                                        <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                                <div class="bg-gradient-primary border-radius-lg h-100">
                                    <img src="<?= base_url() ?>assets/img/shapes/waves-white.svg" class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
                                    <div class="position-relative d-flex align-items-center justify-content-center h-100">
                                        <img class="w-100 position-relative z-index-2 pt-4" src="<?= base_url() ?>assets/img/illustrations/rocket-white.png" alt="rocket">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright -->
        <div class="col-8 mx-auto my-5 text-center">
            <p class="mb-0 text-secondary">
                Copyright ©
                <script>
                    document.write(new Date().getFullYear())
                </script> Universitas Muhammadiyah Bandung. All Rights Reserved.
            </p>
        </div>