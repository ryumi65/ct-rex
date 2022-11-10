<!-- <div class="container-fluid d-flex aligns-items-center justify-content-center vh-100">
        <div class="card my-auto">
            <div class="card-body fw-light">
                <?= validation_errors() ?>
                <?= form_open('akun/register') ?>
                    <h4 class="card-title text-center fw-light">REGISTER</h4>

                    <div class="d-grid gap-2 mb-3">
                        <div>
                            <label for="id_akun" class="form-label">ID Akun</label>
                            <input type="text" name="id_akun" id="id_akun" class="form-control form-select-sm" size="30" required>
                        </div>

                        <div>
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" id="username" class="form-control form-select-sm" size="30" required>
                        </div>

                        <div>
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control form-select-sm" size="30" required>
                        </div>

                        <div class="row">
                            <div class="col-7">
                                <label class="form-label">Status</label><br>
                                <div class="d-flex justify-content-evenly">
                                    <input type="radio" class="btn-check" name="status" id="y" value="y" required>
                                    <label class="btn btn-outline-primary btn-sm" for="y">Y</label>
                                    <input type="radio" class="btn-check" name="status" id="n" value="n" required>
                                    <label class="btn btn-outline-primary btn-sm" for="n">N</label>
                                </div>
                            </div>
                            <div class="col-5">
                                <label for="level" class="form-label">Level</label>
                                <select class="form-select form-select-sm fw-light" name="level" id="level" required>
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

                    <div class="d-grid mx-auto">
                        <button type="submit" class="btn btn-primary btn-sm">Register</button>
                    </div>

                    <div class="fw-light link-secondary text-center mt-2">
                        <a href="<?= site_url('login') ?>" class="text-decoration-none">Already have an account? <u>Login!</u></a>
                    </div>
                </form>
            </div>
        </div>
</div> -->

<body>

    <!-- Main -->
    <main class="main-content  mt-0">
        <section class="min-vh-100 mb-8">

            <!-- Header -->
            <div class="page-header align-items-start bg-gradient-primary min-vh-50 pt-5 pb-11 m-3 border-radius-lg">

                <!-- Judul -->
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 text-center mx-auto">
                            <h1 class="text-white mb-2 mt-5">Register</h1>
                            <p class="text-lead text-white">Registrasi disini yaa (buat admin)</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card -->
            <div class="container">
                <div class="row mt-lg-n10 mt-md-n11 mt-n15">
                    <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="text-center">Kolom Registrasi</h5>

                                <!-- Form -->
                                <div class="card-body">
                                    <?= validation_errors() ?>
                                    <?= form_open('akun/register') ?>
                                    <label>ID Akun</label>
                                    <div class="mb-3">
                                        <input type="text" name="id_akun" class="form-control" placeholder="ID Akun" required>
                                    </div>
                                    <label>Username</label>
                                    <div class="mb-3">
                                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                                    </div>
                                    <label>Password</label>
                                    <div class="mb-3">
                                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                                    </div>
                                    <label>Level</label>
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
                                    <input type="hidden" name="status" value="y">
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-primary w-100 mt-4">Sign up</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </main>

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