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
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <h5 class="mb-0">Profil Mahasiswa</h5>
                            </div>
                            <div class="col-md-4 text-end">
                                <a href="<?= site_url('mahasiswa/profil/edit/' . $mahasiswa['nim']) ?>" class="btn btn-primary btn-sm">
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
                                    <div class>
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

                    <!-- Orang Tua -->
                    <div class="tab-pane fade" id="orangtua-tab-pane" role="tabpanel" aria-labelledby="orangtua-tab" tabindex="0">

                        <!-- Judul -->
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <h5 class="mb-0">Profil Orang Tua</h5>
                            </div>
                            <div class="col-md-4 text-end">
                                <a href="<?= site_url('mahasiswa/profil/edit/' . $mahasiswa['nim']) ?>" class="btn btn-primary btn-sm">
                                    Edit Profil
                                </a>
                            </div>
                        </div>

                        <div class="row g-3 mt-3">

                            <!-- Left Content -->
                            <div class="col-12 col-md-4 my-0">

                                <!-- AYAH -->
                                <div class="card mb-3">
                                    <div class="card-header p-3 pb-0">
                                        <h6>Data Ayah</h6>
                                    </div>
                                    <div class="card-body p-3 pt-0">

                                        <label>Nama Lengkap</label>
                                        <div class="mb-3">
                                            <input type="text" name="nama" class="form-control" placeholder="-" value="<?= $ortu['nama_ayah'] ?>" readonly>
                                        </div>

                                        <label>Nomor Induk Kependudukan</label>
                                        <div class="mb-3">
                                            <input type="text" name="nik" class="form-control" placeholder="-" value="<?= $ortu['nik_ayah'] ?>" readonly>
                                        </div>

                                        <label>Tanggal Lahir</label>
                                        <div class="mb-3">
                                            <input type="date" name="tanggal_lahir_ayah" class="form-control" placeholder="-" value="<?= $ortu['tanggal_lahir_ayah'] ?>" readonly>
                                        </div>


                                        <label>Pendidikan</label>
                                        <div class>
                                            <input type="text" name="pendidikan_ayah" class="form-control" placeholder="-" value="<?= $ortu['pendidikan_ayah'] ?>" readonly>
                                        </div>

                                    </div>
                                </div>


                                <!-- Data Ibu -->
                                <div class="card mb-3">
                                    <div class="card-header p-3 pb-0">
                                        <h6>Data Ibu</h6>
                                    </div>
                                    <div class="card-body p-3 pt-0">

                                        <label>Nama Lengkap</label>
                                        <div class="mb-3">
                                            <input type="text" name="nama_ibu" class="form-control" placeholder="-" value="<?= $ortu['nama_ibu'] ?>" readonly>
                                        </div>

                                        <label>Nomor Induk Kependudukan</label>
                                        <div class="mb-3">
                                            <input type="text" name="nik_ibu" class="form-control" placeholder="-" value="<?= $ortu['nik_ibu'] ?>" readonly>
                                        </div>

                                        <label>Tanggal Lahir</label>
                                        <div class="mb-3">
                                            <input type="date" name="tanggal_lahir_ibu" class="form-control" placeholder="-" value="<?= $ortu['tanggal_lahir_ibu'] ?>" readonly>
                                        </div>

                                        <label>Pendidikan</label>
                                        <div class="mb-3">
                                            <input type="text" name="pendidikan_ibu" class="form-control" placeholder="-" value="<?= $ortu['pendidikan_ibu'] ?>" readonly>
                                        </div>

                                    </div>
                                </div>

                                <!-- Data Wali -->
                                <div class="card mb-3">
                                    <div class="card-header p-3 pb-0">
                                        <h6>Data Wali</h6>
                                    </div>
                                    <div class="card-body p-3 pt-0">

                                        <label>Nama Lengkap</label>
                                        <div class="mb-3">
                                            <input type="text" name="nama_ibu" class="form-control" placeholder="-" value="<?= $ortu['nama_ibu'] ?>" readonly>
                                        </div>

                                        <label>Nomor Induk Kependudukan</label>
                                        <div class="mb-3">
                                            <input type="text" name="nik_ibu" class="form-control" placeholder="-" value="<?= $ortu['nik_ibu'] ?>" readonly>
                                        </div>

                                        <label>Tanggal Lahir</label>
                                        <div class="mb-3">
                                            <input type="date" name="tanggal_lahir_ibu" class="form-control" placeholder="-" value="<?= $ortu['tanggal_lahir_ibu'] ?>" readonly>
                                        </div>

                                        <label>Pendidikan</label>
                                        <div class="mb-3">
                                            <input type="text" name="pendidikan_ibu" class="form-control" placeholder="-" value="<?= $ortu['pendidikan_ibu'] ?>" readonly>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <!-- Right Content -->
                            <div class="col-12 col-md-8 my-0">

                                <!-- Ayah -->
                                <div class="card mb-3">
                                    <div class="card-body">

                                        <label>Pekerjaan</label>
                                        <div class="mb-3">
                                            <input type="text" name="pekerjaan_ayah" class="form-control" placeholder="-" value="<?= $ortu['pekerjaan_ayah'] ?>" readonly>
                                        </div>

                                        <label>Penghasilan</label>
                                        <div class="mb-3">
                                            <input type="text" name="penghasilan_ayah" class="form-control" placeholder="-" value="<?= $ortu['penghasilan_ayah'] ?>" readonly>
                                        </div>

                                        <label>Penghasilan</label>
                                        <div class="mb-3">
                                            <input type="text" name="penghasilan_ayah" class="form-control" placeholder="-" value="<?= $ortu['penghasilan_ayah'] ?>" readonly>
                                        </div>

                                        <label>Penghasilan</label>
                                        <div class="mb-3">
                                            <input type="text" name="penghasilan_ibu" class="form-control" placeholder="-" value="<?= $ortu['penghasilan_ayah'] ?>" readonly>
                                        </div>

                                    </div>
                                </div>

                                <!-- Ibu -->
                                <div class="card mb-3">
                                    <div class="card-body">

                                        <label>Pendidikan</label>
                                        <div class="mb-3">
                                            <input type="text" name="pendidikan_ibu" class="form-control" placeholder="-" value="<?= $ortu['pendidikan_ibu'] ?>" readonly>
                                        </div>

                                        <label>Pekerjaan</label>
                                        <div class="mb-3">
                                            <input type="text" name="pekerjaan_ibu" class="form-control" placeholder="-" value="<?= $ortu['pekerjaan_ibu'] ?>" readonly>
                                        </div>

                                        <label>Penghasilan</label>
                                        <div class="mb-3">
                                            <input type="text" name="penghasilan_ibu" class="form-control" placeholder="-" value="<?= $ortu['penghasilan_ibu'] ?>" readonly>
                                        </div>

                                        <label>Penghasilan</label>
                                        <div class="mb-3">
                                            <input type="text" name="penghasilan_ibu" class="form-control" placeholder="-" value="<?= $ortu['penghasilan_ibu'] ?>" readonly>
                                        </div>

                                    </div>
                                </div>


                                <!-- Wali -->
                                <div class="card mb-3">
                                    <div class="card-body">

                                        <label>Pendidikan</label>
                                        <div class="mb-3">
                                            <input type="text" name="pendidikan_ibu" class="form-control" placeholder="-" value="<?= $ortu['pendidikan_ibu'] ?>" readonly>
                                        </div>

                                        <label>Pekerjaan</label>
                                        <div class="mb-3">
                                            <input type="text" name="pekerjaan_ibu" class="form-control" placeholder="-" value="<?= $ortu['pekerjaan_ibu'] ?>" readonly>
                                        </div>

                                        <label>Penghasilan</label>
                                        <div class="mb-3">
                                            <input type="text" name="penghasilan_ibu" class="form-control" placeholder="-" value="<?= $ortu['penghasilan_ibu'] ?>" readonly>
                                        </div>

                                        <label>Penghasilan</label>
                                        <div class="mb-3">
                                            <input type="text" name="penghasilan_ibu" class="form-control" placeholder="-" value="<?= $ortu['penghasilan_ibu'] ?>" readonly>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <?php $this->load->view('_partials/footer') ?>
                        </div>