    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <!-- Profil -->
            <div class="col-12 mb-md-0 my-4">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <h5 class="mb-0">Profil Mahasiswa</h5>
                    </div>
                    <div class="card-body p-3">
                        <div class="avatar avatar-xxl position-relative">
                            <img src="<?= base_url(); ?>assets/img/uploads/profile/curved.jpg" alt="profile_image" class="w-300 border-radius-lg shadow-sm">
                        </div>
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