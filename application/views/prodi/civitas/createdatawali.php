    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <div class="col-12 mb-md-0 my-4">
                <div class="card">
                    <div class="card-body pb-0">
                        <?= validation_errors() ?>
                        <?= form_open('prodi/createwali') ?>
                        <div class="mb-3">
                            <select class="form-select" name="nik" required>
                                <option selected disabled>Pilih Dosen</option>
                                <?php foreach ($listd as $dosen) : ?>
                                    <option value="<?= $dosen['nik'] ?>">
                                        <?= $dosen['nik'] . ' - ' . $dosen['nama'] ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <h6> Daftar Mahasiswa Tanpa Dosen Wali</h6>
                            </div>
                            <?php foreach ($listm as $mahasiswa) : ?>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" name="dosen_wali[]" value="<?= $mahasiswa['nim'] ?>">
                                        <label class="form-check-label"><?= $mahasiswa['nim'] . ' - ' . $mahasiswa['nama'] ?></label>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>

                        <div class="d-flex justify-content-end text-center">
                            <button type="submit" class="btn btn-primary my-4">Simpan</button>
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