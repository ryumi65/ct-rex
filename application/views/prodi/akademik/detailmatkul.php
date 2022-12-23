    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <!-- Profil -->
            <div class="col-12 mb-md-0 my-4">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <h5 class="mb-0">Detail Mata Kuliah</h5>
                    </div>
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <label>Kode Mata Kuliah</label>
                                <div class="mb-3">
                                    <input type="text" name="kode_matkul" class="form-control" placeholder="-" value="<?= $matkul['kode_matkul'] ?>" disabled readonly>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Program Studi</label>
                                <div class="mb-3">
                                    <input type="text" name="id_prodi" class="form-control" placeholder="-" value="<?= $matkul['id_prodi'] ?>" disabled readonly>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Nama Mata Kuliah (Indonesia)</label>
                                <div class="mb-3">
                                    <input type="text" name="nama" class="form-control" placeholder="-" value="<?= $matkul['nama'] ?>" disabled readonly>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Nama Mata Kuliah (Inggris)</label>
                                <div class="mb-3">
                                    <input type="text" name="nama_inggris" class="form-control" placeholder="-" value="<?= $matkul['nama_inggris'] ?>" disabled readonly>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Jenis Mata Kuliah</label>
                                <div class="mb-3">
                                    <input type="text" name="jenis" class="form-control" placeholder="-" value="<?= ucwords($matkul['jenis']) ?>" disabled readonly>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Kategori SKS</label>
                                <div class="mb-3">
                                    <input type="text" name="kategori" class="form-control" placeholder="-" value="<?= ucwords($matkul['kategori']) ?>" disabled readonly>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Jumlah SKS</label>
                                <div class="mb-3">
                                    <input type="text" name="sks" class="form-control" placeholder="-" value="<?= $matkul['sks'] ?>" disabled readonly>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label>Semester</label>
                                <div class="mb-3">
                                    <input type="text" name="semester" class="form-control" placeholder="-" value="<?= $matkul['semester'] ?>" disabled readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="footer pb-3">

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