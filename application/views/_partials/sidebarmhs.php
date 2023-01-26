<body class="g-sidenav-show bg-gray-100">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl fixed-start ms-3 my-3 bg-white" id="sidenav-main">

        <!-- Sidebar Header -->
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="<?= site_url('mahasiswa') ?>">
                <img src="<?= base_url(); ?>assets/img/umb.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold">Sikamu UMBandung</span>
            </a>
        </div>

        <!-- Horizontal Line -->
        <hr class="horizontal dark mt-0">

        <!-- Sidebar Body -->
        <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav align-content-center flex-column">

                <!-- Home -->
                <?php if (uri_string() === 'mahasiswa') {
                    $navlinkHome = 'nav-link active shadow';
                    $color = '#fff';
                } else {
                    $navlinkHome = 'nav-link';
                    $color = '#000';
                } ?>
                <li class="nav-item">
                    <a class="<?= $navlinkHome ?>" href="<?= site_url('mahasiswa') ?>">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-house-user" style="color: <?= $color ?>"></i>
                        </div>
                        <span class="nav-link-text ms-1">Home</span>
                    </a>
                </li>

                <!-- Perkuliahan -->
                <?php if (fnmatch('mahasiswa/perkuliahan*', uri_string())) {
                    $navlinkPerkuliahan = 'nav-link active shadow';
                    $color = '#fff';
                } else {
                    $navlinkPerkuliahan = 'nav-link';
                    $color = '#000';
                } ?>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#perkuliahan" class="<?= $navlinkPerkuliahan ?>" aria-controls="perkuliahan" role="button" aria-expanded="false">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center me-2">
                            <i class="fa-solid fa-chalkboard-user" style="color: <?= $color ?>"></i>
                        </div>
                        <span class="nav-link-text ms-1">Perkuliahan</span>
                    </a>
                    <div class="collapse" id="perkuliahan">
                        <ul class="nav ms-4 ps-3">
                            <li class="nav-item">
                                <a class="nav-link link-secondary" href="<?= site_url('mahasiswa/perkuliahan/jadwal-kuliah') ?>">
                                    Jadwal
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link-secondary" href="<?= site_url('mahasiswa/perkuliahan/data-krs') ?>">
                                    KRS
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link-secondary" href="<?= site_url('mahasiswa/datakhs') ?>">
                                    KHS
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Pendaftaran -->
                <!-- <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#pendaftaran" class="nav-link" aria-controls="pendaftaran" role="button" aria-expanded="false">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                            <i class="fa-solid fa-book" style="color: #000"></i>
                        </div>
                        <span class="nav-link-text ms-1">Pendaftaran</span>
                    </a>
                    <div class="collapse" id="pendaftaran">
                        <ul class="nav ms-4 ps-3">
                            <li class="nav-item">
                                <a class="nav-link link-secondary" href="#">
                                    Sidang
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link-secondary" href="#">
                                    KKN
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link-secondary" href="#">
                                    Magang
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link-secondary" href="#">
                                    MBKM
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> -->

                <!-- Perwalian -->
                <!-- <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#perwalian" class="nav-link" aria-controls="perwalian role=" button" aria-expanded="false">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
                            <i class="fa-solid fa-pen-to-square" style="color:#000"></i>
                        </div>
                        <span class=" nav-link-text ms-1">Perwalian</span>
                    </a>
                    <div class="collapse" id="perwalian">
                        <ul class="nav ms-4 ps-3">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Catatan Studi
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> -->

                <!-- Jadwal -->
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-regular fa-calendar-days" style="color:#000"></i>
                        </div>
                        <span class="nav-link-text ms-1">Kalender Akademik</span>
                    </a>
                </li> -->

                <!-- Pembayaran -->
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-money-check-dollar" style="color:#000"></i>
                        </div>
                        <span class="nav-link-text ms-1">Biaya Pendidikan</span>
                    </a>
                </li> -->

                <!-- Pembatas Halaman Profil -->
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Halaman Profil</h6>
                </li>

                <!-- Profil -->
                <?php if (fnmatch('mahasiswa/profil*', uri_string())) {
                    $navlinkProfil = 'nav-link active shadow';
                    $color = '#fff';
                } else {
                    $navlinkProfil = 'nav-link';
                    $color = '#000';
                } ?>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#profil" class="<?= $navlinkProfil ?>" aria-controls="profil" role="button" aria-expanded="false">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center me-2">
                            <i class="fa-solid fa-user" style="color: <?= $color ?>"></i>
                        </div>
                        <span class="nav-link-text ms-1">Profil</span>
                    </a>
                    <div class="collapse" id="profil">
                        <ul class="nav ms-4 ps-3">
                            <li class="nav-item">
                                <a class="nav-link link-secondary" href="<?= site_url('mahasiswa/profil') ?>">
                                    Lihat Data Diri
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link-secondary" href="<?= site_url('mahasiswa/profil/edit/' . $this->session->id) ?>">
                                    Edit Data Diri
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link-secondary" href="<?= site_url('mahasiswa/profil/edit/foto') ?>">
                                    Edit Foto
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Logout -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('logout') ?>">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-arrow-right-from-bracket" style="color:#000"></i>
                        </div>
                        <span class="nav-link-text ms-1">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>