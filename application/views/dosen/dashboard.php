    <?php if (isset($_SESSION['uploadsuccess'])) {
        echo "<script>
            alert('Edit foto berhasil!');
        </script>";
        unset($_SESSION['uploadsuccess']);
    } elseif (isset($_SESSION['deletesuccess'])) {
        echo "<script>
            alert('Hapus foto berhasil!');
        </script>";
        unset($_SESSION['deletesuccess']);
    } ?>

    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-3">

            <!-- Header -->
            <div class="page-header height-200 border-radius-xl mt-4" style="background-image: url('<?= base_url(); ?>assets/img/uploads/header/<?= $header ?>')">
                <!-- <span class="mask bg-gradient-info opacity-5"></span> -->
            </div>
            <div class="card card-body blur shadow-blur mx-4 p-1 mt-n5 overflow-hidden">
                <div class="d-flex align-content-center justify-content-between">
                    <div class="row gx-3">
                        <div class="col-auto my-auto">
                            <div class="avatar avatar-xl position-relative">
                                <img src="<?= base_url(); ?>assets/img/uploads/profile/<?= $profil ?>" alt="profile_image" class="w-75 h-75 border-radius-lg shadow-sm">
                            </div>
                        </div>
                        <div class="col-auto my-auto">
                            <div>
                                <h5 class="mb-2"><?= $dosen['nama'] ?></h5>
                                <p class="mb-0 font-weight-bold text-sm"><?= $dosen['nik'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex d-inline ms-auto">
                        <div>
                            <h6 class="mx-3 my-0"><u>Mahasiswa Wali</u></h6>
                            <h3 class="text-center my-0"><?= $mhswali ?></h3>
                            <h6 class="font-weight- text-center my-0">Mahasiswa</h6>
                        </div>
                        <div>
                            <h6 class="mx-3 my-0"><u>SKS Mengajar</u></h6>
                            <h3 class="text-center my-0">1</h3>
                            <h6 class="font-weight- text-center my-0">SKS</h6>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Jadwal Mengajar 1 -->
            <div class="col-12 mb-md-0 my-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Jadwal Perkuliahan Yang Diampu Sebagai Dosen Pertama</h5>
                        <p class="text-sm mb-0">
                            <i class="fa fa-check text-info" aria-hidden="true"></i>
                            <span class="font-weight-bold ms-1">2 Mata Kuliah</span> hari ini
                        </p>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Mata Kuliah</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Ruangan</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Waktu</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Jumlah Pertemuan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="px-2 py-1">
                                                <h6 class="mb-0 text-sm">Arsitektur Komputer</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="px-2 py-1">
                                                <h6 class="mb-0 text-sm">Lantai 6 Ruangan 7</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="px-2 py-1">
                                                <h6 class="mb-0 text-sm">08:00-10:00</h6>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <div class="progress-wrapper w-90 mx-auto">
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

            <!-- Jadwal Mengajar 2 -->
            <div class="col-12 mb-md-0 my-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Jadwal Perkuliahan Yang Diampu Sebagai Dosen Kedua</h5>
                        <p class="text-sm mb-0">
                            <i class="fa fa-check text-info" aria-hidden="true"></i>
                            <span class="font-weight-bold ms-1">2 Mata Kuliah</span> hari ini
                        </p>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Mata Kuliah</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Ruangan</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Waktu</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Jumlah Pertemuan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="px-2 py-1">
                                                <h6 class="mb-0 text-sm">Arsitektur Komputer</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="px-2 py-1">
                                                <h6 class="mb-0 text-sm">Lantai 6 Ruangan 7</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="px-2 py-1">
                                                <h6 class="mb-0 text-sm">08:00-10:00</h6>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <div class="progress-wrapper w-90 mx-auto">
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

            <!-- Dashboard -->
            <div class="row mt-4">

                <!-- Pengumuman 1 -->
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
                                        <div class="position-relative d-flex align-items-center justify-content-center h-100">
                                            <img class="w-100 position-relative z-index-2 pt-4" src="<?= base_url() ?>assets/img/illustrations/rocket-white.png" alt="rocket">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pengumuman 2 -->
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