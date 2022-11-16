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

            <!-- Beban Mengajar -->
            <div class="col-12 mb-md-0 my-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-6 col-7">
                                <h6> Daftar Mahasiswa Prodi <?= $prodi['nama'] ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            NIM</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama Mahasiswa</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Jenis Kelamin</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tempat, Tanggal Lahir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listm as $mahasiswa) : ?>
                                        <tr>
                                            <td>
                                                <div class="px-2 py-1">
                                                    <h6 class="mb-0 text-sm"><?= $mahasiswa['nim'] ?></h6>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="px-2 py-1">
                                                    <a href="<?= site_url('prodi/civitas/data-mahasiswa/' . $mahasiswa['nim']) ?>">
                                                        <h6 class="mb-0 text-sm"><?= $mahasiswa['nama'] ?></h6>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="px-2 py-1">
                                                    <?php if ($mahasiswa['jenis_kelamin'] === 'l') : ?>
                                                        <h6 class="mb-0 text-sm">Laki-Laki</h6>
                                                    <?php elseif ($mahasiswa['jenis_kelamin'] === 'p') : ?>
                                                        <h6 class="mb-0 text-sm">Perempuan</h6>
                                                    <?php endif ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="px-2 py-1">
                                                    <h6 class="mb-0 text-sm"><?= $mahasiswa['tempat_lahir'] . ', ' . $mahasiswa['tanggal_lahir']  ?></h6>
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