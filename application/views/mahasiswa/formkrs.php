    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <div class="col-12 mb-md-0 my-4">
                <div class="card">
                    <div class="card-header p-3">
                        <div>
                            <h5 class="mb-0">Tambah Kartu Rencana Studi</h5>
                        </div>
                    </div>
                    <div class="card-body p-3 pt-0">
                        <?= form_open('krs/create') ?>
                        <div>
                            <ul class="nav nav-tabs mx-3" id="myTab" role="tablist">
                                <?php for ($i = 1; $i <= 8; $i++) : ?>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="semester<?= $i ?>" data-bs-toggle="tab" data-bs-target="#semester<?= $i ?>-pane" type="button" role="tab" aria-controls="semester<?= $i ?>-pane" aria-selected="true">Semester <?= $i ?></button>
                                    </li>
                                <?php endfor ?>
                            </ul>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <?php for ($i = 1; $i <= 8; $i++) : ?>
                                <div class="tab-pane fade show" id="semester<?= $i ?>-pane" role="tabpanel" aria-labelledby="semester<?= $i ?>" tabindex="0">
                                    <div class="table-responsive">
                                        <table class="table table-striped align-items-center ps-3" id="table<?= $i ?>">
                                            <thead>
                                                <tr>
                                                    <th class="font-weight-bolder text-uppercase text-xs ps-2" style="width: 5%">
                                                        No.</th>
                                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                        Kode MK</th>
                                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                        Nama MK</th>
                                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                        Total SKS</th>
                                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                        Dosen Pengampu</th>
                                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                        Hari</th>
                                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                        Waktu</th>
                                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                        Ruangan</th>
                                                    <th class="font-weight-bolder text-uppercase text-xs ps-2"></th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-sm">
                                                <?php foreach ($listj[$i - 1] as $jadwal) : ?>
                                                    <tr>
                                                        <td></td>
                                                        <td><?= $jadwal['kode'] ?></td>
                                                        <td><?= $jadwal['nama'] ?></td>
                                                        <td><?= $jadwal['sks'] ?></td>
                                                        <td><?= $jadwal['dosen'] ?></td>
                                                        <td><?= $jadwal['hari'] ?></td>
                                                        <td><?= $jadwal['waktu'] ?></td>
                                                        <td><?= $jadwal['ruangan'] ?></td>
                                                        <td>
                                                            <input class="form-check-input" type="checkbox" name="id_jadwal[]" value="<?= $jadwal['id'] ?>">
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            <?php endfor ?>
                        </div>

                        <div class="d-flex justify-content-end text-center">
                            <button type="submit" class="btn btn-primary mt-3 mb-0">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Form KRS
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

            Tabel Hasil Pilihan
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
            </div> -->
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
        for (let i = 1; i <= 8; i++) {
            let table;

            $(document).ready(() => {

                table = $(`#table${i}`).DataTable({

                    dom: "<'mb-3'rt>",
                    order: [1, 'asc'],

                    columnDefs: [{
                        targets: [0, 8],
                        orderable: false,
                        searchable: false,
                    }],
                });

                table.on('order.dt search.dt', () => {
                    let j = 1;

                    table.cells(null, 0, {
                        order: 'applied',
                        search: 'applied',
                    }).every(function(cell) {
                        this.data(j++);
                    });
                }).draw();
            });
        }
    </script>