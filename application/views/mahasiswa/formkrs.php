    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <div class="col-12 mb-md-0 my-4">
                <div class="card">
                    <div class="card-body pb-0">
                        <?= form_open('krs/create') ?>
                        <div class="mb-3">
                            <select class="form-select">
                                <option selected disabled>Pilih Semester</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <h6>Daftar Mata Kuliah</h6>
                            </div>
                            <?php foreach ($listj as $jadwal) : ?>
                                <div class="col-12 col-md-6">
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" name="id_jadwal[]" value="<?= $jadwal['id'] ?>">
                                        <label class="form-check-label"><?= $jadwal['nama'] . ' - ' . $jadwal['dosen'] . ' - ' . $jadwal['waktu'] ?></label>
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

            <!-- Form KRS -->
            <div class="col-12 my-4">
                <div class="card">
                    <div class="card-body pb-0">
                        <div>
                            <select class="form-select" name="nik" required>
                                <option selected disabled>Pilih Semester</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive">
                            <table class="table table-striped align-items-center mb-0 ps-3" id="table">
                                <thead>
                                    <tr>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                            No.</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            ID Matkul</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Nama Matkul</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Total SKS</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Kategori</th>
                                        <th class="font-weight-bolder text-uppercase text-xs text-center">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="products">
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end my-1 mx-4">
                            <a class="btn btn-primary btn-sm ">Ambil Semua</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabel Hasil Pilihan -->
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <h6> Form Pengisian Kartu Rencana Studi</h6>
                        <p id="total-price"></p>
                        <div class="table-responsive">
                            <table class="table table-striped align-items-center mb-0 ps-3" id="table2">
                                <thead>
                                    <tr>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                            No.</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            ID Matkul</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Nama Matkul</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Total SKS</th>
                                        <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                            Kategori</th>
                                        <th class="font-weight-bolder text-uppercase text-xs text-center">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="cart-items">
                                </tbody>
                            </table>
                            <div>
                                <div class="d-flex justify-content-end mx-4">
                                    <a href="<?= site_url('mahasiswa/formkrs') ?>" class="btn btn-primary btn-sm ">Submit</a>
                                </div>
                            </div>
                        </div>
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

    <!-- KRS -->
    <script src="<?= base_url(); ?>assets/js/krs.js"></script>

    <!-- JQuery -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/r-2.4.0/datatables.min.js"></script>
    <script>
        let table, table2;

        $(document).ready(() => {
            table = $('#table').DataTable({
                responsive: true,
                order: [2, 'asc'],

                columnDefs: [{
                    targets: [0, 5],
                    orderable: false,
                    searchable: false,
                }],

            });

            table.on('order.dt search.dt', () => {
                let i = 1;

                table.cells(null, 0, {
                    order: 'applied',
                    search: 'applied',
                }).every(function(cell) {
                    this.data(i++);
                });
            }).draw();

            table2 = $('#table2').DataTable({
                responsive: true,
                order: [2, 'asc'],

                columnDefs: [{
                    targets: [0, 5],
                    orderable: false,
                    searchable: false,
                }],

            });

            table2.on('order.dt search.dt', () => {
                let i = 1;

                table2.cells(null, 0, {
                    order: 'applied',
                    search: 'applied',
                }).every(function(cell) {
                    this.data(i++);
                });
            }).draw();
        });
    </script>