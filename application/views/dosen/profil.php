<?php
if (isset($_SESSION['updatesuccess'])) {
    echo "<script>
            alert('Edit biodata berhasil!');
        </script>";
    unset($_SESSION['updatesuccess']);
} ?>

<div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <div class="container-fluid pt-6 pt-xl-0">

        <!-- Navigasi -->
        <div class="d-flex d-inline mt-4 mb-3">
            <a class="badge bg-primary cursor-pointer px-3 py-2" onclick="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left"></i></a>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-gray-100 my-0 py-0">
                    <li class="breadcrumb-item"><a href="<?= site_url('dosen') ?>"><u>Home</u></a></li>
                    <li class="breadcrumb-item active text-primary fw-bold" aria-current="page">Profil</li>
                </ol>
            </nav>
        </div>

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

        <!-- Judul -->
        <div class="card my-3">
            <div class="d-flex justify-content-between p-3">
                <h5 class="mb-0">Profil Anda</h5>
                <a href="<?= site_url('dosen/profil/edit/' . $dosen['nik']) ?>" class="btn btn-primary btn-sm mb-0">Ubah Profil</a>
            </div>
        </div>

        <div class="row g-3 mt-3">

            <!-- Left Content -->
            <div class="col-12 col-md-4 my-0">

                <!-- Pertama -->
                <div class="card mb-3">

                    <div class="card-body p-3">
                        <div class="row text-dark">

                            <p class="col-5 fs-6 fw-bold">Nama Lengkap</p>
                            <p class="col-7 fs-6"> &nbsp; <?= $dosen['nama'] ?></p>
                            <hr class="bg-dark">
                            <p class="col-5 fs-6 fw-bold">Nomor Induk Mahasiswa</p>
                            <p class="col-7 fs-6"> &nbsp; <?= $dosen['nik'] ?></p>
                            <hr class="bg-dark">
                            <p class="col-5 fs-6 fw-bold">Tempat Lahir</p>
                            <p class="col-7 fs-6"> &nbsp; <?= $dosen['tempat_lahir'] ?></p>
                            <hr class="bg-dark">
                            <p class="col-5 fs-6 fw-bold">Tanggal Lahir</p>
                            <p class="col-7 fs-6"> &nbsp; <?= $dosen['tanggal_lahir'] ?></p>
                        </div>
                    </div>
                </div>

                <!-- Kedua -->
                <div class="card mb-3">

                    <div class="card-body p-3">
                        <div class="row text-dark">
                            <p class="col-5 fs-6 fw-bold">Jenis Kelamin</p>
                            <p class="col-7 fs-6"> &nbsp;
                                <?php if ($dosen['jenis_kelamin'] === 'L') : ?>
                                <?php elseif ($dosen['jenis_kelamin'] === 'P') : ?>
                                <?php else : ?>
                                <?php endif ?>
                            </p>
                            <hr class="bg-dark">
                            <p class="col-5 fs-6 fw-bold">Agama</p>
                            <p class="col-7 fs-6"> &nbsp; <?= $dosen['agama'] ?></p>
                            <hr class="bg-dark">
                            <p class="col-5 fs-6 fw-bold">Nomer Handphone</p>
                            <p class="col-7 fs-6"> &nbsp; <?= $dosen['no_hp'] ?></p>
                            <hr class="bg-dark">
                            <p class="col-5 fs-6 fw-bold">Email</p>
                            <p class="col-7 fs-6"> &nbsp; <?= $dosen['email'] ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Content -->
            <div class="col-12 col-md-8 my-0">

                <!-- Pertama -->
                <div class="card mb-3">

                    <div class="card-body p-3">
                        <div class="row text-dark">
                            <p class="col-5 fs-6 fw-bold">Program Studi</p>
                            <p class="col-7 fs-6"> &nbsp;
                                <?php foreach ($listp as $prodi) : ?>
                                    <?php if ($prodi['id_prodi'] === $dosen['id_prodi']) : ?>
                                        <?= $prodi['nama'] ?>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </p>
                            <hr class="bg-dark">
                            <p class="col-5 fs-6 fw-bold">Kewarganegaraan</p>
                            <p class="col-7 fs-6"> &nbsp;
                                <?php if ($dosen['kewarganegaraan'] === 'WNI') : ?>
                                    <input type="text" name="kewarganegaraan" class="form-control" value="Warga Negara Indonesia" readonly>
                                <?php elseif ($dosen['kewarganegaraan'] === 'WNA') : ?>
                                    <input type="text" name="kewarganegaraan" class="form-control" value="Warga Negara Asing" readonly>
                                <?php else : ?>
                                    <input type="text" name="kewarganegaraan" class="form-control" placeholder="-" readonly>
                                <?php endif ?>
                            </p>
                            <hr class="bg-dark">
                            <p class="col-5 fs-6 fw-bold">Nomor Induk Dosen</p>
                            <p class="col-7  fs-6"> &nbsp; <?= $dosen['nidn_dosen'] ?></p>
                            <hr class="bg-dark">
                            <p class="col-5 fs-6 fw-bold">Alamat Tempat Tinggal</p>
                            <p class="col-7  fs-6"> &nbsp; <?= $dosen['alamat'] ?></p>
                            <hr class="bg-dark">
                        </div>
                    </div>
                </div>

                <!-- Kedua -->
                <div class="card mb-3">
                    <div class="card-body p-3">
                        <p class="col-5 fs-6 fw-bold">Status Dosen</p>
                        <p class="col-7 fs-6"> &nbsp; <?= $dosen['status_dosen'] ?></p>
                        <hr class="bg-dark">
                        <p class="col-5 fs-6 fw-bold">Status Kerja</p>
                        <p class="col-7 fs-6"> &nbsp; <?= $dosen['status_kerja'] ?></p>
                        <hr class="bg-dark">
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('_partials/footer') ?>
    </div>
</div>