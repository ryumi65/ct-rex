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
                                <h5 class="mb-2"><?= $mahasiswa['nama'] ?></h5>
                                <p class="mb-0 font-weight-bold text-sm"><?= $mahasiswa['nim'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Button -->
            <div class="card-header pb-0 p-3">
                <ul class="nav nav-tabs" id="myTab" role="tablist">

                    <!-- Button Mahasiswa -->
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="mahasiswa-tab" data-bs-toggle="tab" data-bs-target="#mahasiswa-tab-pane" type="button" role="tab" aria-controls="mahasiswa-tab-pane" aria-selected="true">Mahasiswa</button>
                    </li>

                    <!-- Button Orang Tua -->
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="orangtua-tab" data-bs-toggle="tab" data-bs-target="#orangtua-tab-pane" type="button" role="tab" aria-controls="orangtua-tab-pane" aria-selected="false">Orang Tua</button>
                    </li>
                </ul>
            </div>

            <!-- Isi -->
            <div class="card-header p-3">
                <div class="tab-content" id="myTabContent">

                    <!-- Mahasiswa -->
                    <div class="tab-pane fade show active" id="mahasiswa-tab-pane" role="tabpanel" aria-labelledby="mahasiswa-tab" tabindex="0">


                        <!-- Judul -->
                        <div class="card my-3">
                            <div class="d-flex justify-content-between p-3">
                                <h5 class="mb-0">Profil Anda</h5>
                                <a href="<?= site_url('mahasiswa/profil/edit/' . $mahasiswa['nim']) ?>" class="btn btn-primary btn-sm mb-0">Ubah Profil</a>
                            </div>
                        </div>

                        <div class="row g-2 mt-2">

                            <!-- Left Content -->
                            <div class="col-12 col-md-5 my-0">

                                <!-- Pertama -->
                                <div class="col-12 mt-0 mb-3">
                                    <div class="card mb-3">
                                        <div class="card-header pb-0">
                                            <h4>Nama</h4>
                                        </div>
                                        <div class="card-body p-3">
                                            <div class="row text-dark">
                                                <p class="col-6 fs-6 fw-bold">Nama Lengkap</p>
                                                <p class="col-6 fs-6">: &nbsp; <?= $mahasiswa['nama'] ?></p>
                                                <p class="col-6 fs-6 fw-bold">Nomor Induk Mahasiswa</p>
                                                <p class="col-6 fs-6">: &nbsp; <?= $mahasiswa['nim'] ?></p>
                                                <p class="col-6 fs-6 fw-bold">Tempat Lahir</p>
                                                <p class="col-6 fs-6">: &nbsp; <?= $mahasiswa['tempat_lahir'] ?></p>
                                                <p class="col-6 fs-6 fw-bold">Tanggal Lahir</p>
                                                <p class="col-6 fs-6">: &nbsp; <?= $mahasiswa['tanggal_lahir'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <!-- Kedua -->
                                <div class="card mb-3">
                                    <div class="card-header pb-0">
                                        <h4>Nama</h4>
                                    </div>
                                    <div class="card-body p-3">
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
                                    <div class="card-header pb-0">
                                        <h4>Nama</h4>
                                    </div>


                                    <div class="card-body p-3">
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
                                            <p class="col-6 fs-6">: &nbsp; <?= $mahasiswa['agama'] ?></p>
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
                                    <div class="card-header pb-0">
                                        <h4>Nama</h4>
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="row text-dark">
                                            <p class="col-6 fs-6 fw-bold">Alamat Tempat Tinggal</p>
                                            <p class="col-6 fs-6">: &nbsp; <?= $mahasiswa['alamat'] ?></p>
                                            <p class="col-6 fs-6 fw-bold">Desa/Kelurahan</p>
                                            <p class="col-6 fs-6">: &nbsp; <?= $mahasiswa['agama'] ?></p>
                                            <p class="col-6 fs-6 fw-bold">Kecamatan</p>
                                            <p class="col-6 fs-6">: &nbsp; <?= $mahasiswa['no_hp'] ?></p>
                                            <p class="col-6 fs-6 fw-bold">Kabupaten/Kota</p>
                                            <p class="col-6 fs-6">: &nbsp; <?= $mahasiswa['email'] ?></p>
                                            <p class="col-6 fs-6 fw-bold">Kabupaten/Kota</p>
                                            <p class="col-6 fs-6">: &nbsp; <?= $mahasiswa['email'] ?></p>
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <!-- Ketiga -->

                        </div>
                    </div>

                    <!-- Orang Tua -->
                    <div class="tab-pane fade" id="orangtua-tab-pane" role="tabpanel" aria-labelledby="orangtua-tab" tabindex="0">

                        <div class="card my-3">
                            <div class="d-flex justify-content-between p-3">
                                <h5 class="mb-0">Profil Orang Tua</h5>
                                <a href="<?= site_url('mahasiswa/profil/edit/' . $mahasiswa['nim']) ?>" class="btn btn-primary btn-sm mb-0">Ubah Profil</a>
                            </div>
                        </div>

                        <div class="row g-3 mt-3">

                            <!-- Left Content -->
                            <div class="col-12 col-md-4 my-0">

                                <!-- AYAH -->
                                <div class="card mb-3">
                                    <div class="card-header pb-0">
                                        <h6>Data Ayah</h6>
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="row text-dark">
                                            <p class="col-6 fs-6 fw-bold">Nama Lengkap</p>
                                            <p class="col-6 fs-6">: &nbsp; <?= $ortu['nama_ayah'] ?></p>
                                            <p class="col-6 fs-6 fw-bold">Nomor Induk Mahasiswa</p>
                                            <p class="col-6 fs-6">: &nbsp; <?= $ortu['nik_ayah'] ?></p>
                                            <p class="col-6 fs-6 fw-bold">Tanggal Lahir</p>
                                            <p class="col-6 fs-6">: &nbsp; <?= $ortu['tanggal_lahir_ayah'] ?></p>
                                            <p class="col-6 fs-6 fw-bold">Pendidikan</p>
                                            <p class="col-6 fs-6">: &nbsp; <?= $ortu['pendidikan_ayah'] ?></p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Data Ibu -->
                                <div class="card mb-3">
                                    <div class="card-header p-3 pb-0">
                                        <h6>Data Ibu</h6>
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="row text-dark">
                                            <p class="col-6 fs-6 fw-bold">Nama Lengkap</p>
                                            <p class="col-6 fs-6">: &nbsp; <?= $ortu['nama_ibu'] ?></p>
                                            <p class="col-6 fs-6 fw-bold">Nomor Induk Mahasiswa</p>
                                            <p class="col-6 fs-6">: &nbsp; <?= $ortu['nik_ibu'] ?></p>
                                            <p class="col-6 fs-6 fw-bold">Tanggal Lahir</p>
                                            <p class="col-6 fs-6">: &nbsp; <?= $ortu['tanggal_lahir_ibu'] ?></p>
                                            <p class="col-6 fs-6 fw-bold">Pendidikan</p>
                                            <p class="col-6 fs-6">: &nbsp; <?= $ortu['pendidikan_ibu'] ?></p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Data Wali -->
                                <div class="card mb-3">
                                    <div class="card-header p-3 pb-0">
                                        <h6>Data Wali</h6>
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="row text-dark">
                                            <p class="col-6 fs-6 fw-bold">Nama Lengkap</p>
                                            <p class="col-6 fs-6">: &nbsp; <?= $ortu['nama_wali'] ?></p>
                                            <p class="col-6 fs-6 fw-bold">Nomor Induk Mahasiswa</p>
                                            <p class="col-6 fs-6">: &nbsp; <?= $ortu['nik_wali'] ?></p>
                                            <p class="col-6 fs-6 fw-bold">Tanggal Lahir</p>
                                            <p class="col-6 fs-6">: &nbsp; <?= $ortu['tanggal_lahir_wali'] ?></p>
                                            <p class="col-6 fs-6 fw-bold">Pendidikan</p>
                                            <p class="col-6 fs-6">: &nbsp; <?= $ortu['pendidikan_wali'] ?></p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- Right Content -->
                            <div class="col-12 col-md-8 my-0">

                                <!-- Ayah -->
                                <div class="card mb-3">

                                    <div class="card-body p-3">
                                        <div class="row text-dark">
                                            <p class="col-6 fs-6 fw-bold">Pekerjaan</p>
                                            <p class="col-6 fs-6">: &nbsp; <?= $ortu['pekerjaan_ayah'] ?></p>
                                            <p class="col-6 fs-6 fw-bold">Penghasilan</p>
                                            <p class="col-6 fs-6">: &nbsp; <?= $ortu['penghasilan_ayah'] ?></p>
                                            <p class="col-6 fs-6 fw-bold">Tanggal Lahir</p>
                                            <p class="col-6 fs-6">: &nbsp; <?= $ortu['tanggal_lahir_ayah'] ?></p>
                                            <p class="col-6 fs-6 fw-bold">Pendidikan</p>
                                            <p class="col-6 fs-6">: &nbsp; <?= $ortu['pendidikan_ayah'] ?></p>
                                        </div>
                                    </div>

                                </div>

                                <!-- Ibu -->
                                <div class="card mb-3">

                                    <div class="card-body p-3">
                                        <div class="row text-dark">
                                            <p class="col-6 fs-6 fw-bold">Pekerjaan</p>
                                            <p class="col-6 fs-6">: &nbsp; <?= $ortu['pekerjaan_ibu'] ?></p>
                                            <p class="col-6 fs-6 fw-bold">Penghasilan</p>
                                            <p class="col-6 fs-6">: &nbsp; <?= $ortu['penghasilan_ibu'] ?></p>
                                            <p class="col-6 fs-6 fw-bold">Tanggal Lahir</p>
                                            <p class="col-6 fs-6">: &nbsp; <?= $ortu['tanggal_lahir_ibu'] ?></p>
                                            <p class="col-6 fs-6 fw-bold">Pendidikan</p>
                                            <p class="col-6 fs-6">: &nbsp; <?= $ortu['pendidikan_ibu'] ?></p>
                                        </div>
                                    </div>

                                </div>

                                <!-- Wali -->
                                <div class="card mb-3">
                                    <div class="card-body p-3">
                                        <div class="row text-dark">
                                            <p class="col-6 fs-6 fw-bold">Pekerjaan</p>
                                            <p class="col-6 fs-6">: &nbsp; <?= $ortu['pekerjaan_wali'] ?></p>
                                            <p class="col-6 fs-6 fw-bold">Penghasilan</p>
                                            <p class="col-6 fs-6">: &nbsp; <?= $ortu['penghasilan_wali'] ?></p>
                                            <p class="col-6 fs-6 fw-bold">Tanggal Lahir</p>
                                            <p class="col-6 fs-6">: &nbsp; <?= $ortu['tanggal_lahir_wali'] ?></p>
                                            <p class="col-6 fs-6 fw-bold">Pendidikan</p>
                                            <p class="col-6 fs-6">: &nbsp; <?= $ortu['pendidikan_wali'] ?></p>
                                        </div>
                                    </div>
                                </div>

                                <?php $this->load->view('_partials/footer') ?>
                            </div>