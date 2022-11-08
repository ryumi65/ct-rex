<body>
    <!-- Main -->
    <main class="main-content  mt-0">
        <section>
            <div class="page-header pt-4">
                <div class="container">
                    <img src="<?= base_url() ?>/assets/img/logoumb.png" alt="logoumb" height="80" width="220">
                    <div class="row">
                        <!-- Form -->
                        <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                            <div class="card card-plain">

                                <!-- Judul -->
                                <div class="card-header pb-0 text-left bg-transparent">
                                    <h3 class="font-weight-bolder text-primary text-gradient">
                                        Selamat Datang
                                    </h3>
                                    <p class="mb-0">di Portal Akademik Universitas Muhammadiyah Bandung.</p>
                                </div>
                                <div class="card-body">
                                    <?= validation_errors() ?>
                                    <?= form_open('login/auth') ?>

                                        <!-- Username -->
                                        <label>Username</label>
                                        <div class="mb-3">
                                            <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="email-addon">
                                        </div>

                                        <!-- Password -->
                                        <label>Password</label>
                                        <div class="mb-3">
                                            <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                                        </div>

                                        <!-- Remember Me -->
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="remember-me" checked="">
                                            <label class="form-check-label" for="remember-me">Remember me</label>
                                        </div>

                                        <!-- Sign In -->
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-gradient-primary w-100 mt-4 mb-0">Sign in</button>
                                        </div>
                                    </form>
                                </div>

                                <!-- Sign Up -->
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-4 text-sm mx-auto">
                                        Don't have an account?
                                        <a href="<?= site_url('akun/register') ?>" class="text-primary text-gradient font-weight-bold">Sign up</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Gambar -->
                        <div class="col-md-6">
                            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('<?= base_url() ?>/assets/img/gedunglogin.jpg'); background-position-y: 30%;">
                                    <span class="mask bg-gradient-primary opacity-3"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="footer py-5">
        <div class="container">
            <div class="row mt-3 mb-5">

                <!-- Keterangan Kampus -->
                <div class="col-lg-7">
                    <h4>Universitas Muhammadiyah Bandung</h4>
                    <p class="text-wrap">Jl. Soekarno - Hatta No. 752, Cipadung Kidul,<br>
                        Panyileukan, Kota Bandung</p>
                    <p><b>Phone</b>: (022) 63744992/ 63745992<br>
                        <b>Email</b>: info@umbandung.ac.id
                    </p>
                </div>

                <!-- Logo Medsos -->
                <div class="col-lg-5 mx-auto">
                    <h4>Follow Our Social Media!</h4>
                    <div class="mt-3">
                        <button type="button" class="btn btn-youtube btn-icon-only rounded-circle me-2" onclick="window.open('https://www.youtube.com/channel/UCdo5vics8bEFAd9h6aghLYQ')">
                            <span class="btn-inner--icon"><i class="fa-brands fa-youtube"></i></span>
                        </button>
                        <button type="button" class="btn btn-facebook btn-icon-only rounded-circle mx-2" onclick="window.open('https://id-id.facebook.com/universitasmuhammadiyahbandung')">
                            <span class="btn-inner--icon"><i class="fa-brands fa-facebook"></i></span>
                        </button>
                        <button type="button" class="btn btn-dribbble btn-icon-only rounded-circle mx-2" onclick="window.open('https://www.instagram.com/umbandung')">
                            <span class="btn-inner--icon"><i class="fa-brands fa-instagram"></i></span>
                        </button>
                        <button type="button" class="btn btn-twitter btn-icon-only rounded-circle mx-2" onclick="window.open('https://www.twitter.com/umbandung')">
                            <span class="btn-inner--icon"><i class="fa-brands fa-twitter"></i></span>
                        </button>
                        <button type="button" class="btn btn-github btn-icon-only rounded-circle ms-2" onclick="window.open('https://www.tiktok.com/@umbandung')">
                            <span class="btn-inner--icon"><i class="fa-brands fa-tiktok"></i></span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Copyright -->
            <div class="col-8 mx-auto text-center">
                <p class="mb-0 text-secondary">
                    Copyright ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script> Universitas Muhammadiyah Bandung. All Rights Reserved.
                </p>
            </div>
        </div>
    </footer>