    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid py-3">

            <!-- Header -->
            <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('<?= base_url(); ?>assets/img/gedungdash.jpg'); background-position-y: 100%;">
                <span class="mask bg-gradient-info opacity-5"></span>
            </div>
            <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
                <div class="d-flex justify-content-between">
                    <div class="row gx-4">
                        <div class="col-auto">
                            <div class="avatar avatar-xl position-relative">
                                <img src="<?= base_url(); ?>assets/img/mahalini.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                            </div>
                        </div>
                        <div class="col-auto my-auto">
                            <div class="h-100">
                                <h5 class="mb-1"><?= $prodi['nama'] ?></h5>
                                <p class="mb-0 font-weight-bold text-sm"><?= $prodi['id_prodi'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex d-inline ms-auto">
                        <p class="mx-2">Mahasiswa Aktif</p>
                        <p class="mx-2">Dosen Prodi</p>
                    </div>
                </div>
            </div>

            <!-- Profil -->
            <div class="col-12 mb-md-0 my-4">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-0">Profil Dosen</h6>
                            </div>

                            <div class="col-md-4 text-end">
                                <a href="<?= site_url('prodi/profile/edit/' . $prodi['id_prodi']) ?>">
                                    <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                                </a>
                            </div>
                            <div class="avatar avatar-xxl position-relative">
                                <img src="<?= base_url(); ?>assets/img/mahalini.jpg" alt="profile_image" class="w-300 border-radius-lg shadow-sm">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nomor Induk Kependudukan</label>
                                    <div class="mb-3">
                                        <input type="text" name="nik" class="form-control-plaintext ms-1" placeholder="-" value="<?= $dosen['nik'] ?>" disabled readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Nama Lengkap</label>
                                    <div class="mb-3">
                                        <input type="text" name="nama" class="form-control-plaintext ms-1" placeholder="-" value="<?= $dosen['nama'] ?>" disabled readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Tempat Lahir</label>
                                    <div class="mb-3">
                                        <input type="text" name="tempat_lahir" class="form-control-plaintext ms-1" placeholder="-" value="<?= $dosen['tempat_lahir'] ?>" disabled readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Tanggal Lahir</label>
                                    <div class="mb-3">
                                        <input type="date" name="tanggal_lahir" class="form-control-plaintext ms-1" placeholder="-" value="<?= $dosen['tanggal_lahir'] ?>" disabled readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Jenis Kelamin</label>
                                    <div class="mb-3">
                                        <?php if ($dosen['jenis_kelamin'] === 'l') : ?>
                                            <input type="text" name="jenis_kelamin" class="form-control-plaintext ms-1" value="Laki-laki" disabled readonly>
                                        <?php elseif ($dosen['jenis_kelamin'] === 'p') : ?>
                                            <input type="text" name="jenis_kelamin" class="form-control-plaintext ms-1" value="Perempuan" disabled readonly>
                                        <?php else : ?>
                                            <input type="text" name="jenis_kelamin" class="form-control-plaintext ms-1" placeholder="-" disabled readonly>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Agama</label>
                                    <div class="mb-3">
                                        <input type="text" name="agama" class="form-control-plaintext ms-1" placeholder="-" value="<?= $dosen['agama'] ?>" disabled readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Nomor Handphone</label>
                                    <div class="mb-3">
                                        <input type="text" name="no_hp" class="form-control-plaintext ms-1" placeholder="-" value="<?= $dosen['no_hp'] ?>" disabled readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Email</label>
                                    <div class="mb-3">
                                        <input type="email" name="email" class="form-control-plaintext ms-1" placeholder="-" value="<?= $dosen['email'] ?>" disabled readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Program Studi</label>
                                    <div class="mb-3">
                                        <?php foreach ($listp as $prodi) : ?>
                                            <?php if ($prodi['id_prodi'] === $dosen['id_prodi']) : ?>
                                                <input type="text" name="id_prodi" class="form-control-plaintext ms-1" placeholder="-" value="<?= $prodi['nama'] ?>" disabled readonly>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Kewarganegaraan</label>
                                    <div class="mb-3">
                                        <?php if ($dosen['kewarganegaraan'] === 'wni') : ?>
                                            <input type="text" name="kewarganegaraan" class="form-control-plaintext ms-1" value="Warga Negara Indonesia" disabled readonly>
                                        <?php elseif ($dosen['kewarganegaraan'] === 'wna') : ?>
                                            <input type="text" name="kewarganegaraan" class="form-control-plaintext ms-1" value="Warga Negara Asing" disabled readonly>
                                        <?php else : ?>
                                            <input type="text" name="kewarganegaraan" class="form-control-plaintext ms-1" placeholder="-" disabled readonly>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Alamat Tempat Tinggal</label>
                                    <div class="mb-3">
                                        <input type="text" name="alamat" class="form-control-plaintext ms-1" placeholder="-" value="<?= $dosen['alamat'] ?>" disabled readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Nomor Induk Dosen</label>
                                    <div class="mb-3">
                                        <input type="text" name="nidn_dosen" class="form-control-plaintext ms-1" placeholder="-" value="<?= $dosen['nidn_dosen'] ?>" disabled readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Status Dosen</label>
                                    <div class="mb-3">
                                        <input type="text" name="status_dosen" class="form-control-plaintext ms-1" placeholder="-" value="<?= $dosen['status_dosen'] ?>" disabled readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Status Kerja</label>
                                    <div class="mb-3">
                                        <input type="text" name="status_dosen" class="form-control-plaintext ms-1" placeholder="-" value="<?= $dosen['status_kerja'] ?>" disabled readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="footer py-3">

            <!-- Logo Medsos -->
            <div class="col-lg-8 mx-auto text-center my-2">
                <a href="https://www.youtube.com/channel/UCdo5vics8bEFAd9h6aghLYQ" target="_blank" class="text-secondary me-xl-4 me-4">
                    <i class="text-lg fa-brands fa-youtube"></i>
                </a>
                <a href="https://id-id.facebook.com/universitasmuhammadiyahbandung" target="_blank" class="text-secondary me-xl-4 me-4">
                    <i class="text-lg fa-brands fa-facebook"></i>
                </a>
                <a href="https://www.instagram.com/umbandung" target="_blank" class="text-secondary me-xl-4 me-4">
                    <i class="text-lg fa-brands fa-instagram"></i>
                </a>
                <a href="https://www.twitter.com/umbandung" target="_blank" class="text-secondary me-xl-4 me-4">
                    <i class="text-lg fa-brands fa-twitter"></i>
                </a>
                <a href="https://www.tiktok.com/@umbandung" target="_blank" class="text-secondary me-xl-4 me-4">
                    <i class="text-lg fa-brands fa-tiktok"></i>
                </a>
            </div>

            <!-- Copyright -->
            <div class="col-lg-8 mx-auto text-center">
                <p class="mb-0 text-secondary">
                    Copyright ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script> Universitas Muhammadiyah Bandung. All Rights Reserved.
                </p>
            </div>
        </footer>
    </div>