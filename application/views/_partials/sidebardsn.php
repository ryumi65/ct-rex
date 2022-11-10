<body class="g-sidenav-show  bg-gray-100">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3" id="sidenav-main">

        <!-- Sidebar Header -->
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="#" target="_blank">
                <img src="<?= base_url(); ?>assets/img/umb.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold">Sikadu UMBandung</span>
            </a>
        </div>

        <!-- Horizontal Line -->
        <hr class="horizontal dark mt-0">

        <!-- Sidebar Body -->
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">

                <!-- Home -->
                <?php if (uri_string() === 'dosen') {
                    $navlinkHome = 'nav-link active';
                    $color = '#fff';
                } else {
                    $navlinkHome = 'nav-link';
                    $color = '#000';
                } ?>
                <li class="nav-item">
                    <a class="<?= $navlinkHome ?>" href="<?= site_url('dosen') ?>">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-house-user" style="color: <?= $color ?>"></i>
                        </div>
                        <span class="nav-link-text ms-1">Home</span>
                    </a>
                </li>

                <!-- Perkuliahan -->
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#perkuliahan" class="nav-link" aria-controls="perkuliahan" role="button" aria-expanded="false">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                            <i class="fa-solid fa-chalkboard-user" style="color: #000"></i>
                        </div>
                        <span class="nav-link-text ms-1">Perkuliahan</span>
                    </a>
                    <div class="collapse" id="perkuliahan">
                        <ul class="nav ms-4 ps-3">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Lihat Jadwal
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Input Presensi
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Membuat BAP
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Kelola Nilai Akhir
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Cetak Transkrip
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Perwalian -->
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#perwalian" class="nav-link" aria-controls="perwalian" role="button" aria-expanded="false">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                            <i class="fa-solid fa-book" style="color: #000"></i>
                        </div>
                        <span class="nav-link-text ms-1">Perwalian</span>
                    </a>
                    <div class="collapse" id="perwalian">
                        <ul class="nav ms-4 ps-3">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Daftar Mahasiswa
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Persetujuan KRS
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Logbook
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Pembatas Halaman Profil -->
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Halaman Profil</h6>
                </li>

                <!-- Profil -->
                <?php if (fnmatch('dosen/profile*', uri_string())) {
                    $navlinkProfile = 'nav-link active';
                    $color = '#fff';
                } else {
                    $navlinkProfile = 'nav-link';
                    $color = '#000';
                } ?>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#profil" class="<?= $navlinkProfile ?>" aria-controls="profil" role="button" aria-expanded="false">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center me-2">
                            <i class="fa-solid fa-user" style="color: <?= $color ?>"></i>
                        </div>
                        <span class="nav-link-text ms-1">Profil</span>
                    </a>
                    <div class="collapse" id="profil">
                        <ul class="nav ms-4 ps-3">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= site_url('dosen/profile') ?>">
                                    Lihat Data Diri
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= site_url('dosen/profile/edit/' . $_SESSION['nik']) ?>">
                                    Edit Data Diri
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Ubah Password
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </aside>