<body>

    <!-- Main -->
    <section>

        <!-- Header -->
        <div class="page-header align-items-start bg-gradient-primary py-5 m-3 border-radius-lg">

            <!-- Card -->
            <div class="card col-12 col-sm-10 col-md-8 col-lg-5 col-xl-3 mx-auto">
                <div class="card-header pb-0">
                    <h5 class="text-center">Registrasi</h5>
                </div>

                <!-- Form -->
                <div class="card-body pb-0">
                    <?php if (isset($success)) : ?>
                        <div class="alert alert-success alert-dismissible text-white text-sm fade show" role="alert">
                            Registrasi akun berhasil!
                            <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                    <?php elseif (isset($idError)) : ?>
                        <div class="alert alert-danger alert-dismissible text-white text-sm fade show" role="alert">
                            ID Akun yang dimasukkan sudah terdaftar. Silahkan mendaftar dengan ID lain.
                            <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                    <?php elseif (isset($usernameError)) : ?>
                        <div class="alert alert-danger alert-dismissible text-white text-sm fade show" role="alert">
                            Username yang dimasukkan sudah terdaftar. Silahkan mendaftar dengan Username lain.
                            <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                    <?php endif ?>
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
                        <button type="submit" class="btn bg-gradient-primary w-100 mt-3">Sign up</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer pb-3 py-md-3">

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
                </script>
                Universitas Muhammadiyah Bandung. All Rights Reserved.
            </p>
        </div>
    </footer>