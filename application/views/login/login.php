<body>
    <!-- Main -->
    <main class="main-content  mt-0">
        <section>
            <div class="page-header pt-4">
                <div class="container">
                    <img src="<?= base_url() ?>/assets/img/logoumb-gradient.png" alt="logoumb" height="80" width="220">
                    <div class="row">
                        <!-- Form -->
                        <div class="col-xl-4 col-lg-5 col-md-6 mt-3 d-flex flex-column mx-auto">
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

    <!-- Keterangan Kampus -->
    <div class="container my-2">
        <h5>Universitas Muhammadiyah Bandung</h5>
        <p>Jl. Soekarno - Hatta No. 752, Cipadung Kidul,<br>
            Panyileukan, Kota Bandung</p>
        <p><b>Phone</b>: (022) 63744992/ 63745992<br>
            <b>Email</b>: info@umbandung.ac.id
        </p>
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