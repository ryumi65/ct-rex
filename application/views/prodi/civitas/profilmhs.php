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

            <!-- Profil -->
            <div class="card-header p-0">


                <!-- Mahasiswa -->
                <div class="tab-pane fade show active" id="mahasiswa-tab-pane" role="tabpanel" aria-labelledby="mahasiswa-tab" tabindex="0">


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
                        <div class="col-12 col-md-4 my-0">

                            <!-- Pertama -->
                            <div class="card mb-3">
                                <div class="card-body">

                                    <label>Nama Lengkap</label>
                                    <div class="mb-3">
                                        <input type="text" name="nama" class="form-control" placeholder="-" value="<?= $mahasiswa['nama'] ?>" readonly>
                                    </div>

                                    <label>Nomor Induk Mahasiswa</label>
                                    <div class="mb-3">
                                        <input type="text" name="nim" class="form-control" placeholder="-" value="<?= $mahasiswa['nim'] ?>" readonly>
                                    </div>

                                    <label>Tempat Lahir</label>
                                    <div class="mb-3">
                                        <input type="text" name="tempat_lahir" class="form-control" placeholder="-" value="<?= $mahasiswa['tempat_lahir'] ?>" readonly>
                                    </div>


                                    <label>Tanggal Lahir</label>
                                    <div class>
                                        <input type="date" name="tanggal_lahir" class="form-control" placeholder="-" value="<?= $mahasiswa['tanggal_lahir'] ?>" readonly>
                                    </div>

                                </div>
                            </div>

                            <!-- Kedua -->
                            <div class="card mb-3">
                                <div class="card-body">

                                    <label>Jenis Kelamin</label>
                                    <div class="mb-3">
                                        <?php if ($mahasiswa['jenis_kelamin'] === 'L') : ?>
                                            <input type="text" name="jenis_kelamin" class="form-control" value="Laki-laki" readonly>
                                        <?php elseif ($mahasiswa['jenis_kelamin'] === 'P') : ?>
                                            <input type="text" name="jenis_kelamin" class="form-control" value="Perempuan" readonly>
                                        <?php else : ?>
                                            <input type="text" name="jenis_kelamin" class="form-control" placeholder="-" readonly>
                                        <?php endif ?>
                                    </div>

                                    <label>Agama</label>
                                    <div class="mb-3">
                                        <input type="text" name="agama" class="form-control" placeholder="-" value="<?= $mahasiswa['agama'] ?>" readonly>
                                    </div>

                                    <label>Nomor Handphone</label>
                                    <div class="mb-3">
                                        <input type="text" name="no_hp" class="form-control" placeholder="-" value="<?= $mahasiswa['no_hp'] ?>" readonly>
                                    </div>

                                    <label>Email</label>
                                    <div class="mb-3">
                                        <input type="email" name="email" class="form-control" placeholder="-" value="<?= $mahasiswa['email'] ?>" readonly>
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
                                            <?php if ($prodi['id_prodi'] === $mahasiswa['id_prodi']) : ?>
                                                <input type="text" name="id_prodi" class="form-control" placeholder="-" value="<?= $prodi['nama'] ?>" readonly>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </div>


                                    <label>Tahun Angkatan</label>
                                    <div class="mb-3">
                                        <input type="text" name="tahun_angkatan" class="form-control" placeholder="-" value="<?= $mahasiswa['tahun_angkatan'] ?>" readonly>
                                    </div>


                                    <label>Kewarganegaraan</label>
                                    <div class="mb-3">
                                        <?php if ($mahasiswa['kewarganegaraan'] === 'WNI') : ?>
                                            <input type="text" name="kewarganegaraan" class="form-control" value="Warga Negara Indonesia" readonly>
                                        <?php elseif ($mahasiswa['kewarganegaraan'] === 'WNA') : ?>
                                            <input type="text" name="kewarganegaraan" class="form-control" value="Warga Negara Asing" readonly>
                                        <?php else : ?>
                                            <input type="text" name="kewarganegaraan" class="form-control" placeholder="-" readonly>
                                        <?php endif ?>
                                    </div>


                                    <label>Nomor Induk Kependudukan</label>
                                    <div class="mb-3">
                                        <input type="text" name="nik" class="form-control" placeholder="-" value="<?= $mahasiswa['nik'] ?>" readonly>
                                    </div>

                                </div>
                            </div>

                            <!-- Kedua -->
                            <div class="card mb-3">
                                <div class="card-body">

                                    <label>Program Studi</label>
                                    <div class="mb-3">
                                        <?php foreach ($listp as $prodi) : ?>
                                            <?php if ($prodi['id_prodi'] === $mahasiswa['id_prodi']) : ?>
                                                <input type="text" name="id_prodi" class="form-control" placeholder="-" value="<?= $prodi['nama'] ?>" readonly>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </div>


                                    <label>Tahun Angkatan</label>
                                    <div class="mb-3">
                                        <input type="text" name="tahun_angkatan" class="form-control" placeholder="-" value="<?= $mahasiswa['tahun_angkatan'] ?>" readonly>
                                    </div>


                                    <label>Kewarganegaraan</label>
                                    <div class="mb-3">
                                        <?php if ($mahasiswa['kewarganegaraan'] === 'WNI') : ?>
                                            <input type="text" name="kewarganegaraan" class="form-control" value="Warga Negara Indonesia" readonly>
                                        <?php elseif ($mahasiswa['kewarganegaraan'] === 'WNA') : ?>
                                            <input type="text" name="kewarganegaraan" class="form-control" value="Warga Negara Asing" readonly>
                                        <?php else : ?>
                                            <input type="text" name="kewarganegaraan" class="form-control" placeholder="-" readonly>
                                        <?php endif ?>
                                    </div>


                                    <label>Nomor Induk Kependudukan</label>
                                    <div class="mb-3">
                                        <input type="text" name="nik" class="form-control" placeholder="-" value="<?= $mahasiswa['nik'] ?>" readonly>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Ketiga -->
                        <div class="card mb-3">
                            <div class="card-body">

                                <label>Alamat Tempat Tinggal</label>
                                <div class="mb-3">
                                    <input type="text" name="alamat" class="form-control" placeholder="Alamat Tempat Tinggal" value="<?= $mahasiswa['alamat'] ?> " readonly>
                                </div>


                                <label>Desa/Kelurahan</label>
                                <div class="mb-3">
                                    <input type="text" name="kelurahan" class="form-control" placeholder="Desa/Kelurahan" value="<?= $mahasiswa['kelurahan'] ?>" readonly>
                                </div>


                                <label>Kecamatan</label>
                                <div class="mb-3">
                                    <input type="text" name="kecamatan" class="form-control" placeholder="Kecamatan" value="<?= $mahasiswa['kecamatan'] ?>" readonly>
                                </div>

                                <label>Kabupaten/Kota</label>
                                <div class="mb-3">
                                    <input type="text" name="kabupaten" class="form-control" placeholder="Kabupaten/Kota" value="<?= $mahasiswa['kabupaten'] ?>" readonly>
                                </div>


                                <label>Provinsi</label>
                                <div class="mb-3">
                                    <input type="text" name="provinsi" class="form-control" placeholder="Provinsi" value="<?= $mahasiswa['provinsi'] ?>" readonly>
                                </div>


                                <label>Kode Pos</label>
                                <div class="mb-3">
                                    <input type="text" name="kode_pos" class="form-control" placeholder="Kode Pos" value="<?= $mahasiswa['kode_pos'] ?>" readonly>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <?php $this->load->view('_partials/footer') ?>
            </div>
        </div>
    </div>