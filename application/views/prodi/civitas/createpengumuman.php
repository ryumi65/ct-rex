<div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <div class="container-fluid pt-5 pt-xl-0">

        <!-- Form Mata Kuliah -->
        <div class="col-12 mb-md-0 my-4">
            <div class="card">
                <div class="card-header pb-0 p-3">
                    <h5 class="mb-0">Form Pengisian Pengumuman</h5>
                </div>
                <div class="card-body p-3">
                    <?= form_open('prodi/set_pengumuman') ?>
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <label>Tanggal Mulai</label>
                            <div class="mb-3">
                                <input type="date" name="tanggal_mulai" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <label>Tema</label>
                            <div class="mb-3">
                                <input type="text" name="tema" class="form-control" placeholder="Tema" required>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <label>Isi Pengumuman</label>
                            <div class="mb-3">
                                <input type="text" name="isi_pengumuman" class="form-control" placeholder="isi pengumuman">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <label>Tenggang Waktu</label>
                            <div class="mb-3">
                                <input type="date" name="tenggang_waktu" class="form-control">
                            </div>
                        </div>

                        <div class="d-flex justify-content-end text-center">
                            <button type="submit" class="btn btn-primary mt-2 mb-0">Simpan</button>
                        </div>
                    </div>
                    </form>
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