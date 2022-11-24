    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-3">

            <!-- Header -->
            <div class="page-header height-200 border-radius-xl mt-4" style="background-image: url('<?= base_url(); ?>assets/img/uploads/header/<?= $header ?>')">
                <!-- <span class="mask bg-gradient-info opacity-5"></span> -->
            </div>
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

            <!-- Profil -->
            <div class="col-12 my-4">
                <div class="card">

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
                    <div class="card-body p-3">
                        <div class="tab-content" id="myTabContent">

                            <!-- Mahasiswa -->
                            <div class="tab-pane fade show active" id="mahasiswa-tab-pane" role="tabpanel" aria-labelledby="mahasiswa-tab" tabindex="0">

                                <!-- Judul -->
                                <div class="row mb-3">
                                    <div class="col-md-8">
                                        <h5 class="mb-0">Profil Mahasiswa</h5>
                                    </div>
                                    <div class="col-md-4 text-end">
                                        <a href="<?= site_url('mahasiswa/profil/edit/' . $mahasiswa['nim']) ?>">
                                            <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                                        </a>
                                    </div>
                                </div>

                                <!-- Form -->
                                <div class="row">
                                    <div class="col-md-4 col-sm-6">
                                        <label>Nomor Induk Mahasiswa</label>
                                        <div class="mb-3">
                                            <input type="text" name="nim" class="form-control" placeholder="-" value="<?= $mahasiswa['nim'] ?>" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Nama Lengkap</label>
                                        <div class="mb-3">
                                            <input type="text" name="nama" class="form-control" placeholder="-" value="<?= $mahasiswa['nama'] ?>" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Tempat Lahir</label>
                                        <div class="mb-3">
                                            <input type="text" name="tempat_lahir" class="form-control" placeholder="-" value="<?= $mahasiswa['tempat_lahir'] ?>" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Tanggal Lahir</label>
                                        <div class="mb-3">
                                            <input type="date" name="tanggal_lahir" class="form-control" placeholder="-" value="<?= $mahasiswa['tanggal_lahir'] ?>" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Jenis Kelamin</label>
                                        <div class="mb-3">
                                            <?php if ($mahasiswa['jenis_kelamin'] === 'l') : ?>
                                                <input type="text" name="jenis_kelamin" class="form-control" value="Laki-laki" disabled readonly>
                                            <?php elseif ($mahasiswa['jenis_kelamin'] === 'p') : ?>
                                                <input type="text" name="jenis_kelamin" class="form-control" value="Perempuan" disabled readonly>
                                            <?php else : ?>
                                                <input type="text" name="jenis_kelamin" class="form-control" placeholder="-" disabled readonly>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Agama</label>
                                        <div class="mb-3">
                                            <input type="text" name="agama" class="form-control" placeholder="-" value="<?= $mahasiswa['agama'] ?>" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Nomor Handphone</label>
                                        <div class="mb-3">
                                            <input type="text" name="no_hp" class="form-control" placeholder="-" value="<?= $mahasiswa['no_hp'] ?>" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Email</label>
                                        <div class="mb-3">
                                            <input type="email" name="email" class="form-control" placeholder="-" value="<?= $mahasiswa['email'] ?>" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Program Studi</label>
                                        <div class="mb-3">
                                            <?php foreach ($listp as $prodi) : ?>
                                                <?php if ($prodi['id_prodi'] === $mahasiswa['id_prodi']) : ?>
                                                    <input type="text" name="id_prodi" class="form-control" placeholder="-" value="<?= $prodi['nama'] ?>" disabled readonly>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Tahun Angkatan</label>
                                        <div class="mb-3">
                                            <input type="text" name="tahun_angkatan" class="form-control" placeholder="-" value="<?= $mahasiswa['tahun_angkatan'] ?>" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Kewarganegaraan</label>
                                        <div class="mb-3">
                                            <?php if ($mahasiswa['kewarganegaraan'] === 'wni') : ?>
                                                <input type="text" name="kewarganegaraan" class="form-control" value="Warga Negara Indonesia" disabled readonly>
                                            <?php elseif ($mahasiswa['kewarganegaraan'] === 'wna') : ?>
                                                <input type="text" name="kewarganegaraan" class="form-control" value="Warga Negara Asing" disabled readonly>
                                            <?php else : ?>
                                                <input type="text" name="kewarganegaraan" class="form-control" placeholder="-" disabled readonly>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Nomor Induk Kependudukan</label>
                                        <div class="mb-3">
                                            <input type="text" name="nik" class="form-control" placeholder="-" value="<?= $mahasiswa['nik'] ?>" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Alamat Tempat Tinggal</label>
                                        <div class="mb-3">
                                            <input type="text" name="alamat" class="form-control" placeholder="-" value="<?= $mahasiswa['alamat'] ?>" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Desa/Kelurahan</label>
                                        <div class="mb-3">
                                            <input type="text" name="kelurahan" class="form-control" placeholder="-" value="<?= $mahasiswa['kelurahan'] ?>" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Kecamatan</label>
                                        <div class="mb-3">
                                            <input type="text" name="kecamatan" class="form-control" placeholder="-" value="<?= $mahasiswa['kecamatan'] ?>" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Kabupaten/Kota</label>
                                        <div class="mb-3">
                                            <input type="text" name="kabupaten" class="form-control" placeholder="-" value="<?= $mahasiswa['kabupaten'] ?>" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Provinsi</label>
                                        <div class="mb-3">
                                            <input type="text" name="provinsi" class="form-control" placeholder="-" value="<?= $mahasiswa['provinsi'] ?>" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Kode Pos</label>
                                        <div class="mb-3">
                                            <input type="text" name="kode_pos" class="form-control" placeholder="-" value="<?= $mahasiswa['kode_pos'] ?>" disabled readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Orang Tua -->
                            <div class="tab-pane fade" id="orangtua-tab-pane" role="tabpanel" aria-labelledby="orangtua-tab" tabindex="0">

                                <!-- Judul -->
                                <div class="row mb-3">
                                    <div class="col-md-8">
                                        <h5 class="mb-0">Profil Orang Tua/Wali</h5>
                                    </div>
                                    <div class="col-md-4 text-end">
                                        <a href="<?= site_url('mahasiswa/profil/edit') ?>">
                                            <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                                        </a>
                                    </div>
                                </div>

                                <!-- Form -->
                                <div class="row">

                                    <!-- Ayah -->
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <h6>Data Ayah</h6>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Nomor Induk Kependudukan</label>
                                        <div class="mb-3">
                                            <input type="text" name="nik_ayah" class="form-control" placeholder="-" value="<?= $ortu['nik_ayah'] ?>" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Nama Lengkap</label>
                                        <div class="mb-3">
                                            <input type="text" name="nama_ayah" class="form-control" placeholder="-" value="<?= $ortu['nama_ayah'] ?>" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Tanggal Lahir</label>
                                        <div class="mb-3">
                                            <input type="date" name="tanggal_lahir_ayah" class="form-control" placeholder="-" value="<?= $ortu['tanggal_lahir_ayah'] ?>" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Pendidikan</label>
                                        <div class="mb-3">
                                            <input type="text" name="pendidikan_ayah" class="form-control" placeholder="-" value="<?= $ortu['pendidikan_ayah'] ?>" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Pekerjaan</label>
                                        <div class="mb-3">
                                            <input type="text" name="pekerjaan_ayah" class="form-control" placeholder="-" value="<?= $ortu['pekerjaan_ayah'] ?>" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Penghasilan</label>
                                        <div class="mb-3">
                                            <input type="text" name="penghasilan_ayah" class="form-control" placeholder="-" value="<?= $ortu['penghasilan_ayah'] ?>" disabled readonly>
                                        </div>
                                    </div>

                                    <!-- Ibu -->
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <hr class="horizontal dark">
                                            <h6>Data Ibu</h6>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Nomor Induk Kependudukan</label>
                                        <div class="mb-3">
                                            <input type="text" name="nik_ibu" class="form-control" placeholder="-" value="<?= $ortu['nik_ibu'] ?>" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Nama Lengkap</label>
                                        <div class="mb-3">
                                            <input type="text" name="nama_ibu" class="form-control" placeholder="-" value="<?= $ortu['nama_ibu'] ?>" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Tanggal Lahir</label>
                                        <div class="mb-3">
                                            <input type="date" name="tanggal_lahir_ibu" class="form-control" placeholder="-" value="<?= $ortu['tanggal_lahir_ibu'] ?>" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Pendidikan</label>
                                        <div class="mb-3">
                                            <input type="text" name="pendidikan_ibu" class="form-control" placeholder="-" value="<?= $ortu['pendidikan_ibu'] ?>" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Pekerjaan</label>
                                        <div class="mb-3">
                                            <input type="text" name="pekerjaan_ibu" class="form-control" placeholder="-" value="<?= $ortu['pekerjaan_ibu'] ?>" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Penghasilan</label>
                                        <div class="mb-3">
                                            <input type="text" name="penghasilan_ibu" class="form-control" placeholder="-" value="<?= $ortu['penghasilan_ibu'] ?>" disabled readonly>
                                        </div>
                                    </div>

                                    <!-- Wali -->
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <hr class="horizontal dark">
                                            <h6>Data Wali</h6>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Nomor Induk Kependudukan</label>
                                        <div class="mb-3">
                                            <input type="text" name="nik_wali" class="form-control" placeholder="-" value="<?= $ortu['nik_wali'] ?>" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Nama Lengkap</label>
                                        <div class="mb-3">
                                            <input type="text" name="nama_wali" class="form-control" placeholder="-" value="<?= $ortu['nama_wali'] ?>" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Tanggal Lahir</label>
                                        <div class="mb-3">
                                            <input type="date" name="tanggal_lahir_wali" class="form-control" placeholder="-" value="<?= $ortu['tanggal_lahir_wali'] ?>" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Pendidikan</label>
                                        <div class="mb-3">
                                            <input type="text" name="pendidikan_wali" class="form-control" placeholder="-" value="<?= $ortu['pendidikan_wali'] ?>" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Pekerjaan</label>
                                        <div class="mb-3">
                                            <input type="text" name="pekerjaan_wali" class="form-control" placeholder="-" value="<?= $ortu['pekerjaan_wali'] ?>" disabled readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <label>Penghasilan</label>
                                        <div class="mb-3">
                                            <input type="text" name="penghasilan_wali" class="form-control" placeholder="-" value="<?= $ortu['penghasilan_wali'] ?>" disabled readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="footer py-3">

            <!-- Logo Medsos -->
            <div class="container mx-auto text-center my-2">
                <a href="https://www.youtube.com/channel/UCdo5vics8bEFAd9h6aghLYQ" target="_blank" class="text-secondary mx-3">
                    <i class="text-lg fa-brands fa-youtube"></i>
                </a>
                <a href="https://id-id.facebook.com/universitasmuhammadiyahbandung" target="_blank" class="text-secondary mx-3">
                    <i class="text-lg fa-brands fa-facebook"></i>
                </a>
                <a href="https://www.instagram.com/umbandung" target="_blank" class="text-secondary mx-3">
                    <i class="text-lg fa-brands fa-instagram"></i>
                </a>
                <a href="https://www.twitter.com/umbandung" target="_blank" class="text-secondary mx-3">
                    <i class="text-lg fa-brands fa-twitter"></i>
                </a>
                <a href="https://www.tiktok.com/@umbandung" target="_blank" class="text-secondary mx-3">
                    <i class="text-lg fa-brands fa-tiktok"></i>
                </a>
            </div>

            <!-- Copyright -->
            <div class="container mx-auto text-center">
                <p class="mb-0 text-secondary text-xs">
                    Copyright ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script> Universitas Muhammadiyah Bandung. All Rights Reserved.
                </p>
            </div>
        </footer>
    </div>