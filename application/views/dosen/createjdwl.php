<div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid py-3">

        <!-- Header
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
                                <h5 class="mb-1"><?= $dosen['nama'] ?></h5>
                                <p class="mb-0 font-weight-bold text-sm"><?= $dosen['nik'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex d-inline ms-auto">
                        <p class="mx-2">Mahasiswa Wali</p>
                        <p class="mx-2">Data Mengajar</p>
                        <p class="mx-2">SKS Mengajar</p>
                    </div>
                </div>
            </div> -->

            <!-- Beban Mengajar -->
            <div class="col-12 mb-md-0 my-4">
                <div class="card">
                    <div class="card-body pb-0">
                        <?= validation_errors() ?>
                        <?= form_open('prodi/createwali') ?>
                        <div class="mb-3">
                            <select class="form-select" name="nik" required>
                                <option selected disabled>Pilih Matkul</option>
                                <?php foreach ($listd as $dosen) : ?>
                                    <option value="<?= $dosen['nik'] ?>">
                                        <?= $dosen['nik'] . ' - ' . $dosen['nama'] ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="row">
                            <div class="mt-3">
                                <h5> Pilih Hari</h5>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2 w-100">Senin</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2 w-100">Selasa</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2 w-100">Rabu</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2 w-100">Kamis</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2 w-100">Jum'at</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2 w-100">Sabtu</button>
                            </div>

                            <div class="row">
                            <div class="mt-3">
                                <h5> Pilih Lantai</h5>
                            </div>
                            <div class="col-3 text-center">
                                <button type="submit" class="btn btn-primary my-2">Basement</button>
                                <button type="submit" class="btn btn-primary my-2">Basement</button>
                            </div>
                            <div class="col-3 text-center">
                                <button type="submit" class="btn btn-primary my-2">Lantai 01</button>
                                <button type="submit" class="btn btn-primary my-2">Lantai 02</button>
                            </div>
                            <div class="col-3 text-center">
                                <button type="submit" class="btn btn-primary my-2">Lantai 03</button>
                                <button type="submit" class="btn btn-primary my-2">Lantai 04</button>
                            </div>
                            <div class="col-3 text-center">
                                <button type="submit" class="btn btn-primary my-2">Lantai 05</button>
                                <button type="submit" class="btn btn-primary my-2">Lantai 06</button>
                            </div>
                            <div class="col-3 text-center">
                                <button type="submit" class="btn btn-primary my-2">Lantai 07</button>
                                <button type="submit" class="btn btn-primary my-2">Lantai 08</button>
                            </div>
                            <div class="col-3 text-center">
                                <button type="submit" class="btn btn-primary my-2">Lantai 09</button>
                                <button type="submit" class="btn btn-primary my-2">Lantai 10</button>
                            </div>
                            <div class="col-3 text-center">
                                <button type="submit" class="btn btn-primary my-2">Lantai 11</button>
                                <button type="submit" class="btn btn-primary my-2">Lantai 12</button>
                            </div>
                            <div class="col-3 text-center">
                                <button type="submit" class="btn btn-primary my-2">Lantai 13</button>
                                <button type="submit" class="btn btn-primary my-2">Lantai 14</button>
                            </div>

                        <div class="row">
                            <div class="mb-3">
                                <h6> Pilih Ruang</h6>
                            </div>
                            <!-- <div class="col-6 text-center">
                                <button type="submit" class="btn btn-primary my-2">Ruang 01</button>
                                <button type="submit" class="btn btn-primary my-2">Ruang 02</button>
                                <button type="submit" class="btn btn-primary my-2">Ruang 03</button>
                                <button type="submit" class="btn btn-primary my-2">Ruang 04</button>
                                <button type="submit" class="btn btn-primary my-2">Ruang 05</button>
                                <button type="submit" class="btn btn-primary my-2">Ruang 06</button>
                                <button type="submit" class="btn btn-primary my-2">Ruang 07</button>
                                <button type="submit" class="btn btn-primary my-2">Ruang 08</button>
                                <button type="submit" class="btn btn-primary my-2">Ruang 09</button>
                                <button type="submit" class="btn btn-primary my-2">Ruang 10</button>
                                <button type="submit" class="btn btn-primary my-2">Ruang 11</button>
                                <button type="submit" class="btn btn-primary my-2">Ruang 12</button>
                                <button type="submit" class="btn btn-primary my-2">Ruang 13</button>
                                <button type="submit" class="btn btn-primary my-2">Ruang 14</button>
                                <button type="submit" class="btn btn-primary my-2">Ruang 15</button>
                                <button type="submit" class="btn btn-primary my-2">Ruang 16</button>
                            </div>
                            <div class="col-6 text-center">
                                <button type="submit" class="btn btn-primary my-2">Ruang 17</button>
                                <button type="submit" class="btn btn-primary my-2">Ruang 18</button>
                                <button type="submit" class="btn btn-primary my-2">Ruang 19</button>
                                <button type="submit" class="btn btn-primary my-2">Ruang 20</button>
                                <button type="submit" class="btn btn-primary my-2">Ruang 21</button>
                                <button type="submit" class="btn btn-primary my-2">Ruang 22</button>
                                <button type="submit" class="btn btn-primary my-2">Ruang 23</button>
                                <button type="submit" class="btn btn-primary my-2">Ruang 24</button>
                                <button type="submit" class="btn btn-primary my-2">Ruang 25</button>
                                <button type="submit" class="btn btn-primary my-2">Ruang 26</button>
                                <button type="submit" class="btn btn-primary my-2">Ruang 27</button>
                                <button type="submit" class="btn btn-primary my-2">Ruang 28</button>
                                <button type="submit" class="btn btn-primary my-2">Ruang 29</button>
                                <button type="submit" class="btn btn-primary my-2">Ruang 30</button>
                                <button type="submit" class="btn btn-primary my-2">Ruang 31</button>
                                <button type="submit" class="btn btn-primary my-2">Ruang 32</button>
                            </div> -->
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2">Ruang 1</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2">Ruang 2</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2">Ruang 3</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2">Ruang 4</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2">Ruang 5</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2">Ruang 6</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2">Ruang 7</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2">Ruang 8</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2">Ruang 9</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2">Ruang 10</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2">Ruang 11</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2">Ruang 12</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2">Ruang 13</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2">Ruang 14</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2">Ruang 15</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2">Ruang 16</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2">Ruang 17</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2">Ruang 18</button>
                            </div>


                            <div class="row">
                            <div class="mb-3">
                                <h6> Pilih Waktu</h6>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2">00.01</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2">00.02</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2">00.03</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2">00.04</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2">00.05</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2">00.06</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2">00.07</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2">00.08</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2">00.09</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2">00.10</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2">00.11</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2">00.12</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2">00.13</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2">00.14</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2">00.15</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2">00.16</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2">00.17</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2">00.18</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2">00.19</button>
                            </div>
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary my-2">00.20</button>
                            </div>

                        </div>

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
                <p class="mb-0 text-secondary">
                    Copyright ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script> Universitas Muhammadiyah Bandung. All Rights Reserved.
                </p>
            </div>
        </footer>
    </div>