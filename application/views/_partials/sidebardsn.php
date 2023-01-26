<body class="g-sidenav-show bg-gray-100">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl fixed-start ms-3 my-3 bg-white" id="sidenav-main">

        <!-- Sidebar Header -->
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="<?= site_url('dosen') ?>">
                <img src="<?= base_url(); ?>assets/img/umb.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold">Sikamu UMBandung</span>
            </a>
        </div>

        <!-- Horizontal Line -->
        <hr class="horizontal dark mt-0">

        <!-- Sidebar Body -->
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">

                <!-- Home -->
                <?php if (uri_string() === 'dosen') {
                    $navlinkHome = 'nav-link active shadow';
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
                <?php if (fnmatch('dosen/perkuliahan*', uri_string())) {
                    $navlinkPerkuliahan = 'nav-link active shadow';
                    $color = '#fff';
                } else {
                    $navlinkPerkuliahan = 'nav-link';
                    $color = '#000';
                } ?>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('dosen/perkuliahan/mata-kuliah') ?>">
                        <a data-bs-toggle="collapse" href="#perkuliahan" class="<?= $navlinkPerkuliahan ?>" aria-controls="perkuliahan" role="button" aria-expanded="false">
                            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center me-2">
                                <i class="fa-solid fa-chalkboard-user" style="color: <?= $color ?>"></i>
                            </div>
                            <span class="nav-link-text ms-1">Perkuliahan</span>
                        </a>
                        <div class="collapse" id="perkuliahan">
                            <ul class="nav ms-4 ps-3">
                                <li class="nav-item">
                                    <a class="nav-link link-secondary" href="<?= site_url('dosen/perkuliahan/mata-kuliah') ?>">
                                        Mata Kuliah
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link link-secondary" href="<?= site_url('dosen/listmatkulbap') ?>">
                                        BAP
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li> -->

                <li class="nav-item">
                    <a class="<?= $navlinkPerkuliahan ?>" href="<?= site_url('dosen/perkuliahan/mata-kuliah') ?>">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-chalkboard-user" style="color: <?= $color ?>"></i>
                        </div>
                        <span class="nav-link-text ms-1">Perkuliahan</span>
                    </a>
                </li>

                <!-- Bimbingan -->
                <?php if (fnmatch('dosen/bimbingan*', uri_string())) {
                    $navlinkBimbingan = 'nav-link active shadow';
                    $color = '#fff';
                } else {
                    $navlinkBimbingan = 'nav-link';
                    $color = '#000';
                } ?>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#perwalian" class="<?= $navlinkBimbingan ?>" aria-controls="perwalian" role="button" aria-expanded="false">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center me-2">
                            <i class="fa-solid fa-book" style="color: <?= $color ?>"></i>
                        </div>
                        <span class="nav-link-text ms-1">Bimbingan</span>
                    </a>
                    <div class="collapse" id="perwalian">
                        <ul class="nav ms-4 ps-3">
                            <li class="nav-item">
                                <a class="nav-link link-secondary" href="<?= site_url('dosen/bimbingan/mahasiswa-wali') ?>">
                                    Mahasiswa Wali
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link-secondary" href="<?= site_url('dosen/bimbingan/akademik') ?>">
                                    Bimbingan Akademik
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link link-secondary" href="#">
                                    Bimbingan Skripsi
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link-secondary" href="#">
                                    Catatan Studi
                                </a>
                            </li> -->
                        </ul>
                    </div>
                </li>

                <!-- Pembatas Halaman Profil -->
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Halaman Profil</h6>
                </li>

                <!-- Profil -->
                <?php if (fnmatch('dosen/profil*', uri_string())) {
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
                                <a class="nav-link link-secondary" href="<?= site_url('dosen/profil') ?>">
                                    Lihat Data Diri
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link-secondary" href="<?= site_url('dosen/profil/edit/' . $this->session->id) ?>">
                                    Edit Data Diri
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link-secondary" href="<?= site_url('dosen/profil/edit/foto') ?>">
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