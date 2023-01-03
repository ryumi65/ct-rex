    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid pt-5 pt-xl-0">

            <!-- Daftar Matkul dari KRS -->
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-body pb-0">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h5 class="mb-0">Kartu Rencana Studi</h5>
                            </div>
                            <div>
                                <a href="<?= site_url('mahasiswa/perkuliahan/tambah-krs') ?>" class="btn btn-primary btn-sm ">Tambah KRS</a>
                            </div>
                        </div>
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
                                                    <th class="font-weight-bolder text-uppercase text-xs ps-2">
                                                        Status</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-sm">
                                                <?php foreach ($lists[$i - 1] as $semester) : ?>
                                                    <tr>
                                                        <td></td>
                                                        <td><?= $semester['kode'] ?></td>
                                                        <td><?= $semester['nama'] ?></td>
                                                        <td><?= $semester['sks'] ?></td>
                                                        <td><?= $semester['dosen'] ?></td>
                                                        <td><?= $semester['hari'] ?></td>
                                                        <td><?= $semester['waktu'] ?></td>
                                                        <td><?= $semester['ruangan'] ?></td>
                                                        <td><?= $semester['status'] ?></td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            <?php endfor ?>
                        </div>
                        <div class="dropdown d-flex justify-content-end my-1">
                            <button class="btn btn-success btn dropdown-toggl btn-sm" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">Cetak</button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="javascript:;">Makan</a></li>
                                <li><a class="dropdown-item" href="javascript:;">Minum</a></li>
                                <li><a class="dropdown-item" href="javascript:;">Tidur</a></li>
                            </ul>
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

    <!-- JQuery -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/r-2.4.0/datatables.min.js"></script>
    <script>
        for (let i = 1; i <= 8; i++) {
            let table;

            $(document).ready(() => {

                table = $(`#table${i}`).DataTable({

                    order: [1, 'asc'],

                    columnDefs: [{
                        targets: [0],
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