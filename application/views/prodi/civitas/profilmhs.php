<div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <div class="container-fluid pt-6 pt-xl-0">

        <!-- Navigasi -->
        <div class="d-flex d-inline mt-4 mb-3">
            <a class="badge bg-primary cursor-pointer px-3 py-2" onclick="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left"></i></a>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-gray-100 my-0 py-0">
                    <li class="breadcrumb-item"><a href="<?= site_url('prodi') ?>"><u>Home</u></a></li>
                    <li class="breadcrumb-item"><a href="<?= site_url('prodi/civitas/data-mahasiswa') ?>"><u>Data Mahasiswa</u></a></li>
                    <li class="breadcrumb-item active text-primary fw-bold" aria-current="page">Data Diri</li>
                </ol>
            </nav>
        </div>

        <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">

            <!-- Button Mahasiswa -->
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="mahasiswa-tab" data-bs-toggle="tab" data-bs-target="#mahasiswa-tab-pane" type="button" role="tab" aria-controls="mahasiswa-tab-pane" aria-selected="true">Mahasiswa</button>
            </li>

            <!-- Button Orang Tua -->
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="orangtua-tab" data-bs-toggle="tab" data-bs-target="#orangtua-tab-pane" type="button" role="tab" aria-controls="orangtua-tab-pane" aria-selected="false">Orang Tua</button>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">

            <!-- Mahasiswa -->
            <div class="tab-pane fade show active" id="mahasiswa-tab-pane" role="tabpanel" aria-labelledby="mahasiswa-tab" tabindex="0">

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
                                    <img src="<?= base_url('assets/img/uploads/profile/curved.jpg') ?>" class="border-radius-lg" style="width: 40%">
                                </div>
                                <div class="row">
                                    <p class="col-5 fs-6 fw-bolder text-sm">Nama Lengkap</p>
                                    <div class="col-1">:</div>
                                    <p class="col-6 fs-6 ps-0 text-sm"><?= $mahasiswa['nama'] ?></p>
                                    <p class="col-5 fs-6 fw-bolder text-sm">Jenis Kelamin</p>
                                    <div class="col-1">:</div>
                                    <?php if ($mahasiswa['jenis_kelamin'] === 'L') $jenis_kelamin = 'Laki-laki';
                                    elseif ($mahasiswa['jenis_kelamin'] === 'P') $jenis_kelamin = 'Perempuan';
                                    else $jenis_kelamin = ''; ?>
                                    <p class="col-6 fs-6 ps-0 text-sm"><?= $jenis_kelamin ?></p>
                                    <p class="col-5 fs-6 fw-bolder text-sm">Tempat, Tanggal Lahir</p>
                                    <div class="col-1">:</div>
                                    <p class="col-6 fs-6 ps-0 text-sm"><?= $mahasiswa['tempat_lahir'] . ', ' . $tanggal_lahir ?></p>
                                    <p class="col-5 fs-6 fw-bolder text-sm">Agama</p>
                                    <div class="col-1">:</div>
                                    <p class="col-6 fs-6 ps-0 text-sm"><?= $mahasiswa['agama'] ?></p>
                                    <p class="col-5 fs-6 fw-bolder text-sm">Nomor Induk Kependudukan</p>
                                    <div class="col-1">:</div>
                                    <p class="col-6 fs-6 ps-0 text-sm"><?= $mahasiswa['nik'] ?></p>
                                    <p class="col-5 fs-6 fw-bolder text-sm">Kewarganegaraan</p>
                                    <div class="col-1">:</div>
                                    <p class="col-6 fs-6 ps-0 text-sm"><?= $mahasiswa['kewarganegaraan'] ?></p>
                                    <p class="col-5 fs-6 fw-bolder text-sm">Nomor Handphone</p>
                                    <div class="col-1">:</div>
                                    <p class="col-6 fs-6 ps-0 text-sm"><?= $mahasiswa['no_hp'] ?></p>
                                    <p class="col-5 fs-6 fw-bolder text-sm">Email</p>
                                    <div class="col-1">:</div>
                                    <p class="col-6 fs-6 ps-0 text-sm"><?= $mahasiswa['email'] ?></p>
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
                                <p class="col-5 fs-6 fw-bolder text-sm">Nomor Induk Mahasiswa</p>
                                <div class="col-1">:</div>
                                <p class="col-6 fs-6 ps-0 text-sm"><?= $mahasiswa['nim'] ?></p>
                                <p class="col-5 fs-6 fw-bolder text-sm">Program Studi</p>
                                <div class="col-1">:</div>
                                <p class="col-6 fs-6 ps-0 text-sm"><?= $prodi['nama'] ?></p>
                                <p class="col-5 fs-6 fw-bolder text-sm">Tahun Angkatan</p>
                                <div class="col-1">:</div>
                                <p class="col-6 fs-6 ps-0 text-sm"><?= $mahasiswa['tahun_angkatan'] ?></p>
                                <p class="col-5 fs-6 fw-bolder text-sm">Dosen Wali</p>
                                <div class="col-1">:</div>
                                <p class="col-6 fs-6 ps-0 text-sm"><?= $dosen['nama'] ?></p>
                                <p class="col-5 fs-6 fw-bolder text-sm">Semester</p>
                                <div class="col-1">:</div>
                                <p class="col-6 fs-6 ps-0 text-sm"><?= $mahasiswa['semester'] ?></p>
                            </div>
                        </div>

                        <!-- Kedua -->
                        <div class="card mb-3">
                            <div class="card-header p-3">
                                <h4 class="fw-bolder mb-0">Alamat</h4>
                            </div>
                            <div class="card-body row text-dark p-3 pt-0">
                                <p class="col-5 fs-6 fw-bolder text-sm">Alamat Tempat Tinggal</p>
                                <div class="col-1">:</div>
                                <p class="col-6 fs-6 ps-0 text-sm"><?= $mahasiswa['alamat'] ?></p>
                                <p class="col-5 fs-6 fw-bolder text-sm">Desa/Kelurahan</p>
                                <div class="col-1">:</div>
                                <p class="col-6 fs-6 ps-0 text-sm"><?= $mahasiswa['kelurahan'] ?></p>
                                <p class="col-5 fs-6 fw-bolder text-sm">Kecamatan</p>
                                <div class="col-1">:</div>
                                <p class="col-6 fs-6 ps-0 text-sm"><?= $mahasiswa['kecamatan'] ?></p>
                                <p class="col-5 fs-6 fw-bolder text-sm">Kabupaten/Kota</p>
                                <div class="col-1">:</div>
                                <p class="col-6 fs-6 ps-0 text-sm"><?= $mahasiswa['kabupaten'] ?></p>
                                <p class="col-5 fs-6 fw-bolder text-sm">Provinsi</p>
                                <div class="col-1">:</div>
                                <p class="col-6 fs-6 ps-0 text-sm"><?= $mahasiswa['provinsi'] ?></p>
                                <p class="col-5 fs-6 fw-bolder text-sm">Kode Pos</p>
                                <div class="col-1">:</div>
                                <p class="col-6 fs-6 ps-0 text-sm"><?= $mahasiswa['kode_pos'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Orang Tua -->
            <div class="tab-pane fade" id="orangtua-tab-pane" role="tabpanel" aria-labelledby="orangtua-tab" tabindex="0">

                <div class="row g-3 mt-3">

                    <!-- Data Ayah -->
                    <div class="col-12 col-lg-4 mt-0 mb-3">
                        <div class="card">
                            <div class="card-header p-3">
                                <h4 class="fw-bolder mb-0">Data Ayah</h4>
                            </div>
                            <div class="card-body row text-dark p-3 pt-0">
                                <p class="col-5 fs-6 fw-bolder text-sm">Nama Lengkap</p>
                                <div class="col-1">:</div>
                                <p class="col-6 fs-6 ps-0 text-sm"><?= $ortu['nama_ayah'] ?></p>
                                <p class="col-5 fs-6 fw-bolder text-sm">NIK</p>
                                <div class="col-1">:</div>
                                <p class="col-6 fs-6 ps-0 text-sm"><?= $ortu['nik_ayah'] ?></p>
                                <p class="col-5 fs-6 fw-bolder text-sm">Tanggal Lahir</p>
                                <div class="col-1">:</div>
                                <p class="col-6 fs-6 ps-0 text-sm"><?= $ortu['tanggal_lahir_ayah'] ?></p>
                                <p class="col-5 fs-6 fw-bolder text-sm">Pendidikan</p>
                                <div class="col-1">:</div>
                                <p class="col-6 fs-6 ps-0 text-sm"><?= $ortu['pendidikan_ayah'] ?></p>
                                <p class="col-5 fs-6 fw-bolder text-sm">Pekerjaan</p>
                                <div class="col-1">:</div>
                                <p class="col-6 fs-6 ps-0 text-sm"><?= $ortu['pekerjaan_ayah'] ?></p>
                                <p class="col-5 fs-6 fw-bolder text-sm">Penghasilan</p>
                                <div class="col-1">:</div>
                                <p class="col-6 fs-6 ps-0 text-sm"><?= $ortu['penghasilan_ayah'] ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Data Ibu -->
                    <div class="col-12 col-lg-4 mt-0 mb-3">
                        <div class="card">
                            <div class="card-header p-3">
                                <h4 class="fw-bolder mb-0">Data Ibu</h4>
                            </div>
                            <div class="card-body row text-dark p-3 pt-0">
                                <p class="col-5 fs-6 fw-bolder text-sm">Nama Lengkap</p>
                                <div class="col-1">:</div>
                                <p class="col-6 fs-6 ps-0 text-sm"><?= $ortu['nama_ibu'] ?></p>
                                <p class="col-5 fs-6 fw-bolder text-sm">NIK</p>
                                <div class="col-1">:</div>
                                <p class="col-6 fs-6 ps-0 text-sm"><?= $ortu['nik_ibu'] ?></p>
                                <p class="col-5 fs-6 fw-bolder text-sm">Tanggal Lahir</p>
                                <div class="col-1">:</div>
                                <p class="col-6 fs-6 ps-0 text-sm"><?= $ortu['tanggal_lahir_ibu'] ?></p>
                                <p class="col-5 fs-6 fw-bolder text-sm">Pendidikan</p>
                                <div class="col-1">:</div>
                                <p class="col-6 fs-6 ps-0 text-sm"><?= $ortu['pendidikan_ibu'] ?></p>
                                <p class="col-5 fs-6 fw-bolder text-sm">Pekerjaan</p>
                                <div class="col-1">:</div>
                                <p class="col-6 fs-6 ps-0 text-sm"><?= $ortu['pekerjaan_ibu'] ?></p>
                                <p class="col-5 fs-6 fw-bolder text-sm">Penghasilan</p>
                                <div class="col-1">:</div>
                                <p class="col-6 fs-6 ps-0 text-sm"><?= $ortu['penghasilan_ibu'] ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Data Wali -->
                    <div class="col-12 col-lg-4 mt-0 mb-3">
                        <div class="card">
                            <div class="card-header p-3">
                                <h4 class="fw-bolder mb-0">Data Wali</h4>
                            </div>
                            <div class="card-body row text-dark p-3 pt-0">
                                <p class="col-5 fs-6 fw-bolder text-sm">Nama Lengkap</p>
                                <div class="col-1">:</div>
                                <p class="col-6 fs-6 ps-0 text-sm"><?= $ortu['nama_wali'] ?></p>
                                <p class="col-5 fs-6 fw-bolder text-sm">NIK</p>
                                <div class="col-1">:</div>
                                <p class="col-6 fs-6 ps-0 text-sm"><?= $ortu['nik_wali'] ?></p>
                                <p class="col-5 fs-6 fw-bolder text-sm">Tanggal Lahir</p>
                                <div class="col-1">:</div>
                                <p class="col-6 fs-6 ps-0 text-sm"><?= $ortu['tanggal_lahir_wali'] ?></p>
                                <p class="col-5 fs-6 fw-bolder text-sm">Pendidikan</p>
                                <div class="col-1">:</div>
                                <p class="col-6 fs-6 ps-0 text-sm"><?= $ortu['pendidikan_wali'] ?></p>
                                <p class="col-5 fs-6 fw-bolder text-sm">Pekerjaan</p>
                                <div class="col-1">:</div>
                                <p class="col-6 fs-6 ps-0 text-sm"><?= $ortu['pekerjaan_wali'] ?></p>
                                <p class="col-5 fs-6 fw-bolder text-sm">Penghasilan</p>
                                <div class="col-1">:</div>
                                <p class="col-6 fs-6 ps-0 text-sm"><?= $ortu['penghasilan_wali'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('_partials/footer') ?>
    </div>