    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <div class="row">

                <!-- Foto Profil -->
                <div class="col-md-6 my-4">
                    <div class="card">
                        <div class="card-header pb-0 p-3">
                            <h5 class="mb-0">Edit Foto Profil</h5>
                        </div>
                        <div class="card-body p-3">
                            <?= form_open_multipart('upload/upload_profil') ?>
                            <label>Foto Profil</label>
                            <div class="mb-3">
                                <input type="file" name="userfile" class="form-control" required>
                            </div>
                            <div class="text-end">
                                <a href="<?= site_url('upload/delete_profil') ?>" class="btn btn-danger mt-2 mb-0">Hapus</a>
                                <button type="submit" class="btn btn-primary mt-2 mb-0">Simpan</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Foto Header -->
                <div class="col-md-6 my-4">
                    <div class="card">
                        <div class="card-header pb-0 p-3">
                            <h5 class="mb-0">Edit Foto Header</h5>
                        </div>
                        <div class="card-body p-3">
                            <?= form_open_multipart('upload/upload_header') ?>
                            <label>Foto Header</label>
                            <div class="mb-3">
                                <input type="file" name="userfile" class="form-control" required>
                            </div>
                            <div class="text-end">
                                <a href="<?= site_url('upload/delete_header') ?>" class="btn btn-danger mt-2 mb-0">Hapus</a>
                                <button type="submit" class="btn btn-primary mt-2 mb-0">Simpan</button>
                            </div>
                            </form>
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