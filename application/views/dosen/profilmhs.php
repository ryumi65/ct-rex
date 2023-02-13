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

            <!-- Profil -->
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-header p-3 pb-0">
                        <h5 class="mb-0">Profil <?= $mahasiswa['nama'] ?></h5>
                    </div>
                    <div class="card-body p-3 pt-0">
                        <div class="avatar avatar-xxl position-relative">
                            <img src="<?= base_url('assets/img/uploads/profile/curved.jpg') ?>" alt="profile_image" class="w-300 border-radius-lg shadow-sm">
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <label>Nomor Induk Mahasiswa</label>
                                <div class="mb-3">
                                    <input type="text" name="nim" class="form-control" placeholder="-" value="<?= $mahasiswa['nim'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Nama Lengkap</label>
                                <div class="mb-3">
                                    <input type="text" name="nama" class="form-control" placeholder="-" value="<?= $mahasiswa['nama'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Tempat Lahir</label>
                                <div class="mb-3">
                                    <input type="text" name="tempat_lahir" class="form-control" placeholder="-" value="<?= $mahasiswa['tempat_lahir'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Tanggal Lahir</label>
                                <div class="mb-3">
                                    <input type="date" name="tanggal_lahir" class="form-control" placeholder="-" value="<?= $mahasiswa['tanggal_lahir'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kedua -->
                    <div class="card mb-3 my-6">
                        <div class="card-header p-3">
                            <h4>Nama</h4>
                        </div>
                        <div class="card-body p-3 pt-0">
                            <div class="row text-dark">
                                <p class="col-6 fs-6 fw-bold">Jenis Kelamin</p>
                                <p class="col-6 fs-6">: &nbsp;
                                    <?php if ($mahasiswa['jenis_kelamin'] === 'L') : ?>
                                        <input type="text" name="jenis_kelamin" class="form-control" value="Laki-laki" readonly>
                                    <?php elseif ($mahasiswa['jenis_kelamin'] === 'P') : ?>
                                        <input type="text" name="jenis_kelamin" class="form-control" value="Perempuan" readonly>
                                    <?php else : ?>
                                        <input type="text" name="jenis_kelamin" class="form-control" placeholder="-" readonly>
                                    <?php endif ?>
                                </p>
                                <hr class="bg-dark">
                                <p class="col-6 fs-6 fw-bold">Agama</p>
                                <p class="col-6 fs-6">: &nbsp; <?= $mahasiswa['agama'] ?></p>
                                <hr class="bg-dark">
                                <p class="col-6 fs-6 fw-bold">Nomer Handphone</p>
                                <p class="col-6 fs-6">: &nbsp; <?= $mahasiswa['no_hp'] ?></p>
                                <hr class="bg-dark">
                                <p class="col-6 fs-6 fw-bold">Email</p>
                                <p class="col-6 fs-6">: &nbsp; <?= $mahasiswa['email'] ?></p>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Agama</label>
                                <div class="mb-3">
                                    <input type="text" name="agama" class="form-control" placeholder="-" value="<?= $mahasiswa['agama'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Nomor Handphone</label>
                                <div class="mb-3">
                                    <input type="text" name="no_hp" class="form-control" placeholder="-" value="<?= $mahasiswa['no_hp'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Email</label>
                                <div class="mb-3">
                                    <input type="email" name="email" class="form-control" placeholder="-" value="<?= $mahasiswa['email'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Program Studi</label>
                                <div class="mb-3">
                                    <?php foreach ($listp as $prodi) : ?>
                                        <?php if ($prodi['id_prodi'] === $mahasiswa['id_prodi']) : ?>
                                            <input type="text" name="id_prodi" class="form-control" placeholder="-" value="<?= $prodi['nama'] ?>" readonly>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </p>
                                <hr class="bg-dark">
                                <p class="col-6 fs-6 fw-bold">Tahun Angkatan</p>
                                <p class="col-6 fs-6">: &nbsp; <?= $mahasiswa['tahun_angkatan'] ?></p>
                                <hr class="bg-dark">
                                <p class="col-6 fs-6 fw-bold">Kewarganegaraan</p>
                                <p class="col-6 fs-6">: &nbsp;
                                    <?php if ($mahasiswa['kewarganegaraan'] === 'WNI') : ?>
                                        <input type="text" name="kewarganegaraan" class="form-control" value="Warga Negara Indonesia" readonly>
                                    <?php elseif ($mahasiswa['kewarganegaraan'] === 'WNA') : ?>
                                        <input type="text" name="kewarganegaraan" class="form-control" value="Warga Negara Asing" readonly>
                                    <?php else : ?>
                                        <input type="text" name="kewarganegaraan" class="form-control" placeholder="-" readonly>
                                    <?php endif ?>
                                </p>
                                <hr class="bg-dark">
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
                                <hr class="bg-dark">
                                <p class="col-6 fs-6 fw-bold">Desa/Kelurahan</p>
                                <p class="col-6 fs-6">: &nbsp; <?= $mahasiswa['kelurahan'] ?></p>
                                <hr class="bg-dark">
                                <p class="col-6 fs-6 fw-bold">Kecamatan</p>
                                <p class="col-6 fs-6">: &nbsp; <?= $mahasiswa['kecamatan'] ?></p>
                                <hr class="bg-dark">
                                <p class="col-6 fs-6 fw-bold">Kabupaten/Kota</p>
                                <p class="col-6 fs-6">: &nbsp; <?= $mahasiswa['kabupaten'] ?></p>
                                <hr class="bg-dark">
                                <p class="col-6 fs-6 fw-bold">Provinsi</p>
                                <p class="col-6 fs-6">: &nbsp; <?= $mahasiswa['provinsi'] ?></p>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Alamat Tempat Tinggal</label>
                                <div class="mb-3">
                                    <input type="text" name="alamat" class="form-control" placeholder="-" value="<?= $mahasiswa['alamat'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Desa/Kelurahan</label>
                                <div class="mb-3">
                                    <input type="text" name="kelurahan" class="form-control" placeholder="-" value="<?= $mahasiswa['kelurahan'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Kecamatan</label>
                                <div class="mb-3">
                                    <input type="text" name="kecamatan" class="form-control" placeholder="-" value="<?= $mahasiswa['kecamatan'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Kabupaten/Kota</label>
                                <div class="mb-3">
                                    <input type="text" name="kabupaten" class="form-control" placeholder="-" value="<?= $mahasiswa['kabupaten'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Provinsi</label>
                                <div class="mb-3">
                                    <input type="text" name="provinsi" class="form-control" placeholder="-" value="<?= $mahasiswa['provinsi'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Kode Pos</label>
                                <div class="mb-3">
                                    <input type="text" name="kode_pos" class="form-control" placeholder="-" value="<?= $mahasiswa['kode_pos'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('_partials/footer') ?>
    </div>