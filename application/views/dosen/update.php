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
                                <img src="<?= base_url(); ?>assets/img/curved-images/curved10.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                            </div>
                        </div>
                        <div class="col-auto my-auto">
                            <div class="h-100">
                                <h5 class="mb-1"><?= $dosen['nama'] ?></h5>
                                <p class="mb-0 font-weight-bold text-sm"><?= $dosen['nik'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profil -->
            <div class="col-12 my-4">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <h5 class="mb-0">Edit Profil</h5>
                    </div>
                    <div class="card-body p-3">
                        <?= validation_errors() ?>
                        <?= form_open('dosen/update') ?>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Nomor Induk Kependudukan</label>
                                <div class="mb-3">
                                    <input type="text" name="nik" class="form-control" placeholder="NIK" value="<?= $dosen['nik'] ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Nama Lengkap</label>
                                <div class="mb-3">
                                    <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?= $dosen['nama'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Tempat Lahir</label>
                                <div class="mb-3">
                                    <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" value="<?= $dosen['tempat_lahir'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Tanggal Lahir</label>
                                <div class="mb-3">
                                    <input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" value="<?= $dosen['tanggal_lahir'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Jenis Kelamin</label>
                                <div class="mb-3">
                                    <select class="form-select" name="jenis_kelamin" required>
                                        <option selected disabled>Pilih Jenis Kelamin</option>
                                        <?php if ($dosen['jenis_kelamin'] === 'l') : ?>
                                            <option selected value="l">Laki-laki</option>
                                            <option value="p">Perempuan</option>
                                        <?php else : ?>
                                            <option value="l">Laki-laki</option>
                                            <option selected value="p">Perempuan</option>
                                        <?php endif ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Agama</label>
                                <div class="mb-3">
                                    <input type="text" name="agama" class="form-control" placeholder="Agama" value="<?= $dosen['agama'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Nomor Handphone</label>
                                <div class="mb-3">
                                    <input type="text" name="no_hp" class="form-control" placeholder="Nomor Handphone" value="<?= $dosen['no_hp'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Email</label>
                                <div class="mb-3">
                                    <input type="email" name="email" class="form-control" placeholder="Email" value="<?= $dosen['email'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Program Studi</label>
                                <div class="mb-3">
                                    <select class="form-select" name="id_prodi" disabled>
                                        <option selected disabled>Pilih Program Studi</option>
                                        <?php foreach ($listp as $prodi) : ?>
                                            <?php if ($prodi['id_prodi'] === $dosen['id_prodi']) : ?>
                                                <option selected value="<?= $prodi['id_prodi'] ?>">
                                                    <?= $prodi['nama'] ?>
                                                </option>
                                            <?php else : ?>
                                                <option value="<?= $prodi['id_prodi'] ?>">
                                                    <?= $prodi['nama'] ?>
                                                </option>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Kewarganegaraan</label>
                                <div class="mb-3">
                                    <select class="form-select" name="kewarganegaraan" required>
                                        <option selected disabled>Pilih Kewarganegaraan</option>
                                        <?php if ($dosen['kewarganegaraan'] === 'wni') : ?>
                                            <option selected value="wni">Warga Negara Indonesia</option>
                                            <option value="wna">Warga Negara Asing</option>
                                        <?php else : ?>
                                            <option value="wni">Warga Negara Indonesia</option>
                                            <option selected value="wna">Warga Negara Asing</option>
                                        <?php endif ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Alamat Tempat Tinggal</label>
                                <div class="mb-3">
                                    <input type="text" name="alamat" class="form-control" placeholder="Alamat Tempat Tinggal" value="<?= $dosen['alamat'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Nomor Induk Dosen</label>
                                <div class="mb-3">
                                    <input type="text" name="nidn_dosen" class="form-control" placeholder="Nomor Induk Dosen" value="<?= $dosen['nidn_dosen'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Status Dosen</label>
                                <div class="mb-3">
                                    <input type="text" name="status_dosen" class="form-control" placeholder="Status Dosen" value="<?= $dosen['status_dosen'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Status Kerja</label>
                                <div class="mb-3">
                                    <input type="text" name="status_kerja" class="form-control" placeholder="Status Kerja" value="<?= $dosen['status_kerja'] ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary mt-4 mb-0">Simpan</button>
                        </div>
                        </form>
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