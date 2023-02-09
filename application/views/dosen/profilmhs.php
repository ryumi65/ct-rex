    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-6 pt-xl-0">

            <!-- Navigasi -->
            <div class="d-flex d-inline mt-4 mb-3">
                <a class="badge bg-primary cursor-pointer px-3 py-2" onclick="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left"></i></a>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-gray-100 my-0 py-0">
                        <li class="breadcrumb-item"><a href="<?= site_url('dosen') ?>"><u>Home</u></a></li>
                        <li class="breadcrumb-item"><a href="<?= site_url('dosen/bimbingan/mahasiswa-wali') ?>"><u>Mahasiswa Wali</u></a></li>
                        <li class="breadcrumb-item active text-primary fw-bold" aria-current="page">Profil</li>
                    </ol>
                </nav>
            </div>

            <!-- Judul -->
            <div class="card my-3">
                <div class="d-flex  d-inline justify-content-between p-3">
                    <h5 class="mb-0">Profil <?= $mahasiswa['nama'] ?></h5>
                    <div class="avatar avatar-xxl position-relative">
                        <img src="<?= base_url(); ?>assets/img/uploads/profile/curved.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
            </div>

            <div class="row g-3 mt-3">

                <!-- Left Content -->
                <div class="col-12 col-md-6 my-0">

                    <!-- Pertama -->
                    <div class="card mb-3">
                        <div class="card-header p-3">
                            <h5 class="fw-bolder mb-0">Nama</h5>
                        </div>
                        <div class="card-body text-dark p-3 pt-0">
                            <div class="d-flex d-inline">
                                <p class="col-6 fw-bold text-sm mb-0">Nama Lengkap</p>
                                <p class="col-6 text-sm mb-0">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $mahasiswa['nama'] ?></p>
                            </div>
                            <hr class="bg-dark">
                            <div class="d-flex d-inline">
                                <p class="col-6 fw-bold text-sm mb-0">Nomor Induk Mahasiswa</p>
                                <p class="col-6 text-sm mb-0">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $mahasiswa['nim'] ?></p>
                            </div>
                            <hr class="bg-dark">
                            <div class="d-flex d-inline">
                                <p class="col-6 fw-bold text-sm mb-0">Tempat Lahir</p>
                                <p class="col-6 text-sm mb-0">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $mahasiswa['tempat_lahir'] ?></p>
                            </div>
                            <hr class="bg-dark">
                            <div class="d-flex d-inline">
                                <p class="col-6 fw-bold text-sm mb-0">Tanggal Lahir</p>
                                <p class="col-6 text-sm mb-0">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $mahasiswa['tanggal_lahir'] ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Kedua -->
                    <div class="card mb-3">
                        <div class="card-header p-3">
                            <h4>Nama</h4>
                        </div>
                        <div class="card-body p-3 pt-0">
                            <div class="row text-dark">
                                <p class="col-6 fs-6 fw-bold">Jenis Kelamin</p>
                                <p class="col-6 fs-6">: &nbsp;
                                    <?php if ($mahasiswa['jenis_kelamin'] === 'L') : ?>
                                    <?php elseif ($mahasiswa['jenis_kelamin'] === 'P') : ?>
                                    <?php else : ?>
                                    <?php endif ?>
                                </p>
                                <p class="col-6 fs-6 fw-bold">Agama</p>
                                <p class="col-6 fs-6">: &nbsp; <?= $mahasiswa['agama'] ?></p>
                                <p class="col-6 fs-6 fw-bold">Nomer Handphone</p>
                                <p class="col-6 fs-6">: &nbsp; <?= $mahasiswa['no_hp'] ?></p>
                                <p class="col-6 fs-6 fw-bold">Email</p>
                                <p class="col-6 fs-6">: &nbsp; <?= $mahasiswa['email'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Content -->
                <div class="col-12 col-md-6 my-0">

                    <!-- Pertama -->
                    <div class="card mb-3">
                        <div class="card-header p-3">
                            <h4>Nama</h4>
                        </div>
                        <div class="card-body p-3 pt-0">
                            <div class="row text-dark">
                                <p class="col-6 fs-6 fw-bold">Program Studi</p>
                                <p class="col-6 fs-6">: &nbsp;
                                    <?php foreach ($listp as $prodi) : ?>
                                        <?php if ($prodi['id_prodi'] === $mahasiswa['id_prodi']) : ?>
                                            <?= $prodi['nama'] ?>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </p>
                                <p class="col-6 fs-6 fw-bold">Tahun Angkatan</p>
                                <p class="col-6 fs-6">: &nbsp; <?= $mahasiswa['tahun_angkatan'] ?></p>
                                <p class="col-6 fs-6 fw-bold">Kewarganegaraan</p>
                                <p class="col-6 fs-6">: &nbsp;
                                    <?php if ($mahasiswa['kewarganegaraan'] === 'WNI') : ?>
                                    <?php elseif ($mahasiswa['kewarganegaraan'] === 'WNA') : ?>
                                    <?php else : ?>
                                    <?php endif ?>
                                </p>
                                <p class="col-6 fs-6 fw-bold">Nomor Induk Kependudukan</p>
                                <p class="col-6 fs-6">: &nbsp; <?= $mahasiswa['nik'] ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Kedua -->
                    <div class="card mb-3">
                        <div class="card-header p-3">
                            <h4>Nama</h4>
                        </div>
                        <div class="card-body p-3 pt-0">
                            <div class="row text-dark">
                                <p class="col-6 fs-6 fw-bold">Alamat Tempat Tinggal</p>
                                <p class="col-6 fs-6">: &nbsp; <?= $mahasiswa['alamat'] ?></p>
                                <p class="col-6 fs-6 fw-bold">Desa/Kelurahan</p>
                                <p class="col-6 fs-6">: &nbsp; <?= $mahasiswa['kelurahan'] ?></p>
                                <p class="col-6 fs-6 fw-bold">Kecamatan</p>
                                <p class="col-6 fs-6">: &nbsp; <?= $mahasiswa['kecamatan'] ?></p>
                                <p class="col-6 fs-6 fw-bold">Kabupaten/Kota</p>
                                <p class="col-6 fs-6">: &nbsp; <?= $mahasiswa['kabupaten'] ?></p>
                                <p class="col-6 fs-6 fw-bold">Provinsi</p>
                                <p class="col-6 fs-6">: &nbsp; <?= $mahasiswa['provinsi'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('_partials/footer') ?>
    </div>