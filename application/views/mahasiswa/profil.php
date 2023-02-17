    <?php
    if (isset($_SESSION['mhssuccess'])) {
        echo "<script>
                alert('Edit biodata mahasiswa berhasil!');
            </script>";
        unset($_SESSION['mhssuccess']);
    } elseif (isset($_SESSION['ortusuccess'])) {
        echo "<script>
                alert('Edit biodata orang tua/wali berhasil!');
            </script>";
        unset($_SESSION['ortusuccess']);
    } ?>

    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-6 pt-xl-0">

            <!-- Navigasi -->
            <div class="d-flex d-inline mt-4 mb-3">
                <a class="badge bg-primary cursor-pointer px-3 py-2" onclick="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left"></i></a>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-gray-100 my-0 py-0">
                        <li class="breadcrumb-item"><a href="<?= site_url('mahasiswa') ?>"><u>Home</u></a></li>
                        <li class="breadcrumb-item active text-primary fw-bold" aria-current="page">Profil</li>
                    </ol>
                </nav>
            </div>

            <!-- Header -->
            <div class="page-header height-200 border-radius-xl mt-3" style="background-image: url('<?= base_url('assets/img/uploads/header/' . $header) ?>')"></div>
            <div class="card card-body blur shadow-blur mx-4 p-1 mt-n5 overflow-hidden">
                <div class="d-flex align-content-center justify-content-between">
                    <div class="row gx-3">
                        <div class="col-auto my-auto">
                            <div class="avatar avatar-xl position-relative">
                                <img src="<?= base_url('assets/img/uploads/profile/' . $profil) ?>" alt="profile_image" class="w-75 h-75 border-radius-lg shadow-sm">
                            </div>
                        </div>
                        <div class="col-auto my-auto">
                            <div>
                                <h5 class="mb-2"><?= $mahasiswa['nama'] ?></h5>
                                <p class="mb-0 font-weight-bold text-sm"><?= $mahasiswa['nim'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
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
                                <div class="card-header d-flex justify-content-between p-3">
                                    <h4 class="fw-bolder mb-0">Data Diri</h4>
                                    <a href="<?= site_url('mahasiswa/profil/edit/' . $mahasiswa['nim']) ?>" class="btn btn-primary btn-sm mb-0">Ubah Profil</a>
                                </div>
                                <div class="card-body text-dark p-3 pt-0">
                                    <div class="d-flex justify-content-center mb-5">
                                        <img src="<?= base_url('assets/img/uploads/profile/' . $profil) ?>" class="border-radius-lg w-50">
                                    </div>
                                    <div class="row">
                                        <p class="col-5 fs-6 fw-bolder text-sm">Nama Lengkap</p>
                                        <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $mahasiswa['nama'] ?></p>
                                        <p class="col-5 fs-6 fw-bolder text-sm">Jenis Kelamin</p>
                                        <?php if ($mahasiswa['jenis_kelamin'] === 'L') $jenis_kelamin = 'Laki-laki';
                                        elseif ($mahasiswa['jenis_kelamin'] === 'P') $jenis_kelamin = 'Perempuan';
                                        else $jenis_kelamin = ''; ?>
                                        <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $jenis_kelamin ?></p>
                                        <p class="col-5 fs-6 fw-bolder text-sm">Tempat, Tanggal Lahir</p>
                                        <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $mahasiswa['tempat_lahir'] . ', ' . $tanggal_lahir ?></p>
                                        <p class="col-5 fs-6 fw-bolder text-sm">Agama</p>
                                        <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $mahasiswa['agama'] ?></p>
                                        <p class="col-5 fs-6 fw-bolder text-sm">Nomor Induk Kependudukan</p>
                                        <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $mahasiswa['nik'] ?></p>
                                        <p class="col-5 fs-6 fw-bolder text-sm">Kewarganegaraan</p>
                                        <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $mahasiswa['kewarganegaraan'] ?></p>
                                        <p class="col-5 fs-6 fw-bolder text-sm">Nomor Handphone</p>
                                        <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $mahasiswa['no_hp'] ?></p>
                                        <p class="col-5 fs-6 fw-bolder text-sm">Email</p>
                                        <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $mahasiswa['email'] ?></p>
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
                                    <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $mahasiswa['nim'] ?></p>
                                    <p class="col-5 fs-6 fw-bolder text-sm">Program Studi</p>
                                    <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $prodi['nama'] ?></p>
                                    <p class="col-5 fs-6 fw-bolder text-sm">Tahun Angkatan</p>
                                    <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $mahasiswa['tahun_angkatan'] ?></p>
                                    <p class="col-5 fs-6 fw-bolder text-sm">Dosen Wali</p>
                                    <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $dosen['nama'] ?></p>
                                    <p class="col-5 fs-6 fw-bolder text-sm">Semester</p>
                                    <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $mahasiswa['semester'] ?></p>
                                </div>
                            </div>

                            <!-- Kedua -->
                            <div class="card mb-3">
                                <div class="card-header p-3">
                                    <h4 class="fw-bolder mb-0">Alamat</h4>
                                </div>
                                <div class="card-body row text-dark p-3 pt-0">
                                    <p class="col-5 fs-6 fw-bolder text-sm">Alamat Tempat Tinggal</p>
                                    <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $mahasiswa['alamat'] ?></p>
                                    <p class="col-5 fs-6 fw-bolder text-sm">Desa/Kelurahan</p>
                                    <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $mahasiswa['kelurahan'] ?></p>
                                    <p class="col-5 fs-6 fw-bolder text-sm">Kecamatan</p>
                                    <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $mahasiswa['kecamatan'] ?></p>
                                    <p class="col-5 fs-6 fw-bolder text-sm">Kabupaten/Kota</p>
                                    <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $mahasiswa['kabupaten'] ?></p>
                                    <p class="col-5 fs-6 fw-bolder text-sm">Provinsi</p>
                                    <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $mahasiswa['provinsi'] ?></p>
                                    <p class="col-5 fs-6 fw-bolder text-sm">Kode Pos</p>
                                    <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $mahasiswa['kode_pos'] ?></p>
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
                                    <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $ortu['nama_ayah'] ?></p>
                                    <p class="col-5 fs-6 fw-bolder text-sm">Nomor Induk Kependudukan</p>
                                    <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $ortu['nik_ayah'] ?></p>
                                    <p class="col-5 fs-6 fw-bolder text-sm">Tanggal Lahir</p>
                                    <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $ortu['tanggal_lahir_ayah'] ?></p>
                                    <p class="col-5 fs-6 fw-bolder text-sm">Pendidikan</p>
                                    <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $ortu['pendidikan_ayah'] ?></p>
                                    <p class="col-5 fs-6 fw-bolder text-sm">Pekerjaan</p>
                                    <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $ortu['pekerjaan_ayah'] ?></p>
                                    <p class="col-5 fs-6 fw-bolder text-sm">Penghasilan</p>
                                    <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $ortu['penghasilan_ayah'] ?></p>
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
                                    <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $ortu['nama_ibu'] ?></p>
                                    <p class="col-5 fs-6 fw-bolder text-sm">Nomor Induk Kependudukan</p>
                                    <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $ortu['nik_ibu'] ?></p>
                                    <p class="col-5 fs-6 fw-bolder text-sm">Tanggal Lahir</p>
                                    <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $ortu['tanggal_lahir_ibu'] ?></p>
                                    <p class="col-5 fs-6 fw-bolder text-sm">Pendidikan</p>
                                    <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $ortu['pendidikan_ibu'] ?></p>
                                    <p class="col-5 fs-6 fw-bolder text-sm">Pekerjaan</p>
                                    <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $ortu['pekerjaan_ibu'] ?></p>
                                    <p class="col-5 fs-6 fw-bolder text-sm">Penghasilan</p>
                                    <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $ortu['penghasilan_ibu'] ?></p>
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
                                    <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $ortu['nama_wali'] ?></p>
                                    <p class="col-5 fs-6 fw-bolder text-sm">Nomor Induk Kependudukan</p>
                                    <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $ortu['nik_wali'] ?></p>
                                    <p class="col-5 fs-6 fw-bolder text-sm">Tanggal Lahir</p>
                                    <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $ortu['tanggal_lahir_wali'] ?></p>
                                    <p class="col-5 fs-6 fw-bolder text-sm">Pendidikan</p>
                                    <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $ortu['pendidikan_wali'] ?></p>
                                    <p class="col-5 fs-6 fw-bolder text-sm">Pekerjaan</p>
                                    <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $ortu['pekerjaan_wali'] ?></p>
                                    <p class="col-5 fs-6 fw-bolder text-sm">Penghasilan</p>
                                    <p class="col-7 fs-6 text-sm">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $ortu['penghasilan_wali'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('_partials/footer') ?>
    </div>