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
                                <img src="<?= base_url(); ?>assets/img/mahalini.jpg" alt="profile_image" class="w-100 border-radiu  s-lg shadow-sm">
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

            <!-- form mata kuliah -->
            <div class="col-12 mb-md-0 my-4">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4 class="mb-0">Form Pengisian Mata Kuliah</h4>
                                </div>
                                <div>
                                    <a href="<?= site_url('prodi/civitas/data-dosen-wali/tambah-wali') ?>" class="btn btn-primary btn-sm mb-0">Tambah Mata Kuliah</a>
                                </div>
                            </div>
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>ID Mata Kuliah</label>
                                        <div class="mb-3">
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Nama Mata Kuliah</label>
                                        <div class="mb-3">
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Nama Mata Kuliah (Inggris)</label>
                                        <div class="mb-3">
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Jenis</label>
                                        <div class="mb-3">
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>SKS Teori</label>
                                        <div class="mb-3">
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>SKS Praktikum</label>
                                        <div class="mb-3">
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Dosen Pengampu</label>
                                        <div class="mb-3">
                                            <input type="email">
                                        </div>
                                        </form>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Semester</label>
                                        <div class="mb-3">
                                            <input type="email">
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Beban Mengajar -->
            <div class="col-12 mb-md-0 my-4">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <div class="col-lg-6 col-7">
                            <h6> Daftar Mata Kuliah Prodi <?= $prodi['nama'] ?></h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            ID Mata Kuliah</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama Mata Kuliah</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Jenis </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            SKS Teori</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            SKS Praktikum</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Dosen Pengampu</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Semester </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listmk as $matkul) : ?>
                                        <tr>
                                            <td>
                                                <div class="px-2 py-1">
                                                    <h6 class="mb-0 text-sm"><?= $matkul['id_matkul'] ?></h6>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="px-2 py-1">
                                                    <a href="<?= site_url('prodi/akademik/detail-matkul/' . $matkul['id_matkul']) ?>">
                                                        <h6 class="mb-0 text-sm"><?= $matkul['nama'] ?></h6>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="px-2 py-1">
                                                    <h6 class="mb-0 text-sm"><?= $matkul['jenis'] ?></h6>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="px-2 py-1">
                                                    <h6 class="mb-0 text-sm"><?= $matkul['sks'] ?></h6>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="px-2 py-1">
                                                    <h6 class="mb-0 text-sm"><?= $matkul['sks_praktikum'] ?></h6>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="px-2 py-1">
                                                    <h6 class="mb-0 text-sm"><?= $matkul['nik_dosen'] ?></h6>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="px-2 py-1">
                                                    <h6 class="mb-0 text-sm"><?= $matkul['id_semester'] ?></h6>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
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