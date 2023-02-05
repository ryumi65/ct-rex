    <?php
    if (isset($_SESSION['updatesuccess'])) {
        echo "<script>
            alert('Edit biodata berhasil!');
        </script>";
        unset($_SESSION['updatesuccess']);
    } ?>

    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-6 pt-xl-0">

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

            <div class="card-header p-3">

                <!-- Judul -->
                <div class="row mb-3">
                    <div class="col-md-8">
                        <h5 class="mb-0">Profil Anda</h5>
                    </div>
                    <div class="col-md-4 text-end">
                        <a href="<?= site_url('dosen/profil/edit/' . $dosen['nik']) ?>" class="btn btn-primary btn-sm">
                            Edit Profil
                        </a>
                    </div>
                </div>

                <div class="row g-3 mt-3">

                    <!-- Left Content -->
                    <div class="col-12 col-md-4 my-0">

                        <!-- Pertama -->
                        <div class="card mb-3">
                            <div class="card-body">

                                <label>Nama Lengkap</label>
                                <div class="mb-3">
                                    <input type="text" name="nama" class="form-control" placeholder="-" value="<?= $dosen['nama'] ?>" readonly>
                                </div>

                                <label>Nomor Induk Kependudukan</label>
                                <div class="mb-3">
                                    <input type="text" name="nim" class="form-control" placeholder="-" value="<?= $dosen['nik'] ?>" readonly>
                                </div>

                                <label>Tempat Lahir</label>
                                <div class="mb-3">
                                    <input type="text" name="tempat_lahir" class="form-control" placeholder="-" value="<?= $dosen['tempat_lahir'] ?>" readonly>
                                </div>


                                <label>Tanggal Lahir</label>
                                <div class>
                                    <input type="date" name="tanggal_lahir" class="form-control" placeholder="-" value="<?= $dosen['tanggal_lahir'] ?>" readonly>
                                </div>

                            </div>
                        </div>

                        <!-- Kedua -->
                        <div class="card mb-3">
                            <div class="card-body">

                                <label>Jenis Kelamin</label>
                                <div class="mb-3">
                                    <?php if ($dosen['jenis_kelamin'] === 'L') : ?>
                                        <input type="text" name="jenis_kelamin" class="form-control" value="Laki-laki" readonly>
                                    <?php elseif ($dosen['jenis_kelamin'] === 'P') : ?>
                                        <input type="text" name="jenis_kelamin" class="form-control" value="Perempuan" readonly>
                                    <?php else : ?>
                                        <input type="text" name="jenis_kelamin" class="form-control" placeholder="-" readonly>
                                    <?php endif ?>
                                </div>

                                <label>Agama</label>
                                <div class="mb-3">
                                    <input type="text" name="agama" class="form-control" placeholder="-" value="<?= $dosen['agama'] ?>" readonly>
                                </div>

                                <label>Nomor Handphone</label>
                                <div class="mb-3">
                                    <input type="text" name="no_hp" class="form-control" placeholder="-" value="<?= $dosen['no_hp'] ?>" readonly>
                                </div>

                                <label>Email</label>
                                <div class="mb-3">
                                    <input type="email" name="email" class="form-control" placeholder="-" value="<?= $dosen['email'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Content -->
                    <div class="col-12 col-md-8 my-0">

                        <!-- Pertama -->
                        <div class="card mb-3">
                            <div class="card-body">

                                <label>Program Studi</label>
                                <div class="mb-3">
                                    <?php foreach ($listp as $prodi) : ?>
                                        <?php if ($prodi['id_prodi'] === $dosen['id_prodi']) : ?>
                                            <input type="text" name="id_prodi" class="form-control" placeholder="-" value="<?= $prodi['nama'] ?>" readonly>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </div>


                                <label>Kewarganegaraan</label>
                                <div class="mb-3">
                                    <?php if ($dosen['kewarganegaraan'] === 'WNI') : ?>
                                        <input type="text" name="kewarganegaraan" class="form-control" value="Warga Negara Indonesia" readonly>
                                    <?php elseif ($dosen['kewarganegaraan'] === 'WNA') : ?>
                                        <input type="text" name="kewarganegaraan" class="form-control" value="Warga Negara Asing" readonly>
                                    <?php else : ?>
                                        <input type="text" name="kewarganegaraan" class="form-control" placeholder="-" readonly>
                                    <?php endif ?>
                                </div>

                                <label>Nomor Induk Dosen</label>
                                <div class="mb-3">
                                    <input type="text" name="nidn_dosen" class="form-control" placeholder="-" value="<?= $dosen['nidn_dosen'] ?>" readonly>
                                </div>

                                <label>Alamat Tempat Tinggal</label>
                                <div class="mb-3">
                                    <input type="text" name="alamat" class="form-control" placeholder="-" value="<?= $dosen['alamat'] ?>" readonly>
                                </div>


                            </div>
                        </div>

                        <!-- Kedua -->
                        <div class="card mb-3">
                            <div class="card-body">

                                <label>Status Dosen</label>
                                <div class="mb-3">
                                    <input type="text" name="status_dosen" class="form-control" placeholder="-" value="<?= $dosen['status_dosen'] ?>" readonly>
                                </div>


                                <label>Status Kerja</label>
                                <div class="mb-3">
                                    <input type="text" name="status_dosen" class="form-control" placeholder="-" value="<?= $dosen['status_kerja'] ?>" readonly>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php $this->load->view('_partials/footer') ?>
        </div>