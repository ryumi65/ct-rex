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
                <?php if (uri_string() === 'prodi') {
                    $navlinkHome = 'nav-link active';
                    $color = '#fff';
                } else {
                    $navlinkHome = 'nav-link';
                    $color = '#000';
                } ?>
                <li class="nav-item">
                    <a class="<?= $navlinkHome ?>" href="<?= site_url('prodi') ?>">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-house-user" style="color: <?= $color ?>"></i>
                        </div>
                        <span class="nav-link-text ms-1">Home</span>
                    </a>
                </li>

                <!-- Akademik -->
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#akademik" class="nav-link" aria-controls="akademik" role="button" aria-expanded="false">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                            <i class="fa-solid fa-chalkboard-user" style="color: #000"></i>
                        </div>
                        <span class="nav-link-text ms-1">Akademik</span>
                    </a>
                    <div class="collapse" id="akademik">
                        <ul class="nav ms-4 ps-3">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Data Mata Kuliah
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Jadwal Kuliah
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Aktivitas Kemahasiswaan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    KRS
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Nilai Perkuliahan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Kuisioner Dosen
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Data Civitas -->
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#datacivitas" class="nav-link" aria-controls="datacivitas" role="button" aria-expanded="false">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                            <i class="fa-solid fa-book" style="color: #000"></i>
                        </div>
                        <span class="nav-link-text ms-1">Data Civitas</span>
                    </a>
                    <div class="collapse" id="datacivitas">
                        <ul class="nav ms-4 ps-3">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= site_url('prodi/datadsn') ?>">
                                    Data Dosen
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= site_url('prodi/datamhs') ?>">
                                    Data Mahasiswa
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= site_url('prodi/datadsnwl') ?>">
                                    Data Dosen Wali
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- Pembayaran Mahasiswa -->
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-money-bills" style="color:#000"></i>
                        </div>
                        <span class="nav-link-text ms-1">Pembayaran Mahasiswa</span>
                    </a>
                </li>


                <!-- Pembatas Halaman Profil -->
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Halaman Profil</h6>
                </li>

                <!-- Profil -->
                <?php if (fnmatch('prodi/profile*', uri_string())) {
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
                                <a class="nav-link  " href="<?= site_url('prodi/profile') ?>">
                                    Lihat Data Prodi
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= site_url('prodi/profile/edit/' . $_SESSION['id_prodi']) ?>">
                                    Edit Data Prodi
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