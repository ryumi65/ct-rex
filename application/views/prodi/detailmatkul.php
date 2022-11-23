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
                        <h5 class="mb-0">Detail Mata Kuliah</h5>
                    </div>
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-md-6">
                                <label>ID Mata Kuliah</label>
                                <div class="mb-3">
                                    <input type="text" name="id_matkul" class="form-control-plaintext ms-1" placeholder="-" value="<?= $matkul['id_matkul'] ?>" disabled readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Program Studi</label>
                                <div class="mb-3">
                                    <input type="text" name="id_prodi" class="form-control-plaintext ms-1" placeholder="-" value="<?= $matkul['id_prodi'] ?>" disabled readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Nama Mata Kuliah (Indonesia)</label>
                                <div class="mb-3">
                                    <input type="text" name="nama" class="form-control-plaintext ms-1" placeholder="-" value="<?= $matkul['nama'] ?>" disabled readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Nama Mata Kuliah (Inggris)</label>
                                <div class="mb-3">
                                    <input type="text" name="nama_inggris" class="form-control-plaintext ms-1" placeholder="-" value="<?= $matkul['nama_inggris'] ?>" disabled readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>SKS Teori</label>
                                <div class="mb-3">
                                    <input type="text" name="sks" class="form-control-plaintext ms-1" placeholder="-" value="<?= $matkul['sks'] ?>" disabled readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>SKS Praktikum</label>
                                <div class="mb-3">
                                    <input type="text" name="sks_praktikum" class="form-control-plaintext ms-1" placeholder="-" value="<?= $matkul['sks_praktikum'] ?>" disabled readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Jenis Mata Kuliah</label>
                                <div class="mb-3">
                                    <input type="text" name="jenis" class="form-control-plaintext ms-1" placeholder="-" value="<?= $matkul['jenis'] ?>" disabled readonly>
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