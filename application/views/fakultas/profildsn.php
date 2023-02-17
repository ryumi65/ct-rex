    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-6 pt-xl-0">

            <!-- Navigasi -->
            <div class="d-flex d-inline mt-4 mb-3">
                <a class="badge bg-primary cursor-pointer px-3 py-2" onclick="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left"></i></a>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-gray-100 my-0 py-0">
                        <li class="breadcrumb-item"><a href="<?= site_url('prodi') ?>"><u>Home</u></a></li>
                        <li class="breadcrumb-item"><a href="<?= site_url('prodi/civitas/data-dosen') ?>"><u>Data Dosen</u></a></li>
                        <li class="breadcrumb-item active text-primary fw-bold" aria-current="page">Data Diri</li>
                    </ol>
                </nav>
            </div>

            <div class="row g-3 mt-3">

                <!-- Left Content -->
                <div class="col-12 col-md-6 my-0">

                    <!-- Pertama -->
                    <div class="card mb-3">
                        <div class="card-header p-3">
                            <h4 class="fw-bolder mb-0">Data Diri</h4>
                        </div>
                        <div class="card-body text-dark p-3 pt-0">
                            <div class="d-flex justify-content-center mb-5">
                                <img src="<?= base_url('assets/img/uploads/profile/curved.jpg') ?>" class="border-radius-lg w-50">
                            </div>
                            <div class="row">
                                <p class="col-5 fs-6 fw-bolder text-sm">Nama Lengkap</p>
                                <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $dosen['nama'] ?></p>
                                <p class="col-5 fs-6 fw-bolder text-sm">Jenis Kelamin</p>
                                <?php if ($dosen['jenis_kelamin'] === 'L') $jenis_kelamin = 'Laki-laki';
                                elseif ($dosen['jenis_kelamin'] === 'P') $jenis_kelamin = 'Perempuan';
                                else $jenis_kelamin = ''; ?>
                                <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $jenis_kelamin ?></p>
                                <p class="col-5 fs-6 fw-bolder text-sm">Tempat, Tanggal Lahir</p>
                                <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $dosen['tempat_lahir'] . ', ' . $tanggal_lahir ?></p>
                                <p class="col-5 fs-6 fw-bolder text-sm">Agama</p>
                                <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $dosen['agama'] ?></p>
                                <p class="col-5 fs-6 fw-bolder text-sm">Nomor Induk Kependudukan</p>
                                <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $dosen['nik'] ?></p>
                                <p class="col-5 fs-6 fw-bolder text-sm">Kewarganegaraan</p>
                                <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $dosen['kewarganegaraan'] ?></p>
                                <p class="col-5 fs-6 fw-bolder text-sm">Nomor Handphone</p>
                                <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $dosen['no_hp'] ?></p>
                                <p class="col-5 fs-6 fw-bolder text-sm">Email</p>
                                <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $dosen['email'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Content -->
                <div class="col-12 col-md-6 my-0">

                    <!-- Pertama -->
                    <div class="card mb-3">
                        <div class="card-header p-3">
                            <h4 class="fw-bolder mb-0">Data Akademik</h4>
                        </div>
                        <div class="card-body row text-dark p-3 pt-0">
                            <p class="col-5 fs-6 fw-bolder text-sm">NIDN</p>
                            <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $dosen['nidn_dosen'] ?></p>
                            <p class="col-5 fs-6 fw-bolder text-sm">Program Studi</p>
                            <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $prodi['nama'] ?></p>
                            <p class="col-5 fs-6 fw-bolder text-sm">Status Dosen</p>
                            <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $dosen['status_dosen'] ?></p>
                            <p class="col-5 fs-6 fw-bolder text-sm">Status Kerja</p>
                            <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $dosen['status_kerja'] ?></p>
                        </div>
                    </div>

                    <!-- Kedua -->
                    <div class="card mb-3">
                        <div class="card-header p-3">
                            <h4 class="fw-bolder mb-0">Alamat</h4>
                        </div>
                        <div class="card-body row text-dark p-3 pt-0">
                            <p class="col-5 fs-6 fw-bolder text-sm">Alamat Tempat Tinggal</p>
                            <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $dosen['alamat'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('_partials/footer') ?>
    </div>