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
                                <h5 class="mb-1"><?= $_SESSION['nama'] ?></h5>
                                <p class="mb-0 font-weight-bold text-sm"><?= $_SESSION['access'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="ms-auto">
                        <a href="<?= site_url('akun/logout'); ?>" class="ms-5 me-2"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
                    </div>
                </div>
            </div>

            <!-- Profil -->
            <div class="col-12 my-4">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-0">Edit Profil</h6>
                            </div>
                            <div class="card-body p-3">
                                <?= form_open('akun/register') ?>
                                <div class="row">

                                    <!-- Bagian Kiri -->
                                    <div class="col-md-6">
                                        <label>NIM</label>
                                        <div class="mb-3">
                                            <input type="text" name="nim" class="form-control" placeholder="NIM">
                                        </div>
                                        <label>Nama Lengkap</label>
                                        <div class="mb-3">
                                            <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
                                        </div>
                                        <label>Jenis Kelamin</label>
                                        <div class="mb-3">
                                            <input type="text" name="jenis_kelamin" class="form-control" placeholder="Jenis Kelamin">
                                        </div>
                                        <label>Email</label>
                                        <div class="mb-3">
                                            <input type="email" name="email" class="form-control" placeholder="Email">
                                        </div>
                                        <label>Agama</label>
                                        <div class="mb-3">
                                            <input type="text" name="agama" class="form-control" placeholder="Agama">
                                        </div>
                                        <label>Alamat Tempat Tinggal</label>
                                        <div class="mb-3">
                                            <input type="text" name="alamat" class="form-control" placeholder="Alamat Tempat Tinggal">
                                        </div>
                                        <label>Kabupaten/Kota</label>
                                        <div class="mb-3">
                                            <input type="text" name="kabupaten" class="form-control" placeholder="Kabupaten/Kota">
                                        </div>
                                        <label>Provinsi</label>
                                        <div class="mb-3">
                                            <input type="text" name="provinsi" class="form-control" placeholder="Provinsi">
                                        </div>
                                        <label>Kode Pos</label>
                                        <div class="mb-3">
                                            <input type="text" name="tahun_angkatan" class="form-control" placeholder="Tahun Angkat">
                                        </div>
                                    </div>

                                    <!-- Bagian Kanan -->
                                    <div class="col-md-6">
                                        <label>Tempat Lahir</label>
                                        <div class="mb-3">
                                            <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
                                        </div>
                                        <label>Tanggal Lahir</label>
                                        <div class="mb-3">
                                            <input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir">
                                        </div>
                                        <label>Tahun Angkatan</label>
                                        <div class="mb-3">
                                            <input type="text" name="tahun_angkatan" class="form-control" placeholder="Password">
                                        </div>
                                        <label>Nomor Handphone</label>
                                        <div class="mb-3">
                                            <input type="text" name="no_hp" class="form-control" placeholder="Nomor Handphone">
                                        </div>
                                        <label>Kewarganegaraan</label>
                                        <div class="mb-3">
                                            <input type="text" name="kewarganegaraan" class="form-control" placeholder="Kewarganegaraan">
                                        </div>
                                        <label>Nomor Induk Kependudukan</label>
                                        <div class="mb-3">
                                            <input type="text" name="nik" class="form-control" placeholder="Nomor Induk Kependudukan">
                                        </div>
                                        <label>Kelurahan</label>
                                        <div class="mb-3">
                                            <input type="text" name="kelurahan" class="form-control" placeholder="Kelurahan">
                                        </div>
                                        <label>Tahun Angkatan</label>
                                        <div class="mb-3">
                                            <input type="text" name="tahun_angkatan" class="form-control" placeholder="Tahun Angkatan">
                                        </div>
                                        <label>ID Prodi</label>
                                        <div class="mb-3">
                                            <select class="form-select" name="level" required>
                                                <option selected disabled>Pilih Level</option>
                                                <option value="0">Admin</option>
                                                <option value="1">Fakultas</option>
                                                <option value="2">Prodi</option>
                                                <option value="3">Dosen</option>
                                                <option value="4">Mahasiswa</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="status" value="y">
                                <div class="d-flex justify-content-end text-center">
                                    <button type="submit" class="btn btn-primary my-4">Simpan</button>
                                </div>
                                </form>
                            </div>
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